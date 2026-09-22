<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard utama untuk admin barbershop.
     */
    public function index()
    {
        // a. Ambil data barbershop milik user yang login
        $barbershop = Auth::user()->barbershop;
        if (!$barbershop) {
            return Route::has('admin.onboarding')
                ? redirect()->route('admin.onboarding')
                : redirect('/onboarding');
        }

        $barbershop->refreshTrialStatus();

        // b. Hitung Metrik Ringkasan Hari Ini
        $today = Carbon::today();

        // Total janji temu hari ini (tidak termasuk yang cancelled)
        $todayBookingsCount = $barbershop->bookings()
            ->whereDate('booking_date', $today)
            ->where('booking_status', '!=', 'cancelled')
            ->count();

        // Estimasi pemasukan hari ini (dari booking yang status pembayarannya dp_paid atau paid)
        $todayRevenue = $barbershop->bookings()
            ->whereDate('booking_date', $today)
            ->whereIn('payment_status', ['dp_paid', 'paid'])
            ->sum('total_amount');

        // Data dan jumlah kapster aktif
        $activeCapsters = $barbershop->capsters()
            ->where('is_active', true)
            ->with('user')
            ->get();
        $activeCapstersCount = $activeCapsters->count();

        // c. Ambil Jadwal Janji Temu Hari Ini (Today's Live Queue)
        $todayAppointments = $barbershop->bookings()
            ->with(['customer', 'capster.user', 'service'])
            ->whereDate('booking_date', $today)
            ->where('booking_status', '!=', 'cancelled')
            ->orderBy('start_time', 'asc')
            ->get();

        // d. Oper variabel ke view dashboard admin
        $view = view()->exists('admin.dashboard') ? 'admin.dashboard' : 'dashboard';

        return view($view, compact(
            'barbershop',
            'todayBookingsCount',
            'todayRevenue',
            'activeCapstersCount',
            'todayAppointments',
            'activeCapsters'
        ));
    }

    /**
     * Memperbarui status booking / transaksi secara cepat dari dashboard.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $barbershop = Auth::user()->barbershop;
        if (!$barbershop || $booking->barbershop_id !== $barbershop->id) {
            abort(403, 'Aksi tidak diizinkan untuk janji temu ini.');
        }

        $request->validate([
            'status' => 'nullable|string|in:pending,confirmed,in_chair,completed,cancelled',
            'booking_status' => 'nullable|string|in:pending,confirmed,in_chair,completed,cancelled',
            'action' => 'nullable|string',
            'payment_status' => 'nullable|string|in:unpaid,dp_paid,paid,refunded',
            'payment_method' => 'nullable|string|in:cash,qris_static',
        ]);

        $newStatus = $request->input('status') ?? $request->input('booking_status');

        if (!$newStatus) {
            $action = $request->input('action');
            if ($action === 'mark_completed' || $action === 'complete_and_pay') {
                $newStatus = 'completed';
            } elseif ($action === 'mark_in_chair') {
                $newStatus = 'in_chair';
            } elseif ($action === 'mark_confirmed') {
                $newStatus = 'confirmed';
            } elseif ($action === 'mark_cancelled') {
                $newStatus = 'cancelled';
            }
        }

        if ($newStatus) {
            $booking->update(['booking_status' => $newStatus]);
        }

        $previousPaymentStatus = $booking->payment_status;
        $remainingBeforeUpdate = $booking->remainingBalance();

        if ($request->has('payment_status')) {
            $booking->update(['payment_status' => $request->input('payment_status')]);
        } elseif ($request->input('action') === 'mark_paid' || $request->input('action') === 'complete_and_pay') {
            $booking->update(['payment_status' => 'paid']);
        }

        if ($booking->payment_status === 'paid' && $previousPaymentStatus !== 'paid' && $remainingBeforeUpdate > 0) {
            Payment::create([
                'booking_id' => $booking->id,
                'payment_type' => 'pelunasan',
                'payment_method' => $request->filled('payment_method') ? $request->input('payment_method') : 'cash',
                'amount' => $remainingBeforeUpdate,
                'status' => 'paid',
                'paid_at' => now(),
                'recorded_by' => Auth::id(),
            ]);
        }

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
