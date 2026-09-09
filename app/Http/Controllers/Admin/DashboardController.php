<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pengumuman_aktif' => Pengumuman::aktif()->count(),
            'laporan_bulan_ini' => Laporan::whereMonth('created_at', now()->month)
                                          ->whereYear('created_at', now()->year)
                                          ->count(),
            'laporan_selesai' => Laporan::where('status', 'selesai')->count(),
            'laporan_baru' => Laporan::where('status', 'baru')->count(),
        ];

        $laporan_terbaru = Laporan::latest()->take(5)->get();
        $pengumuman_terbaru = Pengumuman::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'laporan_terbaru', 'pengumuman_terbaru'));
    }
}
