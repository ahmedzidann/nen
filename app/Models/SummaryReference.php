<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SummaryReference extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'summary_id',
        "title",
        'reference',

    ];}
