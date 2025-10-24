@extends('admin.layouts.app')

@section('admin-content')
  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-semibold text-slate-700 dark:text-cyan-100">Edit Tag</h1>
      <p class="text-sm text-slate-500 dark:text-slate-400">Perbarui nama tag agar sesuai dengan kategori anime.</p>
    </div>

    <form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="space-y-6">
      @csrf
      @method('PUT')
      @include('admin.tags.form')
    </form>
  </div>
@endsection
