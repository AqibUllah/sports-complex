<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('price_per_hour')
                    ->required()
                    ->numeric(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->name('facilities')
                    ->disk('public'),
                Textarea::make('location_details')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->default(true)
                    ->required(),
            ]);
    }
}
