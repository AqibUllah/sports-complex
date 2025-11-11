<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;

class FacilitiesByCategoryChart extends ChartWidget
{
    protected ?string $maxHeight = '300px';


    public function getHeading(): string|Htmlable|null
    {
        return 'Facilities by Category';
    }

    protected function getData(): array
    {
        // Get categories with their facility counts
        $categories = Category::withCount('facilities')->get();

        $labels = $categories->pluck('name')->toArray();
        $data = $categories->pluck('facilities_count')->toArray();

        // Generate colors for each category
        $colors = [
            '#f59e0b', '#3b82f6', '#10b981', '#ef4444', '#8b5cf6',
            '#f97316', '#06b6d4', '#84cc16', '#f43f5e', '#6366f1'
        ];

        $backgroundColors = array_map(function($color) {
            return str_replace(')', ', 0.8)', str_replace('rgb', 'rgba', $color));
        }, $colors);

        return [
            'datasets' => [
                [
                    'label' => 'Number of Facilities',
                    'data' => $data,
                    'backgroundColor' => array_slice($backgroundColors, 0, count($labels)),
                    'borderColor' => array_slice($colors, 0, count($labels)),
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
        ];
    }
}