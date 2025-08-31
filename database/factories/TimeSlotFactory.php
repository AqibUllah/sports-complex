<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TimeSlotFactory extends Factory
{
    protected $model = TimeSlot::class;

    public function definition(): array
    {
        return [
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now(),
            'max_capacity' => $this->faker->randomNumber(),
            'available_spots' => $this->faker->randomNumber(),
            'price' => $this->faker->word(),
            'is_available' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'facility_id' => Facility::factory(),
        ];
    }
}
