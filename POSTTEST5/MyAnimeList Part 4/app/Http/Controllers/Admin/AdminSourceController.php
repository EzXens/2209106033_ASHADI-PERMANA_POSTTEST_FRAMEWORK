<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminSourceController extends Controller
{
    public function index(): View
    {
        $sources = Source::withCount('animes')->orderBy('name')->paginate(12);

        return view('admin.sources.index', compact('sources'));
    }

    public function create(): View
    {
        return view('admin.sources.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:sources,name'],
        ]);

        Source::create($data);

        return redirect()->route('admin.sources.index')->with('status', 'Sumber berhasil ditambahkan.');
    }

    public function edit(Source $source): View
    {
        return view('admin.sources.edit', compact('source'));
    }

    public function update(Request $request, Source $source): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('sources', 'name')->ignore($source->id)],
        ]);

        $source->update($data);

        return redirect()->route('admin.sources.index')->with('status', 'Sumber berhasil diperbarui.');
    }

    public function destroy(Source $source): RedirectResponse
    {
        $source->delete();

        return redirect()->route('admin.sources.index')->with('status', 'Sumber berhasil dihapus.');
    }
}
