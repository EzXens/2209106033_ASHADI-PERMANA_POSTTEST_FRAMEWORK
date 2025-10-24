@extends('admin.layouts.app')

@section('admin-content')
  <div class="flex flex-col gap-8">
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500 dark:text-slate-400">Admin Panel</p>
        <h1 class="mt-2 text-3xl font-semibold text-slate-700 dark:text-cyan-100">Dashboard Utama</h1>
        <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">Pantau statistik terbaru dan kelola semua konten anime dalam satu tempat.</p>
      </div>

      <a href="{{ route('admin.animes.create') }}" class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-400/40 transition hover:scale-[1.01]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor">
          <path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6z" />
        </svg>
        Tambah Anime
      </a>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
      @php
        $statCards = [
            ['label' => 'Total Anime', 'value' => number_format($stats['animes']), 'gradient' => 'from-rose-500 via-pink-500 to-amber-400'],
            ['label' => 'Total Tag', 'value' => number_format($stats['tags']), 'gradient' => 'from-sky-500 via-cyan-500 to-emerald-400'],
            ['label' => 'Total Sumber', 'value' => number_format($stats['sources']), 'gradient' => 'from-violet-500 via-purple-500 to-fuchsia-500'],
            ['label' => 'Total Trailer', 'value' => number_format($stats['trailers']), 'gradient' => 'from-amber-500 via-orange-500 to-rose-500'],
        ];
      @endphp

      @foreach ($statCards as $card)
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-md shadow-sky-100/40 dark:border-slate-700 dark:bg-slate-900/80">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 dark:text-slate-500">{{ $card['label'] }}</p>
              <p class="mt-3 text-3xl font-semibold text-slate-700 dark:text-cyan-100">{{ $card['value'] }}</p>
            </div>
            <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br {{ $card['gradient'] }} text-white shadow-inner shadow-white/40 dark:shadow-black/30"></span>
          </div>
        </div>
      @endforeach
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
      <div class="lg:col-span-2">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">Anime Terbaru</h2>
            <a href="{{ route('admin.animes.index') }}" class="text-sm font-semibold text-rose-500 hover:text-rose-600">Lihat Semua</a>
          </div>
          <div class="mt-5 overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700">
            <table class="min-w-full divide-y divide-slate-200 text-sm dark:divide-slate-700">
              <thead class="bg-slate-100 dark:bg-slate-800">
                <tr>
                  <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Judul</th>
                  <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Status</th>
                  <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Skor</th>
                  <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Ditambahkan</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-200 bg-white dark:divide-slate-700 dark:bg-slate-900/70">
                @forelse ($latestAnimes as $anime)
                  <tr class="transition hover:bg-slate-50 dark:hover:bg-slate-800/60">
                    <td class="px-5 py-3 font-medium text-slate-700 dark:text-cyan-100">{{ $anime->title }}</td>
                    <td class="px-5 py-3">
                      <span class="inline-flex items-center rounded-xl bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 dark:bg-slate-800/80 dark:text-slate-200">{{ $anime->status }}</span>
                    </td>
                    <td class="px-5 py-3 text-slate-700 dark:text-cyan-100">{{ $anime->score ?? '—' }}</td>
                    <td class="px-5 py-3 text-slate-500 dark:text-slate-400">{{ optional($anime->created_at)->format('d M Y') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="px-5 py-6 text-center text-slate-500 dark:text-slate-400">Belum ada data anime.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="flex flex-col gap-4">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 text-slate-700 shadow-sm dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">
          <h2 class="text-lg font-semibold">Ringkasan Aksi</h2>
          <ul class="mt-4 space-y-3 text-sm text-slate-500 dark:text-slate-300">
            <li class="flex items-center justify-between">
              <span>Kelola daftar anime</span>
              <a href="{{ route('admin.animes.index') }}" class="text-rose-500">Buka</a>
            </li>
            <li class="flex items-center justify-between">
              <span>Susun tag anime</span>
              <a href="{{ route('admin.tags.index') }}" class="text-rose-500">Buka</a>
            </li>
            <li class="flex items-center justify-between">
              <span>Kelola sumber cerita</span>
              <a href="{{ route('admin.sources.index') }}" class="text-rose-500">Buka</a>
            </li>
            <li class="flex items-center justify-between">
              <span>Perbarui tautan trailer</span>
              <a href="{{ route('admin.trailers.index') }}" class="text-rose-500">Buka</a>
            </li>
          </ul>
        </div>

        <div class="rounded-3xl border border-rose-200 bg-rose-50 p-6 text-sm text-rose-600 shadow-sm dark:border-rose-500/30 dark:bg-rose-500/10 dark:text-rose-200">
          <h2 class="text-base font-semibold">Tips</h2>
          <p class="mt-2 leading-relaxed">Gunakan tombol "Tambah Anime" untuk memasukkan anime baru lengkap dengan tag, sumber, dan trailer agar konten tetap terkurasi.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
