<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristInfo extends Model
{
    use HasFactory;

    protected $table = 'tourist_infos';

    protected $fillable = [
        'place_id',
        'opening_hours',
        'closing_hours',
        'informasi',
        'image',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}