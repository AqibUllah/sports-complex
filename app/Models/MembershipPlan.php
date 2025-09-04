<?php

namespace App\Models;

use App\Enums\DurationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembershipPlan extends Model
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
        'is_popular',
    ];

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(MembershipPlanFeature::class, 'membership_plan_id');
    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'duration_type' => DurationType::class,
            'services' => 'array'
        ];
    }
}
