<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageLine extends Model
{
    use HasFactory;

    protected $fillable = ['group', 'key', 'text'];

    protected $casts = [
        'text' => 'array',
    ];

    public static function getTranslation($group, $key, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translation = self::where('group', $group)->where('key', $key)->first();
        
        return $translation->text[$locale] ?? $key;
    }
}
