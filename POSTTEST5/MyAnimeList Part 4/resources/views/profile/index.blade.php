@extends('layouts.app')

@section('content_profile')
  @php
    $defaultAvatarSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><defs><linearGradient id="grad" x1="0" x2="1" y1="0" y2="1"><stop offset="0" stop-color="%230ea5e9"/><stop offset="1" stop-color="%23818cf8"/></linearGradient></defs><rect width="128" height="128" rx="32" fill="url(%23grad)"/><path fill="rgba(255,255,255,0.85)" d="M64 28a24 24 0 1 1 0 48 24 24 0 0 1 0-48zm0 56c19.882 0 36 11.64 36 26v6H28v-6c0-14.36 16.118-26 36-26z"/></svg>';
    $defaultBackgroundSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 320"><defs><linearGradient id="bg" x1="0" x2="1" y1="0" y2="1"><stop offset="0" stop-color="%230ea5e9"/><stop offset="1" stop-color="%23818cf8"/></linearGradient><linearGradient id="bg2" x1="0" x2="1" y1="1" y2="0"><stop offset="0" stop-color="rgba(14,165,233,0.35)"/><stop offset="1" stop-color="rgba(129,140,248,0.25)"/></linearGradient></defs><rect width="800" height="320" fill="url(%23bg)"/><circle cx="120" cy="260" r="180" fill="url(%23bg2)"/><circle cx="640" cy="60" r="160" fill="rgba(255,255,255,0.12)"/><circle cx="420" cy="220" r="110" fill="rgba(255,255,255,0.18)"/></svg>';

    $displayName = $user->username ?: ($user->name ?: \Illuminate\Support\Str::before($user->email, '@'));
    $avatarUrl = $user->avatar_path ? \Illuminate\Support\Facades\Storage::url($user->avatar_path) : 'data:image/svg+xml;utf8,' . rawurlencode($defaultAvatarSvg);
    $backgroundUrl = $user->background_path ? \Illuminate\Support\Facades\Storage::url($user->background_path) : 'data:image/svg+xml;utf8,' . rawurlencode($defaultBackgroundSvg);
  @endphp

  <div class="flex min-h-screen" data-animate="fade-up">
    {{-- SIDEBAR --}}
    <aside class="glass-panel2 w-90 flex-shrink-0 flex flex-col overflow-y-auto">
      <div class="relative">
        <img src="{{ $backgroundUrl }}" alt="Background profile" class="h-44 w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/35 to-transparent transition-colors duration-500 dark:from-slate-950/80 dark:via-slate-900/40"></div>
        <div class="absolute bottom-4 left-5 flex items-center gap-4">
          <div class="h-20 w-20 overflow-hidden rounded-3xl border-4 border-white/80 shadow-lg dark:border-slate-900">
            <img src="{{ $avatarUrl }}" alt="Avatar" class="h-full w-full object-cover" />
          </div>
          <div>
            <h2 class="text-xl font-semibold text-white">{{ $displayName }}</h2>
            <p class="text-sm text-white/80">{{ $user->email }}</p>
          </div>
        </div>
      </div>

      <nav class="flex flex-col gap-1 p-6">
        <a href="{{ route('profile.show') }}"
          class="flex items-center justify-between rounded-2xl bg-gradient-to-r from-sky-500/20 via-cyan-500/10 to-sky-500/20 px-4 py-3 text-sm font-semibold text-sky-700 shadow-sm transition hover:bg-sky-500/25 dark:text-cyan-100 dark:hover:bg-slate-900/60">
          <span class="textsub2 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
              <path d="M5 3h14a2 2 0 012 2v4H3V5a2 2 0 012-2zm-2 9h18v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5zm10 2h-2v2h2v-2z" />
            </svg>
            Pengaturan Akun
          </span>
          <span class="rounded-full bg-white/70 px-2 py-0.5 text-xs font-semibold text-sky-600 dark:bg-slate-900/70 dark:text-cyan-200">aktif</span>
        </a>

        <button type="button"
          class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold textsub2 transition hover:bg-sky-500/15 hover:text-sky-700 dark:hover:bg-slate-900/60">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
            <path d="M12 2l7 4v4c0 5.55-3.84 10.74-9 12-5.16-1.26-9-6.45-9-12V6l7-4z" />
          </svg>
          Keamanan &amp; Privasi
        </button>

        <button type="button"
          class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold textsub2 transition hover:bg-sky-500/15 hover:text-sky-700 dark:hover:bg-slate-900/60">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
            <path d="M20 4H4a2 2 0 00-2 2v9a2 2 0 002 2h3l2.29 2.29a1 1 0 001.7-.71V17h9a2 2 0 002-2V6z" />
          </svg>
          Notifikasi
        </button>

        <button type="button"
          class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold textsub2 transition hover:bg-sky-500/15 hover:text-sky-700 dark:hover:bg-slate-900/60">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
            <path d="M18 6H6a2 2 0 00-2 2v10h16V8z" />
          </svg>
          Koleksi &amp; Playlist
        </button>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
          @csrf
          <button type="submit"
            class="flex w-full items-center justify-center gap-3 rounded-2xl border border-rose-300 bg-rose-500/10 px-4 py-3 text-sm font-semibold text-rose-500 transition hover:bg-rose-500/20 hover:text-rose-600 dark:border-rose-500/30 dark:text-rose-300 dark:hover:bg-rose-500/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
              <path d="M18.53 11.47l-2-2a.75.75 0 10-1.06 1.06l.72.72H12a.75.75 0 000 1.5h4.19l-.72.72a.75.75 0 101.06 1.06l2-2a.75.75 0 000-1.06z" />
            </svg>
            Logout
          </button>
        </form>
      </nav>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 overflow-y-auto  p-6 sm:p-10 transition-colors duration-500">
      <div class="mx-auto flex ">
        <div class="glass-panel2 p-4 w-6xl rounded-3xl">
          <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
              <h1 class="text-2xl font-semibold textsub2">Profil &amp; Identitas</h1>
              <p class="text-sm textsub transition-colors duration-500">Perbarui avatar, sampul latar, dan bio untuk tampil lebih personal.</p>
            </div>
            @if (session('status'))
              <span class="rounded-full border border-emerald-300 bg-emerald-100/70 px-4 py-1 text-sm font-semibold text-emerald-600 dark:border-emerald-400/40 dark:bg-emerald-500/20 dark:text-emerald-200">{{ session('status') }}</span>
            @endif
          </div>

          {{-- FORM PROFIL --}}
          <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
              <div class="space-y-2">
                <label for="username" class="text-sm font-semibold textsub2 transition-colors duration-500">Username</label>
                <input id="username" name="username" type="text"
                  value="{{ old('username', $user->username ?? $user->name ?? \Illuminate\Support\Str::before($user->email, '@')) }}" required
                  class="w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 shadow-sm transition-colors duration-500 focus:ring-2 focus:ring-sky-200 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100" />
                @error('username')
                  <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <label for="email" class="text-sm font-semibold textsub2 transition-colors duration-500">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                  class="w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 shadow-sm transition-colors duration-500 focus:ring-2 focus:ring-sky-200 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100" />
                @error('email')
                  <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="space-y-2">
              <label for="profile-bio-input" class="text-sm font-semibold textsub2 transition-colors duration-500">Bio</label>
              <textarea id="profile-bio-input" name="bio" rows="4" maxlength="600"
                class="w-full rounded-3xl border border-sky-100 bg-white/90 px-5 py-4 shadow-sm transition-colors duration-500 focus:ring-2 focus:ring-sky-200 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100"
                placeholder="Ceritakan tentang dirimu...">{{ old('bio', $user->bio) }}</textarea>
              @error('bio')
                <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
              @enderror
            </div>

            <div class="grid gap-6 md:grid-cols-2">
              <div class="space-y-3">
                <label class="text-sm font-semibold textsub2 transition-colors duration-500">Foto Profil</label>
                <label for="avatar"
                  class="group relative flex h-40 cursor-pointer flex-col items-center justify-center overflow-hidden rounded-3xl border border-dashed border-sky-300 bg-white/80 text-sm text-sky-600 shadow-inner transition hover:bg-sky-100/60 dark:border-cyan-500/30 dark:bg-slate-900/60 dark:text-cyan-200">
                  <input id="avatar" name="avatar" type="file" accept="image/*" class="hidden" />
                  <span class="flex items-center gap-2 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
                      <path d="M5 4a3 3 0 00-3 3v10a3 3 0 003 3h14a3 3 0 003-3V7z" />
                    </svg>
                    Unggah foto baru
                  </span>
                  <span class="mt-2 text-xs text-sky-500/70 dark:text-cyan-300/70">PNG, JPG hingga 2MB</span>
                </label>
                <div class="flex items-center gap-3 rounded-2xl border border-sky-100/70 bg-white/70 px-4 py-3 text-xs transition-colors duration-500 dark:border-slate-700 dark:bg-slate-900/60">
                  <span class="font-semibold text-sky-600 dark:text-cyan-200">Pratinjau:</span>
                  <img id="avatarPreview" src="{{ $avatarUrl }}" alt="Pratinjau avatar" class="h-12 w-12 rounded-2xl object-cover shadow" />
                </div>
              </div>

              <div class="space-y-3">
                <label class="text-sm font-semibold textsub2 transition-colors duration-500">Foto Latar Belakang</label>
                <label for="background"
                  class="group relative flex h-40 cursor-pointer flex-col items-center justify-center overflow-hidden rounded-3xl border border-dashed border-sky-300 bg-white/80 text-sm text-sky-600 shadow-inner transition hover:bg-sky-100/60 dark:border-cyan-500/30 dark:bg-slate-900/60 dark:text-cyan-200">
                  <input id="background" name="background" type="file" accept="image/*" class="hidden" />
                  <span class="flex items-center gap-2 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
                      <path d="M3 5a2 2 0 012-2h14a2 2 0 012 2v12.586z" />
                    </svg>
                    Ganti latar cantik
                  </span>
                  <span class="mt-2 text-xs text-sky-500/70 dark:text-cyan-300/70">PNG, JPG hingga 4MB</span>
                </label>
                <div class="overflow-hidden rounded-2xl border border-sky-100/70 bg-white/70 shadow-sm transition-colors duration-500 dark:border-slate-700/60 dark:bg-slate-900/60">
                  <img id="backgroundPreview" src="{{ $backgroundUrl }}" alt="Pratinjau latar" class="h-28 w-full object-cover" />
                </div>
              </div>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4">
              <p class="text-xs textsub">Gunakan gambar minimal 400x400px untuk avatar dan 1200x400px untuk latar agar tajam.</p>
              <button type="submit"
                class="rounded-2xl bg-gradient-to-r from-sky-500 via-cyan-500 to-emerald-500 px-6 py-3 text-base font-semibold text-white shadow-lg transition hover:scale-[1.02]">Simpan
                Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const bindPreview = (inputEl, previewEl) => {
        if (!inputEl || !previewEl) return;
        inputEl.addEventListener('change', e => {
          const file = e.target.files?.[0];
          if (!file) return;
          const reader = new FileReader();
          reader.onload = ev => { if (typeof ev.target?.result === 'string') previewEl.src = ev.target.result; };
          reader.readAsDataURL(file);
        });
      };
      bindPreview(document.getElementById('avatar'), document.getElementById('avatarPreview'));
      bindPreview(document.getElementById('background'), document.getElementById('backgroundPreview'));
    });
  </script>
@endsection
