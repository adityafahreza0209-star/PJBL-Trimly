<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CapsterController extends Controller
{
    public function index()
    {
        $barbershop = Auth::user()->barbershop;
        $barbershop?->refreshTrialStatus();
        
        $capsters = $barbershop 
            ? $barbershop->capsters()->with('user')->latest()->get() 
            : collect();
            
        $services = $barbershop
            ? $barbershop->services()->latest()->get()
            : collect();

        $operatingHours = $barbershop
            ? $barbershop->operatingHours()->orderBy('day_of_week')->get()
            : collect();

        if ($barbershop && $operatingHours->isEmpty()) {
            $barbershop->generateDefaultOperatingHours();
            $operatingHours = $barbershop->operatingHours()->orderBy('day_of_week')->get();
        }
            
        return view('admin-settings', compact('capsters', 'services', 'operatingHours', 'barbershop'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            'password' => 'required|string|min:8',
            'specialization' => 'required|string|max:255',
            'commission_split' => 'required|integer|min:0|max:100',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'password' => $request->password, // Laravel 11/12 casts hashes password automatically via model cast
                'role' => 'capster',
                'email' => null,
            ]);

            Capster::create([
                'user_id' => $user->id,
                'barbershop_id' => Auth::user()->barbershop->id,
                'specialization' => $request->specialization,
                'commission_split' => $request->commission_split,
                'is_active' => true,
            ]);
        });

        return back()->with('status', 'Capster berhasil didaftarkan!');
    }

    public function updateOperatingHours(Request $request)
    {
        $validator = validator($request->all(), [
            'hours' => 'required|array|size:7',
            'hours.*.day_of_week' => 'required|integer|between:0,6',
            'hours.*.is_open' => 'required|boolean',
            'hours.*.start_time' => 'required_if:hours.*.is_open,true,1|nullable',
            'hours.*.end_time' => 'required_if:hours.*.is_open,true,1|nullable',
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->has('hours') && is_array($request->hours)) {
                foreach ($request->hours as $index => $hour) {
                    $isOpen = filter_var($hour['is_open'] ?? false, FILTER_VALIDATE_BOOLEAN);
                    if ($isOpen) {
                        $start = $hour['start_time'] ?? null;
                        $end = $hour['end_time'] ?? null;
                        
                        if (!$start || !preg_match('/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/', $start)) {
                            $validator->errors()->add("hours.{$index}.start_time", "Format jam buka harus H:i.");
                        }
                        if (!$end || !preg_match('/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/', $end)) {
                            $validator->errors()->add("hours.{$index}.end_time", "Format jam tutup harus H:i.");
                        }
                        if ($start && $end && strtotime($end) <= strtotime($start)) {
                            $validator->errors()->add("hours.{$index}.end_time", "Jam tutup harus lebih dari jam buka.");
                        }
                    }
                }
            }
        });

        $validated = $validator->validate();

        $barbershop = Auth::user()->barbershop;
        if (!$barbershop) {
            return response()->json(['message' => 'Barbershop tidak ditemukan.'], 404);
        }

        foreach ($validated['hours'] as $hourData) {
            $isOpen = filter_var($hourData['is_open'], FILTER_VALIDATE_BOOLEAN);
            $barbershop->operatingHours()->updateOrCreate(
                ['day_of_week' => $hourData['day_of_week']],
                [
                    'is_open' => $isOpen,
                    'start_time' => $isOpen ? substr($hourData['start_time'], 0, 5) : ($hourData['start_time'] ? substr($hourData['start_time'], 0, 5) : null),
                    'end_time' => $isOpen ? substr($hourData['end_time'], 0, 5) : ($hourData['end_time'] ? substr($hourData['end_time'], 0, 5) : null),
                ]
            );
        }

        $updatedHours = $barbershop->operatingHours()->orderBy('day_of_week')->get();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Jam operasional berhasil disimpan.',
                'operating_hours' => $updatedHours,
            ]);
        }

        return back()->with('status', 'Jam operasional berhasil disimpan.');
    }

    public function updateEmergencyClose(Request $request)
    {
        $request->validate([
            'is_emergency_closed' => 'required|boolean',
        ]);

        $barbershop = Auth::user()->barbershop;
        if (!$barbershop) {
            return response()->json(['message' => 'Barbershop tidak ditemukan.'], 404);
        }

        $barbershop->update([
            'is_emergency_closed' => (bool) $request->is_emergency_closed,
        ]);

        $message = $barbershop->is_emergency_closed
            ? 'Mode darurat aktif. Booking online ditutup.'
            : 'Mode darurat dinonaktifkan. Store kembali buka.';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'is_emergency_closed' => (bool) $barbershop->is_emergency_closed,
            ]);
        }

        return back()->with('status', $message);
    }
}
