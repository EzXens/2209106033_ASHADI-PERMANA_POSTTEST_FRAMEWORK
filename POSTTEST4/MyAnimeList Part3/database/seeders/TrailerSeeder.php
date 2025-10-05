<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anime;
use App\Models\Trailer;

class TrailerSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping nama anime -> link YouTube trailer
        $trailers = [
            'Attack on Titan' => 'https://www.youtube.com/watch?v=MGRm4IzK1SQ',
            'Demon Slayer' => 'https://www.youtube.com/watch?v=wyiZWYMilgk',
            'Jujutsu Kaisen' => 'https://www.youtube.com/watch?v=RYI-WG_HFV8',
            'Chainsaw Man' => 'https://www.youtube.com/watch?v=v4yLeNt-kCU',
            'Fullmetal Alchemist' => 'https://www.youtube.com/watch?v=-GoNo0DGroU',
            'One Punch Man 3' => 'https://www.youtube.com/watch?v=NcLqFIVTRxY',
            'Akame ga Kill!' => 'https://www.youtube.com/watch?v=HOB4GZ1S1Wo',
            'Angel Beats!' => 'https://www.youtube.com/watch?v=1dkoSUS588g',
            'Anohana: The Flower We Saw That Day' => 'https://www.youtube.com/watch?v=x8fvwC5xVGg',
            'Assassination Classroom' => 'https://www.youtube.com/watch?v=kgNkGohA20k',
            'Beastars' => 'https://www.youtube.com/watch?v=IXsURQxoGe8',
            'Black Clover' => 'https://www.youtube.com/watch?v=Ln_imebEmAQ',
            'Black Lagoon' => 'https://www.youtube.com/watch?v=pge_09iDtgI',
            'Bleach' => 'https://www.youtube.com/watch?v=KPL8K8Rfyxc',
            'Blue Exorcist' => 'https://www.youtube.com/watch?v=euE4k-wjlps',
            'Boku no Hero Academia Final' => 'https://www.youtube.com/watch?v=zz37nGym3OQ',
            'Spy x Family Season 3' => 'https://www.youtube.com/watch?v=5ASJJI_RkiA',
        ];

        Anime::all()->each(function ($anime) use ($trailers) {
            $youtubeUrl = $trailers[$anime->title] ?? '';

            Trailer::factory()
                ->state([
                    'anime_id' => $anime->id,
                    'youtube_url' => $youtubeUrl,
                ])
                ->create();
        });
    }
}
