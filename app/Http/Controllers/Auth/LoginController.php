<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah input adalah email yang valid, jika tidak anggap sebagai phone_number
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        $credentials = [
            $loginType => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($role === 'capster') {
                return redirect()->intended('/capster');
            } elseif ($role === 'super_admin') {
                return redirect()->intended('/superadmin');
            } elseif ($role === 'pelanggan') {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Role pelanggan login melalui portal publik.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}