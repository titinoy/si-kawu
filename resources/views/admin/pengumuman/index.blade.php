@extends('admin.layout')

@section('title', 'Kelola Pengumuman')
@section('page-title', 'Pengumuman')
@section('page-subtitle', 'Kelola semua pengumuman Desa Kawu')

@section('content')

<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <a href="{{ route('admin.pengumuman.create') }}" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Buat Pengumuman
    </a>
</div>

{{-- Filter --}}
<div class="card mb-6">
    <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="flex flex-wrap gap-3 items-end">
        <div class="flex-1 min-w-48">
            <label class="form-label">Cari Judul</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pengumuman..." class="form-input">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-input">
                <option value="">Semua</option>
                @foreach(['umum' => 'Umum', 'kegiatan' => 'Kegiatan', 'penting' => 'Penting', 'kesehatan' => 'Kesehatan', 'infrastruktur' => 'Infrastruktur'] as $val => $label)
                    <option value="{{ $val }}" {{ request('kategori') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="form-label">Status</label>
            <select name="status" class="form-input">
                <option value="">Semua</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="arsip" {{ request('status') == 'arsip' ? 'selected' : '' }}>Arsip</option>
            </select>
        </div>
        <button type="submit" class="btn-primary">Filter</button>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn-secondary">Reset</a>
    </form>
</div>

{{-- Table --}}
<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Judul</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Kategori</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Tanggal Tayang</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Status</th>
                    <th class="text-right px-6 py-4 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($pengumuman as $p)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-800 max-w-xs truncate">{{ $p->judul }}</div>
                        <div class="text-xs text-slate-400 mt-0.5">Oleh: {{ $p->dibuat_oleh }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="badge
                            @if($p->kategori == 'penting') bg-red-100 text-red-700
                            @elseif($p->kategori == 'kegiatan') bg-emerald-100 text-emerald-700
                            @elseif($p->kategori == 'kesehatan') bg-teal-100 text-teal-700
                            @elseif($p->kategori == 'infrastruktur') bg-amber-100 text-amber-700
                            @else bg-blue-100 text-blue-700 @endif">
                            {{ $p->kategori_label }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-slate-600">
                        {{ $p->tanggal_tayang->format('d M Y') }}
                        @if($p->tanggal_berakhir)
                        <div class="text-xs text-slate-400">s/d {{ $p->tanggal_berakhir->format('d M Y') }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="badge {{ $p->status == 'aktif' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.pengumuman.edit', $p->id) }}"
                               class="p-2 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-all" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.pengumuman.destroy', $p->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                        <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="font-medium">Belum ada pengumuman.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($pengumuman->hasPages())
    <div class="px-6 py-4 border-t border-slate-100">
        {{ $pengumuman->appends(request()->query())->links() }}
    </div>
    @endif
</div>

@endsection
