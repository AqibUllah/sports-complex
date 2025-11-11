<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some test users
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Sarah Wilson',
            'email' => 'sarah@example.com',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'David Brown',
            'email' => 'david@example.com',
            'email_verified_at' => now(),
        ]);

        // Create additional random users
        User::factory(15)->create();
    }
}