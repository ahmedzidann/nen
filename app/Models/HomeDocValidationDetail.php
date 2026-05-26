<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeDocValidationDetail extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'home_doc_validation_details';

    public $translatable = ['title'];

    protected $fillable = ['home_doc_validation_item_id', 'title', 'sort'];

    public function item()
    {
        return $this->belongsTo(HomeDocValidationItem::class, 'home_doc_validation_item_id');
    }
}
