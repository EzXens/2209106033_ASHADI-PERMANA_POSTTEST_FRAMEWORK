@extends('layouts.app')


@section('carousel')
 <div class="relative w-full h-[500px] overflow-hidden shadow-lg" id="animeCarousel">
    <div class="flex transition-transform duration-700 ease-in-out" id="carouselTrack">
      {{-- Clone Last --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c4.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 1 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c1.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 2 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c2.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 3 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c3.png" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 4 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c4.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Clone First --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c1.jpg" class="w-full h-[500px] object-cover" />
      </div>
    </div>

    <div class="bubble-field" aria-hidden="true">
      <span class="bubble" style="--size: 8rem; --left: 12%; --delay: 0s; --duration: 17s; --drift: -40px;"></span>
      <span class="bubble" style="--size: 6rem; --left: 28%; --delay: 2s; --duration: 14s; --drift: 60px;"></span>
      <span class="bubble" style="--size: 5rem; --left: 45%; --delay: 4s; --duration: 12s; --drift: -30px;"></span>
      <span class="bubble" style="--size: 7.5rem; --left: 63%; --delay: 1.5s; --duration: 18s; --drift: 80px;"></span>
      <span class="bubble" style="--size: 4.5rem; --left: 78%; --delay: 3s; --duration: 13s; --drift: -50px;"></span>
      <span class="bubble" style="--size: 9rem; --left: 88%; --delay: 6s; --duration: 20s; --drift: 90px;"></span>
      <span class="bubble" style="--size: 5.5rem; --left: 5%; --delay: 5s; --duration: 15s; --drift: 70px;"></span>
      <span class="bubble" style="--size: 4rem; --left: 35%; --delay: 7s; --duration: 11s; --drift: -60px;"></span>
      <span class="bubble" style="--size: 6.5rem; --left: 55%; --delay: 3.5s; --duration: 16s; --drift: 40px;"></span>
      <span class="bubble" style="--size: 5rem; --left: 72%; --delay: 8s; --duration: 19s; --drift: -30px;"></span>
    </div>

    {{-- overlay teks tetap --}}
    <div class="absolute inset-0 z-10 bg-black/40 flex flex-col items-center justify-center text-center px-4">
      <div class="bg-white/20 backdrop-blur-sm p-2 rounded-xl max-w-1xl">
        <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-lg">
          Welcome to AnimeList ~ My World of Stories
        </h1>
        <p class="mt-4 text-lg md:text-xl text-white">
          Temukan koleksi anime favoritmu, jelajahi kisah epik, dan nikmati perjalanan tanpa akhir dalam dunia fantasi.
        </p>
        <a href="{{route('blog.animelist')}}" class="mt-6 btn bg-sky-500 hover:bg-sky-600 border-none text-white text-lg px-6">
          View Anime
        </a>
      </div>
    </div>


    {{-- tombol navigasi manual --}}
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <button id="prevBtn" class="btn btn-circle">❮</button>
      <button id="nextBtn" class="btn btn-circle">❯</button>
    </div>
  </div>
@endsection

@section('content')


{{-- Fall Anime 2025 --}}
<section class="glass-panel px-6 py-10">
  <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between" data-animate="fade-up">
    <h1 class="text-3xl font-bold text-sky-600 drop-shadow-sm">
      Fall Anime 2025
      <span class="ml-3 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-sky-500/10 via-violet-500/10 to-rose-400/10 px-4 py-1 text-sm font-medium text-sky-600">
        <span class="h-2 w-2 rounded-full bg-amber-300 shadow-glow"></span>
        Curated Picks
      </span>
    </h1>
    <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-widest text-sky-600">
      <span class="stat-badge shadow-glow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
        </svg>
        Season Highlights
      </span>
    </div>
  </div>
  <div class="flex gap-6 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory" data-animate="slide-in">
    @foreach($fallAnimes as $anime)
      <a href="{{ route('blog.show', $anime->id) }}" class="min-w-[220px] snap-start">
        <article class="spotlight-card h-full">
          <div class="spotlight-image h-72">
            @php
              $imageUrl = $anime->image
                  ? (\Illuminate\Support\Str::startsWith($anime->image, ['http://', 'https://'])
                      ? $anime->image
                      : \Illuminate\Support\Facades\Storage::url($anime->image))
                  : asset('image/default.jpg');
            @endphp
            <img src="{{ $imageUrl }}" alt="{{ $anime->title }}" class="h-full w-full object-cover" loading="lazy">
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-3 text-center text-white">
              {{ $anime->title }}
            </div>
          </div>
        </article>
      </a>
    @endforeach
  </div>
</section>

{{-- Most Popular Anime --}}
<section id="popular" class="glass-panel mt-12 px-6 py-10">
  <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between" data-animate="fade-up">
    <h2 class="text-3xl font-bold text-sky-600 drop-shadow-sm">Most Popular Anime</h2>
    <div class="flex flex-wrap items-center gap-3">
      <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-sky-600 shadow">
        <span class="h-1.5 w-1.5 rounded-full bg-sky-400 animate-pulse"></span>
        Top Rated Picks
      </span>
      <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-sky-500/15 via-violet-500/15 to-rose-400/15 px-4 py-1 text-xs font-semibold text-violet-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 3l2.09 6.26L21 9.27l-5 3.64 1.9 5.85L12 15.77 6.1 18.76 8 13 3 9.27l6.91-.01L12 3z" />
        </svg>
        Weekly Favourites
      </span>
    </div>
  </div>
  <div class="flex gap-6 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory" data-animate="slide-in">
    @foreach($popularAnimes as $anime)
      <a href="{{ route('blog.show', $anime->id) }}" class="min-w-[220px] snap-start">
        <article class="spotlight-card h-full">
          <div class="spotlight-image h-72">
            @php
              $imageUrl = $anime->image
                  ? (\Illuminate\Support\Str::startsWith($anime->image, ['http://', 'https://'])
                      ? $anime->image
                      : \Illuminate\Support\Facades\Storage::url($anime->image))
                  : asset('image/default.jpg');
            @endphp
            <img src="{{ $imageUrl }}" alt="{{ $anime->title }}" class="h-full w-full object-cover" loading="lazy">
            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/20 to-transparent p-3 text-white">
              <span class="text-xs font-semibold uppercase tracking-wider text-sky-200">Popular Choice</span>
              <span class="text-base font-semibold">{{ $anime->title }}</span>
            </div>
          </div>
        </article>
      </a>
    @endforeach
  </div>
</section>

<section class="glass-panel mt-12 px-6 py-10" data-animate="zoom-in">
  <div class="mb-8 flex flex-col gap-4 text-center">
    <h3 class="text-2xl font-bold text-sky-600">Discover More Adventures</h3>
    <p class="mx-auto max-w-3xl text-sm textsub transition-colors duration-500">
      Setiap pekan kami menambahkan judul baru dari berbagai genre. Telusuri rekomendasi editor, sorotan komunitas, dan daftar personal dengan animasi interaktif yang membuat pengalaman menjelajah semakin hidup.
    </p>
  </div>
  <div class="grid gap-6 md:grid-cols-3">
    <article class="tilt-card" data-animate="rise">
      <span class="stat-badge mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h4l3-6 4 12 3-6h4" />
        </svg>
        Dynamic Rankings
      </span>
      <h4 class="text-xl font-semibold textsub2 transition-colors duration-500">Trending Weekly Picks</h4>
      <p class="mt-3 text-sm textsub transition-colors duration-500">Lihat daftar anime paling banyak ditonton minggu ini lengkap dengan skor rating terbaru.</p>
    </article>

    <article class="tilt-card" data-animate="rise" data-animate-delay="0.15">
      <span class="stat-badge mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-violet-500" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 7.77L18.39 18H5.61L12 7.77M12 2L1 20h22" />
        </svg>
        Genre Palette
      </span>
      <h4 class="text-xl font-semibold textsub2 transition-colors duration-500">Pick by Mood &amp; Genre</h4>
      <p class="mt-3 text-sm textsub transition-colors duration-500">Filter berdasarkan genre favoritmu dan temukan nuansa warna baru di setiap koleksi.</p>
    </article>

    <article class="tilt-card" data-animate="rise" data-animate-delay="0.3">
      <span class="stat-badge mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 22c4.5-4 7-7.33 7-11a7 7 0 10-14 0c0 3.67 2.5 7 7 11z" />
        </svg>
        Personal Watchlist
      </span>
      <h4 class="text-xl font-semibold textsub2 transition-colors duration-500">Save &amp; Share Collection</h4>
      <p class="mt-3 text-sm textsub transition-colors duration-500">Bangun katalog pribadi dan bagikan ke teman dengan animasi interaktif yang responsif.</p>
    </article>
  </div>
</section>

@endsection
