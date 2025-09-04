<?php

namespace App\Filament\Resources\Categories\CategoryResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Categories\CategoryResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Categories\CategoryResource\Api\Transformers\CategoryTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CategoryResource::class;


    /**
     * Show Category
     *
     * @param Request $request
     * @return CategoryTransformer
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

        return new CategoryTransformer($query);
    }
}
