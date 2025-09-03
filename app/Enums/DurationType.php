<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum DurationType: string implements  HasLabel, HasColor, HasIcon, HasDescription
{

    case PerVisit = 'per_visit';
    case Monthly = 'monthly';
    case Yearly = 'yearly';
    case Custom = 'custom';

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

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PerVisit => 'gray',
            self::Monthly => 'warning',
            self::Yearly => 'success',
            self::Custom => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PerVisit => 'heroicon-m-pencil',
            self::Monthly => 'heroicon-m-eye',
            self::Yearly => 'heroicon-m-check',
            self::Custom => 'heroicon-m-x-mark',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::PerVisit => 'daily membership on per visit',
            self::Monthly => 'Monthly membership',
            self::Yearly => 'Yearly membership',
            self::Custom => 'user can buy membership with custom reuirements.',
        };
    }
}
