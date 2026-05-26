<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeDocValidation extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'home_doc_validations';

    public $translatable = ['title', 'description', 'button_text'];

    protected $fillable = ['title', 'description', 'button_text', 'button_url', 'is_active'];

    public function items()
    {
        return $this->hasMany(HomeDocValidationItem::class)->orderBy('sort');
    }
}
