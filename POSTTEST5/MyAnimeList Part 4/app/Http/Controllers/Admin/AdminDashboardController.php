<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Trailer;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'animes' => Anime::count(),
            'tags' => Tag::count(),
            'sources' => Source::count(),
            'trailers' => Trailer::count(),
        ];

        $latestAnimes = Anime::latest()->limit(5)->get(['id', 'title', 'status', 'score', 'created_at']);

        return view('admin.dashboard.index', compact('stats', 'latestAnimes'));
    }
}
