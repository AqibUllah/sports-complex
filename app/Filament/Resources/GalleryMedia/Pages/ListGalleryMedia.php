<?php

namespace App\Filament\Resources\GalleryMedia\Pages;

use App\Filament\Resources\GalleryMedia\GalleryMediaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGalleryMedia extends ListRecords
{
    protected static string $resource = GalleryMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
