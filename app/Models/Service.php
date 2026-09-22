<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'barbershop_id',
        'name',
        'category',
        'duration_minutes',
        'price',
        'dp_amount',
        'description',
        'is_active',
    ];

    public function barbershop(): BelongsTo
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id');
    }
}
