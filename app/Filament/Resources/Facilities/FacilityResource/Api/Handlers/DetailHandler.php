<?php

namespace App\Filament\Resources\Facilities\FacilityResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\Facilities\FacilityResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\Facilities\FacilityResource\Api\Transformers\FacilityTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = FacilityResource::class;


    /**
     * Show Facility
     *
     * @param Request $request
     * @return FacilityTransformer
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

        return new FacilityTransformer($query);
    }
}
