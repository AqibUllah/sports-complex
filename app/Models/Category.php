<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'color',
        'icon',
    ];

    protected $appends = ['image_url','all_images'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useDisk('public')
            ->singleFile(); // For a single image
    }



    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function getImageUrlAttribute():string
    {
        return $this->getFirstMediaUrl('image','thumb');
    }

    /**
     * Get all images for the category
     *
     * @return array<int, array{id: int|string, url: string, thumb: string}>
     */
    public function getAllImagesAttribute(): array
    {
        return $this->getMedia('image')->map(fn($media) => [
            'id' => $media->id,
            'url' => $media->getUrl(),
            'thumb' => $media->getUrl('thumb'), // if you defined conversions
        ]);
    }

    // Relations
    public function facilities():HasMany
    {
        return $this->hasMany(Facility::class);
    }


    public static function booted()
    {
//        static::saved(function ($model) {
//            $media = $model->getFirstMedia();
////            dd($media);
//            if ($media) {
////                $sourceDir = $media->model_id; // e.g. storage/app/client/7
////                dd($sourceDir);
//                // Ensure target directory exists
//                File::ensureDirectoryExists(resource_path('js/assets/images/'.$media->model_id));
//
//                // Copy directory recursively
//                File::copyDirectory(
//                    public_path('storage/'.$media->model_id),
//                    resource_path('js/assets/images/'.$media->model_id)
//                );
////                \Illuminate\Support\Facades\Storage::disk('public')
////                    ->copy(
////                        $media->id.'/'.$media->file_name,
////                        '../resources/js/assets/images/'.$media->file_name
////                    );
//            }
//        });
    }

}
