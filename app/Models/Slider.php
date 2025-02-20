<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Slider extends Model implements HasMedia,TranslatableContract
{
    use HasFactory,InteractsWithMedia,Translatable;

    public $translatedAttributes = ['title','link', 'link_text','text1','text2','text3'];

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if ($media === null) {
            return;
        }

        $this->addMediaConversion('page_img')
            ->width(1250)
            ->nonOptimized()
            ->keepOriginalImageFormat()
            ->performOnCollections('page');

        $this->addMediaConversion('thumb')
            ->width(250)
            ->nonOptimized()
            ->keepOriginalImageFormat()
            ->performOnCollections('page','mobile');
                 
    }

}
