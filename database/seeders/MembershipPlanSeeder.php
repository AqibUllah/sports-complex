<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membershipPlans = [
            // Gym & Fitness Memberships
            [
                'name' => 'Basic Gym Access - Monthly',
                'facility_id' => 11, // Main Fitness Center
                'price' => 599.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Unlimited access to gym equipment during operating hours',
                'services' => json_encode(['gym_access', 'locker_usage', 'free_weights', 'cardio_machines']),
                'max_visits' => null,
                'max_visits_per_day' => 1,
                'max_visits_per_month' => 30,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Gym - Yearly',
                'facility_id' => 11, // Main Fitness Center
                'price' => 5999.00,
                'duration_type' => 'yearly',
                'duration_value' => 365,
                'details' => 'Annual membership with all gym amenities and priority booking',
                'services' => json_encode(['gym_access', 'locker_usage', 'free_weights', 'cardio_machines', 'towel_service', 'nutrition_consultation']),
                'max_visits' => null,
                'max_visits_per_day' => 2,
                'max_visits_per_month' => 60,
                'max_visits_per_year' => 730,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Swimming Pool Memberships
            [
                'name' => 'Swimming Pool - 10 Visit Pass',
                'facility_id' => 8, // Recreational Pool
                'price' => 450.00,
                'duration_type' => 'custom',
                'duration_value' => 60,
                'details' => '10 visits to the recreational pool within 60 days',
                'services' => json_encode(['pool_access', 'changing_rooms', 'shower_facilities']),
                'max_visits' => 10,
                'max_visits_per_day' => 1,
                'max_visits_per_month' => null,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Unlimited Swimming - Monthly',
                'facility_id' => 8, // Recreational Pool
                'price' => 799.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Unlimited access to recreational pool for one month',
                'services' => json_encode(['pool_access', 'changing_rooms', 'shower_facilities', 'locker_usage']),
                'max_visits' => null,
                'max_visits_per_day' => 2,
                'max_visits_per_month' => 60,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tennis Court Memberships
            [
                'name' => 'Tennis Court - Per Visit',
                'facility_id' => 6, // Hard Tennis Court
                'price' => 160.00,
                'duration_type' => 'per_visit',
                'duration_value' => null,
                'details' => 'Pay-per-use tennis court booking for one hour',
                'services' => json_encode(['court_booking', 'net_usage', 'lighting']),
                'max_visits' => null,
                'max_visits_per_day' => null,
                'max_visits_per_month' => null,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tennis Premium - Monthly',
                'facility_id' => 5, // Clay Tennis Court
                'price' => 1200.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Monthly membership with 10 hours of court time on premium clay courts',
                'services' => json_encode(['court_booking', 'net_usage', 'lighting', 'ball_machine', 'coaching_discount']),
                'max_visits' => 10,
                'max_visits_per_day' => 2,
                'max_visits_per_month' => 10,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Basketball Court Memberships
            [
                'name' => 'Basketball Court - Team Package',
                'facility_id' => 3, // Indoor Basketball Court
                'price' => 1500.00,
                'duration_type' => 'custom',
                'duration_value' => 90,
                'details' => '10 team practices on indoor court over 3 months',
                'services' => json_encode(['court_booking', 'scoreboard_usage', 'locker_rooms']),
                'max_visits' => 10,
                'max_visits_per_day' => 1,
                'max_visits_per_month' => 4,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Football Field Memberships
            [
                'name' => 'Football Field - Team Season',
                'facility_id' => 1, // Main Football Field
                'price' => 5000.00,
                'duration_type' => 'custom',
                'duration_value' => 120,
                'details' => 'Season pass for team practices and matches on main field',
                'services' => json_encode(['field_booking', 'floodlights', 'changing_rooms', 'equipment_storage']),
                'max_visits' => 20,
                'max_visits_per_day' => 1,
                'max_visits_per_month' => 8,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Multi-Sport Memberships
            [
                'name' => 'All Access - Gold Membership',
                'facility_id' => 11, // Using gym as primary facility
                'price' => 1999.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Premium access to all facilities including gym, pool, courts, and classes',
                'services' => json_encode(['gym_access', 'pool_access', 'court_bookings', 'group_classes', 'personal_training', 'nutrition_consultation']),
                'max_visits' => null,
                'max_visits_per_day' => 3,
                'max_visits_per_month' => 90,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student Membership - Yearly',
                'facility_id' => 11, // Using gym as primary facility
                'price' => 2999.00,
                'duration_type' => 'yearly',
                'duration_value' => 365,
                'details' => 'Discounted yearly membership for students with ID verification',
                'services' => json_encode(['gym_access', 'pool_access', 'court_bookings', 'student_discount']),
                'max_visits' => null,
                'max_visits_per_day' => 2,
                'max_visits_per_month' => 60,
                'max_visits_per_year' => 730,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yoga & Pilates Memberships
            [
                'name' => 'Unlimited Yoga Classes - Monthly',
                'facility_id' => 15, // Yoga Studio
                'price' => 899.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Unlimited access to all yoga and meditation classes',
                'services' => json_encode(['yoga_classes', 'meditation_sessions', 'mat_rental', 'tea_service']),
                'max_visits' => null,
                'max_visits_per_day' => 2,
                'max_visits_per_month' => 60,
                'max_visits_per_year' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Inactive Membership (for testing)
            [
                'name' => 'Legacy Bronze Membership',
                'facility_id' => 11, // Main Fitness Center
                'price' => 399.00,
                'duration_type' => 'monthly',
                'duration_value' => 30,
                'details' => 'Legacy membership plan no longer available for new signups',
                'services' => json_encode(['gym_access', 'basic_amenities']),
                'max_visits' => null,
                'max_visits_per_day' => 1,
                'max_visits_per_month' => 30,
                'max_visits_per_year' => null,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('membership_plans')->insert($membershipPlans);
    }
}
