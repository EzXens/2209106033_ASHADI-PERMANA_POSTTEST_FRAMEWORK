@extends('layouts.app')

@section('content')
<section class="hero-spotlight relative overflow-hidden p-10 text-white" data-animate="fade-in">
  <div class="relative z-10 grid gap-6 md:grid-cols-[1.1fr_0.9fr]">
    <div class="space-y-6">
      <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-1 text-sm font-semibold uppercase tracking-widest text-cyan-100">
        <span class="h-2 w-2 rounded-full bg-emerald-200 animate-pulse"></span>
        Contact
      </span>
      <h1 class="text-4xl font-bold leading-tight text-white">Mari Terhubung &amp; Bangun Kolaborasi Anime-Mazing</h1>
      <p class="text-lg text-cyan-100/90">
        Tim kami siap mendengarkan cerita, ide, maupun pertanyaanmu. Jelajahi berbagai kanal komunikasi atau langsung tinggalkan pesan melalui form interaktif.
      </p>
      <div class="flex flex-wrap gap-3 text-sm font-medium text-sky-100">
        <span class="footer-chip bg-white/20 text-white/90">Balasan < 24 jam</span>
        <span class="footer-chip bg-white/20 text-white/90">Komunitas Aktif</span>
        <span class="footer-chip bg-white/20 text-white/90">Kolaborasi Global</span>
      </div>
    </div>
    <div class="glass-panel p-6" data-animate="rise" data-animate-delay="0.15">
      <h2 class="text-lg font-semibold textsub2 transition-colors duration-500">Jam Operasional</h2>
      <p class="mt-3 text-sm textsub transition-colors duration-500">Senin — Jumat · 09:00 - 21:00 WIB</p>
      <p class="text-sm textsub transition-colors duration-500">Sabtu · 10:00 - 17:00 WIB</p>
      <div class="mt-6 flex flex-col gap-3 textsub">
        <div class="flex items-center gap-3">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/15 text-sky-500 dark:bg-sky-500/20 dark:text-cyan-200">🌤️</span>
          Respons cepat di jam kerja
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/15 text-violet-500 dark:bg-violet-500/20 dark:text-violet-200">🌙</span>
          Tim jaga malam siap bantu pertanyaan mendesak
        </div>
      </div>
    </div>
  </div>
</section>

<section class="glass-panel mt-12 px-8 py-10" data-animate="fade-up">
  <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Kanal Komunikasi</h2>
  <p class="mt-3 max-w-3xl text-sm textsub transition-colors duration-500">
    Pilih jalur terbaik sesuai kebutuhanmu. Kami siap berdiskusi, menerima masukan, hingga membahas peluang kolaborasi kreatif.
  </p>
  <div class="mt-8 grid gap-6 md:grid-cols-3">
    @foreach ($channels as $channel)
      <article class="glass-panel relative overflow-hidden rounded-3xl border border-sky-100/70  p-6 shadow-lg  transition duration-500 hover:-translate-y-3 hover:border-sky-300 hover:shadow-2xl" data-animate="rise" data-animate-delay="{{ number_format($loop->index * 0.12, 2) }}">
        <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 via-cyan-400 to-violet-400 text-white shadow-lg shadow-sky-900/20">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="{{ $channel['icon'] }}" />
          </svg>
        </span>
        <h3 class="mt-5 text-xl font-semibold textsub2 transition-colors duration-500">{{ $channel['title'] }}</h3>
        <p class="text-sm font-semibold textsub2">{{ $channel['subtitle'] }}</p>
        <p class="mt-3 text-sm textsub transition-colors duration-500">{{ $channel['description'] }}</p>
        <button type="button" data-copy="{{ $channel['subtitle'] }}" class="copy-channel mt-4 inline-flex items-center gap-2 rounded-full bg-sky-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-widest textsub2 transition hover:bg-sky-500/20 dark:bg-cyan-500/15 ">
          Copy Info
        </button>
      </article>
    @endforeach
  </div>
</section>

<section class="glass-panel mt-12 px-8 py-10" data-animate="slide-in">
  <div class="grid gap-10 md:grid-cols-[1.1fr_0.9fr]">
    <div>
      <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Tinggalkan Pesan</h2>
      <p class="mt-3 text-sm textsub transition-colors duration-500">Kami akan merespon secepat mungkin. Sertakan detail yang kamu perlukan supaya tim bisa membantu lebih tepat.</p>
      <form class="mt-6 space-y-5" onsubmit="event.preventDefault();">
        <div class="grid gap-4 md:grid-cols-2">
          <label class="glass-panel flex flex-col gap-2 rounded-2xl border border-white/30 bg-white/80 p-4 shadow-sky-100/50 dark:border-cyan-500/20 dark:bg-slate-950/70">
            <span class="text-xs font-semibold uppercase tracking-widest textlabel transition-colors duration-500">Nama</span>
            <input type="text" placeholder="Masukkan nama" class="w-full textfield bg-transparent text-sm focus:outline-none" required>
          </label>
          <label class="glass-panel flex flex-col gap-2 rounded-2xl border border-white/30 bg-white/80 p-4 shadow-sky-100/50 dark:border-cyan-500/20 dark:bg-slate-950/70">
            <span class="text-xs font-semibold uppercase tracking-widest textlabel transition-colors duration-500">Email</span>
            <input type="email" placeholder="nama@email.com" class="w-full textfield bg-transparent text-sm focus:outline-none" required>
          </label>
        </div>
        <label class="glass-panel flex flex-col gap-2 rounded-2xl border border-white/30 bg-white/80 p-4 shadow-sky-100/50 dark:border-cyan-500/20 dark:bg-slate-950/70">
          <span class="text-xs font-semibold uppercase tracking-widest textlabel transition-colors duration-500">Topik</span>
          <select class="w-full textfield bg-transparent text-sm focus:outline-none">
            <option>Rekomendasi Anime</option>
            <option>Kolaborasi &amp; Sponsorship</option>
            <option>Masukan Fitur</option>
            <option>Laporan Bug</option>
            <option>Lainnya</option>
          </select>
        </label>
        <label class="glass-panel flex flex-col gap-2 rounded-2xl border border-white/30 bg-white/80 p-4 shadow-sky-100/50 dark:border-cyan-500/20 dark:bg-slate-950/70">
          <span class="text-xs font-semibold uppercase tracking-widest textlabel transition-colors duration-500">Pesan</span>
          <textarea rows="5" placeholder="Ceritakan kebutuhanmu..." class="textfield w-full resize-none bg-transparent text-sm focus:outline-none"></textarea>
        </label>
        <label class="flex items-center gap-3 text-sm textsub transition-colors duration-500">
          <input type="checkbox" class="checkbox checkbox-sm border-sky-300 text-sky-500">
          Dapatkan newsletter mingguan
        </label>
        <button type="submit" class="btn border-none bg-sky-500 px-6 text-white shadow-lg shadow-sky-500/40 transition hover:bg-sky-600">Kirim Pesan</button>
      </form>
    </div>
    <div class="space-y-6">
      <div class="glass-panel p-6" data-animate="rise" data-animate-delay="0.15">
        <h3 class="text-xl font-semibold textsub2 transition-colors duration-500">Lokasi Kami</h3>
        <p class="mt-3 text-sm textsub transition-colors duration-500">
          Studio AnimeList ~ My · Jl. Biru Langit No. 77, Jakarta Selatan.
        </p>
        <div class="mt-4 flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-widest text-sky-600 dark:text-cyan-200">
          <span class="footer-chip bg-sky-500/10 text-sky-600 dark:bg-cyan-500/15 dark:text-cyan-200">Hybrid Team</span>
          <span class="footer-chip bg-sky-500/10 text-sky-600 dark:bg-cyan-500/15 dark:text-cyan-200">Bilingual Support</span>
        </div>
        <div class="mt-6 h-48 w-full overflow-hidden rounded-2xl border border-sky-100/60 bg-gradient-to-br from-sky-200 via-cyan-200 to-violet-200 shadow-lg shadow-sky-100/60 dark:border-cyan-500/20 dark:bg-gradient-to-br dark:from-slate-900 dark:via-slate-950 dark:to-cyan-950"></div>
      </div>
      <div class="glass-panel p-6" data-animate="rise" data-animate-delay="0.3">
        <h3 class="text-xl font-semibold textsub2 transition-colors duration-500">FAQ Cepat</h3>
        <ul class="mt-4 space-y-4">
          @foreach ($faq as $item)
            <li class="rounded-2xl border border-sky-100/60 bg-white/80 p-4 text-left shadow shadow-sky-100/40 transition hover:border-sky-300 dark:border-cyan-500/20 dark:bg-slate-950/70" data-animate="rise" data-animate-delay="{{ number_format($loop->index * 0.12, 2) }}">
              <h4 class="text-sm font-semibold text-sky-600 dark:text-cyan-200">{{ $item['question'] }}</h4>
              <p class="mt-2 text-sm textsub transition-colors duration-500">{{ $item['answer'] }}</p>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="glass-panel mt-12 mb-16 px-8 py-10 text-center" data-animate="fade-up">
  <h2 class="text-3xl font-semibold text-sky-600 dark:text-cyan-200">Siap Kolaborasi?</h2>
  <p class="mt-3 text-sm textsub transition-colors duration-500">
    Kami percaya setiap rekomendasi anime punya cerita unik. Mari berbagi ide dan ciptakan pengalaman menonton yang berkesan.
  </p>
  <div class="mt-6 flex flex-wrap justify-center gap-4">
    <a href="mailto:support@animelist.my" class="btn border-none bg-sky-500 px-6 text-white shadow-lg shadow-sky-500/40 transition hover:bg-sky-600">Email Kami</a>
    <a href="https://discord.gg/animelistmy" target="_blank" class="btn border border-sky-500 bg-white/80 px-6 text-sky-600 shadow-lg shadow-sky-200/60 transition hover:bg-white">Masuk Discord</a>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const copyButtons = document.querySelectorAll('.copy-channel');

  copyButtons.forEach((btn) => {
    btn.addEventListener('click', async () => {
      const value = btn.getAttribute('data-copy');
      if (!value) return;
      try {
        await navigator.clipboard.writeText(value);
        const original = btn.textContent;
        btn.textContent = 'Copied!';
        btn.classList.add('bg-sky-500/20');
        setTimeout(() => {
          btn.textContent = original;
          btn.classList.remove('bg-sky-500/20');
        }, 1600);
      } catch (error) {
        console.error(error);
      }
    });
  });
});
</script>
@endsection
