<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Intervention\Image\Facades\Image;
use App\Models\Service;

class MediaService
{
    /**
     * Tekli medya yükleme
     */
    public function handleMediaUpload(
        HasMedia $model, 
        ?UploadedFile $file, 
        string $collection, 
        bool $deleteOld = true,
        bool $keepOriginal = false
    ): ?Media {
        if ($file) {
            if ($deleteOld) {
                $this->deleteMedia($model, $collection);
            }

            $media = $model->addMedia($file)
                ->sanitizingFileName(function($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->toMediaCollection($collection);

            // Eğer orijinal dosya saklanmayacaksa
            if (!$keepOriginal && $media) {
                $originalPath = $media->getPath();
                if (file_exists($originalPath)) {
                    unlink($originalPath);
                }
            }

            return $media;
        }
        return null;
    }

    /**
     * Çoklu medya yükleme
     */
    public function handleMultipleMediaUpload(
        HasMedia $model, 
        array $files, 
        string $collection,
        bool $keepOriginal = false
    ): Collection {
        $uploadedMedia = collect();
        foreach ($files as $file) {
            $media = $model->addMedia($file)->toMediaCollection($collection);
            
            // Gallery collection için orientation kontrolü
            if ($media && $collection === 'gallery') {
                $image = Image::make($media->getPath());
                $width = $image->width();
                $height = $image->height();
                
                $orientation = $width >= $height ? 'horizontal' : 'vertical';
                
                $this->updateMediaCustomProperties($media, [
                    'orientation' => $orientation
                ]);
            }
            
            // Orijinal dosyayı sil
            if (!$keepOriginal && $media) {
                $originalPath = $media->getPath();
                if (file_exists($originalPath)) {
                    unlink($originalPath);
                }
            }

            $uploadedMedia->push($media);
        }
        
        return $uploadedMedia;
    }

    /**
     * Medya silme
     */
    public function deleteMedia(
        HasMedia $model, 
        string $collection
    ): void {
        $model->clearMediaCollection($collection);
    }

    /**
     * Tekli medya güncelleme
     */
    public function updateMedia(
        HasMedia $model,
        ?UploadedFile $file,
        string $collection,
        bool $keepOriginal = false
    ): void {
        // Eğer yeni bir dosya yüklenmişse
        if ($file instanceof UploadedFile) {
            // Eski medyayı sil
            $this->deleteMedia($model, $collection);
            
            // Yeni dosyayı yükle
            $this->handleMediaUpload(
                $model, 
                $file, 
                $collection, 
                true, // Eski dosyayı sil
                $keepOriginal
            );
        }
    }

    /**
     * Medya koleksiyonunu optimize et
     */
    public function optimizeCollection(
        HasMedia $model, 
        string $collection
    ): void {
        $model->media()
            ->where('collection_name', $collection)
            ->each(function (Media $media) {
                $media->optimize();
            });
    }

    /**
     * Medya sıralama
     */
    public function sortMedia(
        HasMedia $model, 
        array $mediaIds, 
        string $collection
    ): void {
        $model->media()
            ->where('collection_name', $collection)
            ->whereIn('id', $mediaIds)
            ->each(function (Media $media) use ($mediaIds) {
                $media->order_column = array_search($media->id, $mediaIds);
                $media->save();
            });
    }

    /**
     * Medya custom properties güncelleme
     */
    public function updateMediaCustomProperties(
        Media $media, 
        array $properties
    ): void {
        $media->custom_properties = array_merge(
            $media->custom_properties ?? [], 
            $properties
        );
        $media->save();
    }

    /**
     * Medya koleksiyonunu temizle
     */
    public function clearCollection(
        HasMedia $model, 
        string $collection
    ): void {
        $model->clearMediaCollection($collection);
    }

    /**
     * Belirli bir medyayı sil
     */
    public function deleteSingleMedia(HasMedia $model, string $collection): bool
    {
        try {
            $media = $model->getFirstMedia($collection);
            if ($media) {
                $media->delete();
                return true;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Medya varlığını kontrol et
     */
    public function hasMedia(HasMedia $model, string $collection): bool
    {
        return $model->hasMedia($collection);
    }

    public function getAllGalleryMedia(): Collection
    {
        $images = Media::query()
            ->where('collection_name', 'gallery')
            ->whereHasMorph(
                'model',
                [Service::class],
                function ($query) {
                    $query->where('status', 1);
                }
            )
            ->with('model.translations')
            ->orderBy('order_column')
            ->get();

        // Önce vertical sonra horizontal olacak şekilde sırala
        return $images->sortBy(function ($media) {
            return $media->getCustomProperty('orientation') === 'horizontal' ? 1 : 0;
        });
    }
} 