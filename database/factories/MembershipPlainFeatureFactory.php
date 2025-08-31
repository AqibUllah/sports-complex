<?php

namespace Database\Factories;

use App\Models\MembershipPlain;
use App\Models\MembershipPlainFeature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MembershipPlainFeatureFactory extends Factory
{
    protected $model = MembershipPlainFeature::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'value' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'membership_plan_id' => MembershipPlain::factory(),
        ];
    }
}
