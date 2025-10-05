<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Tag;

class AnimeSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([]);
        }

        // Cari anime berdasarkan title atau japanese_title
        $animeResults = Anime::query()
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('japanese_title', 'LIKE', "%{$query}%")
            ->take(10)
            ->get(['id', 'title', 'japanese_title', 'image']);

        // Cari tag yang mirip dengan query
        $tagResults = Tag::where('name', 'LIKE', "%{$query}%")
            ->take(5)
            ->pluck('name'); // hanya ambil nama tag

        return response()->json([
            'animes' => $animeResults,
            'tags' => $tagResults
        ]);
    }

    // Endpoint tambahan untuk filter by tag
    public function filterByTag(Request $request)
    {
        $tag = $request->input('tag');
        if (!$tag) {
            return response()->json([]);
        }

        $results = Anime::whereHas('tags', function ($q) use ($tag) {
            $q->where('name', $tag);
        })->take(10)->get(['id', 'title', 'japanese_title', 'image']);

        return response()->json($results);
    }
}
