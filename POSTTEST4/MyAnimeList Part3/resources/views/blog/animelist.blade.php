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

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
@foreach($items as $anime)
  <a href="{{ route('blog.show', $anime->id) }}" 
     class="block bg-sky-500 text-white rounded-lg shadow hover:scale-105 transition relative">

    {{-- Gambar Anime --}}
    <div class="relative">
      <img src="{{ asset($anime->image) }}" class="w-full h-70 object-fill rounded-t-lg">

      {{-- Label Status di pojok kanan atas --}}
      @php
          $statusColor = match(strtolower($anime->status)) {
              'completed' => 'bg-green-500',
              'ongoing'   => 'bg-yellow-500',
              'upcoming'  => 'bg-red-500',
              default     => 'bg-gray-500',
          };
      @endphp

      <div class="absolute top-2 right-2 px-2 py-1 text-xs font-bold text-white rounded {{ $statusColor }}">
          {{ ucfirst($anime->status ?? 'Unknown') }}
      </div>
    </div>

    {{-- Info Anime --}}
    <div class="p-3">
      <h2 class="text-lg font-bold">{{ $anime->title }}</h2>
      <p class="font-semibold text-sm text-white">{{ $anime->genre }}</p>
      <span class="font-semibold">Total Episode</span> : {{ $anime->total_episodes ?? '-' }}
      <br>
      <span class="font-extrabold">Skor</span> : {{ $anime->score ?? '-' }} ⭐
    </div>

  </a>
@endforeach

  </div>
@endforeach
</div>

@endsection
