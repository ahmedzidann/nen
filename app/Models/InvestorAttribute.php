<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestorAttribute extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['investor_id', 'since', 'percent', 'category'];

    public function investorAttributes()
    {
        return $this->belongsTo(StaticTable::class);
    }
}
