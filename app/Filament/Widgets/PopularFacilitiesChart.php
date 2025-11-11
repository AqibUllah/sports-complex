<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Facility;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Htmlable;

class PopularFacilitiesChart extends ChartWidget
{
    protected ?string $maxHeight = '300px';

    public function getHeading(): string|Htmlable|null
    {
        return 'Most Popular Facilities';
    }

    protected function getData(): array
    {
        // Get the most booked facilities
        $popularFacilities = Booking::select('time_slots.facility_id', DB::raw('COUNT(*) as booking_count'))
            ->join('time_slots', 'bookings.tim_slot_id', '=', 'time_slots.id')
            ->groupBy('time_slots.facility_id')
            ->orderByDesc('booking_count')
            ->limit(10)
            ->get();

        // Get facility names
        $facilityIds = $popularFacilities->pluck('facility_id')->toArray();
        $facilities = Facility::whereIn('id', $facilityIds)->pluck('name', 'id');

        $labels = [];
        $data = [];

        foreach ($popularFacilities as $booking) {
            $facilityName = $facilities->get($booking->facility_id, 'Unknown Facility');
            $labels[] = $facilityName;
            $data[] = $booking->booking_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Bookings',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(245, 158, 11, 0.8)',   // amber-500
                        'rgba(59, 130, 246, 0.8)',   // blue-500
                        'rgba(16, 185, 129, 0.8)',   // emerald-500
                        'rgba(239, 68, 68, 0.8)',    // red-500
                        'rgba(139, 92, 246, 0.8)',   // violet-500
                        'rgba(249, 115, 22, 0.8)',   // orange-500
                        'rgba(6, 182, 212, 0.8)',    // cyan-500
                        'rgba(132, 204, 22, 0.8)',   // lime-500
                        'rgba(244, 63, 94, 0.8)',    // rose-500
                        'rgba(99, 102, 241, 0.8)',   // indigo-500
                    ],
                    'borderColor' => [
                        'rgb(245, 158, 11)',   // amber-500
                        'rgb(59, 130, 246)',   // blue-500
                        'rgb(16, 185, 129)',   // emerald-500
                        'rgb(239, 68, 68)',    // red-500
                        'rgb(139, 92, 246)',   // violet-500
                        'rgb(249, 115, 22)',   // orange-500
                        'rgb(6, 182, 212)',    // cyan-500
                        'rgb(132, 204, 22)',   // lime-500
                        'rgb(244, 63, 94)',    // rose-500
                        'rgb(99, 102, 241)',   // indigo-500
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
                'x' => [
                    'ticks' => [
                        'autoSkip' => false,
                        'maxRotation' => 45,
                        'minRotation' => 45,
                    ],
                ],
            ],
        ];
    }
}