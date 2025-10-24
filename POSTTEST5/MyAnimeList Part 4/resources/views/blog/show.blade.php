@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class=" px-6 py-8">
            <div class="flex flex-col gap-8 lg:flex-row">
                <div class=" w-full max-w-sm">
                    <div class="spotlight-card">
                        <div class="spotlight-image h-[420px]">
                            @php
                                $imageUrl = $anime->image
                                    ? (\Illuminate\Support\Str::startsWith($anime->image, ['http://', 'https://'])
                                        ? $anime->image
                                        : \Illuminate\Support\Facades\Storage::url($anime->image))
                                    : asset('image/default.jpg');
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $anime->title }}" class="h-full w-full object-fill" loading="lazy">
                        </div>
                    </div>
                    @if($anime->streaming_url)
                        <a href="{{ $anime->streaming_url }}" target="_blank"
                            class="mt-6 flex items-center justify-center gap-2 rounded-full bg-rose-500/90 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-200/60 transition hover:-translate-y-1 hover:bg-rose-500">
                            ▶ Watch Now
                        </a>
                    @endif
                </div>

                <div class="flex-1 space-y-6">
                    <div class="space-y-2">
                        <span class="inline-flex items-center gap-2 rounded-full bg-sky-500/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-sky-600">Featured Anime</span>
                        <h1 class="text-4xl font-bold text-sky-600 drop-shadow-sm">{{ $anime->title }}</h1>
                        <p class="text-sm textlabel transition-colors duration-500"><span class="font-semibold textsub2 transition-colors duration-500">Japanese:</span> {{ $anime->japanese_title ?? '-' }}</p>
                    </div>

                    <div class="glass-panel grid gap-4 rounded-2xl p-6 text-sm textsub transition-colors duration-500 shadow-inner shadow-sky-100/70 md:grid-cols-2">
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Skor:</span> {{ $anime->score ?? '-' }} ⭐</div>
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Status:</span> {{ $anime->status ?? '-' }}</div>
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Total Episode:</span> {{ $anime->total_episodes ?? '-' }}</div>
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Durasi:</span> {{ $anime->duration ?? '-' }}</div>
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Tanggal Rilis:</span> {{ optional($anime->release_date)->format('Y-m-d') ?? $anime->release_date ?? '-' }}</div>
                        <div><span class="font-semibold textsub2 transition-colors duration-500">Studio:</span> {{ $anime->studio ?? '-' }}</div>
                        <div class="md:col-span-2"><span class="font-semibold textsub2 transition-colors duration-500">Genre:</span> {{ $anime->genre ?? '-' }}</div>
                        <div class="md:col-span-2"><span class="font-semibold textsub2 transition-colors duration-500">Source:</span> {{ $anime->source->name ?? '-' }}</div>
                    </div>

                    @if($anime->tags->count())
                        <div class="space-y-3">
                            <span class="text-sm font-semibold textsub2 transition-colors duration-500">Tags</span>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($anime->tags as $tag)
                                    <a href="{{ route('blog.animelist', ['tag' => $tag->name]) }}" class="tag-glow">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($anime->trailer)
                        @php
                            preg_match('/v=([^\&]+)/', $anime->trailer->youtube_url, $match);
                            $videoId = $match[1] ?? null;
                        @endphp

                        @if($videoId)
                            <div class="glass-panel rounded-3xl p-4 shadow-lg shadow-sky-100/70">
                                <div class="aspect-video overflow-hidden rounded-2xl">
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" allowfullscreen class="h-full w-full"></iframe>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="glass-panel mt-10 rounded-3xl p-6">
                <h2 class="text-2xl font-bold text-sky-600">Sinopsis</h2>
                <p class="mt-4 text-base leading-relaxed textsub transition-colors duration-500">
                    {{ $anime->synopsis ?? $anime->sinopsis ?? 'Belum ada sinopsis.' }}
                </p>
            </div>
        </div>

        <div class="mt-6 flex justify-start">
            <a href="{{ route('blog.animelist')}}"
                class="rounded-full bg-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-200/60 transition hover:-translate-y-1 hover:bg-sky-600">
                ← Kembali
            </a>
        </div>
    </div>
@endsection