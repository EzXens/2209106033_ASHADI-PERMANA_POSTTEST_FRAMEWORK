@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-2">
        <div class="bg-sky-700 border-black border-4 rounded-4xl shadow-2xl p-5 text-white">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-56">
                    <img src="{{ asset($anime->image ?: 'image/default.jpg') }}" alt="{{ $anime->title }}"
                        class="w-full h-auto object-cover rounded-2xl shadow-lg transition transform hover:translate-x-2 hover:scale-105  ">
                </div>

                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-sky-400 mb-2">{{ $anime->title }}</h1>
                    <p class="text-sm text-gray-300 mb-4"><span class="font-semibold">Japanese:</span>
                        {{ $anime->japanese_title ?? '-' }}</p>

                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-200 mb-4">
                        <div><span class="font-semibold">Skor</span> : {{ $anime->score ?? '-' }} ⭐</div>
                        <div><span class="font-semibold">Status</span> : {{ $anime->status ?? '-' }}</div>
                        <div><span class="font-semibold">Total Episode</span> : {{ $anime->total_episodes ?? '-' }}</div>
                        <div><span class="font-semibold">Durasi</span> : {{ $anime->duration ?? '-' }}</div>
                        <div><span class="font-semibold">Tanggal Rilis</span> :
                            {{ optional($anime->release_date)->format('Y-m-d') ?? $anime->release_date ?? '-' }}
                        </div>
                        <div><span class="font-semibold">Studio</span> : {{ $anime->studio ?? '-' }}</div>
                    </div>


                    <p class="text-gray-200">
                        <span class="font-semibold">Genre:</span> {{ $anime->genre ?? '-' }}
                    </p>

                    <p class="text-gray-200 mt-2">
                        <span class="font-semibold">Source:</span>
                        {{ $anime->source->name ?? '-' }}
                    </p>

                    @if($anime->tags->count())
                        <div class="mt-3">
                            <span class="font-semibold text-gray-200">Tags:</span>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach ($anime->tags as $tag)
                                    <a href="{{ route('blog.animelist', ['tag' => $tag->name]) }}"
                                        class="bg-sky-600 hover:bg-sky-800 text-white text-sm px-3 py-1 rounded-full shadow-md transition transform hover:scale-110">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($anime->trailer)
                        @php
                            // Ambil kode video dari link YouTube
                            preg_match('/v=([^\&]+)/', $anime->trailer->youtube_url, $match);
                            $videoId = $match[1] ?? null;
                        @endphp

                        @if($videoId)
                            <div class="my-4">
                                <iframe width="650" height="315" src="https://www.youtube.com/embed/{{ $videoId }}"
                                    title="YouTube video player" frameborder="0" allowfullscreen
                                    class="rounded-xl shadow-lg aspect-video"></iframe>
                            </div>
                        @endif
                    @endif



                    @if($anime->streaming_url)
                        <div class="mt-5">
                            <a href="{{ $anime->streaming_url }}" target="_blank"
                                class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition transform hover:scale-115">
                                ▶ Watch Now
                            </a>
                        </div>
                    @endif

                </div>


            </div>



            {{-- Sinopsis --}}
            <div class="mt-6 bg-gray-800 p-4 rounded border border-sky-600 transition transform hover:scale-115">
                <h2 class="text-2xl font-bold text-sky-400 mb-2">Sinopsis</h2>
                {{-- handle possible different field names (synopsis / sinopsis) --}}
                <p class="text-gray-200 leading-relaxed">
                    {{ $anime->synopsis ?? $anime->sinopsis ?? 'Belum ada sinopsis.' }}
                </p>
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ route('blog.animelist')}}" target="_blank"
                class="inline-block bg-sky-500 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition transform hover:scale-115">
                < Kembali </a>
        </div>
    </div>
@endsection