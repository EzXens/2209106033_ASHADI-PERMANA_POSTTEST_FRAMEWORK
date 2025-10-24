@extends('layouts.app')

@section('content')
  <section class="flex min-h-[70vh] items-center justify-center">
    <div class="glass-panel w-full max-w-2xl px-10 py-12">
      <div class="mb-10 text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-rose-500/15 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-rose-600">
          <span class="h-2 w-2 rounded-full bg-rose-400 animate-pulse"></span>
          Admin Access
        </span>
        <h1 class="mt-4 text-3xl font-semibold text-slate-800 transition-colors duration-500 dark:text-slate-100">Masuk sebagai Admin</h1>
        <p class="mt-2 text-sm text-slate-500 transition-colors duration-500 dark:text-slate-400">Kelola konten anime, tag, sumber, dan trailer dengan akun admin.</p>
      </div>

      <form method="POST" action="{{ route('admin.login.perform') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
          <label for="login" class="text-sm font-semibold text-slate-600 transition-colors duration-500 dark:text-slate-200">Email atau Username</label>
          <div class="relative">
            <input id="login" type="text" name="login" value="{{ old('login') }}" required autocomplete="username"
              class="textfield w-full rounded-2xl border border-rose-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-rose-100/40 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-rose-500/20 dark:focus:border-rose-300 dark:focus:ring-rose-400"
              placeholder="Ketik email atau username admin">
            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-rose-400/70">
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
          <label for="password" class="text-sm font-semibold text-slate-600 transition-colors duration-500 dark:text-slate-200">Password</label>
          <div class="relative">
            <input id="password" type="password" name="password" required autocomplete="current-password"
              class="textfield w-full rounded-2xl border border-rose-100 bg-white/90 px-5 py-3 text-base shadow-lg shadow-rose-100/40 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200 transition dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-100 dark:shadow-rose-500/20 dark:focus:border-rose-300 dark:focus:ring-rose-400"
              placeholder="Masukkan password admin">
            <span class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-rose-400/70">
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

        <label class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
          <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} class="checkbox checkbox-sm border-rose-200 text-rose-500" />
          Ingat saya di perangkat ini
        </label>

        <button type="submit" class="btn w-full rounded-2xl border-none bg-gradient-to-r from-rose-500 via-pink-500 to-rose-500 py-3 text-lg font-semibold text-white shadow-lg shadow-rose-500/30 transition hover:scale-[1.01] hover:shadow-rose-500/40 dark:from-rose-600 dark:via-pink-500 dark:to-rose-500">
          Masuk Dashboard Admin
        </button>

        <a href="{{ route('home') }}" class="block text-center text-sm font-semibold text-slate-600 transition hover:text-rose-500 dark:text-cyan-100">Kembali ke beranda</a>
      </form>
    </div>
  </section>
@endsection
