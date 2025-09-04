<?php

namespace App\Filament\Resources\TimeSlots\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TimeSlotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('facility_id')
                    ->relationship('facility', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),

                DateTimePicker::make('start_time')
                    ->required()
                    ->native(false),

                DateTimePicker::make('end_time')
                    ->required()
                    ->native(false)
                    ->after('start_time'),

                TextInput::make('max_capacity')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                TextInput::make('available_spots')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('PKR')
                    ->minValue(0),

                Toggle::make('is_available')
                    ->required()
                    ->default(true),
            ]);
    }
}
