<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
class Setting extends Model  implements  HasMedia
{
    use HasFactory, HasRoles, InteractsWithMedia  ;

    protected $fillable = [
        'key',
        'value',
    ];
   public function scopeSearch($query):LengthAwarePaginator
   {
        $search = Request()->query('name');
        if(empty($search)){
        return $query->paginate(15);
        }else{
        return $query
        ->orwhere('key', 'like' , "%{$search}%")
        ->orwhere('value', 'like' , "%{$search}%")
        ->latest()->paginate(5);
        }
   }
}
