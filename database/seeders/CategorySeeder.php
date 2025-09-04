<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Football',
                'description' => 'All football-related activities including matches, training, and tournaments',
                'slug' => 'football',
                'color' => '#3B82F6',
                'icon' => 'fa-futbol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basketball',
                'description' => 'Basketball courts, leagues, and training sessions',
                'slug' => 'basketball',
                'color' => '#EF4444',
                'icon' => 'fa-basketball-ball',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tennis',
                'description' => 'Tennis courts and coaching programs for all skill levels',
                'slug' => 'tennis',
                'color' => '#10B981',
                'icon' => 'fa-table-tennis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Swimming',
                'description' => 'Swimming pools, lessons, and aquatic activities',
                'slug' => 'swimming',
                'color' => '#06B6D4',
                'icon' => 'fa-swimmer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gym & Fitness',
                'description' => 'Fitness center, weight training, and cardio equipment',
                'slug' => 'gym-fitness',
                'color' => '#8B5CF6',
                'icon' => 'fa-dumbbell',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Volleyball',
                'description' => 'Indoor and outdoor volleyball courts and competitions',
                'slug' => 'volleyball',
                'color' => '#F59E0B',
                'icon' => 'fa-volleyball-ball',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Badminton',
                'description' => 'Badminton courts and equipment rental services',
                'slug' => 'badminton',
                'color' => '#EC4899',
                'icon' => 'fa-shuttlecock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Running Track',
                'description' => 'Professional running track for training and events',
                'slug' => 'running-track',
                'color' => '#6366F1',
                'icon' => 'fa-running',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martial Arts',
                'description' => 'Martial arts classes including karate, judo, and taekwondo',
                'slug' => 'martial-arts',
                'color' => '#DC2626',
                'icon' => 'fa-user-ninja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yoga & Pilates',
                'description' => 'Yoga and pilates classes for all experience levels',
                'slug' => 'yoga-pilates',
                'color' => '#84CC16',
                'icon' => 'fa-spa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
