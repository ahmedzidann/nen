<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityAttribute extends Model
{
    use HasFactory,HasTranslations;
       public $translatable = [
        'content'
   ];
    protected $fillable = [
        'identity_id',
        'content',
    ];

    public function identity()
    {
        return $this->belongsTo(StaticTable::class);
    }
}
