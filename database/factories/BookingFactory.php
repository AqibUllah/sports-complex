<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'number_of_people' => $this->faker->randomNumber(),
            'status' => $this->faker->word(),
            'total_amount' => $this->faker->word(),
            'special_requests' => $this->faker->word(),
            'cancellation_reason' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'tim_slot_id' => TimeSlot::factory(),
            'user_membership_id' => UserMembership::factory(),
        ];
    }
}
