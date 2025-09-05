<?php
namespace App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Transformers;

use App\Filament\Resources\Facilities\FacilityResource\Api\Transformers\FacilityTransformer;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TimeSlot;

/**
 * @property TimeSlot $resource
 */
class TimeSlotTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'facility' => FacilityTransformer::make($this->resource->facility),
            'start_time' => $this->resource->start_time,
            'end_time' => $this->resource->end_time,
            'max_capacity' => $this->resource->max_capacity,
            'available_spots' => $this->resource->available_spots,
            'price' => $this->resource->price,
            'is_available' => $this->resource->is_available,
        ];
    }
}
