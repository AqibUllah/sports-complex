<?php
namespace App\Filament\Resources\Facilities\FacilityResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Facility;

/**
 * @property Facility $resource
 */
class FacilityTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return $this->resource->toArray();

        return [
            'name'  => $this->resource->name,
            'description' =>  $this->resource->description,
            'capacity' =>  $this->resource->capacity,
            'category' =>  [
                'name'  => $this->resource->category->name,
                'description'  => $this->resource->category->description,
                'image_url'  => $this->resource->category->getFirstMediaUrl(),
            ],
            'price_per_hour' =>  $this->resource->price_per_hour,
            'location_details' =>  $this->resource->location_details,
            'status' =>  $this->resource->status,
            'image_url' =>  $this->resource->getFirstMediaUrl(),
        ];
    }
}
