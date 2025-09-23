<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;

class AnimeSeeder extends Seeder
{
    public function run(): void
    {
        $animes = [
            // === A ===
            [
                'title' => 'Attack on Titan',
                'japanese_title' => '進撃の巨人',
                'score' => 9.0,
                'status' => 'Completed',
                'total_episodes' => 75,
                'duration' => '24 menit',
                'release_date' => '2013-04-06',
                'studio' => 'Wit Studio / MAPPA',
                'genre' => 'Action, Drama, Fantasy',
                'image' => 'image/cover_image/aot.jpg',
                'streaming_url'=> 'https://hianime.to/watch/attack-on-titan-112?ep=3303',
                'synopsis' => 'Attack on Titan) – Selama seratus tahun lebih manusia hidup dalam incaran para raksasa, kini manusia telah membuat sebuah dinding yang sangat besar setinggi melebihi besarnya para raksasa tersebut untuk bertahan hidup dari serangan para raksasa. Raksasa yang mengincar mereka disebut dengan Titan (Kyojin).

Entah darimana awal mula datangnya para Titan, namun untuk saat ini manusia dapat bernafas lega hidup didalam dinding. Hingga suatu hari, kehidupan damai mereka sirna ketika datang sesosok Titan yang sangat besar berkali-kali lipatnya dari titan biasa menghancurkan bagian dinding terluar mereka. Kejadian tersebut membuat para titan-titan lainnya memasuki wilayah dinding dan memakan semua manusia yang ada dihadapannya.

Bercerita tentang seorang anak bernama Eren Jaeger, ia merupakan seorang anak yang menyaksikan kejadian kelam tersebut, ibunya sendiri telah tatkala Seekor titan yang memakan ibunya tepat didepan matanya. Umat manusia saat itu hanya bisa pasrah dan mengungsi kebagian terdalam dari dinding.

Dirasuki amarah yang luar biasa, Eren berjanji membalaskan dendamnya dan akan membunuh semua titan di dunia ini hingga tak tersisa satupun mereka.

Bersamaan dengan 2 sahabatnya Mikasa dan Armin. Kini mereka bertiga masuk kedalam Pasukan Pengintai. Pasukan Pengintai adalah pasukan yang paling sering bertemu dan berperang langsung melawan para titan karena tugas mereka yakni melakukan observasi diluar dinding.

Disinilah cerita Eren dan teman-temannya dimulai menjadi Calon Pasukan Pengintai.'
            ],
            [
                'title' => 'Akame ga Kill!',
                'japanese_title' => 'アカメが斬る!',
                'score' => 7.8,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '23 menit',
                'release_date' => '2014-07-07',
                'studio' => 'White Fox',
                'genre' => 'Action, Fantasy',
                'image' => 'image/cover_image/akame.jpg',
                'synopsis' => 'Seorang pemuda bergabung dengan organisasi Night Raid untuk melawan pemerintah korup.'
            ],
            [
                'title' => 'Anohana: The Flower We Saw That Day',
                'japanese_title' => 'あの日見た花の名前を僕達はまだ知らない。',
                'score' => 8.3,
                'status' => 'Completed',
                'total_episodes' => 11,
                'duration' => '22 menit',
                'release_date' => '2011-04-15',
                'studio' => 'A-1 Pictures',
                'genre' => 'Drama, Slice of Life, Supernatural',
                'image' => 'image/cover_image/anohana.jpg',
                'synopsis' => 'Sekelompok teman masa kecil dipersatukan kembali oleh roh teman mereka yang sudah meninggal.'
            ],
            [
                'title' => 'Angel Beats!',
                'japanese_title' => 'エンジェルビーツ!',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '24 menit',
                'release_date' => '2010-04-03',
                'studio' => 'P.A. Works',
                'genre' => 'Action, Drama, Supernatural',
                'image' => 'image/cover_image/angelbeats.jpg',
                'synopsis' => 'Sekelompok siswa berjuang melawan takdir mereka di dunia setelah kematian.'
            ],
            [
                'title' => 'Assassination Classroom',
                'japanese_title' => '暗殺教室',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 47,
                'duration' => '23 menit',
                'release_date' => '2015-01-09',
                'studio' => 'Lerche',
                'genre' => 'Action, Comedy, School',
                'image' => 'image/cover_image/assclass.jpg',
                'synopsis' => 'Siswa kelas 3-E berusaha membunuh guru mereka yang berupa alien sebelum ia menghancurkan bumi.'
            ],

            // === B ===
            [
                'title' => 'Bleach',
                'japanese_title' => 'ブリーチ',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 366,
                'duration' => '24 menit',
                'release_date' => '2004-10-05',
                'studio' => 'Studio Pierrot',
                'genre' => 'Action, Adventure, Supernatural',
                'image' => 'image/cover_image/bleach.jpg',
                'synopsis' => 'Ichigo Kurosaki memperoleh kekuatan Shinigami dan melindungi manusia dari Hollow.'
            ],
            [
                'title' => 'Black Clover',
                'japanese_title' => 'ブラッククローバー',
                'score' => 8.0,
                'status' => 'Ongoing',
                'total_episodes' => 170,
                'duration' => '23 menit',
                'release_date' => '2017-10-03',
                'studio' => 'Pierrot',
                'genre' => 'Action, Fantasy',
                'image' => 'image/cover_image/blackclover.jpg',
                'synopsis' => 'Asta, seorang anak tanpa sihir, berusaha menjadi Wizard King.'
            ],
            [
                'title' => 'Blue Exorcist',
                'japanese_title' => '青の祓魔師',
                'score' => 7.7,
                'status' => 'Completed',
                'total_episodes' => 25,
                'duration' => '24 menit',
                'release_date' => '2011-04-17',
                'studio' => 'A-1 Pictures',
                'genre' => 'Action, Supernatural, Fantasy',
                'image' => 'image/cover_image/blueexorcist.jpg',
                'synopsis' => 'Rin Okumura mengetahui dirinya adalah anak iblis dan berjuang menjadi exorcist.'
            ],
            [
                'title' => 'Black Lagoon',
                'japanese_title' => 'ブラック・ラグーン',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 menit',
                'release_date' => '2006-04-08',
                'studio' => 'Madhouse',
                'genre' => 'Action, Seinen',
                'image' => 'image/cover_image/blacklagoon.jpg',
                'synopsis' => 'Sekelompok tentara bayaran bernama Lagoon Company terlibat dalam dunia kriminal.'
            ],
            [
                'title' => 'Beastars',
                'japanese_title' => 'ビースターズ',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '23 menit',
                'release_date' => '2019-10-10',
                'studio' => 'Orange',
                'genre' => 'Drama, Psychological, Slice of Life',
                'image' => 'image/cover_image/beastars.jpg',
                'synopsis' => 'Di dunia hewan antropomorfik, seekor serigala mencoba menahan naluri predatornya.'
            ],
            // === C ===
            [
                'title' => 'Clannad',
                'japanese_title' => 'クラナド',
                'score' => 8.5,
                'status' => 'Completed',
                'total_episodes' => 23,
                'duration' => '24 menit',
                'release_date' => '2007-10-04',
                'studio' => 'Kyoto Animation',
                'genre' => 'Drama, Romance, Slice of Life',
                'image' => 'image/cover_image/clannad.jpg',
                'synopsis' => 'Tomoya bertemu Nagisa dan hidupnya berubah penuh harapan serta persahabatan.'
            ],
            [
                'title' => 'Code Geass: Lelouch of the Rebellion',
                'japanese_title' => 'コードギアス 反逆のルルーシュ',
                'score' => 9.0,
                'status' => 'Completed',
                'total_episodes' => 25,
                'duration' => '24 menit',
                'release_date' => '2006-10-06',
                'studio' => 'Sunrise',
                'genre' => 'Action, Mecha, Supernatural',
                'image' => 'image/cover_image/codegeass.jpg',
                'synopsis' => 'Lelouch memperoleh kekuatan Geass untuk melawan Kekaisaran Britannia.'
            ],
            [
                'title' => 'Cowboy Bebop',
                'japanese_title' => 'カウボーイビバップ',
                'score' => 8.9,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 menit',
                'release_date' => '1998-04-03',
                'studio' => 'Sunrise',
                'genre' => 'Action, Sci-Fi, Space',
                'image' => 'image/cover_image/cowboybebop.jpg',
                'synopsis' => 'Kisah para pemburu bayaran yang berkelana di luar angkasa.'
            ],
            [
                'title' => 'Chainsaw Man',
                'japanese_title' => 'チェンソーマン',
                'score' => 8.7,
                'status' => 'Ongoing',
                'total_episodes' => 12,
                'duration' => '24 menit',
                'release_date' => '2022-10-12',
                'studio' => 'MAPPA',
                'genre' => 'Action, Horror, Supernatural',
                'image' => 'image/cover_image/chainsawman.jpg',
                'synopsis' => 'Denji yang menyatu dengan anjing iblis Pochita menjadi Chainsaw Man.'
            ],
            [
                'title' => 'Charlotte',
                'japanese_title' => 'シャーロット',
                'score' => 7.8,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '24 menit',
                'release_date' => '2015-07-05',
                'studio' => 'P.A. Works',
                'genre' => 'Drama, Supernatural, School',
                'image' => 'image/cover_image/charlotte.jpg',
                'synopsis' => 'Remaja dengan kekuatan supernatural tersembunyi dikumpulkan di sekolah khusus.'
            ],

            // === D ===
            [
                'title' => 'Death Note',
                'japanese_title' => 'デスノート',
                'score' => 9.0,
                'status' => 'Completed',
                'total_episodes' => 37,
                'duration' => '23 menit',
                'release_date' => '2006-10-04',
                'studio' => 'Madhouse',
                'genre' => 'Mystery, Supernatural, Thriller',
                'image' => 'image/cover_image/deathnote.jpg',
                'synopsis' => 'Light Yagami menemukan buku kematian yang bisa membunuh siapa pun.'
            ],
            [
                'title' => 'Demon Slayer: Kimetsu no Yaiba',
                'japanese_title' => '鬼滅の刃',
                'score' => 8.7,
                'status' => 'Ongoing',
                'total_episodes' => 55,
                'duration' => '23 menit',
                'release_date' => '2019-04-06',
                'studio' => 'ufotable',
                'genre' => 'Action, Fantasy, Historical',
                'image' => 'image/cover_image/demonslayer.jpg',
                'synopsis' => 'Tanjiro berjuang menyembuhkan adiknya Nezuko yang berubah jadi iblis.'
            ],
            [
                'title' => 'Durarara!!',
                'japanese_title' => 'デュラララ!!',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 menit',
                'release_date' => '2010-01-08',
                'studio' => 'Brain\'s Base',
                'genre' => 'Action, Mystery, Supernatural',
                'image' => 'image/cover_image/durarara.jpg',
                'synopsis' => 'Intrik dan misteri terjadi di Ikebukuro dengan geng dan makhluk gaib.'
            ],
            [
                'title' => 'Dragon Ball Z',
                'japanese_title' => 'ドラゴンボールZ',
                'score' => 8.5,
                'status' => 'Completed',
                'total_episodes' => 291,
                'duration' => '24 menit',
                'release_date' => '1989-04-26',
                'studio' => 'Toei Animation',
                'genre' => 'Action, Adventure, Martial Arts',
                'image' => 'image/cover_image/dbz.jpg',
                'synopsis' => 'Son Goku dan teman-temannya berjuang melawan berbagai musuh kuat demi melindungi bumi.'
            ],
            [
                'title' => 'Dr. Stone',
                'japanese_title' => 'ドクターストーン',
                'score' => 8.2,
                'status' => 'Completed',
                'total_episodes' => 35,
                'duration' => '24 menit',
                'release_date' => '2019-07-05',
                'studio' => 'TMS Entertainment',
                'genre' => 'Adventure, Sci-Fi',
                'image' => 'image/cover_image/drstone.jpg',
                'synopsis' => 'Senku berusaha membangun kembali peradaban setelah manusia membatu ribuan tahun.'
            ],

            // === E ===
            [
                'title' => 'Erased',
                'japanese_title' => '僕だけがいない街',
                'score' => 8.3,
                'status' => 'Completed',
                'total_episodes' => 12,
                'duration' => '23 menit',
                'release_date' => '2016-01-08',
                'studio' => 'A-1 Pictures',
                'genre' => 'Mystery, Supernatural, Thriller',
                'image' => 'image/cover_image/erased.jpg',
                'synopsis' => 'Satoru dikirim ke masa kecilnya untuk mencegah tragedi pembunuhan.'
            ],
            [
                'title' => 'Elfen Lied',
                'japanese_title' => 'エルフェンリート',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '24 menit',
                'release_date' => '2004-07-25',
                'studio' => 'Arms',
                'genre' => 'Action, Drama, Horror',
                'image' => 'image/cover_image/elfenlied.jpg',
                'synopsis' => 'Lucy, seorang Diclonius dengan kekuatan berbahaya, kabur dari laboratorium.'
            ],
            [
                'title' => 'Evangelion: Neon Genesis',
                'japanese_title' => '新世紀エヴァンゲリオン',
                'score' => 8.5,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 menit',
                'release_date' => '1995-10-04',
                'studio' => 'Gainax',
                'genre' => 'Action, Mecha, Psychological',
                'image' => 'image/cover_image/evangelion.jpg',
                'synopsis' => 'Remaja dipaksa mengendarai mecha EVA melawan makhluk misterius Angel.'
            ],
            [
                'title' => 'Eureka Seven',
                'japanese_title' => '交響詩篇エウレカセブン',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 50,
                'duration' => '24 menit',
                'release_date' => '2005-04-17',
                'studio' => 'Bones',
                'genre' => 'Adventure, Mecha, Romance',
                'image' => 'image/cover_image/eureka7.jpg',
                'synopsis' => 'Renton bergabung dengan Gekkostate dan bertemu gadis misterius Eureka.'
            ],
            [
                'title' => 'Eyeshield 21',
                'japanese_title' => 'アイシールド21',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 145,
                'duration' => '23 menit',
                'release_date' => '2005-04-06',
                'studio' => 'Gallop',
                'genre' => 'Comedy, Sports',
                'image' => 'image/cover_image/eyeshield21.jpg',
                'synopsis' => 'Sena yang awalnya pengecut menjadi pemain American Football hebat.'
            ],
            // === F ===
            [
                'title' => 'Fullmetal Alchemist: Brotherhood',
                'japanese_title' => 'Hagane no Renkinjutsushi: Brotherhood',
                'image' => 'image/anime/fmab.jpg',
                'score' => 9.2,
                'status' => 'Completed',
                'total_episodes' => 64,
                'duration' => '24 min/ep',
                'release_date' => '2009-04-05',
                'studio' => 'Bones',
                'genre' => 'Action, Adventure, Drama',
                'synopsis' => 'Two brothers use alchemy to try to restore what they lost, uncovering dark secrets.'
            ],
            [
                'title' => 'Fate/Zero',
                'japanese_title' => 'Feito/Zero',
                'image' => 'image/anime/fatezero.jpg',
                'score' => 8.5,
                'status' => 'Completed',
                'total_episodes' => 25,
                'duration' => '24 min/ep',
                'release_date' => '2011-10-02',
                'studio' => 'ufotable',
                'genre' => 'Action, Supernatural, Fantasy',
                'synopsis' => 'Seven mages summon heroic spirits to battle for the Holy Grail.'
            ],
            // === G ===
            [
                'title' => 'Gintama',
                'japanese_title' => 'Gintama',
                'image' => 'image/anime/gintama.jpg',
                'score' => 9.0,
                'status' => 'Completed',
                'total_episodes' => 367,
                'duration' => '24 min/ep',
                'release_date' => '2006-04-04',
                'studio' => 'Sunrise',
                'genre' => 'Action, Comedy, Sci-Fi',
                'synopsis' => 'Odd jobs freelancer Gintoki lives in an Edo taken over by aliens.'
            ],
            [
                'title' => 'Great Teacher Onizuka',
                'japanese_title' => 'Gurēto Tīchā Onizuka',
                'image' => 'image/anime/gto.jpg',
                'score' => 8.7,
                'status' => 'Completed',
                'total_episodes' => 43,
                'duration' => '24 min/ep',
                'release_date' => '1999-06-30',
                'studio' => 'Pierrot',
                'genre' => 'Comedy, Drama, School',
                'synopsis' => 'A former biker gang leader becomes a teacher to inspire students.'
            ],

            // === H ===
            [
                'title' => 'Hunter x Hunter (2011)',
                'japanese_title' => 'Hantā Hantā',
                'image' => 'image/anime/hxh.jpg',
                'score' => 9.1,
                'status' => 'Completed',
                'total_episodes' => 148,
                'duration' => '23 min/ep',
                'release_date' => '2011-10-02',
                'studio' => 'Madhouse',
                'genre' => 'Action, Adventure, Fantasy',
                'synopsis' => 'Gon Freecss becomes a Hunter to search for his missing father.'
            ],
            [
                'title' => 'Haikyuu!!',
                'japanese_title' => 'Haikyū!!',
                'image' => 'image/anime/haikyuu.jpg',
                'score' => 8.9,
                'status' => 'Completed',
                'total_episodes' => 85,
                'duration' => '24 min/ep',
                'release_date' => '2014-04-06',
                'studio' => 'Production I.G',
                'genre' => 'Sports, Drama',
                'synopsis' => 'A short boy dreams of becoming a volleyball ace.'
            ],

            // === I ===
            [
                'title' => 'Inuyasha',
                'japanese_title' => 'Inuyasha',
                'image' => 'image/anime/inuyasha.jpg',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 167,
                'duration' => '24 min/ep',
                'release_date' => '2000-10-16',
                'studio' => 'Sunrise',
                'genre' => 'Action, Adventure, Fantasy',
                'synopsis' => 'A modern girl travels back to feudal Japan and meets half-demon Inuyasha.'
            ],
            [
                'title' => 'Initial D',
                'japanese_title' => 'Inisharu Dī',
                'image' => 'image/anime/initiald.jpg',
                'score' => 8.2,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 min/ep',
                'release_date' => '1998-04-19',
                'studio' => 'Gallop / Studio Comet',
                'genre' => 'Sports, Cars',
                'synopsis' => 'Takumi Fujiwara becomes a legendary street racer with his AE86.'
            ],

            // === J ===
            [
                'title' => 'Jujutsu Kaisen',
                'japanese_title' => 'Jujutsu Kaisen',
                'image' => 'image/anime/jujutsukaisen.jpg',
                'score' => 8.8,
                'status' => 'Ongoing',
                'total_episodes' => 47,
                'duration' => '24 min/ep',
                'release_date' => '2020-10-03',
                'studio' => 'MAPPA',
                'genre' => 'Action, Supernatural',
                'synopsis' => 'Yuji Itadori consumes a cursed finger and becomes host to Sukuna.'
            ],
            [
                'title' => 'JoJo\'s Bizarre Adventure',
                'japanese_title' => 'JoJo no Kimyō na Bōken',
                'image' => 'image/anime/jojo.jpg',
                'score' => 8.6,
                'status' => 'Ongoing',
                'total_episodes' => 190,
                'duration' => '24 min/ep',
                'release_date' => '2012-10-06',
                'studio' => 'David Production',
                'genre' => 'Action, Supernatural',
                'synopsis' => 'The generations of the Joestar family fight against supernatural foes.'
            ],

            // === K ===
            [
                'title' => 'Kuroko no Basket',
                'japanese_title' => 'Kuroko no Basuke',
                'image' => 'image/anime/kuroko.jpg',
                'score' => 8.3,
                'status' => 'Completed',
                'total_episodes' => 75,
                'duration' => '24 min/ep',
                'release_date' => '2012-04-07',
                'studio' => 'Production I.G',
                'genre' => 'Sports, Comedy',
                'synopsis' => 'Kuroko and Kagami aim to take down the Generation of Miracles in basketball.'
            ],
            [
                'title' => 'Kill la Kill',
                'japanese_title' => 'Kiru ra Kiru',
                'image' => 'image/anime/killlakill.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 min/ep',
                'release_date' => '2013-10-04',
                'studio' => 'Trigger',
                'genre' => 'Action, Comedy, Supernatural',
                'synopsis' => 'Ryuko Matoi searches for her father’s killer in a battle-hungry academy.'
            ],

            // === L ===
            [
                'title' => 'Log Horizon',
                'japanese_title' => 'Rogu Horaizun',
                'image' => 'image/anime/loghorizon.jpg',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 62,
                'duration' => '24 min/ep',
                'release_date' => '2013-10-05',
                'studio' => 'Satelight',
                'genre' => 'Action, Adventure, Fantasy',
                'synopsis' => 'Thousands of gamers are trapped in MMORPG Elder Tale.'
            ],
            [
                'title' => 'Love Live! School Idol Project',
                'japanese_title' => 'Rabu Raibu!',
                'image' => 'image/anime/lovelive.jpg',
                'score' => 7.5,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 min/ep',
                'release_date' => '2013-01-06',
                'studio' => 'Sunrise',
                'genre' => 'Music, School, Slice of Life',
                'synopsis' => 'A group of girls form an idol group to save their school.'
            ],

            // === M ===
            [
                'title' => 'My Hero Academia',
                'japanese_title' => 'Boku no Hīrō Akademia',
                'image' => 'image/anime/mha.jpg',
                'score' => 8.4,
                'status' => 'Ongoing',
                'total_episodes' => 138,
                'duration' => '24 min/ep',
                'release_date' => '2016-04-03',
                'studio' => 'Bones',
                'genre' => 'Action, Superhero',
                'synopsis' => 'Izuku Midoriya aims to be the top hero despite being born Quirkless.'
            ],
            [
                'title' => 'Mob Psycho 100',
                'japanese_title' => 'Mobu Saiko Hyaku',
                'image' => 'image/anime/mobpsycho.jpg',
                'score' => 8.7,
                'status' => 'Completed',
                'total_episodes' => 37,
                'duration' => '24 min/ep',
                'release_date' => '2016-07-11',
                'studio' => 'Bones',
                'genre' => 'Action, Comedy, Supernatural',
                'synopsis' => 'A powerful psychic struggles with adolescence and self-control.'
            ],

            // === N ===
            [
                'title' => 'Naruto',
                'japanese_title' => 'Naruto',
                'image' => 'image/anime/naruto.jpg',
                'score' => 8.2,
                'status' => 'Completed',
                'total_episodes' => 220,
                'duration' => '23 min/ep',
                'release_date' => '2002-10-03',
                'studio' => 'Pierrot',
                'genre' => 'Action, Adventure',
                'synopsis' => 'A young ninja dreams of becoming Hokage of his village.'
            ],
            [
                'title' => 'Neon Genesis Evangelion',
                'japanese_title' => 'Shin Seiki Evangerion',
                'image' => 'image/anime/evangelion.jpg',
                'score' => 8.6,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 min/ep',
                'release_date' => '1995-10-04',
                'studio' => 'Gainax',
                'genre' => 'Mecha, Drama, Psychological',
                'synopsis' => 'Teenagers pilot giant mecha to protect Earth from mysterious beings.'
            ],

            // === O ===
            [
                'title' => 'One Piece',
                'japanese_title' => 'Wan Pīsu',
                'image' => 'image/anime/onepiece.jpg',
                'score' => 9.0,
                'status' => 'Ongoing',
                'total_episodes' => 1100,
                'duration' => '24 min/ep',
                'release_date' => '1999-10-20',
                'studio' => 'Toei Animation',
                'genre' => 'Action, Adventure, Comedy',
                'synopsis' => 'Monkey D. Luffy sails to find the legendary treasure One Piece.'
            ],
            [
                'title' => 'Overlord',
                'japanese_title' => 'Ōbārōdo',
                'image' => 'image/anime/overlord.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 52,
                'duration' => '24 min/ep',
                'release_date' => '2015-07-07',
                'studio' => 'Madhouse',
                'genre' => 'Action, Fantasy, Isekai',
                'synopsis' => 'A gamer is trapped in a DMMORPG as his character overlord Ainz Ooal Gown.'
            ],

            // === P ===
            [
                'title' => 'Paranoia Agent',
                'japanese_title' => 'Mōsō Dairinin',
                'image' => 'image/anime/paranoiaagent.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '23 min/ep',
                'release_date' => '2004-02-03',
                'studio' => 'Madhouse',
                'genre' => 'Mystery, Psychological, Thriller',
                'synopsis' => 'A mysterious boy with a bat terrorizes Tokyo, linked to societal anxieties.'
            ],
            [
                'title' => 'Psycho-Pass',
                'japanese_title' => 'Saikopasu',
                'image' => 'image/anime/psychopass.jpg',
                'score' => 8.4,
                'status' => 'Completed',
                'total_episodes' => 22,
                'duration' => '23 min/ep',
                'release_date' => '2012-10-12',
                'studio' => 'Production I.G',
                'genre' => 'Sci-Fi, Crime, Psychological',
                'synopsis' => 'In a dystopian future, crime can be measured and controlled by the Sibyl System.'
            ],

            // === Q ===
            [
                'title' => 'Quanzhi Fashi',
                'japanese_title' => '全职法师',
                'image' => 'image/anime/quanzhi.jpg',
                'score' => 7.2,
                'status' => 'Ongoing',
                'total_episodes' => 60,
                'duration' => '24 min/ep',
                'release_date' => '2016-09-02',
                'studio' => 'Foch Film',
                'genre' => 'Action, Fantasy, Magic',
                'synopsis' => 'Mo Fan awakens to a world where magic replaces science and becomes a dual mage.'
            ],
            [
                'title' => 'Queen\'s Blade',
                'japanese_title' => 'Kuīnzu Bureido',
                'image' => 'image/anime/queensblade.jpg',
                'score' => 6.2,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 min/ep',
                'release_date' => '2009-04-02',
                'studio' => 'Arms',
                'genre' => 'Action, Ecchi, Fantasy',
                'synopsis' => 'Warriors fight in a tournament to determine the new queen.'
            ],
            // P
            [
                'title' => 'Paranoia Agent',
                'japanese_title' => '妄想代理人',
                'image' => 'images/paranoia_agent.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '23 min/ep',
                'release_date' => '2004-02-03',
                'studio' => 'Madhouse',
                'genre' => 'Mystery, Psychological, Thriller',
                'synopsis' => 'Tokyo is terrorized by Shounen Bat, a boy with a golden bat. Detective investigation uncovers hidden secrets.'
            ],
            [
                'title' => 'Psycho-Pass',
                'japanese_title' => 'サイコパス',
                'image' => 'images/psycho_pass.jpg',
                'score' => 8.3,
                'status' => 'Completed',
                'total_episodes' => 22,
                'duration' => '23 min/ep',
                'release_date' => '2012-10-12',
                'studio' => 'Production I.G',
                'genre' => 'Action, Police, Psychological, Sci-Fi',
                'synopsis' => 'In a future society governed by the Sibyl System, inspectors and enforcers manage crime before it happens.'
            ],

            // Q
            [
                'title' => 'Quanzhi Gaoshou (The King\'s Avatar)',
                'japanese_title' => '全职高手',
                'image' => 'images/king_avatar.jpg',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 12,
                'duration' => '24 min/ep',
                'release_date' => '2017-04-07',
                'studio' => 'G.CMay Animation',
                'genre' => 'Action, Game',
                'synopsis' => 'Top-tier pro gamer Ye Xiu is forced to retire but finds his way back to the game with a new identity.'
            ],

            // R
            [
                'title' => 'Re:Zero - Starting Life in Another World',
                'japanese_title' => 'Re：ゼロから始める異世界生活',
                'image' => 'images/rezero.jpg',
                'score' => 8.2,
                'status' => 'Ongoing',
                'total_episodes' => 25,
                'duration' => '25 min/ep',
                'release_date' => '2016-04-04',
                'studio' => 'White Fox',
                'genre' => 'Drama, Fantasy, Suspense',
                'synopsis' => 'Subaru is transported to another world where he discovers he has the ability to rewind time upon death.'
            ],
            [
                'title' => 'Rurouni Kenshin',
                'japanese_title' => 'るろうに剣心',
                'image' => 'images/rurouni_kenshin.jpg',
                'score' => 8.1,
                'status' => 'Completed',
                'total_episodes' => 94,
                'duration' => '25 min/ep',
                'release_date' => '1996-01-10',
                'studio' => 'Studio Gallop',
                'genre' => 'Action, Historical, Samurai',
                'synopsis' => 'A wandering swordsman seeks peace after his past as an assassin, but violence follows him wherever he goes.'
            ],

            // S
            [
                'title' => 'Steins;Gate',
                'japanese_title' => 'シュタインズ・ゲート',
                'image' => 'images/steins_gate.jpg',
                'score' => 9.1,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 min/ep',
                'release_date' => '2011-04-06',
                'studio' => 'White Fox',
                'genre' => 'Sci-Fi, Thriller',
                'synopsis' => 'A self-proclaimed mad scientist accidentally invents a way to send messages to the past, altering reality.'
            ],
            [
                'title' => 'Samurai Champloo',
                'japanese_title' => 'サムライチャンプルー',
                'image' => 'images/samurai_champloo.jpg',
                'score' => 8.5,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 min/ep',
                'release_date' => '2004-05-20',
                'studio' => 'Manglobe',
                'genre' => 'Action, Adventure, Samurai',
                'synopsis' => 'Two samurai and a young girl journey through Edo Japan, mixing hip-hop culture with sword fights.'
            ],

            // T
            [
                'title' => 'Tokyo Ghoul',
                'japanese_title' => '東京喰種トーキョーグール',
                'image' => 'images/tokyo_ghoul.jpg',
                'score' => 7.9,
                'status' => 'Completed',
                'total_episodes' => 12,
                'duration' => '24 min/ep',
                'release_date' => '2014-07-04',
                'studio' => 'Studio Pierrot',
                'genre' => 'Action, Drama, Horror, Supernatural',
                'synopsis' => 'Kaneki, a normal college student, becomes half-ghoul after a fatal encounter, struggling to survive in both worlds.'
            ],
            [
                'title' => 'Toradora!',
                'japanese_title' => 'とらドラ！',
                'image' => 'images/toradora.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 25,
                'duration' => '24 min/ep',
                'release_date' => '2008-10-02',
                'studio' => 'J.C.Staff',
                'genre' => 'Comedy, Romance, School',
                'synopsis' => 'Ryuji and Taiga form an unlikely friendship to help each other confess to their crushes, leading to unexpected romance.'
            ],

            // U
            [
                'title' => 'Usagi Drop',
                'japanese_title' => 'うさぎドロップ',
                'image' => 'images/usagi_drop.jpg',
                'score' => 8.4,
                'status' => 'Completed',
                'total_episodes' => 11,
                'duration' => '22 min/ep',
                'release_date' => '2011-07-08',
                'studio' => 'Production I.G',
                'genre' => 'Slice of Life, Josei',
                'synopsis' => 'A 30-year-old man takes in a young girl, raising her despite having no parenting experience.'
            ],

            // V
            [
                'title' => 'Vivy: Fluorite Eye’s Song',
                'japanese_title' => 'ヴィヴィ -フローライトアイズソング-',
                'image' => 'images/vivy.jpg',
                'score' => 8.6,
                'status' => 'Completed',
                'total_episodes' => 13,
                'duration' => '23 min/ep',
                'release_date' => '2021-04-03',
                'studio' => 'Wit Studio',
                'genre' => 'Action, Music, Sci-Fi',
                'synopsis' => 'An AI songstress is tasked with preventing a future war between humans and AI over the course of 100 years.'
            ],

            // W
            [
                'title' => 'Wolf’s Rain',
                'japanese_title' => 'ウルフズレイン',
                'image' => 'images/wolfs_rain.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 26,
                'duration' => '24 min/ep',
                'release_date' => '2003-01-07',
                'studio' => 'Bones',
                'genre' => 'Action, Drama, Fantasy',
                'synopsis' => 'Wolves, thought extinct, live disguised as humans while searching for Paradise in a dying world.'
            ],

            // X
            [
                'title' => 'X/1999',
                'japanese_title' => 'エックス',
                'image' => 'images/x1999.jpg',
                'score' => 7.5,
                'status' => 'Completed',
                'total_episodes' => 24,
                'duration' => '24 min/ep',
                'release_date' => '2001-10-03',
                'studio' => 'Madhouse',
                'genre' => 'Action, Drama, Supernatural',
                'synopsis' => 'Kamui Shirou must decide the fate of humanity as he is drawn into a battle between two opposing forces.'
            ],

            // Y
            [
                'title' => 'Your Lie in April',
                'japanese_title' => '四月は君の嘘',
                'image' => 'images/your_lie_in_april.jpg',
                'score' => 8.7,
                'status' => 'Completed',
                'total_episodes' => 22,
                'duration' => '22 min/ep',
                'release_date' => '2014-10-10',
                'studio' => 'A-1 Pictures',
                'genre' => 'Drama, Music, Romance',
                'synopsis' => 'A piano prodigy who lost his ability to hear music meets a violinist who changes his life forever.'
            ],

            // Z
            [
                'title' => 'Zankyou no Terror (Terror in Resonance)',
                'japanese_title' => '残響のテロル',
                'image' => 'images/zankyou_no_terror.jpg',
                'score' => 8.0,
                'status' => 'Completed',
                'total_episodes' => 11,
                'duration' => '22 min/ep',
                'release_date' => '2014-07-10',
                'studio' => 'MAPPA',
                'genre' => 'Mystery, Psychological, Thriller',
                'synopsis' => 'Two teenage terrorists challenge the Japanese police with cryptic puzzles, hiding a deeper truth.'
            ],
            [
                'title' => 'Zoids: Chaotic Century',
                'japanese_title' => 'ゾイド -ZOIDS-',
                'image' => 'images/zoids.jpg',
                'score' => 7.3,
                'status' => 'Completed',
                'total_episodes' => 67,
                'duration' => '24 min/ep',
                'release_date' => '1999-04-10',
                'studio' => 'Xebec',
                'genre' => 'Action, Adventure, Mecha',
                'synopsis' => 'Young Van and friends pilot giant mechanical animals called Zoids in battles across a war-torn planet.'
            ],
        ];



         // kosongkan tabel dulu
        DB::table('animes')->truncate();



        foreach ($animes as $anime) {
            Anime::create($anime);
        }



    }
}
