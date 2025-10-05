<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class HomeController extends Controller
{
    public function index()
    {
        $fallAnimes = Anime::where('status', 'Upcoming')->get();

        $popularAnimes = Anime::whereIn('status', ['Ongoing', 'Completed'])
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();

        return view('blog.index', compact('fallAnimes', 'popularAnimes'));

    }
}
