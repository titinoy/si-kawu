@extends('admin.layout')

@section('title', 'Laporan Masuk')
@section('page-title', 'Laporan Masuk')
@section('page-subtitle', 'Kelola laporan permasalahan dari warga desa')

@section('content')

{{-- Status Tabs --}}
<div class="flex flex-wrap gap-3 mb-6">
    @foreach(['all' => 'Semua', 'baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'] as $key => $label)
    <a href="{{ route('admin.laporan.index', $key != 'all' ? ['status' => $key] + request()->except('status', 'page') : request()->except('status', 'page')) }}"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all
              {{ (request('status') == $key || ($key == 'all' && !request('status'))) ? 'bg-slate-900 text-white shadow-md' : 'bg-white text-slate-600 border border-slate-200 hover:border-slate-300 hover:bg-slate-50' }}">
        {{ $label }}
        @if($key != 'all')
        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full text-xs
            @if($key == 'baru') bg-blue-500 text-white
            @elseif($key == 'diproses') bg-amber-500 text-white
            @elseif($key == 'selesai') bg-emerald-500 text-white
            @else bg-red-500 text-white @endif">
            {{ $count[$key] }}
        </span>
        @endif
    </a>
    @endforeach
</div>

{{-- Search --}}
<div class="card mb-6">
    <form method="GET" action="{{ route('admin.laporan.index') }}" class="flex flex-wrap gap-3 items-end">
        @if(request('status'))
        <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="flex-1 min-w-48">
            <label class="form-label">Cari</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau nama pelapor..." class="form-input">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-input">
                <option value="">Semua</option>
                @foreach(['jalan' => 'Jalan', 'fasilitas' => 'Fasilitas', 'lingkungan' => 'Lingkungan', 'keamanan' => 'Keamanan', 'lainnya' => 'Lainnya'] as $val => $label)
                <option value="{{ $val }}" {{ request('kategori') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-primary">Filter</button>
        <a href="{{ route('admin.laporan.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

{{-- Table --}}
<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Laporan</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Pelapor</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Kategori</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Tanggal</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Status</th>
                    <th class="text-right px-6 py-4 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($laporan as $l)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($l->foto)
                            <img src="{{ $l->foto_url }}" class="w-10 h-10 rounded-lg object-cover shrink-0 border border-slate-200" alt="Foto laporan">
                            @else
                            <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <div>
                                <div class="font-semibold text-slate-800 max-w-xs truncate">#{{ str_pad($l->id, 4, '0', STR_PAD_LEFT) }} {{ $l->judul }}</div>
                                @if($l->lokasi)
                                <div class="text-xs text-slate-400 mt-0.5">📍 {{ $l->lokasi }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-slate-800">{{ $l->nama_pelapor }}</div>
                        <div class="text-xs text-slate-400">{{ $l->kontak_pelapor }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="badge bg-slate-100 text-slate-700">{{ $l->kategori_label }}</span>
                    </td>
                    <td class="px-6 py-4 text-slate-500">{{ $l->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <span class="badge
                            @if($l->status == 'baru') bg-blue-100 text-blue-700
                            @elseif($l->status == 'diproses') bg-amber-100 text-amber-700
                            @elseif($l->status == 'selesai') bg-emerald-100 text-emerald-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ $l->status_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.laporan.show', $l->id) }}"
                           class="p-2 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-all inline-flex" title="Detail">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                        <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="font-medium">Tidak ada laporan ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($laporan->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $laporan->appends(request()->query())->links() }}
    </div>
    @endif
</div>

@endsection
