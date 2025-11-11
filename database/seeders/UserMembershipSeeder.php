<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MembershipPlan;
use App\Models\UserMembership;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $membershipPlans = MembershipPlan::all();

        if ($users->isEmpty() || $membershipPlans->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            // 70% chance of having a membership
            if (rand(1, 100) <= 70) {
                $plan = $membershipPlans->random();
                $startDate = Carbon::now()->subDays(rand(1, 365));
                $endDate = $plan->duration_type === 'monthly' 
                    ? $startDate->copy()->addMonth() 
                    : $startDate->copy()->addYear();

                UserMembership::create([
                    'user_id' => $user->id,
                    'membership_plan_id' => $plan->id,
                    'valid_from' => $startDate,
                    'valid_until' => $endDate,
                    'status' => rand(1, 100) <= 80 ? 'active' : 'expired',
                    'price_paid' => $plan->price,
                ]);
            }
        }

        // Create some additional memberships for testing
        UserMembership::factory(10)->create([
            'status' => 'active',
        ]);
    }
}