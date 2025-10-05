<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anime;

class SourceFactory extends Factory
{
    public function definition(): array
    {
        $anime = Anime::inRandomOrder()->first();

        // Sumber berdasarkan genre
        $genre = strtolower($anime->genre);
        $sourceCandidates = [];

        if (str_contains($genre, 'romance')) $sourceCandidates = ['Manga', 'Light Novel'];
        elseif (str_contains($genre, 'fantasy')) $sourceCandidates = ['Web Novel', 'Game'];
        elseif (str_contains($genre, 'school')) $sourceCandidates = ['Manga', 'Original'];
        elseif (str_contains($genre, 'horror')) $sourceCandidates = ['Novel', 'Original'];
        else $sourceCandidates = ['Manga', 'Original', 'Light Novel'];

        return [
           
            'source_name' => fake()->randomElement($sourceCandidates),
        ];
    }
}
