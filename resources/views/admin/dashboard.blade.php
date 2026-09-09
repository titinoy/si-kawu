@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan aktivitas dan statistik Desa Kawu')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="card group hover:shadow-md transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-slate-900 mb-1">{{ $stats['pengumuman_aktif'] }}</div>
        <div class="text-sm text-slate-500 font-medium">Pengumuman Aktif</div>
    </div>

    <div class="card group hover:shadow-md transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-slate-900 mb-1">{{ $stats['laporan_bulan_ini'] }}</div>
        <div class="text-sm text-slate-500 font-medium">Laporan Bulan Ini</div>
    </div>

    <div class="card group hover:shadow-md transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-slate-900 mb-1">{{ $stats['laporan_selesai'] }}</div>
        <div class="text-sm text-slate-500 font-medium">Laporan Selesai</div>
    </div>

    <div class="card group hover:shadow-md transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-slate-900 mb-1">{{ $stats['laporan_baru'] }}</div>
        <div class="text-sm text-slate-500 font-medium">Laporan Belum Ditangani</div>
    </div>

</div>

{{-- Two Column Layout --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Laporan Terbaru --}}
    <div class="card">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-base font-bold text-slate-900">Laporan Terbaru</h2>
            <a href="{{ route('admin.laporan.index') }}" class="text-sm text-primary font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="space-y-4">
            @forelse($laporan_terbaru as $l)
            <a href="{{ route('admin.laporan.show', $l->id) }}" class="flex items-start gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors group">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0
                    @if($l->status == 'baru') bg-blue-100 text-blue-600
                    @elseif($l->status == 'diproses') bg-amber-100 text-amber-600
                    @elseif($l->status == 'selesai') bg-emerald-100 text-emerald-600
                    @else bg-red-100 text-red-600 @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="font-semibold text-slate-800 text-sm truncate group-hover:text-primary transition-colors">{{ $l->judul }}</div>
                    <div class="text-xs text-slate-500 mt-0.5">{{ $l->nama_pelapor }} · {{ $l->created_at->diffForHumans() }}</div>
                </div>
                <span class="badge shrink-0
                    @if($l->status == 'baru') bg-blue-100 text-blue-700
                    @elseif($l->status == 'diproses') bg-amber-100 text-amber-700
                    @elseif($l->status == 'selesai') bg-emerald-100 text-emerald-700
                    @else bg-red-100 text-red-700 @endif">
                    {{ $l->status_label }}
                </span>
            </a>
            @empty
            <p class="text-slate-400 text-sm text-center py-6">Belum ada laporan masuk.</p>
            @endforelse
        </div>
    </div>

    {{-- Pengumuman Terbaru --}}
    <div class="card">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-base font-bold text-slate-900">Pengumuman Terbaru</h2>
            <a href="{{ route('admin.pengumuman.index') }}" class="text-sm text-primary font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="space-y-4">
            @forelse($pengumuman_terbaru as $p)
            <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0
                    @if($p->status == 'aktif') bg-emerald-100 text-emerald-600 @else bg-slate-100 text-slate-400 @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="font-semibold text-slate-800 text-sm truncate">{{ $p->judul }}</div>
                    <div class="text-xs text-slate-500 mt-0.5">{{ $p->kategori_label }} · {{ $p->created_at->diffForHumans() }}</div>
                </div>
                <span class="badge shrink-0 {{ $p->status == 'aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                    {{ ucfirst($p->status) }}
                </span>
            </div>
            @empty
            <p class="text-slate-400 text-sm text-center py-6">Belum ada pengumuman.</p>
            @endforelse
        </div>

        <div class="mt-6 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.pengumuman.create') }}" class="btn-primary w-full justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Buat Pengumuman Baru
            </a>
        </div>
    </div>

</div>

@endsection
