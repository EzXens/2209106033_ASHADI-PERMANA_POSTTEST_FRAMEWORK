<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    use HasFactory;

    protected $fillable = ['anime_id', 'youtube_url'];

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
