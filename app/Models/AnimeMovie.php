<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeMovie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'genre_id',
        'image',
        'description',
        'status',
        'video',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
