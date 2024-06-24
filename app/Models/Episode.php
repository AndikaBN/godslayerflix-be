<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_series_id',
        'nomor_episode',
        'title',
        'video',
    ];

    public function animeSeries()
    {
        return $this->belongsTo(AnimeSeries::class);
    }
}
