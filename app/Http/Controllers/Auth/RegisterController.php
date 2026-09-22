<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Barbershop;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'nullable|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:8',
            'barbershop_name' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($validated, $request) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'password' => Hash::make($validated['password']),
                'role' => 'admin',
            ]);

            Barbershop::create([
                'admin_user_id' => $user->id,
                'name' => $validated['barbershop_name'],
                'subscription_status' => 'trial',
                'trial_berakhir_pada' => now()->addDays(14),
                'paket_dipilih' => 'architect',
            ]);

            Auth::login($user);
            $request->session()->regenerate();
        });

        return redirect('/onboarding-success');
    }
}
