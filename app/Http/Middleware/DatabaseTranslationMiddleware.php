<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LanguageLine;
use Illuminate\Support\Facades\Cache;

class DatabaseTranslationMiddleware
{
    public function handle($request, Closure $next)
    {
        app()->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            
            return new class($loader, $locale) extends \Illuminate\Translation\Translator {
                public function get($key, array $replace = [], $locale = null, $fallback = true)
                {
                    $locale = $locale ?? $this->getLocale();
                    [$group, $item] = explode('.', $key);

                    // Cache ile performans artırımı
                    $translation = Cache::remember("lang_{$group}_{$item}_{$locale}", 60, function () use ($group, $item, $locale) {
                        $line = LanguageLine::where('group', $group)
                            ->where('key', $item)
                            ->first();

                        return $line->text[$locale] ?? null;
                    });

                    if ($translation) {
                        foreach ($replace as $search => $value) {
                            $translation = str_replace(":{$search}", $value, $translation);
                        }
                        return $translation;
                    }

                    // Eğer veritabanında bulunamazsa, normal dil dosyalarından çek
                    return parent::get($key, $replace, $locale, $fallback);
                }
            };
        });

        return $next($request);
    }
}
