<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'konten',
        'kategori',
        'status',
        'tanggal_tayang',
        'tanggal_berakhir',
        'dibuat_oleh',
    ];

    protected $casts = [
        'tanggal_tayang' => 'date',
        'tanggal_berakhir' => 'date',
    ];

    /**
     * Scope: hanya pengumuman yang aktif dan sudah tayang
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif')
                     ->where('tanggal_tayang', '<=', now()->toDateString())
                     ->where(function ($q) {
                         $q->whereNull('tanggal_berakhir')
                           ->orWhere('tanggal_berakhir', '>=', now()->toDateString());
                     });
    }

    public function getKategoriLabelAttribute()
    {
        $labels = [
            'umum' => 'Umum',
            'kegiatan' => 'Kegiatan',
            'penting' => 'Penting',
            'kesehatan' => 'Kesehatan',
            'infrastruktur' => 'Infrastruktur',
        ];
        return $labels[$this->kategori] ?? $this->kategori;
    }

    public function getKategoriColorAttribute()
    {
        $colors = [
            'umum' => 'blue',
            'kegiatan' => 'emerald',
            'penting' => 'red',
            'kesehatan' => 'teal',
            'infrastruktur' => 'amber',
        ];
        return $colors[$this->kategori] ?? 'gray';
    }
}
