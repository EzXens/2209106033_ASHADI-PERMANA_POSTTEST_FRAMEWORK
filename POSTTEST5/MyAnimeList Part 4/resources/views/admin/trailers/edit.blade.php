@extends('admin.layouts.app')

@section('admin-content')
  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-semibold text-slate-700 dark:text-cyan-100">Edit Trailer</h1>
      <p class="text-sm text-slate-500 dark:text-slate-400">Perbarui tautan trailer jika ada versi terbaru.</p>
    </div>

    <form method="POST" action="{{ route('admin.trailers.update', $trailer) }}" class="space-y-6">
      @csrf
      @method('PUT')
      @include('admin.trailers.form')
    </form>
  </div>
@endsection
