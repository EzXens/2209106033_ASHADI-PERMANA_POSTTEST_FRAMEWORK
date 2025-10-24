@extends('layouts.app')

@section('content')
  <section class="flex min-h-[70vh] items-center justify-center">
    <div class="glass-panel w-full max-w-2xl px-10 py-12">
      <div class="mb-10 text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-sky-500/15 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-sky-600">
          <span class="h-2 w-2 rounded-full bg-sky-400 animate-pulse"></span>
          Welcome back
        </span>
        <h1 class="mt-4 text-3xl font-semibold text-slate-800 transition-colors duration-500 dark:text-slate-100">Masuk ke akunmu</h1>
        <p class="mt-2 text-sm textsub transition-colors duration-500">Akses watchlist, rekomendasi, dan profil eksklusifmu.</p>
      </div>

      <form method="POST" action="{{ route('login.perform') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
          <label for="login" class="text-sm font-semibold textlabel transition-colors duration-500">Email atau Username</label>
          <div class="relative">
            <input id="login" type="text" name="login" value="{{ old('login') }}" required autocomplete="username"
              class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
              placeholder="Ketik email atau username">
            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sky-400/70">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a5 5 0 00-5 5v1H4a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V7a5 5 0 00-5-5zm-3 6V7a3 3 0 016 0v1H7zm3 4a2 2 0 110 4 2 2 0 010-4z" />
              </svg>
            </span>
          </div>
          @error('login')
            <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label for="password" class="text-sm font-semibold textlabel transition-colors duration-500">Password</label>
          <div class="relative">
            <input id="password" type="password" name="password" required autocomplete="current-password"
              class="textfield w-full rounded-2xl border border-sky-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-sky-100/40 focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-cyan-500/20 dark:focus:border-cyan-300 dark:focus:ring-cyan-400"
              placeholder="Masukkan password">
            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sky-400/70">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c-1.104 0-2 .672-2 1.5S10.896 14 12 14s2-.672 2-1.5S13.104 11 12 11z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12c1.5-3.5 4.5-5.5 7.5-5.5s6 2 7.5 5.5c-1.5 3.5-4.5 5.5-7.5 5.5s-6-2-7.5-5.5z" />
              </svg>
            </span>
          </div>
          @error('password')
            <p class="text-sm font-medium text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 text-sm textsub">
            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} class="checkbox checkbox-sm border-sky-200 text-sky-500" />
            Ingat saya
          </label>
          <a href="{{ route('register') }}" class="text-sm font-semibold text-sky-600 transition hover:text-sky-700 dark:text-cyan-200 dark:hover:text-cyan-100">Belum punya akun?</a>
        </div>

        <button type="submit" class="btn w-full rounded-2xl border-none bg-gradient-to-r from-sky-500 via-cyan-500 to-sky-500 py-3 text-lg font-semibold text-white shadow-lg shadow-sky-500/30 transition hover:scale-[1.01] hover:shadow-sky-500/40 dark:from-sky-600 dark:via-cyan-500 dark:to-emerald-500">
          Masuk
        </button>

        <div class="text-center text-sm textsub">
          <span>Admin?</span>
          <a href="{{ route('admin.login') }}" class="font-semibold text-rose-500 transition hover:text-rose-600">Masuk di sini</a>
        </div>
      </form>
    </div>
  </section>
@endsection
