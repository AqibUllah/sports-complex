<?php

namespace App\Filament\Resources\MembershipPlans\Schemas;

use App\Enums\DurationType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MembershipPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('facility_id')
                    ->relationship('facility', 'name')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('duration_type')
                    ->options(DurationType::class)
                    ->default(null),
                TextInput::make('duration_value')
                    ->numeric()
                    ->default(null),
                Textarea::make('details')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('max_visits')
                    ->numeric()
                    ->default(null),
                TextInput::make('max_visits_per_day')
                    ->numeric()
                    ->default(null),
                TextInput::make('max_visits_per_month')
                    ->numeric()
                    ->default(null),
                TextInput::make('max_visits_per_year')
                    ->numeric()
                    ->default(null),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
