<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Source;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminAnimeController extends Controller
{
    public function index(): View
    {
        $animes = Anime::with(['source', 'tags'])->latest()->paginate(10);

        return view('admin.animes.index', compact('animes'));
    }

    public function create(): View
    {
        $tags = Tag::orderBy('name')->get();
        $sources = Source::orderBy('name')->get();

        return view('admin.animes.create', compact('tags', 'sources'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateData($request);
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);
        unset($validated['image_file']);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('animes', 'public');
            $validated['image'] = $path;
        }

        $anime = Anime::create($validated);
        $anime->tags()->sync($tags);

        return redirect()->route('admin.animes.index')->with('status', 'Anime berhasil ditambahkan.');
    }

    public function edit(Anime $anime): View
    {
        $anime->load('tags');
        $tags = Tag::orderBy('name')->get();
        $sources = Source::orderBy('name')->get();

        return view('admin.animes.edit', compact('anime', 'tags', 'sources'));
    }

    public function update(Request $request, Anime $anime): RedirectResponse
    {
        $validated = $this->validateData($request);
        $tags = $validated['tags'] ?? [];
        unset($validated['tags']);
        unset($validated['image_file']);

        if ($request->hasFile('image_file')) {
            if ($anime->image && !Str::startsWith($anime->image, ['http://', 'https://'])) {
                Storage::disk('public')->delete($anime->image);
            }

            $path = $request->file('image_file')->store('animes', 'public');
            $validated['image'] = $path;
        }

        $anime->update($validated);
        $anime->tags()->sync($tags);

        return redirect()->route('admin.animes.index')->with('status', 'Anime berhasil diperbarui.');
    }

    public function destroy(Anime $anime): RedirectResponse
    {
        if ($anime->image && !Str::startsWith($anime->image, ['http://', 'https://'])) {
            Storage::disk('public')->delete($anime->image);
        }

        $anime->delete();

        return redirect()->route('admin.animes.index')->with('status', 'Anime berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'japanese_title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:2048'],
            'streaming_url' => ['nullable', 'url', 'max:255'],
            'score' => ['nullable', 'numeric', 'between:0,10'],
            'status' => ['required', 'in:Ongoing,Completed,Upcoming'],
            'total_episodes' => ['nullable', 'integer', 'min:0'],
            'duration' => ['nullable', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
            'studio' => ['nullable', 'string', 'max:255'],
            'genre' => ['nullable', 'string', 'max:255'],
            'synopsis' => ['nullable', 'string'],
            'source_id' => ['nullable', 'exists:sources,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);
    }
}
