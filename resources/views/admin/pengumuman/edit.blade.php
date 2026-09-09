@extends('admin.layout')

@section('title', 'Edit Pengumuman')
@section('page-title', 'Edit Pengumuman')
@section('page-subtitle', 'Perbarui isi pengumuman yang sudah ada')

@section('head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#konten',
        plugins: 'lists link table',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link | removeformat',
        menubar: false,
        height: 400,
    });
</script>
@endsection

@section('content')

<div class="max-w-3xl">
    <a href="{{ route('admin.pengumuman.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 text-sm font-medium mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke daftar
    </a>

    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" class="space-y-6">
        @csrf @method('PUT')

        <div class="card space-y-6">
            <div>
                <label for="judul" class="form-label">Judul Pengumuman <span class="text-red-500">*</span></label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $pengumuman->judul) }}"
                       class="form-input @error('judul') border-red-400 @enderror">
                @error('judul')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="kategori" class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select id="kategori" name="kategori" class="form-input">
                        @foreach(['umum' => 'Umum', 'kegiatan' => 'Kegiatan', 'penting' => 'Penting', 'kesehatan' => 'Kesehatan', 'infrastruktur' => 'Infrastruktur'] as $val => $label)
                        <option value="{{ $val }}" {{ old('kategori', $pengumuman->kategori) == $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="status" class="form-label">Status <span class="text-red-500">*</span></label>
                    <select id="status" name="status" class="form-input">
                        <option value="aktif" {{ old('status', $pengumuman->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="arsip" {{ old('status', $pengumuman->status) == 'arsip' ? 'selected' : '' }}>Arsip</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="tanggal_tayang" class="form-label">Tanggal Mulai Tayang <span class="text-red-500">*</span></label>
                    <input type="date" id="tanggal_tayang" name="tanggal_tayang"
                           value="{{ old('tanggal_tayang', $pengumuman->tanggal_tayang->format('Y-m-d')) }}"
                           class="form-input">
                </div>
                <div>
                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <input type="date" id="tanggal_berakhir" name="tanggal_berakhir"
                           value="{{ old('tanggal_berakhir', $pengumuman->tanggal_berakhir?->format('Y-m-d')) }}"
                           class="form-input">
                </div>
            </div>

            <div>
                <label for="konten" class="form-label">Isi Pengumuman <span class="text-red-500">*</span></label>
                <textarea id="konten" name="konten" rows="10"
                          class="form-input">{{ old('konten', $pengumuman->konten) }}</textarea>
                @error('konten')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection
