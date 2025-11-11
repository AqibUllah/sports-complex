<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;

class RecentBookingsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';


    public function getHeading(): string|Htmlable|null
    {
        return 'Recent Bookings';
    }

    protected function getTableQuery(): Builder
    {
        return Booking::query()
            ->with(['user', 'time_slot', 'userMembership.membershipPlan'])
            ->latest()
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('Customer')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('time_slot.facility.name')
                ->label('Facility')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('time_slot.start_time')
                ->label('Start Time')
                ->dateTime()
                ->sortable(),

            Tables\Columns\TextColumn::make('time_slot.end_time')
                ->label('End Time')
                ->dateTime()
                ->sortable(),

            Tables\Columns\TextColumn::make('number_of_people')
                ->label('People')
                ->numeric(),

            Tables\Columns\TextColumn::make('total_amount')
                ->label('Amount')
                ->money('USD')
                ->sortable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'confirmed' => 'success',
                    'cancelled' => 'danger',
                    'completed' => 'info',
                    'no_show' => 'warning',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Booked On')
                ->dateTime()
                ->sortable(),
        ];
    }
}