@extends('layouts.app')

@section('content_animelist')
{{-- <div class="p-6 text-white">
  <h1 class="text-3xl font-bold text-sky-400 mb-4">Anime List</h1>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($animes as $anime)
      <a href="{{ route('blog.show', $anime->id) }}" class="block bg-gray-800 rounded-lg shadow hover:scale-105 transition">
        <img src="{{ asset($anime->image) }}" class="w-full h-60 object-cover rounded-t-lg">
        <div class="p-3">
          <h2 class="text-lg font-bold">{{ $anime->title }}</h2>
          <p class="text-sm text-gray-400">{{ $anime->genre }}</p>
        </div>
      </a>
    @endforeach
  </div>
</div> --}}

<div class="space-y-12">
  <header class="glass-panel px-6 py-8" data-animate="fade-up">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div class="space-y-3">
        <h1 class="text-3xl font-bold text-sky-600 drop-shadow-sm">
          Anime List
          <span class="ml-3 rounded-full bg-gradient-to-r from-sky-500/15 via-violet-500/20 to-rose-400/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-sky-600">Interactive Library</span>
        </h1>
        <p class="max-w-xl text-sm textsub transition-colors duration-500">Navigasi koleksi animemu berdasarkan huruf abjad dengan tampilan kartu yang dinamis.</p>
      </div>
      <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-widest text-sky-600">
        <span class="stat-badge">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m4-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Updated Library
        </span>
        <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1 textsub transition-colors duration-500">
          <span class="h-1.5 w-1.5 rounded-full bg-rose-400 animate-pulse"></span>
          26 Collections
        </span>
      </div>
    </div>

    {{-- Filter Huruf A-Z --}}
    <div class="mt-6 flex flex-wrap gap-3" data-animate="slide-in">
      @foreach (range('A', 'Z') as $letter)
          <a href="#{{ $letter }}"
             class="spotlight-card relative flex h-10 w-10 items-center justify-center rounded-full border border-sky-200 bg-gradient-to-br from-white via-sky-50 to-cyan-50 text-sm font-semibold text-sky-600 shadow-sm hover:-translate-y-1">
             {{ $letter }}
          </a>
      @endforeach
    </div>
  </header>

  {{-- List Anime berdasarkan group huruf --}}
  @foreach ($grouped as $letter => $items)
    <section id="{{ $letter }}" class="space-y-5">
      <div class="flex flex-wrap items-center gap-4">
        <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 via-cyan-500 to-violet-500 text-2xl font-bold text-white shadow-lg shadow-sky-200/70">{{ $letter }}</span>
        <div class="h-px flex-1 bg-gradient-to-r from-sky-500/80 via-violet-400/60 to-rose-300/40"></div>
        <span class="rounded-full bg-white/70 px-3 py-1 text-xs font-semibold textlabel transition-colors duration-500">{{ count($items) }} Titles</span>
      </div>

      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
        @foreach($items as $index => $anime)
          @php
              $statusColor = match(strtolower($anime->status)) {
                  'completed' => 'bg-emerald-500/90',
                  'ongoing'   => 'bg-amber-400/90',
                  'upcoming'  => 'bg-rose-500/90',
                  default     => 'bg-slate-500/90',
              };
          @endphp

          <a href="{{ route('blog.show', $anime->id) }}" class="spotlight-card">
            <div class="spotlight-image h-75 w-auto">
              @php
                  $imageUrl = $anime->image
                      ? (\Illuminate\Support\Str::startsWith($anime->image, ['http://', 'https://'])
                          ? $anime->image
                          : \Illuminate\Support\Facades\Storage::url($anime->image))
                      : asset('image/default.jpg');
              @endphp
              <img src="{{ $imageUrl }}" class="h-full w-full object-fill" loading="lazy">
              <span class="absolute right-3 top-3 rounded-full px-3 py-1 text-xs font-semibold text-white shadow-md {{ $statusColor }}">
                {{ ucfirst($anime->status ?? 'Unknown') }}
              </span>
            </div>
            <div class="mt-4 space-y-1">
              <h2 class="text-lg font-semibold textsub2 transition-colors duration-500">{{ $anime->title }}</h2>
              <p class="text-sm font-medium text-sky-600">{{ $anime->genre }}</p>
              <p class="text-xs textlabel transition-colors duration-500">Total Episode: <span class="font-semibold textsub2 transition-colors duration-500">{{ $anime->total_episodes ?? '-' }}</span></p>
              <p class="text-xs textlabel transition-colors duration-500">Skor: <span class="font-semibold text-amber-500">{{ $anime->score ?? '-' }}</span> ⭐</p>
            </div>
          </a>
        @endforeach
      </div>
    </section>
  @endforeach
</div>

@endsection
