<?php
namespace App\Filament\Resources\Facilities\FacilityResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Facilities\FacilityResource;
use Illuminate\Routing\Router;


class FacilityApiService extends ApiService
{
    protected static string | null $resource = FacilityResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
