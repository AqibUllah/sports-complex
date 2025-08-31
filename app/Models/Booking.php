<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tim_slot_id',
        'user_membership_id',
        'number_of_people',
        'status',
        'total_amount',
        'special_requests',
        'cancellation_reason',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function time_slot():BelongsTo
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function membership():BelongsTo
    {
        return $this->belongsTo(UserMembership::class, 'membership_id');
    }

    public function timSlot(): BelongsTo
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function userMembership(): BelongsTo
    {
        return $this->belongsTo(UserMembership::class);
    }
}
