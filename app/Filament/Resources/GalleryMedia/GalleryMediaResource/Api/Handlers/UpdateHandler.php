<?php
namespace App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Requests\UpdateGalleryMediaRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = GalleryMediaResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update GalleryMedia
     *
     * @param UpdateGalleryMediaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateGalleryMediaRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}