<div class="navbar bg-sky-500 text-white shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost text-white lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content bg-sky-500 text-white rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li><a>Item 1</a></li>
        <li>
          <a>Parent</a>
          <ul class="p-2 bg-sky-600">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </li>
        <li><a>Item 3</a></li>
      </ul>
    </div>
    <a href="{{ route('home') }}" class="btn btn-ghost normal-case text-xl text-white hover:text-blue-800">AnimeList ~
      My</a>
  </div>

  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{ route('home') }}" class="hover:bg-sky-600">Home</a></li>
      <li><a href="{{route('blog.animelist')}}" class="hover:bg-sky-600">Anime List</a></li>
      <li><a href="{{ route('home') }}" class="hover:bg-sky-600">About</a></li>
      <li><a href="{{ route('home') }}" class="hover:bg-sky-600">Contact</a></li>
    </ul>
  </div>

  {{-- 🔍 Search Bar --}}
  <div class="navbar-center relative w-1/2">
    <input type="text" id="animeSearch" placeholder="Search anime..."
      class="input input-bordered w-full text-black bg-white" autocomplete="off">

    {{-- Hasil pencarian muncul di bawah input --}}
    <div id="searchResults"
      class="absolute top-12 left-0 w-full bg-white rounded-lg shadow-lg text-black z-50 hidden max-h-80 overflow-y-auto">
    </div>
  </div>


  <div class="navbar-end">
    <a class="btn bg-white text-sky-600 hover:bg-gray-200">Login</a>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('animeSearch');
  const searchResults = document.getElementById('searchResults');
  let timeout = null;

  // 🔍 Fungsi render hasil pencarian anime
  function renderAnimes(data) {
    if (data.length === 0) {
      return '<div class="p-3 text-gray-500">No results found</div>';
    }

    return data.map(anime => `
      <a href="/blog/${anime.id}" class="flex items-center gap-3 p-2 hover:bg-gray-100 transition">
        <img src="${anime.image
          ? (anime.image.startsWith('http') ? anime.image : '/' + anime.image)
          : '/image/default.jpg'}"
          alt="${anime.title}" class="w-12 h-16 object-cover rounded">
        <div>
          <div class="font-semibold">${anime.title}</div>
          <div class="text-sm text-gray-500">${anime.japanese_title ?? ''}</div>
        </div>
      </a>
    `).join('');
  }

  // 🎯 Fungsi render hasil tag
  function renderTags(tags) {
    if (!tags || tags.length === 0) return '';

    return `
      <div class="border-b border-gray-200 p-2">
        <div class="font-semibold text-sm text-gray-600 mb-1">Tags:</div>
        <div class="flex flex-wrap gap-2">
          ${tags.map(tag => `
            <button class="tag-btn bg-sky-500 hover:bg-sky-600 text-white text-xs px-3 py-1 rounded-full transition" data-tag="${tag}">
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
            <div class="text-center border-t">
              <a href="{{ route('blog.animelist') }}?q=${encodeURIComponent(query)}" 
                class="block py-2 text-sky-600 hover:bg-gray-100 font-semibold">See more</a>
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
    if (!searchResults.contains(e.target) && e.target !== searchInput) {
      searchResults.classList.add('hidden');
    }
  });
});
</script>
