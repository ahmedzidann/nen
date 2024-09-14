<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Management extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
    ];

}
