<?php

namespace App\Filament\Resources\MembershipPlans\Schemas;

use App\Enums\DurationType;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
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
                    ->prefix('PKR'),
                    Grid::make(2)
                    ->schema([

                        Select::make('duration_type')
                        ->options( DurationType::class)
                        ->default(null),
                        TextInput::make('duration_value')
                        ->numeric()
                        ->default(null),
                ]),
                Textarea::make('details')
                    ->default(null)
                    ->columnSpanFull(),
                Section::make('Visits')
                ->schema([
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
                ])->columns(2)->columnSpanFull(),
                Repeater::make('features')
                ->relationship('features')
                ->addActionLabel('Add Feature')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->label('Feature Name'),
                    TextInput::make('value')
                        ->required()
                        ->maxLength(255)
                        ->label('Feature Value'),
                ])
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['name'] ?? null) // Show feature name in repeater
                ->columns(2)
                ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
                Toggle::make('is_popular')
                    ->required(),
            ]);
    }
}
