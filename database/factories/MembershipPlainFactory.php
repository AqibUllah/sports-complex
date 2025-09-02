<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\MembershipPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MembershipPlainFactory extends Factory
{
    protected $model = MembershipPlan::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(),
            'duration_days' => $this->faker->randomNumber(),
            'duration_value' => $this->faker->randomNumber(),
            'details' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'facility_id' => Facility::factory(),
        ];
    }
}
