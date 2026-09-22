<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'duration_minutes' => 'required|integer|min:5|max:480',
            'price' => 'required|integer|min:0',
            'dp_amount' => 'required|integer|min:0|lte:price',
            'description' => 'nullable|string',
        ]);

        $barbershop = Auth::user()->barbershop;

        $barbershop->services()->create([
            'name' => $request->name,
            'category' => $request->category,
            'duration_minutes' => $request->duration_minutes,
            'price' => $request->price,
            'dp_amount' => $request->dp_amount,
            'description' => $request->description,
            'is_active' => true,
        ]);

        return back()->with('status', 'Layanan berhasil ditambahkan!');
    }
}
