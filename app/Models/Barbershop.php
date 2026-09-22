<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barbershop extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'address',
        'phone_number',
        'admin_user_id',
        'subscription_status',
        'trial_berakhir_pada',
        'paket_dipilih',
        'is_emergency_closed',
    ];

    protected $casts = [
        'is_emergency_closed' => 'boolean',
        'trial_berakhir_pada' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($barbershop) {
            if (empty($barbershop->slug)) {
                $barbershop->slug = Str::slug($barbershop->name);
            }
        });

        static::created(function ($barbershop) {
            $barbershop->generateDefaultOperatingHours();
        });
    }

    public static function defaultOperatingHours(): array
    {
        return [
            ['day_of_week' => 0, 'is_open' => false, 'start_time' => '09:00', 'end_time' => '21:00'], // Minggu
            ['day_of_week' => 1, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '21:00'], // Senin
            ['day_of_week' => 2, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '21:00'], // Selasa
            ['day_of_week' => 3, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '21:00'], // Rabu
            ['day_of_week' => 4, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '21:00'], // Kamis
            ['day_of_week' => 5, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '21:00'], // Jumat
            ['day_of_week' => 6, 'is_open' => true,  'start_time' => '09:00', 'end_time' => '22:00'], // Sabtu
        ];
    }

    public function generateDefaultOperatingHours(): void
    {
        foreach (self::defaultOperatingHours() as $hour) {
            $this->operatingHours()->firstOrCreate(
                ['day_of_week' => $hour['day_of_week']],
                $hour
            );
        }
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    public function capsters()
    {
        return $this->hasMany(Capster::class, 'barbershop_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'barbershop_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'barbershop_id');
    }

    public function operatingHours()
    {
        return $this->hasMany(OperatingHour::class, 'barbershop_id');
    }

    public function hoursForDate(Carbon $date): ?OperatingHour
    {
        $dayOfWeek = (int) $date->dayOfWeek;

        if ($this->relationLoaded('operatingHours')) {
            return $this->operatingHours->firstWhere('day_of_week', $dayOfWeek);
        }

        return $this->operatingHours()->where('day_of_week', $dayOfWeek)->first();
    }

    public function refreshTrialStatus(): void
    {
        if ($this->subscription_status === 'trial' && $this->trial_berakhir_pada && now()->gt($this->trial_berakhir_pada)) {
            $this->update(['subscription_status' => 'nonaktif']);
        }
    }
}
