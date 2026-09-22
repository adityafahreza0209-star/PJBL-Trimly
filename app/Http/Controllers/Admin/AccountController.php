<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $barbershop = $user->barbershop;
        $barbershop?->refreshTrialStatus();

        return view('admin-account', compact('user', 'barbershop'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => ['nullable', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone_number' => ['required', 'string', 'max:20', Rule::unique('users', 'phone_number')->ignore($user->id)],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phone_number'];
        $user->save();

        return back()->with('status', 'Informasi profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'new_password' => 'required|string|min:8|confirmed',
        ];

        if (!empty($user->password)) {
            $rules['current_password'] = 'required';
        }

        $request->validate($rules);

        if (!empty($user->password)) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.'])->withInput();
            }
        }

        $user->password = $request->new_password;
        $user->save();

        return back()->with('password_status', 'Password berhasil diperbarui!');
    }
}
