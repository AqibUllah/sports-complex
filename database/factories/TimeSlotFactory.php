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
        $startTime = $this->faker->dateTimeBetween('now', '+30 days');
        $endTime = clone $startTime;
        $endTime->modify('+2 hours');

        $maxCapacity = $this->faker->numberBetween(10, 100);

        return [
            'facility_id' => Facility::inRandomOrder()->first()->id ?? Facility::factory()->create()->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'max_capacity' => $maxCapacity,
            'available_spots' => $this->faker->numberBetween(0, $maxCapacity),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
        ];
    }
}
