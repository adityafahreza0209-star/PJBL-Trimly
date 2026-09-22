<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OverviewController extends Controller
{
    public function index()
    {
        $barbershop = Auth::user()->barbershop;
        $barbershop?->refreshTrialStatus();

        // Trial calculation
        $daysLeft = 0;
        if ($barbershop && $barbershop->trial_berakhir_pada) {
            $trialEnd = Carbon::parse($barbershop->trial_berakhir_pada);
            $daysLeft = max(0, (int) now()->diffInDays($trialEnd, false));
        }
        $subscriptionStatus = $barbershop->subscription_status ?? 'trial';

        // Definisikan periode
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $startOfLastMonth = now()->copy()->subMonth()->startOfMonth();
        $endOfLastMonth = now()->copy()->subMonth()->endOfMonth();

        // 1. Gross Revenue (exclude cancelled, payment_status in ['dp_paid', 'paid'])
        $grossRevenue = (int) $barbershop->bookings()
            ->whereBetween('booking_date', [$startOfMonth, $endOfMonth])
            ->where('booking_status', '!=', 'cancelled')
            ->whereIn('payment_status', ['dp_paid', 'paid'])
            ->sum('total_amount');

        $grossRevenueLastMonth = (int) $barbershop->bookings()
            ->whereBetween('booking_date', [$startOfLastMonth, $endOfLastMonth])
            ->where('booking_status', '!=', 'cancelled')
            ->whereIn('payment_status', ['dp_paid', 'paid'])
            ->sum('total_amount');

        $revenueChangePercent = null;
        if ($grossRevenueLastMonth > 0) {
            $revenueChangePercent = round((($grossRevenue - $grossRevenueLastMonth) / $grossRevenueLastMonth) * 100, 1);
        }

        // 2. Total Bookings (exclude cancelled)
        $totalBookings = $barbershop->bookings()
            ->whereBetween('booking_date', [$startOfMonth, $endOfMonth])
            ->where('booking_status', '!=', 'cancelled')
            ->count();

        $totalBookingsLastMonth = $barbershop->bookings()
            ->whereBetween('booking_date', [$startOfLastMonth, $endOfLastMonth])
            ->where('booking_status', '!=', 'cancelled')
            ->count();

        $bookingsChangePercent = null;
        if ($totalBookingsLastMonth > 0) {
            $bookingsChangePercent = round((($totalBookings - $totalBookingsLastMonth) / $totalBookingsLastMonth) * 100, 1);
        }

        // 3. Average Ticket Size
        $avgTicketSize = $totalBookings > 0 ? (int) round($grossRevenue / $totalBookings) : 0;
        $avgTicketSizeLastMonth = $totalBookingsLastMonth > 0 ? (int) round($grossRevenueLastMonth / $totalBookingsLastMonth) : 0;

        $avgTicketChangePercent = null;
        if ($avgTicketSizeLastMonth > 0) {
            $avgTicketChangePercent = round((($avgTicketSize - $avgTicketSizeLastMonth) / $avgTicketSizeLastMonth) * 100, 1);
        }

        // 4. New Customers (first booking ever for this barbershop falls in the month)
        $firstBookings = $barbershop->bookings()
            ->selectRaw('customer_id, MIN(booking_date) as first_booking_date')
            ->groupBy('customer_id')
            ->get();

        $newCustomers = $firstBookings->filter(function ($item) use ($startOfMonth, $endOfMonth) {
            $d = Carbon::parse($item->first_booking_date);
            return $d->between($startOfMonth, $endOfMonth);
        })->count();

        $newCustomersLastMonth = $firstBookings->filter(function ($item) use ($startOfLastMonth, $endOfLastMonth) {
            $d = Carbon::parse($item->first_booking_date);
            return $d->between($startOfLastMonth, $endOfLastMonth);
        })->count();

        $newCustomersChangePercent = null;
        if ($newCustomersLastMonth > 0) {
            $newCustomersChangePercent = round((($newCustomers - $newCustomersLastMonth) / $newCustomersLastMonth) * 100, 1);
        }

        // 5. Revenue Trends Mingguan (W1: 1-7, W2: 8-14, W3: 15-21, W4: 22-end)
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $daysInMonth = now()->daysInMonth;

        $wRanges = [
            'W1' => [Carbon::create($currentYear, $currentMonth, 1)->startOfDay(), Carbon::create($currentYear, $currentMonth, 7)->endOfDay()],
            'W2' => [Carbon::create($currentYear, $currentMonth, 8)->startOfDay(), Carbon::create($currentYear, $currentMonth, 14)->endOfDay()],
            'W3' => [Carbon::create($currentYear, $currentMonth, 15)->startOfDay(), Carbon::create($currentYear, $currentMonth, 21)->endOfDay()],
            'W4' => [Carbon::create($currentYear, $currentMonth, 22)->startOfDay(), Carbon::create($currentYear, $currentMonth, $daysInMonth)->endOfDay()],
        ];

        $weeklyRevenue = [];
        foreach ($wRanges as $label => [$start, $end]) {
            $weeklyRevenue[$label] = (int) $barbershop->bookings()
                ->whereBetween('booking_date', [$start, $end])
                ->where('booking_status', '!=', 'cancelled')
                ->whereIn('payment_status', ['dp_paid', 'paid'])
                ->sum('total_amount');
        }

        $weeklyRevenueMax = max(array_values($weeklyRevenue));

        $weeklyHeights = [];
        foreach ($weeklyRevenue as $label => $val) {
            if ($weeklyRevenueMax > 0) {
                $weeklyHeights[$label] = max(5, (int) round(($val / $weeklyRevenueMax) * 100));
            } else {
                $weeklyHeights[$label] = 5;
            }
        }

        // Skala kiri chart
        $scaleMax = $weeklyRevenueMax > 0 ? ceil($weeklyRevenueMax / 1000000) : 15;
        if ($scaleMax < 3) $scaleMax = 3;
        $step = $scaleMax / 3;
        $chartScales = [
            (int) round($scaleMax) . 'M',
            (int) round($step * 2) . 'M',
            (int) round($step) . 'M',
            '0'
        ];

        // 6. Capster Performance
        $capsters = $barbershop->capsters()->with('user')->get();
        $capsterStats = [];

        foreach ($capsters as $capster) {
            $completedBookings = $capster->bookings()
                ->whereBetween('booking_date', [$startOfMonth, $endOfMonth])
                ->where('booking_status', 'completed')
                ->get();

            $cuts = $completedBookings->count();
            $revenue = (int) $completedBookings->sum('total_amount');

            $name = $capster->user->name ?? 'Capster';
            $parts = preg_split('/\s+/', trim($name));
            if (count($parts) >= 2) {
                $initials = strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
            } else {
                $initials = strtoupper(substr($name, 0, 2));
            }

            $capsterStats[] = [
                'id' => $capster->id,
                'name' => $name,
                'initials' => $initials,
                'cuts' => $cuts,
                'revenue' => $revenue,
            ];
        }

        usort($capsterStats, fn($a, $b) => $b['revenue'] <=> $a['revenue'] ?: $b['cuts'] <=> $a['cuts']);
        $topCapsters = array_slice($capsterStats, 0, 3);

        $maxCapsterRev = !empty($topCapsters) ? $topCapsters[0]['revenue'] : 0;
        foreach ($topCapsters as &$c) {
            $c['bar_percent'] = ($maxCapsterRev > 0) ? (int) round(($c['revenue'] / $maxCapsterRev) * 100) : 0;
        }
        unset($c);

        // 7. Top Services (TOP 4, exclude cancelled)
        $services = $barbershop->services()->get();
        $serviceStats = [];

        foreach ($services as $service) {
            $bookingCount = $barbershop->bookings()
                ->where('service_id', $service->id)
                ->whereBetween('booking_date', [$startOfMonth, $endOfMonth])
                ->where('booking_status', '!=', 'cancelled')
                ->count();

            $serviceStats[] = [
                'id' => $service->id,
                'name' => $service->name,
                'booking_count' => $bookingCount,
            ];
        }

        usort($serviceStats, fn($a, $b) => $b['booking_count'] <=> $a['booking_count']);
        $topServices = array_slice($serviceStats, 0, 4);

        return view('overview', compact(
            'barbershop',
            'daysLeft',
            'subscriptionStatus',
            'grossRevenue',
            'revenueChangePercent',
            'totalBookings',
            'bookingsChangePercent',
            'avgTicketSize',
            'avgTicketChangePercent',
            'newCustomers',
            'newCustomersChangePercent',
            'weeklyRevenue',
            'weeklyRevenueMax',
            'weeklyHeights',
            'chartScales',
            'topCapsters',
            'topServices'
        ));
    }
}
