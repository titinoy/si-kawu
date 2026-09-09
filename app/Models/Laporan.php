<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'nama_pelapor',
        'kontak_pelapor',
        'kategori',
        'judul',
        'deskripsi',
        'foto',
        'lokasi',
        'status',
        'catatan_admin',
    ];

    public function getKategoriLabelAttribute()
    {
        $labels = [
            'jalan' => 'Jalan & Transportasi',
            'fasilitas' => 'Fasilitas Umum',
            'lingkungan' => 'Lingkungan',
            'keamanan' => 'Keamanan',
            'lainnya' => 'Lainnya',
        ];
        return $labels[$this->kategori] ?? $this->kategori;
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'baru' => 'Baru Masuk',
            'diproses' => 'Sedang Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
        ];
        return $labels[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'baru' => 'blue',
            'diproses' => 'amber',
            'selesai' => 'emerald',
            'ditolak' => 'red',
        ];
        return $colors[$this->status] ?? 'gray';
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return null;
    }
}
