<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $barbershop = Auth::user()->barbershop;

        if (!$barbershop) {
            $bookings = collect();
            $capsters = collect();
            return view('bookings', compact('bookings', 'capsters'));
        }

        $query = $barbershop->bookings()->with(['customer', 'capster.user', 'service']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('booking_code', 'like', "%{$search}%")
                  ->orWhereHas('customer', function ($cq) use ($search) {
                      $cq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('booking_date', $request->date);
        }

        if ($request->filled('status')) {
            $query->where('booking_status', $request->status);
        }

        if ($request->filled('capster_id')) {
            $query->where('capster_id', $request->capster_id);
        }

        $bookings = $query->orderBy('booking_date', 'desc')
                          ->orderBy('start_time', 'desc')
                          ->get();

        $capsters = $barbershop->capsters()
                               ->with('user')
                               ->where('is_active', true)
                               ->get();

        return view('bookings', compact('bookings', 'capsters'));
    }
}
