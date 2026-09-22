<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'barbershop_id',
        'customer_id',
        'capster_id',
        'service_id',
        'booking_date',
        'start_time',
        'end_time',
        'total_amount',
        'dp_amount',
        'payment_status',
        'booking_status',
        'reschedule_count',
        'cancellation_reason',
        'notes',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function capster()
    {
        return $this->belongsTo(Capster::class, 'capster_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function totalPaid()
    {
        return $this->payments()->where('status', 'paid')->sum('amount');
    }

    public function remainingBalance()
    {
        return max(0, $this->total_amount - $this->totalPaid());
    }
}

