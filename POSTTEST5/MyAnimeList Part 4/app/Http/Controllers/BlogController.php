<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // bisa arahkan ke animelist atau halaman lain
        return view('blog.index');
    }

    public function animelist(Request $request)
    {
        $animes = Anime::orderBy('title')->get();

    // Group berdasarkan huruf pertama
    $grouped = $animes->groupBy(function ($item) {
        return strtoupper(substr($item->title, 0, 1));
    });

    return view('blog.animelist', compact('grouped'));
    }

    public function show($id)
{
    $anime = Anime::with(['tags', 'source'])->findOrFail($id);
    return view('blog.show', compact('anime'));
}

    public function about()
    {
        $pillars = [
            [
                'title' => 'Visi',
                'description' => 'Menjadi ruang inspirasi bagi wibu Nusantara dengan kurasi anime dan pengalaman interaktif yang memanjakan mata.',
                'icon' => 'M12 2l3 7h7l-5.5 4.5L18 21l-6-3.8L6 21l1.5-7.5L2 9h7z',
                'gradient' => 'from-sky-400 via-sky-500 to-sky-600',
            ],
            [
                'title' => 'Misi',
                'description' => 'Menghadirkan daftar anime yang relevan, ulasan singkat yang hangat, serta fitur komunitas dinamis untuk berbagi rekomendasi.',
                'icon' => 'M12 8c1.66 0 3-1.34 3-3S13.66 2 12 2 9 3.34 9 5s1.34 3 3 3zm0 2c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z',
                'gradient' => 'from-violet-400 via-violet-500 to-violet-600',
            ],
            [
                'title' => 'Nilai',
                'description' => 'Kreativitas, komunitas, dan kenyamanan visual menjadi fondasi setiap komponen UI yang kami hadirkan.',
                'icon' => 'M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2v2H5a2 2 0 00-2 2v2a2 2 0 002 2h2v2h2v-2h2v2h2v-2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2v-2h2a2 2 0 002-2V5a2 2 0 00-2-2h-2V1h-2v2h-2V1H7v2H5z',
                'gradient' => 'from-rose-400 via-rose-500 to-rose-600',
            ],
        ];

        $milestones = [
            [
                'year' => '2022',
                'title' => 'Mulai dari Sketsa',
                'description' => 'AnimeList ~ My dimulai sebagai eksperimen UI kecil dengan fokus pada tipografi dan palet langit.',
            ],
            [
                'year' => '2023',
                'title' => 'Bergerak Dinamis',
                'description' => 'Menambahkan animasi interaktif pada kartu anime dan memperkenalkan sistem pencarian cepat.',
            ],
            [
                'year' => '2024',
                'title' => 'Komunitas Terhubung',
                'description' => 'Merilis fitur rekomendasi komunitas dengan integrasi tag dan filter warna-warni.',
            ],
        ];

        $team = [
            [
                'name' => 'Aiko Narumi',
                'role' => 'Kurator Konten',
                'bio' => 'Memastikan rekomendasi anime selalu up-to-date dengan nuansa emosional yang tepat.',
            ],
            [
                'name' => 'Ryo Kawahara',
                'role' => 'Desainer Interaksi',
                'bio' => 'Menciptakan transisi lembut dan pengalaman visual yang menenangkan mata.',
            ],
            [
                'name' => 'Mika Tan',
                'role' => 'Community Gardener',
                'bio' => 'Menjaga percakapan tetap hangat dan membantu pengguna menemukan sahabat nonton.',
            ],
        ];

        return view('blog.about', compact('pillars', 'milestones', 'team'));
    }

    public function contact()
    {
        $channels = [
            [
                'title' => 'Email Dukungan',
                'subtitle' => 'support@animelist.my',
                'description' => 'Hubungi kami untuk bantuan teknis, masukan fitur, atau sekadar berbagi anime favorit.',
                'icon' => 'M4 4h16v2H4zm0 4h16v12H4zm4 4v2h8v-2z',
            ],
            [
                'title' => 'Komunitas Discord',
                'subtitle' => 'discord.gg/animelistmy',
                'description' => 'Temui wibu lain, ikuti watch party mingguan, dan dapatkan perbaruan langsung.',
                'icon' => 'M20 0H4a4 4 0 00-4 4v12a4 4 0 004 4h12l-1-3 3 3a4 4 0 004-4V4a4 4 0 00-4-4z',
            ],
            [
                'title' => 'Collab & Media',
                'subtitle' => 'press@animelist.my',
                'description' => 'Buka peluang kampanye kreatif, sponsorship konten, atau liputan khusus.',
                'icon' => 'M12 1a9 9 0 100 18 9 9 0 000-18zm0 3a6 6 0 013.83 10.59L6.41 6.17A6 6 0 0112 4zm-6 6a6 6 0 0110.59-3.83L6.17 15.59A5.98 5.98 0 016 10z',
            ],
        ];

        $faq = [
            [
                'question' => 'Apakah kami bisa merekomendasikan anime?',
                'answer' => 'Tentu! Kirimkan rekomendasi melalui form atau Discord. Tim kurator akan meninjau dan menambahkannya ke daftar komunitas.',
            ],
            [
                'question' => 'Bisakah saya berkontribusi sebagai penulis ulasan?',
                'answer' => 'Kami membuka peluang kontributor secara berkala. Tinggalkan pesan singkat tentang pengalaman Anda di dunia anime, dan kami akan menghubungi kembali.',
            ],
            [
                'question' => 'Apakah ada newsletter mingguan?',
                'answer' => 'Ya! Centang opsi newsletter di form kontak dan Anda akan menerima sorotan anime terbaru langsung via email.',
            ],
        ];

        return view('blog.contact', compact('channels', 'faq'));
    }

}
