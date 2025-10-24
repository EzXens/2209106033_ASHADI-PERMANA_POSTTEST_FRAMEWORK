@extends('layouts.app')

@section('content')
<section class="hero-spotlight relative overflow-hidden p-10" data-animate="fade-in">
  <div class="relative z-10 grid gap-6 text-center md:grid-cols-[1.2fr_1fr] md:text-left">
    <div class="space-y-6">
      <span class="inline-flex items-center gap-2 rounded-full bg-sky-500/10 px-4 py-1 text-sm font-semibold uppercase tracking-widest text-sky-600 transition-colors duration-500 dark:bg-white/20 dark:text-cyan-100">
        <span class="h-2 w-2 rounded-full bg-sky-500 shadow-glow transition-colors duration-500 dark:bg-rose-200"></span>
        About
      </span>
      <h1 class="text-4xl font-bold leading-tight text-white transition-colors duration-500 ">Membawa Langit Biru ke Setiap Penjelajahan Anime</h1>
      <p class="text-lg textsub2 transition-colors duration-500">
        AnimeList ~ My diciptakan untuk kamu yang ingin menikmati katalog anime dengan pengalaman visual yang lembut,
        interaktif, dan kaya makna. Kami memadukan estetika, kurasi, dan komunitas supaya setiap klik terasa personal.
      </p>
      <div class="flex flex-wrap gap-3 text-sm font-medium text-sky-600 transition-colors duration-500 dark:text-sky-100">
        <span class="rounded-full bg-sky-500/10 px-3 py-1 transition-colors duration-500 dark:bg-white/20 dark:text-white/90">Kurasi Harian</span>
        <span class="rounded-full bg-sky-500/10 px-3 py-1 transition-colors duration-500 dark:bg-white/20 dark:text-white/90">Komunitas Hangat</span>
        <span class="rounded-full bg-sky-500/10 px-3 py-1 transition-colors duration-500 dark:bg-white/20 dark:text-white/90">Animasi Responsif</span>
      </div>
    </div>
    <div class="glass-panel p-6" data-animate="rise" data-animate-delay="0.15">
      <h2 class="text-lg font-semibold textsub2 transition-colors duration-500">Snapshot</h2>
      <p class="textsub mt-3 text-sm transition-colors duration-500">
        Lebih dari 180 judul dikurasi, 12+ genre ter-highlight, dan ratusan rekomendasi komunitas setiap bulannya.
      </p>
      <div class="textsub2 mt-6 grid gap-3 text-sm">
        <div class="textsub2 flex items-center gap-3">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/15 text-sky-500 dark:bg-sky-500/20 dark:text-cyan-200">24/7</span>
          Dukungan komunitas real-time
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/15 text-violet-500 dark:bg-violet-500/20 dark:text-violet-200">+50</span>
          Watchlist personal dibagikan tiap minggu
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-cyan-500/15 text-cyan-500 dark:bg-cyan-500/20 dark:text-cyan-100">∞</span>
          Kombinasi filter untuk eksplorasi anime
        </div>
      </div>
    </div>
  </div>
</section>

<section class="glass-panel mt-12 px-8 py-10" data-animate="fade-up">
  <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Pilar yang Menuntun Kami</h2>
  <p class="mt-3 max-w-3xl text-sm textsub transition-colors duration-500">
    Setiap fitur yang kamu gunakan dirancang dengan penuh pertimbangan agar pengalaman melihat daftar anime terasa ringan,
    terarah, dan bernyawa. Berikut tiga fokus utama kami.
  </p>
  <div class="mt-8 grid gap-6 md:grid-cols-3">
    @foreach ($pillars as $pillar)
      <article class="tilt-card" data-animate="rise" data-animate-delay="{{ number_format($loop->index * 0.12, 2) }}">
        <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br {{ $pillar['gradient'] }} text-white shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="{{ $pillar['icon'] }}" />
          </svg>
        </span>
        <h3 class="mt-5 text-xl font-semibold textsub2 transition-colors duration-500">{{ $pillar['title'] }}</h3>
        <p class="mt-3 text-sm textsub transition-colors duration-500">{{ $pillar['description'] }}</p>
      </article>
    @endforeach
  </div>
</section>

<section class="glass-panel2 mt-12 px-8 py-10" data-animate="slide-in">
  <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between">
    <div>
      <h2 class="text-3xl textmain font-semibold">Perjalanan Kami</h2>
      <p class="mt-3 max-w-xl text-sm textmain transition-colors duration-500">
        Dibangun dari kecintaan terhadap storytelling dan UI modern, AnimeList ~ My berkembang bersama komunitas yang selalu
        haus rekomendasi baru. Berikut highlight perjalanan kami sejauh ini.
      </p>
    </div>
    <div class="flex items-center gap-3">
      <span class="tag-glow">Soft Gradient UI</span>
      <span class="tag-glow animation-delay-300">Community Pulse</span>
    </div>
  </div>
  <div class="mt-10 space-y-6">
    @foreach ($milestones as $milestone)
      <div class="relative overflow-hidden rounded-2xl border border-sky-100/70 bg-white/90 p-6 shadow shadow-sky-100/60 transition duration-500 hover:-translate-y-2 hover:border-sky-300 hover:shadow-xl dark:border-slate-700/70 dark:bg-slate-950/70 dark:shadow-cyan-500/20" data-animate="rise" data-animate-delay="{{ number_format($loop->index * 0.12, 2) }}">
        <div class="absolute -left-3 top-6 h-full w-2 rounded-full bg-gradient-to-b from-sky-500 via-cyan-400 to-violet-400"></div>
        <div class="ml-6 flex flex-col gap-2">
          <span class="inline-flex w-fit items-center gap-2 rounded-full bg-sky-500 px-3 py-1 text-xs font-semibold uppercase tracking-widest">{{ $milestone['year'] }}</span>
          <h3 class="text-xl font-semibold textmain transition-colors duration-500">{{ $milestone['title'] }}</h3>
          <p class="text-sm textmain transition-colors duration-500">{{ $milestone['description'] }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>

<section class="glass-panel mt-12 px-8 py-10" data-animate="zoom-in">
  <div class="mb-8 text-center">
    <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Tim Penjaga Langit</h2>
    <p class="mt-3 text-sm textsub transition-colors duration-500">
      Mereka yang menyusun daftar, menghidupkan desain, dan menjaga komunitas tetap hangat.
    </p>
  </div>
  <div class="grid gap-6 md:grid-cols-3">
    @foreach ($team as $member)
      <article class="glass-panel relative overflow-hidden rounded-3xl border  p-6 text-center shadow-xl " data-animate="rise" data-animate-delay="{{ number_format($loop->index * 0.12, 2) }}">
        <span class="absolute -top-6 left-1/2 -translate-x-1/2">
          <span class="grid h-14 w-14 place-content-center rounded-full bg-gradient-to-br from-sky-500 via-cyan-400 to-violet-400 text-white shadow-lg shadow-sky-900/20">☆</span>
        </span>
        <div class="mt-8 space-y-3">
          <h3 class="text-xl font-semibold">{{ $member['name'] }}</h3>
          <p class="text-sm font-semibold text-sky-600 dark:text-cyan-200">{{ $member['role'] }}</p>
          <p class="text-sm textsub transition-colors duration-500">{{ $member['bio'] }}</p>
        </div>
      </article>
    @endforeach
  </div>
</section>

<section class="glass-panel mt-12 mb-16 px-8 py-10 text-center" data-animate="fade-up">
  <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Siap Bergabung dalam Perjalanan?</h2>
  <p class="mt-3 text-sm textsub transition-colors duration-500">
    Mulai jelajahi daftar anime favorit, buat watchlist pribadi, atau lanjut ke halaman kontak untuk berkolaborasi dengan tim kami.
  </p>
  <div class="mt-6 flex flex-wrap justify-center gap-4">
    <a href="{{ route('blog.animelist') }}" class="btn border-none bg-sky-500 px-6 text-white shadow-lg shadow-sky-500/40 transition hover:bg-sky-600">Lihat Anime</a>
    <a href="{{ route('blog.contact') }}" class="btn border border-sky-500 bg-white/80 px-6 text-sky-600 shadow-lg shadow-sky-200/60 transition hover:bg-white">Hubungi Kami</a>
  </div>
</section>
@endsection
