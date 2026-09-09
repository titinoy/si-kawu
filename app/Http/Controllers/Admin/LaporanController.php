<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_pelapor', 'like', '%' . $request->search . '%');
            });
        }

        $laporan = $query->paginate(10);
        $count = [
            'baru'      => Laporan::where('status', 'baru')->count(),
            'diproses'  => Laporan::where('status', 'diproses')->count(),
            'selesai'   => Laporan::where('status', 'selesai')->count(),
            'ditolak'   => Laporan::where('status', 'ditolak')->count(),
        ];

        return view('admin.laporan.index', compact('laporan', 'count'));
    }

    public function show(Laporan $laporan)
    {
        return view('admin.laporan.show', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);

        $laporan->update($validated);

        return redirect()->route('admin.laporan.show', $laporan->id)
            ->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function destroy(Laporan $laporan)
    {
        // Hapus foto jika ada
        if ($laporan->foto) {
            \Storage::disk('public')->delete($laporan->foto);
        }
        $laporan->delete();
        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}
