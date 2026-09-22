<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'barbershop_id',
        'day_of_week',
        'is_open',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'day_of_week' => 'integer',
        'is_open' => 'boolean',
    ];

    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class, 'barbershop_id');
    }
}
