<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            // Football Facilities
            [
                'name' => 'Main Football Field',
                'description' => 'Professional-grade football field with artificial turf, floodlights, and seating for 500 spectators',
                'capacity' => 50,
                'category_id' => 1, // Football
                'price_per_hour' => 250.00,
                'location_details' => 'North side of complex, near main entrance',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Training Football Pitch',
                'description' => 'Smaller training pitch for practice sessions and youth teams',
                'capacity' => 30,
                'category_id' => 1, // Football
                'price_per_hour' => 150.00,
                'location_details' => 'East side, next to locker rooms',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Basketball Facilities
            [
                'name' => 'Indoor Basketball Court',
                'description' => 'Air-conditioned indoor court with professional flooring and electronic scoreboard',
                'capacity' => 100,
                'category_id' => 2, // Basketball
                'price_per_hour' => 200.00,
                'location_details' => 'Main sports hall, court 1',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outdoor Basketball Court',
                'description' => 'Regulation outdoor court with floodlights for evening games',
                'capacity' => 40,
                'category_id' => 2, // Basketball
                'price_per_hour' => 120.00,
                'location_details' => 'West courtyard, near parking lot',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tennis Facilities
            [
                'name' => 'Clay Tennis Court',
                'description' => 'Professional clay court with premium surface and spectator seating',
                'capacity' => 8,
                'category_id' => 3, // Tennis
                'price_per_hour' => 180.00,
                'location_details' => 'Tennis complex, court A',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hard Tennis Court',
                'description' => 'All-weather hard court with lighting for evening play',
                'capacity' => 8,
                'category_id' => 3, // Tennis
                'price_per_hour' => 160.00,
                'location_details' => 'Tennis complex, court B',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Swimming Facilities
            [
                'name' => 'Olympic Swimming Pool',
                'description' => '50-meter Olympic-sized pool with 8 lanes and diving boards',
                'capacity' => 100,
                'category_id' => 4, // Swimming
                'price_per_hour' => 300.00,
                'location_details' => 'Aquatic center, main pool',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Recreational Pool',
                'description' => 'Family-friendly pool with shallow areas and water features',
                'capacity' => 80,
                'category_id' => 4, // Swimming
                'price_per_hour' => 180.00,
                'location_details' => 'Aquatic center, west wing',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Gym & Fitness Facilities
            [
                'name' => 'Main Fitness Center',
                'description' => 'State-of-the-art gym with cardio and weight training equipment',
                'capacity' => 50,
                'category_id' => 5, // Gym & Fitness
                'price_per_hour' => 100.00,
                'location_details' => 'Main building, second floor',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Group Exercise Studio',
                'description' => 'Mirrored studio for group classes with audio system',
                'capacity' => 25,
                'category_id' => 5, // Gym & Fitness
                'price_per_hour' => 150.00,
                'location_details' => 'Main building, room 201',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Volleyball Facilities
            [
                'name' => 'Beach Volleyball Court',
                'description' => 'Regulation sand court with professional net system',
                'capacity' => 16,
                'category_id' => 6, // Volleyball
                'price_per_hour' => 120.00,
                'location_details' => 'Outdoor sports area, court 3',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Badminton Facilities
            [
                'name' => 'Badminton Court Set',
                'description' => 'Set of 4 professional badminton courts with wooden flooring',
                'capacity' => 32,
                'category_id' => 7, // Badminton
                'price_per_hour' => 200.00,
                'location_details' => 'Indoor hall B, courts 1-4',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Running Track
            [
                'name' => 'Professional Running Track',
                'description' => '400-meter synthetic track with 8 lanes and timing system',
                'capacity' => 60,
                'category_id' => 8, // Running Track
                'price_per_hour' => 180.00,
                'location_details' => 'Outdoor track stadium',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Martial Arts
            [
                'name' => 'Martial Arts Dojo',
                'description' => 'Traditional dojo with tatami mats and training equipment',
                'capacity' => 30,
                'category_id' => 9, // Martial Arts
                'price_per_hour' => 120.00,
                'location_details' => 'Annex building, room 101',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yoga & Pilates
            [
                'name' => 'Yoga Studio',
                'description' => 'Peaceful studio with bamboo flooring and ambient lighting',
                'capacity' => 20,
                'category_id' => 10, // Yoga & Pilates
                'price_per_hour' => 100.00,
                'location_details' => 'Wellness center, room 301',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('facilities')->insert($facilities);
    }
}
