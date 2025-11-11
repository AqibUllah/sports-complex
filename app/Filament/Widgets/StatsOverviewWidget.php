<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Facility;
use App\Models\User;
use App\Models\UserMembership;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Facilities', Facility::count())
                ->description('Active sports facilities')
                ->descriptionIcon('heroicon-o-building-office-2')
                ->color('success'),
            
            Stat::make('Total Categories', Category::count())
                ->description('Facility categories')
                ->descriptionIcon('heroicon-o-tag')
                ->color('primary'),
            
            Stat::make('Total Bookings', Booking::count())
                ->description('All time bookings')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('warning'),
            
            Stat::make('Active Members', UserMembership::where('status', 'active')->count())
                ->description('Current active memberships')
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),
            
            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('gray'),
        ];
    }
}