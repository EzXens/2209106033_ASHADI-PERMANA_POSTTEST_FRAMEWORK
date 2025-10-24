<footer class="footer footer-panel sm:footer-horizontal relative mt-16 p-10 text-white" data-animate="rise">
  <span class="footer-orb footer-orb-1 pointer-events-none absolute -left-12 top-1/2 h-40 w-40 -translate-y-1/2 rounded-full"></span>
  <span class="footer-orb footer-orb-2 pointer-events-none absolute -right-16 bottom-0 h-44 w-44 rounded-full"></span>
  <span class="footer-orb footer-orb-3 pointer-events-none absolute inset-x-1/4 -top-16 h-32 rounded-full"></span>

  <aside class="space-y-3">
    <div class="footer-highlight inline-flex items-center gap-3 rounded-1xl bg-white/10 px-4 py-2 shadow-lg shadow-sky-900/20">
      <span class="grid h-10 w-10 place-content-center rounded-2xl bg-gradient-to-br from-sky-400 via-cyan-300 to-violet-400 text-white shadow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-3.8L6 21l1.5-7.5L2 9h7z" />
        </svg>
      </span>
      <div>
        <p class="text-lg font-semibold">AnimeList ~ My</p>
        <p class="text-xs text-white/70">Explore colourful journeys</p>
      </div>
    </div>
    <p class="footer-text-muted max-w-xs text-sm text-white/75">Kurasi anime pilihan dengan animasi interaktif dan variasi warna yang tetap setia pada identitas langit biru.</p>
    <div class="flex flex-wrap gap-2 text-xs font-semibold">
      <span class="footer-chip rounded-full bg-white/15 px-3 py-1 text-white/80">Sejak 2022</span>
      <span class="footer-chip rounded-full bg-white/15 px-3 py-1 text-white/80">+180 Titles</span>
    </div>
  </aside>

  <nav>
    <h6 class="footer-section-title mb-4 text-sm font-semibold uppercase tracking-[0.3em] text-white/70">Navigation</h6>
    <div class="grid grid-flow-row gap-3 text-sm">
      <a href="{{ route('home') }}" class="footer-link"><span class="h-1.5 w-1.5 rounded-full bg-cyan-200"></span>Home</a>
      <a href="{{ route('blog.animelist') }}" class="footer-link"><span class="h-1.5 w-1.5 rounded-full bg-rose-200"></span>Anime List</a>
      <a href="{{ route('blog.about') }}" class="footer-link"><span class="h-1.5 w-1.5 rounded-full bg-violet-200"></span>About</a>
      <a href="{{ route('blog.contact') }}" class="footer-link"><span class="h-1.5 w-1.5 rounded-full bg-amber-200"></span>Contact</a>
    </div>
  </nav>

  <nav>
    <h6 class="footer-section-title mb-4 text-sm font-semibold uppercase tracking-[0.3em] text-white/70">Highlights</h6>
    <ul class="footer-text-muted space-y-3 text-sm text-white/80">
      <li class="flex items-start gap-3">
        <span class="footer-chip mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15 text-[10px] font-semibold">01</span>
        Kurasi mingguan menghadirkan anime dengan skor tertinggi.
      </li>
      <li class="flex items-start gap-3">
        <span class="footer-chip mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15 text-[10px] font-semibold">02</span>
        Animasi responsif membuat pengalaman menjelajah lebih hidup.
      </li>
    </ul>
  </nav>

  <nav>
    <h6 class="footer-section-title mb-4 text-sm font-semibold uppercase tracking-[0.3em] text-white/70">Stay Connected</h6>
    <div class="space-y-3 text-sm">
      <a href="#" class="footer-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
          <path d="M22.46 6c-.77.35-1.6.59-2.46.69a4.27 4.27 0 001.88-2.35 8.59 8.59 0 01-2.72 1.04A4.25 4.25 0 0015.5 4a4.25 4.25 0 00-4.24 4.26c0 .33.03.65.1.96A12.1 12.1 0 013 5.1a4.27 4.27 0 001.32 5.67 4.18 4.18 0 01-1.92-.53v.05a4.26 4.26 0 003.4 4.18c-.47.13-.96.2-1.46.2-.35 0-.7-.03-1.03-.1a4.27 4.27 0 003.98 2.97A8.52 8.52 0 012 19.54a12 12 0 006.56 1.92c7.88 0 12.2-6.54 12.2-12.2 0-.18-.01-.37-.02-.55A8.72 8.72 0 0022.46 6z" />
        </svg>
        Twitter
      </a>
      <a href="#" class="footer-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
          <path d="M4.98 3.5C3.34 3.5 2 4.85 2 6.48v11.04c0 1.63 1.34 2.98 2.98 2.98h14.04c1.64 0 2.98-1.35 2.98-2.98V6.48c0-1.63-1.34-2.98-2.98-2.98H4.98zm4.52 4.38l6.43 3.63-6.43 3.62V7.88z" />
        </svg>
        YouTube
      </a>
      <a href="#" class="footer-link">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
          <path d="M13 9h3V6h-3V4c0-1.1.9-2 2-2h1V0h-2a4 4 0 00-4 4v2H9v3h3v12h3V9z" />
        </svg>
        Facebook
      </a>
    </div>
  </nav>

  <div class="footer-center col-span-full mt-6 w-full border-t border-white/10 pt-4 text-xs text-white/70 footer-text-muted">
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
      <p>© {{ now()->year }} AnimeList ~ My. All rights reserved.</p>
      <div class="flex flex-wrap items-center gap-2">
        <span class="footer-chip inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1">Made with <span class="text-rose-200">♥</span></span>
        <span class="footer-chip inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1">Sky Blue Theme</span>
      </div>
    </div>
  </div>
</footer>