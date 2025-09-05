<?php
namespace App\Filament\Resources\MembershipPlans\MembershipPlanResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\MembershipPlans\MembershipPlanResource;
use Illuminate\Routing\Router;


class MembershipPlanApiService extends ApiService
{
    protected static string | null $resource = MembershipPlanResource::class;

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
