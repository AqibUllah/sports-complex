<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::create([
            'name'  => 'admin',
            'email'  => 'admin@example.com',
            'password'  => '$2y$12$muB20TAbZs820l8XPqNDNekuCbiqop1/IBRGphQA79RfgjijStcxm', //password
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            FacilitySeeder::class,
            MembershipPlanSeeder::class,
            TimeSlotSeeder::class,
            UserSeeder::class,
            UserMembershipSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
