<?php
namespace App\Filament\Resources\Categories\CategoryResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Categories\CategoryResource\Api\Requests\UpdateCategoryRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = CategoryResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Category
     *
     * @param UpdateCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateCategoryRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}