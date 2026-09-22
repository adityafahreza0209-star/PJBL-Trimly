<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Capster extends Model
{
    protected $fillable = [
        'user_id',
        'barbershop_id',
        'specialization',
        'commission_split',
        'is_active',
        'bio',
        'skills',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barbershop(): BelongsTo
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'capster_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function barberLeaves()
    {
        return $this->hasMany(BarberLeave::class);
    }

    public function leaves()
    {
        return $this->hasMany(BarberLeave::class);
    }

    public function averageRating()
    {
        return $this->reviews()->where('is_hidden', false)->avg('rating');
    }

    public function reviewsCount()
    {
        return $this->reviews()->where('is_hidden', false)->count();
    }
}
