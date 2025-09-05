<?php
namespace App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TimeSlots\TimeSlotResource;
use App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Requests\UpdateTimeSlotRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = TimeSlotResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update TimeSlot
     *
     * @param UpdateTimeSlotRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateTimeSlotRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}