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

}
