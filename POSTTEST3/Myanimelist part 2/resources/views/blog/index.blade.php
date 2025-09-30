@extends('layouts.app')


@section('carousel')
 <div class="relative w-full h-[500px] overflow-hidden shadow-lg" id="animeCarousel">
    <div class="flex transition-transform duration-700 ease-in-out" id="carouselTrack">
      {{-- Clone Last --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c4.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 1 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c1.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 2 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c2.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 3 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c3.png" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Slide 4 --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c4.jpg" class="w-full h-[500px] object-cover" />
      </div>

      {{-- Clone First --}}
      <div class="carousel-item relative w-full flex-shrink-0">
        <img src="image/c1.jpg" class="w-full h-[500px] object-cover" />
      </div>
    </div>

    {{-- overlay teks tetap --}}
{{-- overlay teks tetap --}}
<div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center px-4">
  <div class="bg-white/20 backdrop-blur-sm p-2 rounded-xl max-w-1xl">
    <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-lg">
      Welcome to AnimeList ~ My World of Stories
    </h1>
    <p class="mt-4 text-lg md:text-xl text-white">
      Temukan koleksi anime favoritmu, jelajahi kisah epik, dan nikmati perjalanan tanpa akhir dalam dunia fantasi.
    </p>
    <a href="{{route('blog.animelist')}}" class="mt-6 btn bg-sky-500 hover:bg-sky-600 border-none text-white text-lg px-6">
      View Anime
    </a>
  </div>
</div>


    {{-- tombol navigasi manual --}}
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <button id="prevBtn" class="btn btn-circle">❮</button>
      <button id="nextBtn" class="btn btn-circle">❯</button>
    </div>
  </div>
@endsection

@section('content')


{{-- Fall Anime 2025 --}}
<h1 class="text-3xl font-bold text-sky-600 mb-6">Fall Anime 2025</h1>
<div class="relative">
  <div class="flex gap-4 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory">
    @foreach($fallAnimes as $anime)
      <div class="min-w-[200px] snap-start">
        <div class="relative group rounded-lg overflow-hidden shadow-lg transform transition duration-500 hover:scale-110 hover:translate-x-2 hover:z-10">
          <img src="{{ asset($anime->image) }}" alt="{{ $anime->title }}" class="w-full h-72 object-cover">
          <div class="absolute bottom-0 inset-x-0 bg-black/60 text-white text-center p-2">
            {{ $anime->title }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

{{-- Most Popular Anime --}}
<h1 class="text-3xl font-bold text-sky-600 mt-12 mb-6">Most Popular Anime</h1>
<div class="relative">
  <div class="flex gap-4 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory">
    @foreach($popularAnimes as $anime)
      <div class="min-w-[200px] snap-start">
        <div class="relative group rounded-lg overflow-hidden shadow-lg transform transition duration-500 hover:scale-110 hover:translate-x-2 hover:z-10">
          <img src="{{ asset($anime->image) }}" alt="{{ $anime->title }}" class="w-full h-72 object-cover">
          <div class="absolute bottom-0 inset-x-0 bg-black/60 text-white text-center p-2">
            {{ $anime->title }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>



<script>
  function addScrollButtons(containerId, prevBtnId, nextBtnId) {
    const container = document.getElementById(containerId);
    document.getElementById(prevBtnId).addEventListener("click", () => {
      container.scrollBy({ left: -220, behavior: "smooth" });
    });
    document.getElementById(nextBtnId).addEventListener("click", () => {
      container.scrollBy({ left: 220, behavior: "smooth" });
    });
  }

  addScrollButtons("fallAnime", "prevFall", "nextFall");
  addScrollButtons("popularAnime", "prevPopular", "nextPopular");
</script>

@endsection
