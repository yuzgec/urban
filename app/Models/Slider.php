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

    protected $fillable = ['status', 'rank'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('web');
        $this->addMediaCollection('mobil');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if ($media === null) {
            return;
        }

        $this->addMediaConversion('web_img')
            ->width(1250)
            ->nonOptimized()
            ->keepOriginalImageFormat()
            ->performOnCollections('web');

        $this->addMediaConversion('thumb')
            ->width(250)
            ->nonOptimized()
            ->keepOriginalImageFormat()
            ->performOnCollections('web','mobile');
            
        $this->addMediaConversion('mobile_img')
            ->width(600)
            ->nonOptimized()
            ->keepOriginalImageFormat()
            ->performOnCollections('mobile');
                 
    }

}
