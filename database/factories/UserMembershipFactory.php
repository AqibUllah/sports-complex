<?php

namespace Database\Factories;

use App\Models\MembershipPlain;
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
            'price_paid' => $this->faker->randomFloat(),
            'valid_from' => Carbon::now(),
            'valid_until' => Carbon::now(),
            'status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'membership_plan_id' => MembershipPlain::factory(),
        ];
    }
}
