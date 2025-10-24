<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Trailer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminTrailerController extends Controller
{
    public function index(): View
    {
        $trailers = Trailer::with('anime')->latest()->paginate(12);

        return view('admin.trailers.index', compact('trailers'));
    }

    public function create(): View
    {
        $animes = Anime::orderBy('title')->get(['id', 'title']);

        return view('admin.trailers.create', compact('animes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        Trailer::create($data);

        return redirect()->route('admin.trailers.index')->with('status', 'Trailer berhasil ditambahkan.');
    }

    public function edit(Trailer $trailer): View
    {
        $animes = Anime::orderBy('title')->get(['id', 'title']);

        return view('admin.trailers.edit', compact('trailer', 'animes'));
    }

    public function update(Request $request, Trailer $trailer): RedirectResponse
    {
        $data = $this->validateData($request, $trailer);

        $trailer->update($data);

        return redirect()->route('admin.trailers.index')->with('status', 'Trailer berhasil diperbarui.');
    }

    public function destroy(Trailer $trailer): RedirectResponse
    {
        $trailer->delete();

        return redirect()->route('admin.trailers.index')->with('status', 'Trailer berhasil dihapus.');
    }

    private function validateData(Request $request, ?Trailer $trailer = null): array
    {
        return $request->validate([
            'anime_id' => [
                'required',
                'exists:animes,id',
                Rule::unique('trailers', 'anime_id')->ignore($trailer?->id),
            ],
            'youtube_url' => ['required', 'url', 'max:255'],
        ]);
    }
}
