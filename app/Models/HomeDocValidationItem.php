<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeDocValidationItem extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'home_doc_validation_items';

    public $translatable = ['title'];

    protected $fillable = ['home_doc_validation_id', 'title', 'image', 'sort'];

    public function section()
    {
        return $this->belongsTo(HomeDocValidation::class, 'home_doc_validation_id');
    }

    public function details()
    {
        return $this->hasMany(HomeDocValidationDetail::class)->orderBy('sort');
    }
}
