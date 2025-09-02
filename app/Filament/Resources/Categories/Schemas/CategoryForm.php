<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('color')
                ->hint('https://tailscan.com/gradients'),
                TextInput::make('icon')
                ->hint('https://icon-sets.iconify.design/'),
                SpatieMediaLibraryFileUpload::make('image')
                ->name('Categories')
                ->disk('public')
//                ->directory('assets/images')
                ->conversion('thumb')
                ->customProperties(['filename_prefix' => 'categories/'])
            ]);
    }
}
