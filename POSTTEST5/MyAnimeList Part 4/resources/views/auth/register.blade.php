@extends('layouts.app')

@section('content')
  <section class="flex min-h-[75vh] items-center justify-center">
    <div class="glass-panel grid w-full max-w-4xl gap-12 px-10 py-12 md:grid-cols-2">
      <div class="flex flex-col justify-between">
        <div>
          <span class="stat-badge mb-4 inline-flex items-center gap-2 bg-white/60 text-sky-600 shadow-sky-100/70 dark:bg-slate-900/70 dark:text-cyan-200 dark:shadow-cyan-500/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2a5 5 0 010 10 5 5 0 010-10zM4 20a8 8 0 0116 0H4z" />
            </svg>
            Buat akunmu
          </span>
          <h1 class="text-3xl font-semibold text-slate-800 transition-colors duration-500 dark:text-slate-100">Gabung ke komunitas AnimeList</h1>
          <p class="mt-3 text-sm textsub transition-colors duration-500">Bookmark serial favorit, dapatkan rekomendasi personal, dan bangun profil dengan gaya unikmu.</p>
        </div>

        <div class="mt-10 grid gap-4 rounded-3xl bg-gradient-to-br from-sky-500/15 via-cyan-500/15 to-sky-500/10 p-6 text-sm font-medium text-sky-700 shadow-inner shadow-sky-200/40 dark:from-slate-900/70 dark:via-slate-900/60 dark:to-slate-900/60 dark:text-cyan-100">
          <div class="flex items-center gap-3">
            <span class="grid h-8 w-8 place-content-center rounded-full bg-white/70 text-sky-500 shadow dark:bg-slate-900/70 dark:text-cyan-200">1</span>
            Pilih username unikmu.
          </div>
          <div class="flex items-center gap-3">
            <span class="grid h-8 w-8 place-content-center rounded-full bg-white/70 text-sky-500 shadow dark:bg-slate-900/70 dark:text-cyan-200">2</span>
            Masukkan email aktif agar tetap terhubung dengan update terbaru.
          </div>
          <div class="flex items-center gap-3">
            <span class="grid h-8 w-8 place-content-center rounded-full bg-white/70 text-sky-500 shadow dark:bg-slate-900/70 dark:text-cyan-200">3</span>
            Buat password kuat dan konfirmasi ulang untuk keamanan akun.
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('register.perform') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
          <label for="username" class="text-sm font-semibold textlabel transition-colors duration-500">Username</label>
          <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username"
            class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
            placeholder="Pilih username">
          @error('username')
            <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label for="email" class="text-sm font-semibold textlabel transition-colors duration-500">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
            class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
            placeholder="Masukkan email aktif">
          @error('email')
            <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="grid gap-6 md:grid-cols-2">
          <div class="space-y-2">
            <label for="password" class="text-sm font-semibold textlabel transition-colors duration-500">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
              class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
              placeholder="Minimal 8 karakter">
            @error('password')
              <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="space-y-2">
            <label for="password_confirmation" class="text-sm font-semibold textlabel transition-colors duration-500">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
              class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
              placeholder="Ulangi password">
          </div>
        </div>

        <button type="submit" class="btn w-full rounded-2xl border-none bg-gradient-to-r from-sky-500 via-cyan-500 to-emerald-500 py-3 text-lg font-semibold text-white shadow-lg shadow-sky-500/30 transition hover:scale-[1.01] hover:shadow-sky-500/40 dark:from-cyan-500 dark:via-sky-600 dark:to-emerald-500">
          Daftar Sekarang
        </button>

        <p class="text-center text-sm textsub">
          Sudah punya akun?
          <a href="{{ route('login') }}" class="font-semibold text-sky-600 transition hover:text-sky-700 dark:text-cyan-200 dark:hover:text-cyan-100">Masuk di sini</a>
        </p>
      </form>
    </div>
  </section>
@endsection
