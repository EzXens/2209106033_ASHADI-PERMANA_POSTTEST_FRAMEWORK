<?php

namespace Database\Factories;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    protected $model = Anime::class;

    public function definition(): array
    {
        $genres = [
            'Action', 'Adventure', 'Comedy', 'Drama', 'Fantasy', 'Horror', 'Mystery',
            'Psychological', 'Romance', 'Sci-Fi', 'Slice of Life', 'Sports', 'Supernatural'
        ];

        return [
            'title' => $this->faker->unique()->sentence(3),
            'japanese_title' => $this->faker->unique()->lexify('????? ?????'),
            'score' => $this->faker->randomFloat(1, 6.0, 9.9),
            'status' => $this->faker->randomElement(['Completed', 'Ongoing', 'Upcoming']),
            'total_episodes' => $this->faker->numberBetween(1, 100),
            'duration' => $this->faker->numberBetween(20, 26) . ' menit',
            'release_date' => $this->faker->date(),
            'studio' => $this->faker->company(),
            'genre' => implode(', ', $this->faker->randomElements($genres, 3)),
            'synopsis' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(width: 640, height: 900, category: 'anime', randomize: true),
            'streaming_url' => $this->faker->url(),
        ];
    }
}
