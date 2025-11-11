<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\TimeSlot;
use App\Models\UserMembership;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $timeSlots = TimeSlot::all();
        $userMemberships = UserMembership::all();

        if ($users->isEmpty() || $timeSlots->isEmpty()) {
            return;
        }

        // Create bookings for the last 30 days to populate the trends chart
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i);
            
            // Create 2-5 bookings per day
            $bookingsPerDay = rand(2, 5);
            
            for ($j = 0; $j < $bookingsPerDay; $j++) {
                $user = $users->random();
                $timeSlot = $timeSlots->random();
                
                // Get a random membership for the user (if they have one)
                $userMembership = $userMemberships->where('user_id', $user->id)->first();
                
                $bookingDate = $date->copy()->setTime(rand(8, 20), 0, 0);
                
                // Random status distribution
                $status = $this->getRandomStatus();
                
                $booking = Booking::create([
                    'user_id' => $user->id,
                    'tim_slot_id' => $timeSlot->id,
                    'user_membership_id' => $userMembership?->id,
                    'number_of_people' => rand(1, 10),
                    'status' => $status,
                    'total_amount' => rand(50, 500),
                    'special_requests' => rand(0, 1) ? $this->getRandomSpecialRequest() : null,
                    'cancellation_reason' => $status === 'cancelled' ? $this->getRandomCancellationReason() : null,
                    'created_at' => $bookingDate,
                    'updated_at' => $bookingDate,
                ]);
            }
        }

        // Create some additional recent bookings for the RecentBookingsWidget
        for ($i = 0; $i < 15; $i++) {
            $user = $users->random();
            $timeSlot = $timeSlots->random();
            $userMembership = $userMemberships->where('user_id', $user->id)->first();
            
            $bookingDate = Carbon::now()->subDays(rand(0, 7))->setTime(rand(8, 20), 0, 0);
            
            Booking::create([
                'user_id' => $user->id,
                'tim_slot_id' => $timeSlot->id,
                'user_membership_id' => $userMembership?->id,
                'number_of_people' => rand(1, 10),
                'status' => $this->getRandomStatus(),
                'total_amount' => rand(50, 500),
                'special_requests' => rand(0, 1) ? $this->getRandomSpecialRequest() : null,
                'created_at' => $bookingDate,
                'updated_at' => $bookingDate,
            ]);
        }
    }
    
    private function getRandomStatus(): string
    {
        $statuses = ['confirmed', 'cancelled', 'completed', 'no_show'];
        $weights = [40, 10, 40, 10]; // Probability weights
        
        $random = rand(1, 100);
        $cumulative = 0;
        
        foreach ($weights as $index => $weight) {
            $cumulative += $weight;
            if ($random <= $cumulative) {
                return $statuses[$index];
            }
        }
        
        return 'confirmed';
    }
    
    private function getRandomSpecialRequest(): string
    {
        $requests = [
            'Need extra equipment',
            'Prefer morning slot',
            'Require coach assistance',
            'Special dietary requirements',
            'Need parking space',
            'Group booking discount',
            'Birthday party setup',
            'Corporate event',
            'Team building activity',
            'Tournament preparation'
        ];
        
        return $requests[array_rand($requests)];
    }
    
    private function getRandomCancellationReason(): string
    {
        $reasons = [
            'Weather conditions',
            'Personal emergency',
            'Schedule conflict',
            'Health issues',
            'Transportation issues',
            'Facility not available',
            'Changed plans',
            'Financial reasons'
        ];
        
        return $reasons[array_rand($reasons)];
    }
}