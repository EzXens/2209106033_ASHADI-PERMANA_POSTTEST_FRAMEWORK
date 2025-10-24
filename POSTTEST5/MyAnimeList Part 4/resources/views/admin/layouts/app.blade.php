@extends('layouts.app')

@section('content_profile')
  @php
    $user = auth()->user();
    $defaultAvatarSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96"><defs><linearGradient id="grad" x1="0" x2="1" y1="0" y2="1"><stop offset="0" stop-color="%23f43f5e"/><stop offset="1" stop-color="%23ec4899"/></linearGradient></defs><rect width="96" height="96" rx="28" fill="url(%23grad)"/><path fill="rgba(255,255,255,0.85)" d="M48 18a20 20 0 1 1 0 40 20 20 0 0 1 0-40zm0 46c17.12 0 31 9.62 31 21.5V88H17v-2.5C17 73.62 30.88 64 48 64z"/></svg>';
    $avatarUrl = $user?->avatar_path ? \Illuminate\Support\Facades\Storage::url($user->avatar_path) : 'data:image/svg+xml;utf8,' . rawurlencode($defaultAvatarSvg);
  @endphp

  <div class="flex min-h-screen gap-6 bg-white px-4 py-6 dark:bg-slate-950" data-animate="fade-up">
    <aside class="w-80 flex-shrink-0 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-200/60 dark:border-slate-800 dark:bg-slate-950/70 dark:shadow-cyan-500/20">
      <div class="relative">
        <div class="h-40 w-full bg-gradient-to-br from-rose-400 via-fuchsia-500 to-sky-500 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900"></div>
        <div class="absolute inset-x-0 -bottom-12 flex justify-center">
          <div class="h-24 w-24 overflow-hidden rounded-3xl border-4 border-white/80 shadow-lg">
            <img src="{{ $avatarUrl }}" alt="Avatar admin" class="h-full w-full object-cover" />
          </div>
        </div>
      </div>

      <div class="px-6 pt-16 pb-6 text-center">
        <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">{{ $user?->name ?? 'Administrator' }}</h2>
        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Panel Kontrol</p>
      </div>

      @php
        $navItems = [
            ['label' => 'Dashboard', 'icon' => 'M3 12c0-4.97 4.03-9 9-9h0c4.97 0 9 4.03 9 9v9h-6v-9c0-1.66-1.34-3-3-3h0c-1.66 0-3 1.34-3 3v9H3z', 'route' => 'admin.dashboard'],
            ['label' => 'Kelola Anime', 'icon' => 'M4 6h16v2H4zm2 5h12v2H6zm3 5h10v2H9z', 'route' => 'admin.animes.index'],
            ['label' => 'Kelola Tag', 'icon' => 'M5 5h14v6H5zm0 8h14v6H5z', 'route' => 'admin.tags.index'],
            ['label' => 'Kelola Sumber', 'icon' => 'M4 4h16v4H4zm2 6h12v10H6z', 'route' => 'admin.sources.index'],
            ['label' => 'Kelola Trailer', 'icon' => 'M8 5l10 7-10 7z', 'route' => 'admin.trailers.index'],
        ];
      @endphp

      <nav class="flex flex-col gap-2 px-4 pb-6">
        @foreach ($navItems as $item)
          @php $active = request()->routeIs($item['route'] . '*'); @endphp
          <a href="{{ route($item['route']) }}"
            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition {{ $active ? 'bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 text-white shadow-lg' : 'text-slate-600 hover:bg-slate-100 hover:text-rose-500 dark:text-slate-200 dark:hover:bg-slate-900/60' }}">
            <span class="flex h-9 w-9 items-center justify-center rounded-2xl {{ $active ? 'bg-white/20 text-white' : 'bg-white text-rose-500 shadow-sm dark:bg-slate-800/70 dark:text-cyan-200' }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="{{ $item['icon'] }}" />
              </svg>
            </span>
            {{ $item['label'] }}
          </a>
        @endforeach

        <form method="POST" action="{{ route('admin.logout') }}" class="pt-3">
          @csrf
          <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-2xl border border-rose-200 bg-white px-4 py-3 text-sm font-semibold text-rose-500 shadow-sm transition hover:bg-rose-50 dark:border-rose-500/40 dark:bg-slate-950/70 dark:text-rose-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor">
              <path d="M5 4a2 2 0 00-2 2v12a2 2 0 002 2h7v-2H5V6h7V4zm7 6v4h2v-4h3l-4-4-4 4z" />
            </svg>
            Keluar
          </button>
        </form>
      </nav>
    </aside>

    <main class="flex-1">
      <div class="min-h-full rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 transition dark:border-slate-800 dark:bg-slate-950/70 dark:shadow-cyan-500/20 sm:p-10">
        @yield('admin-content')
      </div>
    </main>
  </div>
@endsection
