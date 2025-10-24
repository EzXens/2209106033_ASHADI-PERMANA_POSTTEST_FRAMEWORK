<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Anime;

class TagSourceSeeder extends Seeder
{
    public function run(): void
    {
        // Buat tag dan source tanpa duplikat
        $tagNames = [
            'Action', 'Romance', 'Comedy', 'Fantasy', 'Drama', 'Horror',
            'Magic', 'Adventure', 'School', 'Isekai', 'Love', 'Popular', 'Recommended'
        ];

        $sourceNames = ['Manga', 'Light Novel', 'Web Novel', 'Game', 'Original'];

        foreach ($tagNames as $name) {
            Tag::firstOrCreate(['name' => $name]);
        }

        foreach ($sourceNames as $name) {
            Source::firstOrCreate(['name' => $name]);
        }

        $tags = Tag::all();
        $sources = Source::all();
        $animes = Anime::all();

        foreach ($animes as $anime) {
            $genre = strtolower($anime->genre);

            // Pilih tag yang relevan
            $genreMatch = match (true) {
                str_contains($genre, 'action') => $tags->whereIn('name', ['Action', 'Battle', 'Hero']),
                str_contains($genre, 'romance') => $tags->whereIn('name', ['Romance', 'Love', 'Drama']),
                str_contains($genre, 'comedy') => $tags->whereIn('name', ['Comedy', 'School']),
                str_contains($genre, 'fantasy') => $tags->whereIn('name', ['Fantasy', 'Magic', 'Isekai']),
                default => $tags->whereIn('name', ['Popular', 'Recommended']),
            };

            $anime->tags()->attach($genreMatch->random(min(2, $genreMatch->count()))->pluck('id')->toArray());

            // Source relevan
            $chosenSource = match (true) {
                str_contains($genre, 'romance') => $sources->where('name', 'Manga')->first(),
                str_contains($genre, 'fantasy') => $sources->where('name', 'Web Novel')->first(),
                str_contains($genre, 'school') => $sources->where('name', 'Original')->first(),
                default => $sources->random(),
            };

            $anime->source_id = $chosenSource->id ?? $sources->random()->id;
            $anime->save();
        }
    }
}
