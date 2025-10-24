<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminTagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::withCount('animes')->orderBy('name')->paginate(12);

        return view('admin.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tags.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:tags,name'],
        ]);

        Tag::create($data);

        return redirect()->route('admin.tags.index')->with('status', 'Tag berhasil ditambahkan.');
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('tags', 'name')->ignore($tag->id)],
        ]);

        $tag->update($data);

        return redirect()->route('admin.tags.index')->with('status', 'Tag berhasil diperbarui.');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('status', 'Tag berhasil dihapus.');
    }
}
