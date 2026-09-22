<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Barbershop;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        Barbershop::where('subscription_status', 'trial')
            ->whereNotNull('trial_berakhir_pada')
            ->where('trial_berakhir_pada', '<', now())
            ->update(['subscription_status' => 'nonaktif']);

        $totalStudios = Barbershop::count();
        $activeStudios = Barbershop::where('subscription_status', 'aktif')->count();
        $trialStudios = Barbershop::where('subscription_status', 'trial')->count();

        $query = Barbershop::with('admin')->latest();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhereHas('admin', function ($adminQuery) use ($search) {
                      $adminQuery->where('name', 'like', "%{$search}%")
                                 ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $barbershops = $query->get();

        $totalActiveStudio = $activeStudios;
        $estimasiMRR = $this->calculateMRR();
        $totalDPMidtrans = Payment::where('payment_method', 'midtrans')->where('status', 'paid')->sum('amount');

        return view('superadmin', compact(
            'totalStudios',
            'activeStudios',
            'trialStudios',
            'barbershops',
            'totalActiveStudio',
            'estimasiMRR',
            'totalDPMidtrans'
        ));
    }

    private function calculateMRR(): int
    {
        $activeEssential = Barbershop::where('subscription_status', 'aktif')->where('paket_dipilih', 'essential')->count();
        $activeArchitect = Barbershop::where('subscription_status', 'aktif')->where('paket_dipilih', 'architect')->count();
        return ($activeEssential * 239000) + ($activeArchitect * 559000);
    }

    public function financial(Request $request)
    {
        Barbershop::where('subscription_status', 'trial')
            ->whereNotNull('trial_berakhir_pada')
            ->where('trial_berakhir_pada', '<', now())
            ->update(['subscription_status' => 'nonaktif']);

        $currentMRR = $this->calculateMRR();
        $essentialActiveCount = Barbershop::where('subscription_status', 'aktif')->where('paket_dipilih', 'essential')->count();
        $essentialRevenue = $essentialActiveCount * 239000;

        $architectActiveCount = Barbershop::where('subscription_status', 'aktif')->where('paket_dipilih', 'architect')->count();
        $architectRevenue = $architectActiveCount * 559000;

        $trialsEndingSoon = Barbershop::with('admin')
            ->where('subscription_status', 'trial')
            ->whereNotNull('trial_berakhir_pada')
            ->where('trial_berakhir_pada', '<=', now()->addDays(3))
            ->where('trial_berakhir_pada', '>=', now())
            ->orderBy('trial_berakhir_pada')
            ->get();

        $totalDPMidtrans = Payment::where('payment_method', 'midtrans')->where('status', 'paid')->sum('amount');

        return view('superadmin-financial', compact('currentMRR', 'essentialActiveCount', 'essentialRevenue', 'architectActiveCount', 'architectRevenue', 'trialsEndingSoon', 'totalDPMidtrans'));
    }

    public function toggleSuspend(Request $request, Barbershop $barbershop)
    {
        if ($barbershop->subscription_status === 'nonaktif') {
            $barbershop->subscription_status = 'aktif';
        } else {
            $barbershop->subscription_status = 'nonaktif';
        }
        $barbershop->save();

        if ($request->expectsJson()) {
            return response()->json([
                'status'              => 'success',
                'subscription_status' => $barbershop->subscription_status,
                'is_active'           => $barbershop->subscription_status !== 'nonaktif',
                'message'             => 'Status barbershop berhasil diubah.'
            ]);
        }

        return back()->with('status', 'Status barbershop berhasil diubah.');
    }

    public function createStudio(Request $request)
    {
        $validated = $request->validate([
            'studio_name'       => 'required|string|max:255',
            'studio_address'    => 'required|string|max:255',
            'studio_phone'      => 'required|string|max:20',
            'subscription_plan' => 'required|in:trial,essential,architect',
            'admin_name'        => 'required|string|max:255',
            'admin_email'       => 'required|email|max:255|unique:users,email',
            'admin_phone'       => 'required|string|max:20|unique:users,phone_number',
        ]);

        $tempPassword = Str::random(10);

        // Generate unique slug
        $baseSlug = Str::slug($validated['studio_name']);
        if (empty($baseSlug)) {
            $baseSlug = 'studio';
        }
        $slug = $baseSlug;
        $counter = 2;
        while (Barbershop::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $plan = $validated['subscription_plan'];
        $subscriptionStatus = ($plan === 'trial') ? 'trial' : 'aktif';
        $trialBerakhirPada  = ($plan === 'trial') ? now()->addDays(14) : null;
        $paketDipilih       = ($plan === 'trial') ? 'architect' : $plan;

        DB::transaction(function () use ($validated, $tempPassword, $slug, $subscriptionStatus, $trialBerakhirPada, $paketDipilih) {
            $user = User::create([
                'name'         => $validated['admin_name'],
                'email'        => $validated['admin_email'],
                'phone_number' => $validated['admin_phone'],
                'role'         => 'admin',
                'password'     => $tempPassword,
            ]);

            Barbershop::create([
                'name'                => $validated['studio_name'],
                'slug'                => $slug,
                'address'             => $validated['studio_address'],
                'phone_number'        => $validated['studio_phone'],
                'admin_user_id'       => $user->id,
                'subscription_status' => $subscriptionStatus,
                'trial_berakhir_pada' => $trialBerakhirPada,
                'paket_dipilih'       => $paketDipilih,
            ]);
        });

        return response()->json([
            'success'       => true,
            'admin_email'   => $validated['admin_email'],
            'temp_password' => $tempPassword,
            'studio_name'   => $validated['studio_name'],
            'message'       => 'Studio berhasil ditambahkan.',
        ]);
    }
}
