<?php

namespace App\Filament\Resources\MembershipPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MembershipPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('facility.name')
                    ->searchable(),
                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                TextColumn::make('duration_type'),
                TextColumn::make('duration_value')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_day')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_month')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_year')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
