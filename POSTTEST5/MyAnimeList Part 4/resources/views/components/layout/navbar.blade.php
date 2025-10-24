<div class="navbar nav-glass overflow-visible" data-animate="slide-in">
  <span class="pointer-events-none absolute -left-24 top-1/2 h-48 w-48 -translate-y-1/2 rounded-full bg-cyan-400/30 blur-3xl"></span>
  <span class="pointer-events-none absolute -right-16 bottom-0 h-40 w-40 rounded-full bg-violet-500/20 blur-3xl"></span>

  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost text-white/90 lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content rounded-2xl border border-white/10 bg-gradient-to-br from-sky-600 to-cyan-500 text-white shadow-2xl shadow-sky-900/20">
        <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a></li>
        <li><a href="{{ route('blog.animelist') }}" class="nav-link {{ request()->routeIs('blog.animelist') ? 'is-active' : '' }}">Anime List</a></li>
        <li><a href="{{ route('blog.about') }}" class="nav-link {{ request()->routeIs('blog.about') ? 'is-active' : '' }}">About</a></li>
        <li><a href="{{ route('blog.contact') }}" class="nav-link {{ request()->routeIs('blog.contact') ? 'is-active' : '' }}">Contact</a></li>
      </ul>
    </div>
    <a href="{{ route('home') }}" class="btn btn-ghost normal-case text-xl font-semibold text-white hover:text-white">
      <span class="text-sky-600 bg-white/15 px-2 py-1 rounded-lg">AnimeList</span>
      <span class="text-cyan-100">~ My</span>
    </a>
  </div>

  <div class="navbar-center hidden lg:flex">
    <ul class="menu text-sky-600 font-bold menu-horizontal gap-3 px-1">
      <li><a href="{{ route('home') }}" class="nav-link hover:bg-sky-300 {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a></li>
      <li><a href="{{ route('blog.animelist') }}" class="nav-link hover:bg-sky-300 {{ request()->routeIs('blog.animelist') ? 'is-active' : '' }}">Anime List</a></li>
      <li><a href="{{ route('blog.about') }}" class="nav-link hover:bg-sky-300 {{ request()->routeIs('blog.about') ? 'is-active' : '' }}">About</a></li>
      <li><a href="{{ route('blog.contact') }}" class="nav-link hover:bg-sky-300 {{ request()->routeIs('blog.contact') ? 'is-active' : '' }}">Contact</a></li>
    </ul>
  </div>

  {{-- 🔍 Search Bar --}}
  <div class="navbar-center relative flex w-full max-w-xl items-center gap-3 lg:w-1/2">
    <div id="searchContainer" class="relative flex-1">
      <div class="search-shell">
        <span class="search-shell-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35m1.18-4.18a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z" />
          </svg>
        </span>
        <input type="text" id="animeSearch" placeholder="Search anime..." class="search-input" autocomplete="off">
      </div>

      {{-- Hasil pencarian muncul di bawah input --}}
      <div id="searchResults"
        class="search-dropdown absolute top-16 left-0 z-[70] w-full hidden max-h-80 overflow-y-auto">
      </div>
    </div>

    <button id="themeToggle" type="button" aria-label="Toggle dark mode" aria-pressed="false" class="theme-toggle">
      <span class="sr-only">Toggle dark mode</span>
      <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
        <circle cx="12" cy="12" r="4.2"></circle>
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v2.5M12 19.5V22M4.22 4.22 5.9 5.9M18.1 18.1l1.68 1.68M2 12h2.5M19.5 12H22m-3.9-6.1L15.9 6.9m-7.8 10.2-2.2 2.2"></path>
      </svg>
      <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
      </svg>
    </button>
  </div>


  <div class="navbar-end">
    @auth
      @php
        $user = auth()->user();
        $navAvatarSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><defs><linearGradient id="grad" x1="0" x2="1" y1="0" y2="1"><stop offset="0" stop-color="%230ea5e9"/><stop offset="1" stop-color="%23818cf8"/></linearGradient></defs><rect width="128" height="128" rx="32" fill="url(%23grad)"/><path fill="rgba(255,255,255,0.85)" d="M64 28a24 24 0 1 1 0 48 24 24 0 0 1 0-48zm0 56c19.882 0 36 11.64 36 26v6H28v-6c0-14.36 16.118-26 36-26z"/></svg>';
        $navAvatar = $user->avatar_path
          ? \Illuminate\Support\Facades\Storage::url($user->avatar_path)
          : 'data:image/svg+xml;utf8,' . rawurlencode($navAvatarSvg);
        $navDisplayName = $user->username ?: ($user->name ?: $user->email);
        $targetRoute = $user->is_admin ? route('admin.dashboard') : route('profile.show');
        $targetLabel = $user->is_admin ? 'Dashboard' : 'Profile';
      @endphp
      <a href="{{ $targetRoute }}" class="flex items-center gap-3 rounded-full border border-white/40 bg-white/80 px-4 py-2 text-sm font-semibold text-sky-600 shadow-lg shadow-sky-900/15 transition hover:shadow-xl hover:shadow-sky-900/25 dark:border-slate-700/60 dark:bg-slate-900/70 dark:text-cyan-100 dark:hover:border-cyan-400/40">
        <span class="relative h-9 w-9 overflow-hidden rounded-2xl border border-sky-100/80 shadow-sm shadow-sky-200/60 ring-2 ring-sky-100/70 dark:border-slate-800/70 dark:ring-cyan-400/30">
          <img src="{{ $navAvatar }}" alt="Avatar" class="h-full w-full object-cover" />
        </span>
        <span class="hidden flex-col text-left leading-tight sm:flex">
          <span class="text-xs text-slate-500">{{ $targetLabel }}</span>
          <span>{{ \Illuminate\Support\Str::limit($navDisplayName, 14) }}</span>
        </span>
        <span class="sm:hidden">{{ $targetLabel }}</span>
      </a>
    @else
      <a href="{{ route('login') }}" class="btn border-none bg-white/90 text-sky-600 shadow-lg shadow-sky-900/10 hover:bg-white">
        Login
      </a>
    @endauth
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const root = document.documentElement;
  const themeToggle = document.getElementById('themeToggle');
  const searchInput = document.getElementById('animeSearch');
  const searchResults = document.getElementById('searchResults');
  const searchContainer = document.getElementById('searchContainer');
  let timeout = null;

  const getStoredTheme = () => {
    try {
      return localStorage.getItem('theme');
    } catch (_) {
      return null;
    }
  };

  const setStoredTheme = (value) => {
    try {
      if (value) {
        localStorage.setItem('theme', value);
      } else {
        localStorage.removeItem('theme');
      }
    } catch (_) {
      /* ignore */
    }
  };

  const applyTheme = (mode) => {
    const isDark = mode === 'dark';
    root.classList.toggle('dark', isDark);
    if (themeToggle) {
      themeToggle.setAttribute('aria-pressed', isDark);
    }
  };

  const storedTheme = getStoredTheme();
  if (storedTheme === 'dark' || storedTheme === 'light') {
    applyTheme(storedTheme);
  } else {
    applyTheme('light');
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      const isDark = root.classList.toggle('dark');
      setStoredTheme(isDark ? 'dark' : 'light');
      themeToggle.setAttribute('aria-pressed', isDark);
    });

    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    const handlePreferenceChange = (event) => {
      if (!getStoredTheme()) {
        applyTheme(event.matches ? 'dark' : 'light');
      }
    };

    if (mediaQuery?.addEventListener) {
      mediaQuery.addEventListener('change', handlePreferenceChange);
    } else if (mediaQuery?.addListener) {
      mediaQuery.addListener(handlePreferenceChange);
    }
  }

  // 🔍 Fungsi render hasil pencarian anime
  function renderAnimes(data) {
    if (data.length === 0) {
      return '<div class="p-3 text-gray-500 ">No results found</div>';
    }

    return data.map(anime => `
      <a href="/blog/${anime.id}" class="search-result-card">
        <img src="${anime.image
          ? (anime.image.startsWith('http') ? anime.image : '/' + anime.image)
          : '/image/default.jpg'}"
          alt="${anime.title}" class="h-12 w-12 rounded object-cover">
        <div class="search-result-text">
          <div class="search-result-title">${anime.title}</div>
          <div class="search-result-subtitle">${anime.japanese_title ?? ''}</div>
        </div>
      </a>
    `).join('');
  }

  // 🎯 Fungsi render hasil tag
  function renderTags(tags) {
    if (!tags || tags.length === 0) return '';

    return `
      <div class="search-tags-section">
        <div class="search-tags-title">Tags:</div>
        <div class="search-tags-list">
          ${tags.map(tag => `
            <button class="tag-btn search-tag" data-tag="${tag}">
              #${tag}
            </button>
          `).join('')}
        </div>
      </div>
    `;
  }

  // 🧭 Event utama pencarian
  searchInput.addEventListener('input', function () {
    const query = this.value.trim();

    clearTimeout(timeout);
    timeout = setTimeout(() => {
      if (query.length === 0) {
        searchResults.innerHTML = '';
        searchResults.classList.add('hidden');
        return;
      }

      fetch(`{{ route('anime.search') }}?q=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
          let html = '';

          // Bagian tag
          html += renderTags(data.tags);

          // Bagian anime
          html += renderAnimes(data.animes);

          // Tombol "See more"
          html += `
            <div class="search-more-section">
              <a href="{{ route('blog.animelist') }}?q=${encodeURIComponent(query)}" 
                class="search-more-link font-semibold">See more</a>
            </div>
          `;

          searchResults.innerHTML = html;
          searchResults.classList.remove('hidden');
        })
        .catch(err => console.error(err));
    }, 300);
  });

  // 🏷 Klik Tag → Filter anime by tag
  searchResults.addEventListener('click', (e) => {
    if (e.target.classList.contains('tag-btn')) {
      const tag = e.target.dataset.tag;

      fetch(`{{ route('anime.filter') }}?tag=${encodeURIComponent(tag)}`)
        .then(res => res.json())
        .then(data => {
          searchResults.innerHTML = `
            <div class="border-b border-gray-200 p-2 flex justify-between items-center">
              <span class="font-semibold text-sky-600">Tag: #${tag}</span>
              <button id="backToSearch" class="text-sm text-gray-500 hover:text-sky-600">← Back</button>
            </div>
            ${renderAnimes(data)}
          `;
        })
        .catch(err => console.error(err));
    }

    // Kembali ke hasil pencarian
    if (e.target.id === 'backToSearch') {
      searchInput.dispatchEvent(new Event('input'));
    }
  });

  // klik di luar search menutup hasil
  document.addEventListener('click', (e) => {
    if (!searchResults.contains(e.target) && (!searchContainer || !searchContainer.contains(e.target))) {
      searchResults.classList.add('hidden');
    }
  });
});
</script>
