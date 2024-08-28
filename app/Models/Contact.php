<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'department',
        'name',
        'email',
        'phone',
        'reference',
        'subject',
        'message',
        'is_readed',
    ];
}
