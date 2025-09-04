<?php

namespace App\Filament\Resources\GalleryMedia;

use App\Filament\Resources\GalleryMedia\Pages\CreateGalleryMedia;
use App\Filament\Resources\GalleryMedia\Pages\EditGalleryMedia;
use App\Filament\Resources\GalleryMedia\Pages\ListGalleryMedia;
use App\Filament\Resources\GalleryMedia\Schemas\GalleryMediaForm;
use App\Filament\Resources\GalleryMedia\Tables\GalleryMediaTable;
use App\Models\GalleryMedia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryMediaResource extends Resource
{
    protected static ?string $model = GalleryMedia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GalleryMediaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryMediaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleryMedia::route('/'),
            'create' => CreateGalleryMedia::route('/create'),
            'edit' => EditGalleryMedia::route('/{record}/edit'),
        ];
    }
}
