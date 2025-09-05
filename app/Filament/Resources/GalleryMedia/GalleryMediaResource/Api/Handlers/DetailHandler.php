<?php

namespace App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Transformers\GalleryMediaTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = GalleryMediaResource::class;


    /**
     * Show GalleryMedia
     *
     * @param Request $request
     * @return GalleryMediaTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new GalleryMediaTransformer($query);
    }
}
