<?php

namespace App\Http\Controllers\Capster;

use App\Http\Controllers\Controller;
use App\Models\BarberLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $capster = Auth::user()->capster()->with('user')->firstOrFail();
        $today = Carbon::today();

        $todayBookings = $capster->bookings()
            ->with(['customer', 'service'])
            ->whereDate('booking_date', $today)
            ->where('booking_status', '!=', 'cancelled')
            ->orderBy('start_time')
            ->get();

        $completedToday = $todayBookings->where('booking_status', 'completed');
        $completedCount = $completedToday->count();
        $commissionToday = $completedToday->sum(fn($b) => $b->total_amount * $capster->commission_split / 100);

        // Hitung komisi kemarin
        $yesterday = Carbon::yesterday();
        $yesterdayCompleted = $capster->bookings()
            ->whereDate('booking_date', $yesterday)
            ->where('booking_status', 'completed')
            ->get();
        $commissionYesterday = $yesterdayCompleted->sum(fn($b) => $b->total_amount * $capster->commission_split / 100);

        if ($commissionYesterday > 0) {
            $diff = $commissionToday - $commissionYesterday;
            $percentChange = (int) round(($diff / $commissionYesterday) * 100);
        } else {
            $percentChange = '—';
        }

        // Tentukan booking yang sedang/akan berlangsung paling dekat dengan waktu saat ini (yang belum completed)
        $nextBookingId = null;
        $nonCompleted = $todayBookings->where('booking_status', '!=', 'completed');
        if ($nonCompleted->isNotEmpty()) {
            $now = Carbon::now();
            $nextBooking = $nonCompleted->sortBy(function ($b) use ($now) {
                return abs(Carbon::parse($b->start_time)->diffInSeconds($now));
            })->first();
            $nextBookingId = $nextBooking ? $nextBooking->id : null;
        }

        return view('capster', compact(
            'capster',
            'todayBookings',
            'commissionToday',
            'percentChange',
            'completedCount',
            'nextBookingId'
        ));
    }

    public function updateProfile(Request $request)
    {
        $capster = Auth::user()->capster;
        abort_if(!$capster, 404, 'Data capster tidak ditemukan.');

        $validated = $request->validate([
            'bio'      => 'nullable|string|max:1000',
            'skills'   => 'nullable|array',
            'skills.*' => 'string|max:50',
        ]);

        $capster->update([
            'bio'    => $validated['bio'] ?? null,
            'skills' => $validated['skills'] ?? [],
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Profil berhasil diperbarui!',
            'data'    => $capster->fresh(),
        ]);
    }

    public function requestLeave(Request $request)
    {
        $capster = Auth::user()->capster;
        abort_if(!$capster, 404, 'Data capster tidak ditemukan.');

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'category'   => 'required|in:sakit,mendesak,keluarga',
            'reason'     => 'nullable|string|max:500',
        ]);

        $conflictCount = $capster->bookings()
            ->whereBetween('booking_date', [$request->start_date, $request->end_date])
            ->where('booking_status', '!=', 'cancelled')
            ->count();

        $leave = BarberLeave::create([
            'capster_id'                  => $capster->id,
            'start_date'                  => $request->start_date,
            'end_date'                    => $request->end_date,
            'category'                    => $request->category,
            'reason'                      => $request->reason,
            'status'                      => 'pending',
            'has_active_booking_conflict' => $conflictCount > 0,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Pengajuan cuti berhasil dikirim, menunggu persetujuan admin',
            'data'    => $leave,
        ]);
    }
}
