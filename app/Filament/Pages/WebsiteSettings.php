<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Inerba\DbConfig\AbstractPageSettings;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use UnitEnum;

class WebsiteSettings extends AbstractPageSettings
{
    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    protected static ?string $title = 'Website';

    // protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-wrench-screwdriver'; // Uncomment if you want to set a custom navigation icon

    // protected ?string $subheading = ''; // Uncomment if you want to set a custom subheading

    // protected static ?string $slug = 'website-settings'; // Uncomment if you want to set a custom slug

    protected string $view = 'filament.pages.website-settings';

    protected function settingName(): string
    {
        return 'website';
    }

    /**
     * Provide default values.
     *
     * @return array<string, mixed>
     */
    public function getDefaultData(): array
    {
        return [
            'site_name' => 'Sports Complex'
        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // You can delete these statements!
                TextInput::make('site_name'),
                TextInput::make('site_phone'),
                Textarea::make('site_address'),
                Textarea::make('site_description'),
            ])
            ->statePath('data');
    }
}
