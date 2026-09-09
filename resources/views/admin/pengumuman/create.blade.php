@extends('admin.layout')

@section('title', 'Buat Pengumuman')
@section('page-title', 'Buat Pengumuman Baru')
@section('page-subtitle', 'Isi formulir berikut untuk menambah pengumuman')

@section('head')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#konten',
        plugins: 'lists link table',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link | removeformat',
        menubar: false,
        height: 400,
        skin: 'oxide',
        content_css: 'default',
    });
</script>
@endsection

@section('content')

<div class="max-w-3xl">
    <a href="{{ route('admin.pengumuman.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 text-sm font-medium mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke daftar
    </a>

    <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="card space-y-6">
            <div>
                <label for="judul" class="form-label">Judul Pengumuman <span class="text-red-500">*</span></label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                       class="form-input @error('judul') border-red-400 @enderror"
                       placeholder="Masukkan judul pengumuman...">
                @error('judul')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="kategori" class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select id="kategori" name="kategori" class="form-input @error('kategori') border-red-400 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="umum" {{ old('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="penting" {{ old('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                        <option value="kesehatan" {{ old('kategori') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                        <option value="infrastruktur" {{ old('kategori') == 'infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                    </select>
                    @error('kategori')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="status" class="form-label">Status <span class="text-red-500">*</span></label>
                    <select id="status" name="status" class="form-input @error('status') border-red-400 @enderror">
                        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="arsip" {{ old('status') == 'arsip' ? 'selected' : '' }}>Arsip</option>
                    </select>
                    @error('status')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="tanggal_tayang" class="form-label">Tanggal Mulai Tayang <span class="text-red-500">*</span></label>
                    <input type="date" id="tanggal_tayang" name="tanggal_tayang"
                           value="{{ old('tanggal_tayang', now()->format('Y-m-d')) }}"
                           class="form-input @error('tanggal_tayang') border-red-400 @enderror">
                    @error('tanggal_tayang')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <input type="date" id="tanggal_berakhir" name="tanggal_berakhir"
                           value="{{ old('tanggal_berakhir') }}"
                           class="form-input @error('tanggal_berakhir') border-red-400 @enderror">
                    @error('tanggal_berakhir')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label for="konten" class="form-label">Isi Pengumuman <span class="text-red-500">*</span></label>
                <textarea id="konten" name="konten" rows="10"
                          class="form-input @error('konten') border-red-400 @enderror">{{ old('konten') }}</textarea>
                @error('konten')<p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Pengumuman
            </button>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection
