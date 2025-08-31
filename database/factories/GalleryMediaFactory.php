<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\GalleryMedia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GalleryMediaFactory extends Factory
{
    protected $model = GalleryMedia::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'file_path' => $this->faker->word(),
            'media_type' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::factory(),
        ];
    }
}
