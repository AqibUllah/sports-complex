<?php

namespace App\Filament\Resources\GalleryMedia\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('images')
                    ->reorderable()
                    ->name('gallery')
                    ->disk('public')
                    ->multiple()
                    ->conversion('thumb')
                    ->customProperties(['filename_prefix' => 'gallery/'])
                    ->columnSpanFull(),

                Toggle::make('status')
                    ->required(),
            ]);
    }
}
