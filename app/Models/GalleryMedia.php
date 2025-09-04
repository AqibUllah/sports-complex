<?php

namespace App\Models;

use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;
use Filament\Forms\Components\RichEditor\FileAttachmentProviders\SpatieMediaLibraryFileAttachmentProvider;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;

class GalleryMedia extends Model implements HasMedia, HasRichContent
{
    use HasFactory, InteractsWithMedia, InteractsWithRichContent;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'status',
    ];

    protected $appends = ['image_url','all_images'];

    public function setUpRichContent(): void
    {
        $this->registerRichContent('content')
            ->fileAttachmentProvider(
                SpatieMediaLibraryFileAttachmentProvider::make()
                    ->collection('content-file-attachments'),
            );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useDisk('public');
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
        ])->toArray();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}
