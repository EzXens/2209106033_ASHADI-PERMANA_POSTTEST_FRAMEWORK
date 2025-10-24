@php
  /** @var \App\Models\Anime|null $anime */
  $isEdit = isset($anime);
  $selectedTags = collect(old('tags', $isEdit ? $anime->tags->pluck('id')->all() : []))->map(fn ($id) => (int) $id)->all();
  $selectedStatus = old('status', $isEdit ? $anime->status : 'Ongoing');
  $selectedSource = old('source_id', $isEdit ? $anime->source_id : null);
  $imageValue = old('image', $isEdit ? $anime->image : '');
  $imagePreview = $imageValue;
  if ($imagePreview && !\Illuminate\Support\Str::startsWith($imagePreview, ['http://', 'https://'])) {
    $imagePreview = \Illuminate\Support\Facades\Storage::url($imagePreview);
  }

  $inputClass = 'textfield w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100';
  $selectClass = 'textfield w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100';
  $textareaClass = 'textfield w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100';
@endphp

<div class="space-y-6 xl:grid xl:grid-cols-3 xl:gap-6 xl:space-y-0">
  <div class="space-y-6 xl:col-span-2">
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition dark:border-slate-700 dark:bg-slate-900/70">
      <header class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">Informasi Umum</h2>
          <p class="text-xs text-slate-500 dark:text-slate-400">Lengkapi detail utama anime.</p>
        </div>
        <span class="inline-flex items-center gap-2 rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-500 dark:bg-slate-800/70 dark:text-rose-300">
          Data Wajib
        </span>
      </header>

      <div class="mt-5 grid gap-4 md:grid-cols-2">
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Judul</label>
          <input type="text" name="title" value="{{ old('title', $isEdit ? $anime->title : '') }}" required class="{{ $inputClass }}" placeholder="Masukkan judul utama" />
          @error('title')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Judul Jepang</label>
          <input type="text" name="japanese_title" value="{{ old('japanese_title', $isEdit ? $anime->japanese_title : '') }}" class="{{ $inputClass }}" placeholder="Judul versi Jepang" />
          @error('japanese_title')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Status</label>
          <select name="status" class="{{ $selectClass }}" required>
            @foreach (['Ongoing' => 'Sedang Tayang', 'Completed' => 'Selesai', 'Upcoming' => 'Segera Hadir'] as $value => $label)
              <option value="{{ $value }}" @selected($selectedStatus === $value)>{{ $label }}</option>
            @endforeach
          </select>
          @error('status')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Skor (0-10)</label>
          <input type="number" step="0.01" min="0" max="10" name="score" value="{{ old('score', $isEdit ? $anime->score : '') }}" class="{{ $inputClass }}" placeholder="Contoh: 8.75" />
          @error('score')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Total Episode</label>
          <input type="number" min="0" name="total_episodes" value="{{ old('total_episodes', $isEdit ? $anime->total_episodes : '') }}" class="{{ $inputClass }}" placeholder="Contoh: 12" />
          @error('total_episodes')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Durasi</label>
          <input type="text" name="duration" value="{{ old('duration', $isEdit ? $anime->duration : '') }}" class="{{ $inputClass }}" placeholder="Contoh: 24 menit" />
          @error('duration')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Tanggal Rilis</label>
          <input type="date" name="release_date" value="{{ old('release_date', $isEdit && $anime->release_date ? \Illuminate\Support\Carbon::parse($anime->release_date)->format('Y-m-d') : '') }}" class="{{ $inputClass }}" />
          @error('release_date')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Studio</label>
          <input type="text" name="studio" value="{{ old('studio', $isEdit ? $anime->studio : '') }}" class="{{ $inputClass }}" placeholder="Contoh: Bones" />
          @error('studio')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="md:col-span-2 space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Genre</label>
          <input type="text" name="genre" value="{{ old('genre', $isEdit ? $anime->genre : '') }}" class="{{ $inputClass }}" placeholder="Action, Fantasy" />
          @error('genre')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition dark:border-slate-700 dark:bg-slate-900/70">
      <header class="mb-4">
        <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">Sinopsis</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Tuliskan ringkasan cerita secara singkat.</p>
      </header>
      <textarea name="synopsis" rows="8" class="{{ $textareaClass }} min-h-[220px]" placeholder="Tuliskan sinopsis anime">{{ old('synopsis', $isEdit ? $anime->synopsis : '') }}</textarea>
      @error('synopsis')
        <p class="mt-2 text-xs text-rose-500">{{ $message }}</p>
      @enderror
    </section>
  </div>

  <div class="space-y-6">
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition dark:border-slate-700 dark:bg-slate-900/70">
      <header class="mb-4">
        <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">Media &amp; Streaming</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Gunakan URL atau unggah gambar secara langsung.</p>
      </header>

      <div class="space-y-4">
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">URL Gambar</label>
          <input type="text" name="image" value="{{ $imageValue }}" class="{{ $inputClass }}" placeholder="https://..." />
          @error('image')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Unggah Gambar</label>
          <input type="file" name="image_file" accept="image/*" class="w-full rounded-2xl border border-dashed border-rose-200 bg-rose-50/40 px-4 py-3 text-sm text-slate-600 shadow-sm transition hover:border-rose-300 hover:bg-rose-50 file:mr-4 file:rounded-full file:border-0 file:bg-rose-500/10 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-rose-500 dark:border-slate-700 dark:bg-slate-900/60 dark:text-slate-200" />
          <p class="text-xs text-slate-500 dark:text-slate-400">Jika mengunggah file, URL di atas akan diabaikan.</p>
          @error('image_file')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        @if ($imagePreview)
          <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-xs text-slate-500 shadow-sm dark:border-slate-700 dark:bg-slate-900/60">
            <span class="font-semibold text-slate-600 dark:text-slate-200">Pratinjau</span>
            <img src="{{ $imagePreview }}" alt="Preview" class="mt-3 h-40 w-full rounded-xl object-cover" />
          </div>
        @endif

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">URL Streaming</label>
          <input type="url" name="streaming_url" value="{{ old('streaming_url', $isEdit ? $anime->streaming_url : '') }}" class="{{ $inputClass }}" placeholder="https://..." />
          @error('streaming_url')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </section>

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition dark:border-slate-700 dark:bg-slate-900/70">
      <header class="mb-4">
        <h2 class="text-lg font-semibold text-slate-700 dark:text-cyan-100">Sumber &amp; Tag</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400">Pilih sumber cerita dan tag yang relevan.</p>
      </header>

      <div class="space-y-4">
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Sumber Cerita</label>
          <select name="source_id" class="{{ $selectClass }}">
            <option value="">Pilih sumber</option>
            @foreach ($sources as $source)
              <option value="{{ $source->id }}" @selected((string) $selectedSource === (string) $source->id)>{{ $source->name }}</option>
            @endforeach
          </select>
          @error('source_id')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="space-y-3">
          <div class="flex items-center justify-between">
            <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Tag Anime</label>
            <span class="text-xs text-slate-400 dark:text-slate-500">Pilih beberapa</span>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white/90 p-4 dark:border-slate-700/60 dark:bg-slate-900/60">
            <div class="max-h-48 space-y-2 overflow-y-auto pr-1">
              @forelse ($tags as $tag)
                <label class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 px-3 py-2 text-sm text-slate-600 shadow-sm transition hover:bg-slate-100 dark:bg-slate-800/70 dark:text-slate-200 dark:hover:bg-slate-800">
                  <span class="flex items-center gap-3">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="checkbox checkbox-sm border-rose-300 text-rose-500" @checked(in_array($tag->id, $selectedTags, true))>
                    {{ $tag->name }}
                  </span>
                  <span class="text-xs text-slate-400 dark:text-slate-500">#{{ $loop->iteration }}</span>
                </label>
              @empty
                <p class="text-xs text-slate-500 dark:text-slate-400">Belum ada tag. <a href="{{ route('admin.tags.create') }}" class="text-rose-500">Tambah tag</a>.</p>
              @endforelse
            </div>
          </div>
          @error('tags')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
          @error('tags.*')
            <p class="text-xs text-rose-500">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </section>
  </div>
</div>

<div class="mt-8 flex flex-wrap justify-end gap-3">
  <a href="{{ route('admin.animes.index') }}" class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">Batal</a>
  <button type="submit" class="rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-rose-500/40 transition hover:scale-[1.01]">
    {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Anime' }}
  </button>
</div>
