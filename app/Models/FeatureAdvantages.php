<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FeatureAdvantages extends Model
{
    use  HasFactory, HasTranslations;

    public $translatable = [
        'description',
    ];

    protected $fillable = [
        'description',
        'sort',
        'is_active',
    ];
    const IS_Active = [1, 0];

    public function files()
    {
        return $this->hasMany(FeatureAdvantagesDetails::class, 'feature_advantage_id');
    }
}
