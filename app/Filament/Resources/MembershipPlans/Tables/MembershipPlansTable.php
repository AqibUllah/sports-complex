<?php

namespace App\Filament\Resources\MembershipPlans\Tables;

use App\Enums\DurationType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
class MembershipPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->weight(FontWeight::Bold)
                    ->searchable(),
                TextColumn::make('facility.name')
                    ->searchable(),
                TextColumn::make('price')
                    ->money('PKR')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->sortable(),
                BadgeColumn::make('duration_type')
                ->weight(FontWeight::Bold),
                TextColumn::make('duration_value')
                    ->numeric()
                    ->sortable(),
                BadgeColumn::make('features_count')
                    ->counts('features')
                    ->label('Features'),
                TextColumn::make('max_visits')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_day')
                    ->toggledHiddenByDefault()
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_month')
                    ->toggledHiddenByDefault()
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_visits_per_year')
                    ->toggledHiddenByDefault()
                    ->toggleable()
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
                // Filter by duration type
                SelectFilter::make('duration_type')
                    ->options(DurationType::class)
                    ->label('Duration Type'),

                // Filter by status (active/inactive)
                TernaryFilter::make('status')
                    ->label('Active Status')
                    ->placeholder('All Plans')
                    ->trueLabel('Active Plans')
                    ->falseLabel('Inactive Plans'),

                    // Price range filter
                Filter::make('price_range')
                ->form([
                    TextInput::make('min_price')
                        ->numeric()
                        ->label('Min Price (PKR)'),
                    TextInput::make('max_price')
                        ->numeric()
                        ->label('Max Price (PKR)'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['min_price'],
                            fn (Builder $query, $minPrice): Builder => $query->where('price', '>=', $minPrice)
                        )
                        ->when(
                            $data['max_price'],
                            fn (Builder $query, $maxPrice): Builder => $query->where('price', '<=', $maxPrice)
                        );
                })
                ->label('Price Range'),

                // Filter for unlimited visits plans
                TernaryFilter::make('unlimited_visits')
                    ->label('Unlimited Visits')
                    ->placeholder('All Plans')
                    ->trueLabel('Unlimited Visits')
                    ->falseLabel('Limited Visits')
                    ->queries(
                        true: fn (Builder $query) => $query->whereNull('max_visits'),
                        false: fn (Builder $query) => $query->whereNotNull('max_visits'),
                    ),
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
