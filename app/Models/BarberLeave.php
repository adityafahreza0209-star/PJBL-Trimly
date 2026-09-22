<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarberLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'capster_id',
        'start_date',
        'end_date',
        'category',
        'reason',
        'status',
        'reviewed_by',
        'reviewed_at',
        'has_active_booking_conflict',
    ];

    protected $casts = [
        'has_active_booking_conflict' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'reviewed_at' => 'datetime',
    ];

    public function capster(): BelongsTo
    {
        return $this->belongsTo(Capster::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
