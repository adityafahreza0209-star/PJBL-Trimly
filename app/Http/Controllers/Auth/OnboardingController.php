<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function success()
    {
        $barbershop = Auth::user()->barbershop;

        return view('onboarding-success', compact('barbershop'));
    }
}
