<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationCountry extends Model
{
    use HasFactory;

    protected $table = 'education_countries'; // explicitly define the table

    protected $fillable = [
        'education_id',
        'country_id',
        'url',
    ];

    // Relationships
    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
