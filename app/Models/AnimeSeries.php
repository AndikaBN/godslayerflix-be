<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeSeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre_id',
        'image',
        'description',
        'status',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getThumbnailAttribute()
    {
        return asset($this->image);
    }

    public function getGenreNameAttribute()
    {
        return $this->genre->name;
    }
}
