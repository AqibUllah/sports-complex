<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipPlainFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_plan_id',
        'name',
        'value',
    ];

    public function membershipPlan(): BelongsTo
    {
        return $this->belongsTo(MembershipPlain::class, 'membership_plan_id');
    }
}
