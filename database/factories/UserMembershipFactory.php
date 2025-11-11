<?php

namespace Database\Factories;

use App\Models\MembershipPlan;
use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserMembershipFactory extends Factory
{
    protected $model = UserMembership::class;

    public function definition(): array
    {
        return [
            'price_paid' => $this->faker->randomFloat(2, 50, 500),
            'valid_from' => Carbon::now()->subDays(rand(1, 30)),
            'valid_until' => Carbon::now()->addDays(rand(30, 365)),
            'status' => $this->faker->randomElement(['active', 'expired', 'cancelled']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'membership_plan_id' => MembershipPlan::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
