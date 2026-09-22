<?php

namespace App\Http\Controllers;

use App\Models\Barbershop;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show(Request $request, $slug = null)
    {
        if ($slug) {
            $barbershop = Barbershop::where('slug', $slug)->firstOrFail();
        } else {
            $barbershop = Barbershop::firstOrFail();
        }

        // GATE PROTEKSI SUBSCRIPTION (Paywall & Trial Check)
        $barbershop->refreshTrialStatus();

        if ($barbershop->subscription_status === 'nonaktif') {
            return response()->view('suspended', compact('barbershop'));
        }

        if ($barbershop->is_emergency_closed) {
            return response()->view('emergency-closed', compact('barbershop'));
        }

        $capsters = $barbershop->capsters()
            ->where('is_active', true)
            ->with('user')
            ->withAvg(['reviews' => fn($q) => $q->where('is_hidden', false)], 'rating')
            ->withCount(['reviews' => fn($q) => $q->where('is_hidden', false)])
            ->get();
        $services = $barbershop->services()->where('is_active', true)->get();

        $overallReviewCount = \App\Models\Review::whereHas('booking', fn($q) => $q->where('barbershop_id', $barbershop->id))
            ->where('is_hidden', false)
            ->count();
        $overallRating = $overallReviewCount > 0
            ? round(\App\Models\Review::whereHas('booking', fn($q) => $q->where('barbershop_id', $barbershop->id))->where('is_hidden', false)->avg('rating'), 1)
            : null;

        return view('book', compact('barbershop', 'capsters', 'services', 'overallRating', 'overallReviewCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barbershop_id'  => 'required|exists:barbershops,id',
            'service_id'     => 'required|exists:services,id',
            'capster_id'     => 'nullable', // bisa 'any' atau id capster atau nama capster (wait, frontend value is capster name right now: <input type="radio" name="capster" value="{{ $capster->user->name }}"> or "Any Available") Let's just validate as nullable. I'll check it manually.
            'booking_date'   => 'required|date|after_or_equal:today',
            'start_time'     => 'required|date_format:H:i',
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'notes'          => 'nullable|string'
        ]);

        $service = \App\Models\Service::findOrFail($request->service_id);
        
        $start = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $request->start_time);
        $end = (clone $start)->addMinutes($service->duration_minutes);
        
        $startTimeFormatted = $start->format('H:i:s');
        $endTimeFormatted = $end->format('H:i:s');

        $barbershop = Barbershop::findOrFail($request->barbershop_id);

        if ($barbershop->is_emergency_closed) {
            $msg = 'Maaf, barbershop sedang tutup darurat sementara sehingga tidak dapat menerima booking.';
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $msg], 422);
            }
            return back()->withErrors(['booking_date' => $msg])->withInput();
        }

        $bookingDate = Carbon::parse($request->booking_date);
        $operatingHour = $barbershop->hoursForDate($bookingDate);

        if (!$operatingHour || !$operatingHour->is_open || !$operatingHour->start_time || !$operatingHour->end_time) {
            $msg = 'Maaf, barbershop tutup/libur pada hari yang dipilih.';
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $msg], 422);
            }
            return back()->withErrors(['booking_date' => $msg])->withInput();
        }

        $opStartTime = Carbon::parse($request->booking_date . ' ' . $operatingHour->start_time);
        $opEndTime = Carbon::parse($request->booking_date . ' ' . $operatingHour->end_time);

        if ($start < $opStartTime || $end > $opEndTime) {
            $msg = 'Waktu booking berada di luar jam operasional barbershop (' . substr($operatingHour->start_time, 0, 5) . ' - ' . substr($operatingHour->end_time, 0, 5) . ').';
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $msg], 422);
            }
            return back()->withErrors(['start_time' => $msg])->withInput();
        }

        $assignedCapsterId = null;

        // Note: The frontend currently sends capster name (or 'Any Available') in 'capster' input, not capster_id.
        // Wait, the instructions said: "Jika $request->capster_id bernilai 'any' atau kosong:"
        // Let's assume the request might send 'any' or an ID.
        // If frontend passes name instead of ID, we need to resolve it.
        $capsterInput = $request->capster_id ?? $request->capster; 

        if (empty($capsterInput) || strtolower($capsterInput) === 'any available' || strtolower($capsterInput) === 'any') {
            // Find any active capster that does not overlap and is not on approved leave
            $availableCapster = $barbershop->capsters()
                ->where('is_active', true)
                ->whereDoesntHave('barberLeaves', function($q) use ($request) {
                    $q->where('status', 'approved')
                      ->whereDate('start_date', '<=', $request->booking_date)
                      ->whereDate('end_date', '>=', $request->booking_date);
                })
                ->whereDoesntHave('bookings', function($q) use ($request, $startTimeFormatted, $endTimeFormatted) {
                    $q->where('booking_date', $request->booking_date)
                      ->where('booking_status', '!=', 'cancelled')
                      ->where('start_time', '<', $endTimeFormatted)
                      ->where('end_time', '>', $startTimeFormatted);
                })
                ->first();

            if (!$availableCapster) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'Maaf, semua capster sedang penuh di jam tersebut. Silakan pilih jam lain.'], 422);
                }
                return back()->withErrors(['time' => 'Maaf, semua capster sedang penuh di jam tersebut. Silakan pilih jam lain.'])->withInput();
            }
            
            $assignedCapsterId = $availableCapster->id;
        } else {
            // Specific capster selected. It might be ID, or it might be name from frontend.
            if (is_numeric($capsterInput)) {
                $capster = $barbershop->capsters()->where('id', $capsterInput)->firstOrFail();
            } else {
                $capster = $barbershop->capsters()->whereHas('user', function($q) use ($capsterInput) {
                    $q->where('name', $capsterInput);
                })->firstOrFail();
            }

            // Check if capster is on approved leave
            $isOnLeave = $capster->barberLeaves()
                ->where('status', 'approved')
                ->whereDate('start_date', '<=', $request->booking_date)
                ->whereDate('end_date', '>=', $request->booking_date)
                ->exists();

            if ($isOnLeave) {
                $msg = 'Maaf, capster yang dipilih sedang cuti pada tanggal tersebut.';
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => $msg], 422);
                }
                return back()->withErrors(['capster' => $msg])->withInput();
            }

            // Check overlap
            $overlap = $capster->bookings()
                ->where('booking_date', $request->booking_date)
                ->where('booking_status', '!=', 'cancelled')
                ->where('start_time', '<', $endTimeFormatted)
                ->where('end_time', '>', $startTimeFormatted)
                ->exists();

            if ($overlap) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'Capster yang dipilih sudah memiliki jadwal di jam tersebut. Silakan pilih jam lain.'], 422);
                }
                return back()->withErrors(['time' => 'Capster yang dipilih sudah memiliki jadwal di jam tersebut. Silakan pilih jam lain.'])->withInput();
            }

            $assignedCapsterId = $capster->id;
        }

        $booking = \Illuminate\Support\Facades\DB::transaction(function() use ($request, $assignedCapsterId, $service, $startTimeFormatted, $endTimeFormatted) {
            $customer = \App\Models\User::firstOrCreate(
                ['phone_number' => $request->customer_phone],
                [
                    'name' => $request->customer_name,
                    'email' => $request->customer_email,
                    'role' => 'pelanggan',
                    'password' => null
                ]
            );

            $bookingCode = 'TRM-' . strtoupper(\Illuminate\Support\Str::random(6));

            $newBooking = \App\Models\Booking::create([
                'booking_code' => $bookingCode,
                'barbershop_id' => $request->barbershop_id,
                'customer_id' => $customer->id,
                'capster_id' => $assignedCapsterId,
                'service_id' => $service->id,
                'booking_date' => $request->booking_date,
                'start_time' => $startTimeFormatted,
                'end_time' => $endTimeFormatted,
                'total_amount' => $service->price,
                'dp_amount' => $service->dp_amount,
                'payment_status' => 'dp_paid',
                'booking_status' => 'confirmed',
                'notes' => $request->notes,
            ]);

            Payment::create([
                'booking_id' => $newBooking->id,
                'payment_type' => 'dp',
                'payment_method' => 'midtrans',
                'amount' => $newBooking->dp_amount,
                'status' => 'paid',
                'paid_at' => now(),
            ]);

            return $newBooking;
        });

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true, 
                'booking' => $booking, 
                'redirect_url' => url('/booking-success')
            ]);
        }

        return redirect('/booking-success?code=' . $booking->booking_code)->with('status', 'Booking berhasil dibuat!');
    }

    public function success(Request $request)
    {
        $code = $request->query('code');
        if (!$code) {
            return redirect('/');
        }

        $booking = \App\Models\Booking::where('booking_code', $code)
            ->with(['barbershop', 'capster.user', 'service'])
            ->firstOrFail();

        return view('booking-success', compact('booking'));
    }

    public function track(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:4'
        ]);

        $query = trim($request->input('query'));
        $bookings = \App\Models\Booking::with(['service', 'capster.user', 'barbershop', 'review'])
            ->where(function($q) use ($query) {
                $q->where('booking_code', $query)
                  ->orWhereHas('customer', function($customerQuery) use ($query) {
                      $customerQuery->where('phone_number', 'like', "%{$query}%");
                  });
            })
            ->latest()
            ->take(5)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $bookings
        ]);
    }

    public function ticket(Request $request)
    {
        $code = $request->query('code');
        if (!$code) {
            return redirect('/');
        }

        $booking = \App\Models\Booking::with(['barbershop', 'customer', 'capster.user', 'service', 'review'])
            ->where('booking_code', $code)
            ->firstOrFail();

        // Guard: Halaman tiket HANYA untuk confirmed & completed.
        // Jika masih 'pending' (belum bayar DP), redirect ke halaman booking / retry pembayaran!
        if ($booking->booking_status === 'pending') {
            $redirectUrl = $booking->barbershop ? url('/' . $booking->barbershop->slug) : url('/book');
            return redirect($redirectUrl)->with('warning', 'Pembayaran DP belum diselesaikan. Silakan selesaikan pembayaran terlebih dahulu.');
        }

        return view('ticket', compact('booking'));
    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|exists:bookings,booking_code',
            'rating'       => 'required|integer|min:1|max:5',
            'comment'      => 'nullable|string|max:1000',
        ]);

        $booking = \App\Models\Booking::where('booking_code', $request->booking_code)->firstOrFail();

        if ($booking->booking_status !== 'completed' || $booking->review()->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => $booking->booking_status !== 'completed'
                    ? 'Ulasan hanya dapat diberikan jika status booking telah selesai.'
                    : 'Ulasan untuk booking ini sudah pernah dikirim.'
            ], 422);
        }

        \App\Models\Review::create([
            'booking_id'  => $booking->id,
            'customer_id' => $booking->customer_id,
            'capster_id'  => $booking->capster_id,
            'rating'      => $request->rating,
            'comment'     => $request->comment,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Review berhasil dikirim!'
        ]);
    }

    public function cancel(Request $request)
    {
        $request->validate([
            'booking_code'        => 'required|exists:bookings,booking_code',
            'cancellation_reason' => 'nullable|string|max:500'
        ]);

        $booking = \App\Models\Booking::where('booking_code', $request->booking_code)->firstOrFail();

        // Aturan Bisnis: Hanya booking dengan status 'pending' atau 'confirmed' yang boleh dibatalkan.
        if (!in_array($booking->booking_status, ['pending', 'confirmed'])) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Jadwal pemesanan ini sudah tidak dapat dibatalkan.'
                ], 422);
            }
            return back()->with('error', 'Jadwal pemesanan ini sudah tidak dapat dibatalkan.');
        }

        // Update data booking
        $booking->booking_status = 'cancelled';
        $booking->cancellation_reason = $request->cancellation_reason ?? 'Dibatalkan oleh pelanggan via portal tiket';
        $booking->save();

        if ($request->expectsJson()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Jadwal reservasi berhasil dibatalkan.'
            ]);
        }

        return back()->with('status', 'Jadwal reservasi berhasil dibatalkan.');
    }

    public function reschedule(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|exists:bookings,booking_code',
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time'   => 'required|date_format:H:i',
        ]);

        $booking = Booking::with(['service', 'capster'])->where('booking_code', $request->booking_code)->firstOrFail();

        // Aturan Bisnis Reschedule:
        // Booking harus berstatus 'pending' atau 'confirmed'.
        if (!in_array($booking->booking_status, ['pending', 'confirmed'])) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Jadwal pemesanan ini sudah tidak dapat di-reschedule.'
                ], 422);
            }
            return back()->with('error', 'Jadwal pemesanan ini sudah tidak dapat di-reschedule.');
        }

        // Validasi waktu minimal reschedule: minimal 3 jam sebelum jadwal lama
        $oldBookingDate = $booking->booking_date instanceof \Carbon\CarbonInterface
            ? $booking->booking_date->format('Y-m-d')
            : Carbon::parse($booking->booking_date)->format('Y-m-d');
        $oldScheduledAt = Carbon::parse($oldBookingDate . ' ' . $booking->start_time);

        if (now()->diffInHours($oldScheduledAt, false) < 3) {
            $errorMessage = 'Reschedule hanya dapat dilakukan minimal 3 jam sebelum jadwal booking berlangsung.';
            if ($request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => $errorMessage
                ], 422);
            }
            return back()->with('error', $errorMessage)->withErrors(['booking_date' => $errorMessage]);
        }

        // Cek batas reschedule: Jika $booking->reschedule_count >= 1, tolak
        if (($booking->reschedule_count ?? 0) >= 1) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Batas maksimal penjadwalan ulang (1x) telah tercapai.'
                ], 422);
            }
            return back()->with('error', 'Batas maksimal penjadwalan ulang (1x) telah tercapai.');
        }

        // Validasi Tabrakan Jadwal Baru:
        $duration = $booking->service->duration_minutes ?? 30;
        $start = Carbon::parse($request->booking_date . ' ' . $request->start_time);
        $end = (clone $start)->addMinutes($duration);

        // Periksa apakah capster tersebut sudah memiliki jadwal booking lain pada tanggal dan rentang waktu yang sama
        // (kecuali booking yang sedang di-reschedule):
        $isConflict = Booking::where('capster_id', $booking->capster_id)
            ->where('id', '!=', $booking->id)
            ->whereDate('booking_date', $request->booking_date)
            ->where('booking_status', '!=', 'cancelled')
            ->where(function ($q) use ($start, $end) {
                $q->where('start_time', '<', $end->format('H:i:s'))
                  ->where('end_time', '>', $start->format('H:i:s'));
            })
            ->exists();

        if ($isConflict) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Jadwal di jam tersebut sudah terisi. Silakan pilih waktu lain.'
                ], 422);
            }
            return back()->with('error', 'Jadwal di jam tersebut sudah terisi. Silakan pilih waktu lain.');
        }

        // Update data booking
        $booking->booking_date = $request->booking_date;
        $booking->start_time = $start->format('H:i:s');
        $booking->end_time = $end->format('H:i:s');
        $booking->reschedule_count = ($booking->reschedule_count ?? 0) + 1;
        $booking->save();

        if ($request->expectsJson()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Jadwal reservasi berhasil diperbarui.'
            ]);
        }

        return back()->with('status', 'Jadwal reservasi berhasil diperbarui.');
    }

    public function getOccupiedSlots(Request $request)
    {
        $request->validate([
            'barbershop_id' => 'required|exists:barbershops,id',
            'booking_date'  => 'required|date',
            'capster_id'    => 'nullable',
        ]);

        $barbershop = Barbershop::findOrFail($request->barbershop_id);
        $bookingDate = Carbon::parse($request->booking_date);
        $operatingHour = $barbershop->hoursForDate($bookingDate);

        if ($barbershop->is_emergency_closed || !$operatingHour || !$operatingHour->is_open || !$operatingHour->start_time || !$operatingHour->end_time) {
            return response()->json([
                'status'         => 'success',
                'store_closed'   => true,
                'all_slots'      => [],
                'occupied_times' => [],
            ]);
        }

        $capsterId = $request->capster_id;
        $isSpecificCapster = !empty($capsterId) && strtolower($capsterId) !== 'any' && strtolower($capsterId) !== 'any available';
        $capster = null;
        $isOnLeave = false;

        if ($isSpecificCapster) {
            $capster = is_numeric($capsterId)
                ? $barbershop->capsters()->where('id', $capsterId)->first()
                : $barbershop->capsters()->whereHas('user', function($q) use ($capsterId) {
                    $q->where('name', $capsterId);
                })->first();

            if ($capster) {
                $isOnLeave = $capster->barberLeaves()
                    ->where('status', 'approved')
                    ->whereDate('start_date', '<=', $request->booking_date)
                    ->whereDate('end_date', '>=', $request->booking_date)
                    ->exists();
            }
        }

        $allSlots = [];
        $startTime = Carbon::parse($request->booking_date . ' ' . $operatingHour->start_time);
        $endTime = Carbon::parse($request->booking_date . ' ' . $operatingHour->end_time);

        $curr = clone $startTime;
        while ($curr < $endTime) {
            $allSlots[] = $curr->format('H:i');
            $curr->addMinutes(30);
        }

        if ($isOnLeave) {
            return response()->json([
                'status'           => 'success',
                'store_closed'     => false,
                'capster_on_leave' => true,
                'all_slots'        => $allSlots,
                'occupied_times'   => $allSlots,
            ]);
        }

        $occupiedTimes = [];

        if ($isSpecificCapster) {
            if ($capster) {
                $bookings = \App\Models\Booking::where('barbershop_id', $barbershop->id)
                    ->where('booking_date', $request->booking_date)
                    ->where('capster_id', $capster->id)
                    ->where('booking_status', '!=', 'cancelled')
                    ->get();

                foreach ($allSlots as $slot) {
                    $slotTime = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $slot);
                    foreach ($bookings as $b) {
                        $bStart = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $b->start_time);
                        $bEnd = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $b->end_time);
                        if ($slot === $bStart->format('H:i') || ($slotTime >= $bStart && $slotTime < $bEnd)) {
                            $occupiedTimes[] = $slot;
                            break;
                        }
                    }
                }
            }
        } else {
            $totalActiveCapsters = $barbershop->capsters()->where('is_active', true)->count();
            if ($totalActiveCapsters === 0) {
                $occupiedTimes = $allSlots;
            } else {
                $bookings = \App\Models\Booking::where('barbershop_id', $barbershop->id)
                    ->where('booking_date', $request->booking_date)
                    ->where('booking_status', '!=', 'cancelled')
                    ->get();

                foreach ($allSlots as $slot) {
                    $slotTime = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $slot);
                    $occupiedCount = 0;

                    foreach ($bookings as $b) {
                        $bStart = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $b->start_time);
                        $bEnd = \Illuminate\Support\Carbon::parse($request->booking_date . ' ' . $b->end_time);
                        if ($slot === $bStart->format('H:i') || ($slotTime >= $bStart && $slotTime < $bEnd)) {
                            $occupiedCount++;
                        }
                    }

                    if ($occupiedCount >= $totalActiveCapsters) {
                        $occupiedTimes[] = $slot;
                    }
                }
            }
        }

        return response()->json([
            'status'           => 'success',
            'store_closed'     => false,
            'capster_on_leave' => false,
            'all_slots'        => $allSlots,
            'occupied_times'   => array_values(array_unique($occupiedTimes)),
        ]);
    }
}
