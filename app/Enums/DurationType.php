<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum DurationType implements  HasLabel
{

    const string PerVisit = 'per_visit';
    const string Monthly = 'monthly';
    const string Yearly = 'yearly';
    const string Custom = 'custom';

    #[\Override] public function getLabel(): string|Htmlable|null
    {
//        return $this->name;

        return match ($this) {
            self::PerVisit => 'Per Visit',
            self::Monthly => 'Monthly',
            self::Yearly => 'Yearly',
            self::Custom => 'Custom',
            default => $this->name, // Fallback to the enum case name
        };
    }
}
