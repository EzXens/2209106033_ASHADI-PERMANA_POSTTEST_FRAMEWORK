@php
  $isEdit = isset($tag);
  $inputClass = 'textfield w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100';
@endphp

<div class="space-y-4">
  <div>
    <label class="text-sm font-semibold text-slate-600 dark:text-slate-200">Nama Tag</label>
    <input type="text" name="name" value="{{ old('name', $isEdit ? $tag->name : '') }}" required class="{{ $inputClass }}" placeholder="Contoh: Shounen" />
    @error('name')
      <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
    @enderror
  </div>
</div>

<div class="mt-6 flex justify-end gap-3">
  <a href="{{ route('admin.tags.index') }}" class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">Batal</a>
  <button type="submit" class="rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg">
    {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Tag' }}
  </button>
</div>
