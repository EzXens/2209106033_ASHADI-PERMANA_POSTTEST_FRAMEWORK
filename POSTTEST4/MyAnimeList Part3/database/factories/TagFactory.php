<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anime;

class TagFactory extends Factory
{
    public function definition(): array
    {
        $anime = Anime::inRandomOrder()->first();
        $genre = strtolower($anime->genre);
        $tagCandidates = [];

        if (str_contains($genre, 'action')) $tagCandidates = ['Battle', 'Shounen', 'Hero'];
        elseif (str_contains($genre, 'romance')) $tagCandidates = ['Love', 'Drama', 'Slice of Life'];
        elseif (str_contains($genre, 'fantasy')) $tagCandidates = ['Magic', 'Adventure', 'Isekai'];
        elseif (str_contains($genre, 'horror')) $tagCandidates = ['Dark', 'Thriller', 'Mystery'];
        else $tagCandidates = ['General', 'Popular', 'Recommended'];

      return [
    'name' => fake()->randomElement([
        'Action', 'Adventure', 'Romance', 'Comedy', 'Drama', 'Fantasy', 'Horror',
        'Magic', 'School', 'Mystery', 'Supernatural', 'Slice of Life', 'Hero',
        'Battle', 'Love', 'Isekai', 'Popular', 'Recommended'
    ]),
];

    }
}
