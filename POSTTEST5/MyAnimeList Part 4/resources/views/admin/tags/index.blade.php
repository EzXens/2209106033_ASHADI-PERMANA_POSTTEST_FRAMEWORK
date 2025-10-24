@extends('admin.layouts.app')

@section('admin-content')
  <div class="flex flex-col gap-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="text-2xl font-semibold text-slate-700 dark:text-cyan-100">Manajemen Tag</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">Kelompokkan anime berdasarkan tag yang relevan.</p>
      </div>
      <a href="{{ route('admin.tags.create') }}" class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/40">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor">
          <path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6z" />
        </svg>
        Tambah Tag
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
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Nama Tag</th>
            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Jumlah Anime</th>
            <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-950/40">
          @forelse ($tags as $tag)
            <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-900/70">
              <td class="px-5 py-4 font-semibold text-slate-700 dark:text-cyan-100">{{ $tag->name }}</td>
              <td class="px-5 py-4 text-slate-500 dark:text-slate-300">{{ $tag->animes_count }}</td>
              <td class="px-5 py-4">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('admin.tags.edit', $tag) }}" class="rounded-2xl border border-rose-200 bg-white px-4 py-2 text-xs font-semibold text-rose-500 shadow-sm transition hover:bg-rose-50 dark:border-rose-500/40 dark:bg-slate-900/70 dark:text-rose-300">Edit</a>
                  <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" onsubmit="return confirm('Hapus tag ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-2xl bg-rose-500 px-4 py-2 text-xs font-semibold text-white shadow-sm hover:bg-rose-600">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-5 py-10 text-center text-slate-500 dark:text-slate-400">Belum ada data tag.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{ $tags->links() }}
  </div>
@endsection
