<?php
namespace App\Filament\Resources\Facilities\FacilityResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Facilities\FacilityResource;
use App\Filament\Resources\Facilities\FacilityResource\Api\Requests\CreateFacilityRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = FacilityResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Facility
     *
     * @param CreateFacilityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateFacilityRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}