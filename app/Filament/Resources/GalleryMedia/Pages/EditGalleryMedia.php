<?php

namespace App\Filament\Resources\GalleryMedia\Pages;

use App\Filament\Resources\GalleryMedia\GalleryMediaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGalleryMedia extends EditRecord
{
    protected static string $resource = GalleryMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
