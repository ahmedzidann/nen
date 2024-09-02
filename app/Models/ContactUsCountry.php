<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContactUsCountry extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
        'title',
        'address',
    ];
    protected $fillable = [
        'country_id',
        'name',
        'lat',
        'lng',
        'address',
        'phone',
        'type',
        'from_at',
        'to_at',
    ];

    /**
     * Scope a query to filter countries by a specific language.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $languageKey
     * @param  string  $countryName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByLanguage(Builder $query, string $languageKey, string $countryName): Builder
    {
        return $query->whereRaw("JSON_EXTRACT(country, '$.\"$languageKey\"') = ?", [$countryName]);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
