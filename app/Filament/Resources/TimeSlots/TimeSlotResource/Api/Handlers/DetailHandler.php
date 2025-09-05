<?php

namespace App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\TimeSlots\TimeSlotResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Transformers\TimeSlotTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = TimeSlotResource::class;


    /**
     * Show TimeSlot
     *
     * @param Request $request
     * @return TimeSlotTransformer
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

        return new TimeSlotTransformer($query);
    }
}
