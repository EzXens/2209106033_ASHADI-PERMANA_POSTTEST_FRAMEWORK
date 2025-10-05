<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau nama tabel default plural)
    protected $table = 'animes';

    // Field yang bisa diisi
    protected $fillable = [
        'title',
        'japanese_title',
        'score',
        'status',
        'total_episodes',
        'duration',
        'release_date',
        'studio',
        'genre',
        'synopsis',
        'image',
    ];
}
