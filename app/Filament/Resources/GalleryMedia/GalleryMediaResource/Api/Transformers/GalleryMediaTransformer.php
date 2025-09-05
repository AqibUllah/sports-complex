<?php
namespace App\Filament\Resources\GalleryMedia\GalleryMediaResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\GalleryMedia;

/**
 * @property GalleryMedia $resource
 */
class GalleryMediaTransformer extends JsonResource
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
            'title'  => $this->resource->title,
            'description' =>  $this->resource->description,
            'category' =>  [
                'name'  => $this->resource->category->name,
                'image_url'  => $this->resource->category->getFirstMediaUrl(),
            ],
            'status' =>  $this->resource->status,
            'media' =>  $this->resource->getMedia('images')
            ->map(fn ($row) => [
                'name'  => $row->name,
                'preview_url'  => $row->preview_url,
                'original_url'  => $row->original_url,
                'order'  => $row->order,
                'extension'  => $row->extension,
                'size'  => $row->size,
            ]),
        ];
    }
}
