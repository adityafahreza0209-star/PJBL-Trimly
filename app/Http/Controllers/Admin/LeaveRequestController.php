<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarberLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $barbershop = Auth::user()->barbershop;

        if (!$barbershop) {
            $pendingLeaves = collect();
            $historyLeaves = collect();
            return view('leave-requests', compact('pendingLeaves', 'historyLeaves'));
        }

        $pendingLeaves = BarberLeave::whereHas('capster', fn($q) => $q->where('barbershop_id', $barbershop->id))
            ->with('capster.user')
            ->where('status', 'pending')
            ->orderBy('start_date')
            ->get();

        $pendingLeaves->each(function ($leave) {
            if ($leave->has_active_booking_conflict && $leave->capster) {
                $leave->conflict_count = $leave->capster->bookings()
                    ->whereBetween('booking_date', [$leave->start_date->format('Y-m-d'), $leave->end_date->format('Y-m-d')])
                    ->where('booking_status', '!=', 'cancelled')
                    ->count();
            } else {
                $leave->conflict_count = 0;
            }
        });

        $historyLeaves = BarberLeave::whereHas('capster', fn($q) => $q->where('barbershop_id', $barbershop->id))
            ->where('status', '!=', 'pending')
            ->with(['capster.user', 'reviewer'])
            ->orderByDesc('reviewed_at')
            ->get();

        return view('leave-requests', compact('pendingLeaves', 'historyLeaves'));
    }

    public function approve(Request $request, BarberLeave $leave)
    {
        $leave->loadMissing('capster');
        abort_if(!$leave->capster || $leave->capster->barbershop_id !== Auth::user()->barbershop?->id, 403);

        $leave->update([
            'status'      => 'approved',
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Permohonan cuti berhasil disetujui.',
                'data'    => $leave,
            ]);
        }

        return back()->with('status', 'Permohonan cuti berhasil disetujui.');
    }

    public function reject(Request $request, BarberLeave $leave)
    {
        $leave->loadMissing('capster');
        abort_if(!$leave->capster || $leave->capster->barbershop_id !== Auth::user()->barbershop?->id, 403);

        $leave->update([
            'status'      => 'rejected',
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Permohonan cuti berhasil ditolak.',
                'data'    => $leave,
            ]);
        }

        return back()->with('status', 'Permohonan cuti berhasil ditolak.');
    }
}
