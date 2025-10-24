@extends('admin.layouts.app')

@section('admin-content')
  <div class="flex flex-col gap-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="text-2xl font-semibold text-slate-700 dark:text-cyan-100">Manajemen Anime</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">Kelola daftar anime beserta tag, status, dan sumbernya.</p>
      </div>
      <a href="{{ route('admin.animes.create') }}" class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/40">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor">
          <path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6z" />
        </svg>
        Tambah Anime
      </a>
    </div>

    @if (session('status'))
      <div class="rounded-3xl border border-emerald-300 bg-emerald-50/80 px-4 py-3 text-sm text-emerald-600 dark:border-emerald-400/40 dark:bg-emerald-500/15 dark:text-emerald-200">
        {{ session('status') }}
      </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
      <table class="min-w-full divide-y divide-slate-200 text-sm dark:divide-slate-700">
        <thead class="bg-slate-100 dark:bg-slate-900">
          <tr>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Anime</th>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Status</th>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Skor</th>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Sumber</th>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Tag</th>
            <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-950/40">
          @forelse ($animes as $anime)
            <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-900/70">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  @if ($anime->image)
                    @php
                      $imageUrl = \Illuminate\Support\Str::startsWith($anime->image, ['http://', 'https://'])
                        ? $anime->image
                        : \Illuminate\Support\Facades\Storage::url($anime->image);
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $anime->title }}" class="h-14 w-10 rounded-lg object-cover shadow-sm" />
                  @else
                    <div class="flex h-14 w-10 items-center justify-center rounded-lg bg-slate-100 text-xs font-semibold text-slate-400 dark:bg-slate-800/60 dark:text-slate-500">N/A</div>
                  @endif
                  <div>
                    <div class="font-semibold text-slate-700 dark:text-cyan-100">{{ $anime->title }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">{{ $anime->japanese_title }}</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-xl bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-800/80 dark:text-slate-200">{{ $anime->status }}</span>
              </td>
              <td class="px-5 py-4 text-slate-700 dark:text-cyan-100">{{ $anime->score ?? '—' }}</td>
              <td class="px-5 py-4 text-slate-500 dark:text-slate-300">{{ $anime->source?->name ?? '—' }}</td>
              <td class="px-5 py-4">
                <div class="flex flex-wrap gap-2">
                  @foreach ($anime->tags as $tag)
                    <span class="rounded-xl bg-rose-500/10 px-3 py-1 text-xs font-semibold text-rose-500">{{ $tag->name }}</span>
                  @endforeach
                  @if ($anime->tags->isEmpty())
                    <span class="text-xs text-slate-400 dark:text-slate-500">Tidak ada tag</span>
                  @endif
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('admin.animes.edit', $anime) }}" class="rounded-2xl border border-rose-200 bg-white px-4 py-2 text-xs font-semibold text-rose-500 shadow-sm transition hover:bg-rose-50 dark:border-rose-400/40 dark:bg-slate-900/70 dark:text-rose-300">Edit</a>
                  <form method="POST" action="{{ route('admin.animes.destroy', $anime) }}" onsubmit="return confirm('Hapus anime ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-2xl bg-rose-500 px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-rose-600">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-5 py-10 text-center text-slate-500 dark:text-slate-400">Belum ada data anime.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $animes->links() }}
  </div>
@endsection
