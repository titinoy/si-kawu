<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::aktif()->latest('tanggal_tayang');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $pengumuman = $query->paginate(6);
        return view('layanan.index', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor'   => 'required|string|max:100',
            'kontak_pelapor' => 'required|string|max:20',
            'kategori'       => 'required|in:jalan,fasilitas,lingkungan,keamanan,lainnya',
            'judul'          => 'required|string|max:200',
            'deskripsi'      => 'required|string|min:20|max:2000',
            'lokasi'         => 'nullable|string|max:200',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072', // max 3MB
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan/foto', 'public');
        }

        $laporan = Laporan::create($validated);

        return redirect()->route('layanan')
            ->with('success', 'Laporan Anda berhasil dikirim! Nomor laporan: #' . str_pad($laporan->id, 4, '0', STR_PAD_LEFT));
    }
}
