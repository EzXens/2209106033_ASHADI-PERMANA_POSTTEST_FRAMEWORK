<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anime List</title>
  <script>
    (() => {
      try {
        const storedTheme = localStorage.getItem('theme');
        if (storedTheme === 'dark') {
          document.documentElement.classList.add('dark');
        }
        // Hapus bagian matchMedia (prefers-color-scheme)
      } catch (_) { /* ignore */ }
    })();

  </script>
  @vite('resources/css/app.css')

  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="relative overflow-x-hidden text-gray-800 transition-colors duration-500">
  <div class="pointer-events-none fixed inset-0 -z-10 ambient-overlay">
    <div
      class="ambient-bubble ambient-bubble-1 absolute left-1/2 top-12 h-80 w-80 -translate-x-1/2 rounded-full bg-sky-200/35 blur-3xl animate-tilt">
    </div>
    <div
      class="ambient-bubble ambient-bubble-2 absolute -left-24 bottom-0 h-72 w-72 rounded-full bg-sky-300/30 blur-3xl animate-float">
    </div>
    <div
      class="ambient-bubble ambient-bubble-3 absolute -right-10 top-1/3 h-64 w-64 rounded-full bg-sky-200/20 blur-3xl animation-delay-300 animate-float">
    </div>
  </div>

  {{-- Navbar --}}
  <header class="sticky top-0 z-50 backdrop-blur-md">
    @include('components.layout.navbar')
  </header>

  {{-- Carousel --}}
  @hasSection('carousel')
    <section class="mx-auto mb-12 animate-fade-in">
      @yield('carousel')
    </section>
  @endif

  <div class="relative z-10 flex min-h-screen flex-col">


    <script>
      const track = document.getElementById("carouselTrack");
      if (track) {
        const slides = track.querySelectorAll(".carousel-item");
        const totalSlides = slides.length;

        let currentSlide = 1;
        const slideWidth = 100;

        const goToSlide = (index) => {
          currentSlide = index;
          track.style.transition = "transform 0.7s ease-in-out";
          track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
        };

        const nextSlide = () => {
          if (currentSlide >= totalSlides - 1) return;
          goToSlide(currentSlide + 1);
        };

        const prevSlide = () => {
          if (currentSlide <= 0) return;
          goToSlide(currentSlide - 1);
        };

        track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;

        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

        nextBtn?.addEventListener("click", nextSlide);
        prevBtn?.addEventListener("click", prevSlide);

        track.addEventListener("transitionend", () => {
          if (currentSlide === totalSlides - 1) {
            track.style.transition = "none";
            currentSlide = 1;
            track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
          }
          if (currentSlide === 0) {
            track.style.transition = "none";
            currentSlide = totalSlides - 2;
            track.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
          }
        });

        setInterval(nextSlide, 5000);
      }
    </script>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('[data-animate]');
        const animationMap = {
          'fade-up': 'animate-fade-up',
          'fade-in': 'animate-fade-in',
          'slide-in': 'animate-slide-in',
          'zoom-in': 'animate-zoom-in',
          'rise': 'animate-rise'
        };

        const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const el = entry.target;
              const key = el.dataset.animate || 'fade-up';
              const delay = el.dataset.animateDelay;
              const animationClass = animationMap[key] || animationMap['fade-up'];

              if (delay) {
                const delayValue = Number(delay);
                if (!Number.isNaN(delayValue)) {
                  el.style.animationDelay = `${delayValue.toFixed(2)}s`;
                }
              }

              el.classList.add(animationClass);
              el.classList.remove('will-animate');
              obs.unobserve(el);
            }
          });
        }, {
          threshold: 0.15,
          rootMargin: '0px 0px -10% 0px'
        });

        animatedElements.forEach(el => {
          el.classList.add('will-animate');
          observer.observe(el);
        });
      });
    </script>

    <div class="flex-1">
      @hasSection('content')
        <main class="container mx-auto px-4 pb-16">
          <div class="space-y-16 animate-fade-up">
            @yield('content')
          </div>
        </main>
      @endif

      @hasSection('content_animelist')
        <main class="container mx-auto px-4 pb-20">
          <div class="space-y-12 animate-fade-up animation-delay-150">
            @yield('content_animelist')
          </div>
        </main>
      @endif

      @hasSection('content_profile')
        <main class="container" >
          <div>
            @yield('content_profile')
          </div>
        </main>
      @endif
    </div>

    {{-- Footer --}}
    @include('components.layout.footer')
  </div>

</body>

</html>