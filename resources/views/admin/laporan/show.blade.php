@extends('admin.layout')

@section('title', 'Detail Laporan #' . str_pad($laporan->id, 4, '0', STR_PAD_LEFT))
@section('page-title', 'Detail Laporan')
@section('page-subtitle', 'Laporan #' . str_pad($laporan->id, 4, '0', STR_PAD_LEFT) . ' dari ' . $laporan->nama_pelapor)

@section('content')

<a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 text-sm font-medium mb-6 transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    Kembali ke daftar
</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Laporan Detail --}}
    <div class="lg:col-span-2 space-y-6">
        <div class="card">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <span class="badge mb-3
                        @if($laporan->status == 'baru') bg-blue-100 text-blue-700
                        @elseif($laporan->status == 'diproses') bg-amber-100 text-amber-700
                        @elseif($laporan->status == 'selesai') bg-emerald-100 text-emerald-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ $laporan->status_label }}
                    </span>
                    <h2 class="text-xl font-bold text-slate-900">{{ $laporan->judul }}</h2>
                    <div class="flex items-center gap-4 mt-2 text-sm text-slate-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $laporan->created_at->isoFormat('D MMMM Y, HH:mm') }}
                        </span>
                        <span class="badge bg-slate-100 text-slate-600">{{ $laporan->kategori_label }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-xl p-5 mb-6">
                <p class="text-slate-700 leading-relaxed">{{ $laporan->deskripsi }}</p>
            </div>

            @if($laporan->lokasi)
            <div class="flex items-center gap-2 text-slate-600 text-sm">
                <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>{{ $laporan->lokasi }}</span>
            </div>
            @endif
        </div>

        {{-- Foto --}}
        @if($laporan->foto)
        <div class="card">
            <h3 class="font-bold text-slate-800 mb-4">Foto Laporan</h3>
            <img src="{{ $laporan->foto_url }}" alt="Foto Laporan" class="w-full rounded-xl object-cover max-h-96 border border-slate-200">
        </div>
        @endif

        {{-- Catatan Admin --}}
        @if($laporan->catatan_admin)
        <div class="card border-l-4 border-primary">
            <h3 class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Catatan Admin
            </h3>
            <p class="text-slate-700 leading-relaxed">{{ $laporan->catatan_admin }}</p>
        </div>
        @endif
    </div>

    {{-- Sidebar: Pelapor + Update Status --}}
    <div class="space-y-6">

        {{-- Info Pelapor --}}
        <div class="card">
            <h3 class="font-bold text-slate-800 mb-4">Info Pelapor</h3>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary font-bold text-sm">
                        {{ strtoupper(substr($laporan->nama_pelapor, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-semibold text-slate-800">{{ $laporan->nama_pelapor }}</div>
                        <div class="text-sm text-slate-500">Warga Desa Kawu</div>
                    </div>
                </div>
                <div class="border-t border-slate-100 pt-3">
                    <div class="text-xs text-slate-400 mb-1">Kontak / No. WA</div>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $laporan->kontak_pelapor) }}" target="_blank"
                       class="text-primary font-semibold hover:underline text-sm">
                        {{ $laporan->kontak_pelapor }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Update Status --}}
        <div class="card">
            <h3 class="font-bold text-slate-800 mb-4">Perbarui Status</h3>
            <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <div>
                    <label class="form-label">Status Laporan</label>
                    <select name="status" class="form-input">
                        <option value="baru" {{ $laporan->status == 'baru' ? 'selected' : '' }}>Baru Masuk</option>
                        <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                        <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Catatan Admin <span class="text-slate-400 font-normal">(opsional)</span></label>
                    <textarea name="catatan_admin" rows="4" class="form-input" placeholder="Tambahkan catatan atau tindakan yang dilakukan...">{{ $laporan->catatan_admin }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Status
                </button>
            </form>

            <div class="border-t border-slate-100 mt-4 pt-4">
                <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus laporan ini secara permanen?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-red-500 border border-red-200 hover:bg-red-50 rounded-xl text-sm font-semibold transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Laporan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
