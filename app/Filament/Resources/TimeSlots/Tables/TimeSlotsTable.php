<?php

namespace App\Filament\Resources\TimeSlots\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Models\TimeSlot;
use Filament\Actions\DeleteAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;

class TimeSlotsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('facility.name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('end_time')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('max_capacity')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('available_spots')
                    ->weight(FontWeight::Bold)
                    ->numeric()
                    ->sortable()
                    ->color(fn (TimeSlot $record) => $record->available_spots === 0 ? 'danger' :
                        ($record->available_spots < $record->max_capacity * 0.2 ? 'warning' : 'success')),

                TextColumn::make('price')
                    ->money('PKR')
                    ->sortable(),

                IconColumn::make('is_available')
                    ->boolean()
                    ->sortable(),

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
                SelectFilter::make('facility')
                    ->relationship('facility', 'name')
                    ->searchable()
                    ->preload(),

                Filter::make('start_time')
                    ->form([
                        DatePicker::make('start_from'),
                        DatePicker::make('start_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('start_time', '>=', $date),
                            )
                            ->when(
                                $data['start_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('start_time', '<=', $date),
                            );
                    }),

                TernaryFilter::make('is_available'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
