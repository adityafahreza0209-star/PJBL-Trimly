<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $barbershop = Auth::user()->barbershop;
        $barbershop?->refreshTrialStatus();

        $baseQuery = Payment::whereHas('booking', fn($q) => $q->where('barbershop_id', $barbershop->id));

        $payments = (clone $baseQuery)->with(['booking.customer', 'booking.capster.user'])
            ->when($request->filled('date'), fn($q) => $q->whereDate('created_at', $request->date))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('type'), fn($q) => $q->where('payment_type', $request->type))
            ->when($request->filled('method'), fn($q) => $q->where('payment_method', $request->method))
            ->latest('created_at')
            ->get();

        $totalRevenueToday = (clone $baseQuery)->where('status', 'paid')->whereDate('paid_at', today())->sum('amount');
        $totalPendingValidation = (clone $baseQuery)->where('status', 'pending')->sum('amount');

        $eligibleBookings = $barbershop
            ? $barbershop->bookings()->with('customer')->where('booking_status', '!=', 'cancelled')->get()->filter(fn($b) => $b->remainingBalance() > 0)->values()
            : collect();

        return view('payments', compact('payments', 'totalRevenueToday', 'totalPendingValidation', 'eligibleBookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|in:cash,qris_static',
            'amount' => 'required|integer|min:1',
        ]);

        $barbershop = Auth::user()->barbershop;
        $booking = Booking::findOrFail($request->booking_id);

        if (!$barbershop || $booking->barbershop_id !== $barbershop->id) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        if ($booking->remainingBalance() <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Booking ini sudah lunas, tidak perlu dicatat lagi.'
            ], 422);
        }

        $paymentType = $booking->payment_status === 'unpaid' ? 'dp' : 'pelunasan';

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'payment_type' => $paymentType,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'status' => 'pending',
            'recorded_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil dicatat dan menunggu validasi.',
            'payment' => $payment,
        ]);
    }

    public function validate(Request $request, Payment $payment)
    {
        $barbershop = Auth::user()->barbershop;
        $booking = $payment->booking;

        if (!$barbershop || !$booking || $booking->barbershop_id !== $barbershop->id) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        $payment->update([
            'status' => 'paid',
            'paid_at' => now(),
            'recorded_by' => Auth::id(),
        ]);

        $totalPaid = $booking->totalPaid();
        if ($totalPaid >= $booking->total_amount) {
            $booking->update(['payment_status' => 'paid']);
        } elseif ($totalPaid > 0) {
            $booking->update(['payment_status' => 'dp_paid']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil divalidasi.',
            'payment' => $payment,
            'booking_payment_status' => $booking->payment_status,
        ]);
    }
}
