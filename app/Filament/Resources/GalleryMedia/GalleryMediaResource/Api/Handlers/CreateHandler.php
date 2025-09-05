<?php
namespace App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Requests\CreateGalleryMediaRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = GalleryMediaResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create GalleryMedia
     *
     * @param CreateGalleryMediaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateGalleryMediaRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}