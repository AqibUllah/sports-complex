<?php
namespace App\Filament\Resources\Categories\CategoryResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Categories\CategoryResource\Api\Requests\CreateCategoryRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = CategoryResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Category
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateCategoryRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->validated());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
