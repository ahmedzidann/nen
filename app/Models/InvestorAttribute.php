<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class InvestorAttribute extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['investor_id', 'since', 'percent', 'country_id'];

    public function investorAttributes()
    {
        return $this->belongsTo(StaticTable::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
