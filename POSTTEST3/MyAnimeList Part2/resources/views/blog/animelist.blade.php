@extends('layouts.app')

@section('content_animelist')
{{-- <div class="p-6 text-white">
  <h1 class="text-3xl font-bold text-sky-400 mb-4">Anime List</h1>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach($animes as $anime)
      <a href="{{ route('blog.show', $anime->id) }}" class="block bg-gray-800 rounded-lg shadow hover:scale-105 transition">
        <img src="{{ asset($anime->image) }}" class="w-full h-60 object-cover rounded-t-lg">
        <div class="p-3">
          <h2 class="text-lg font-bold">{{ $anime->title }}</h2>
          <p class="text-sm text-gray-400">{{ $anime->genre }}</p>
        </div>
      </a>
    @endforeach
  </div>
</div> --}}

<div class="p-3">
  <h1 class="text-2xl font-bold text-sky-500 mb-4">Anime List</h1>

 {{-- Filter Huruf A-Z --}}
<div class="flex flex-wrap gap-2 mb-6">
  @foreach (range('A', 'Z') as $letter)
      <a href="#{{ $letter }}" 
         class="px-3 py-1 bg-sky-500 text-white rounded hover:bg-blue-700">
         {{ $letter }}
      </a>
  @endforeach
</div>

{{-- List Anime berdasarkan group huruf --}}
@foreach ($grouped as $letter => $items)
    <h3 id="{{ $letter }}" class="text-xl font-bold mt-6">{{ $letter }}</h3>
    <hr class="mb-2">

    <ul class="mb-4">
        @foreach ($items as $anime)
            <li class="p-2 bg-sky-500 hover:bg-blue-700 text-white rounded mb-2">
                 <a href="{{ route('blog.show', $anime->id) }}" class="text-white hover:underline  font-semibold">
          {{ $anime->title }}
        </a>
            </li>
        @endforeach
    </ul>
@endforeach
</div>

@endsection
