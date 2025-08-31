<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembershipPlain extends Model
{
    use HasFactory;

    protected $table = 'membership_plans';

    protected $fillable = [
        'name',
        'facility_id',
        'price',
        'duration_days',
        'duration_value',
        'details',
        'status',
    ];

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    public function membership_plain_features(): HasMany
    {
        return $this->hasMany(MembershipPlainFeature::class, 'membership_plan_id');
    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}
