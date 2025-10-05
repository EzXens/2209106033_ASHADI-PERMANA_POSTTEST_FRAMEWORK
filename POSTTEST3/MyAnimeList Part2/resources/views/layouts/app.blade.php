<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime List</title>
    @vite('resources/css/app.css')

    <style>
      
      html {
  scroll-behavior: smooth;
    }

    </style>
</head>
<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('components.layout.navbar')

{{-- Carousel --}}
<section class="mb-10">
 @yield('carousel')
</section>
 

<script>
  const track = document.getElementById("carouselTrack");
  const slides = document.querySelectorAll("#carouselTrack .carousel-item");
  const totalSlides = slides.length;

  let currentSlide = 1; // mulai di slide 1 (bukan clone)
  const slideWidth = 100; // persen lebar tiap slide

  // posisi awal
  track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;

  function goToSlide(index) {
    currentSlide = index;
    track.style.transition = "transform 0.7s ease-in-out";
    track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
  }

  function nextSlide() {
    if (currentSlide >= totalSlides - 1) return;
    goToSlide(currentSlide + 1);
  }

  function prevSlide() {
    if (currentSlide <= 0) return;
    goToSlide(currentSlide - 1);
  }

  // tombol manual
  document.getElementById("nextBtn").addEventListener("click", nextSlide);
  document.getElementById("prevBtn").addEventListener("click", prevSlide);

  // transisi infinite
  track.addEventListener("transitionend", () => {
    if (currentSlide === totalSlides - 1) {
      // kalau sampai clone pertama (slide setelah terakhir)
      track.style.transition = "none";
      currentSlide = 1;
      track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
    }
    if (currentSlide === 0) {
      // kalau sampai clone terakhir (slide sebelum pertama)
      track.style.transition = "none";
      currentSlide = totalSlides - 2;
      track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
    }
  });

  // auto slide
  setInterval(() => {
    nextSlide();
  }, 5000);

</script>


    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-10">
        @yield('content')
    </main>

    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-10">
        @yield('content_animelist')
    </main>

    {{-- Footer --}}
    @include('components.layout.footer')

</body>
</html>
