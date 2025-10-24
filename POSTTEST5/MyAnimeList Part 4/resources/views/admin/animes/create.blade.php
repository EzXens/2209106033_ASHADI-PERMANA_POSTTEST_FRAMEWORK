@extends('admin.layouts.app')

@section('admin-content')
  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-semibold text-slate-700 dark:text-cyan-100">Tambah Anime</h1>
      <p class="text-sm text-slate-500 dark:text-slate-400">Lengkapi detail anime untuk memperkaya daftar koleksi.</p>
    </div>

    <form method="POST" action="{{ route('admin.animes.store') }}" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @include('admin.animes.form')
    </form>
  </div>
@endsection
