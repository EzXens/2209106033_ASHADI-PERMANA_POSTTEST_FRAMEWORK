<?php

namespace Database\Factories;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrailerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'anime_id' => Anime::inRandomOrder()->first()->id,
            'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // default link (akan dioverride di seeder)
        ];
    }
}
