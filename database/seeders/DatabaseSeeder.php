<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Laporan;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@kawu.desa.id'],
            [
                'name' => 'Admin Desa Kawu',
                'email' => 'admin@kawu.desa.id',
                'password' => Hash::make('kawu2024'),
                'email_verified_at' => now(),
            ]
        );

        // Sample Pengumuman
        $pengumuman = [
            [
                'judul' => 'Pengumuman Pembayaran PBB Tahun 2024',
                'konten' => '<p>Kepada seluruh warga Desa Kawu yang terhormat,</p><p>Kami menginformasikan bahwa pembayaran Pajak Bumi dan Bangunan (PBB) Tahun 2024 telah dibuka. Warga dapat melakukan pembayaran di Kantor Desa Kawu setiap hari kerja pada jam pelayanan yang telah ditentukan.</p><p>Harap membawa SPPT PBB asli saat melakukan pembayaran. Batas akhir pembayaran tanpa denda adalah <strong>31 Oktober 2024</strong>.</p><p>Demikian pengumuman ini kami sampaikan. Terima kasih atas kerjasamanya.</p>',
                'kategori' => 'penting',
                'status' => 'aktif',
                'tanggal_tayang' => '2024-01-01',
                'tanggal_berakhir' => '2024-10-31',
                'dibuat_oleh' => 'Admin Desa',
            ],
            [
                'judul' => 'Gotong Royong Bersih Desa Kawu',
                'konten' => '<p>Dalam rangka menjaga kebersihan dan keindahan lingkungan Desa Kawu, kami mengundang seluruh warga untuk berpartisipasi dalam kegiatan Gotong Royong Bersih Desa.</p><p><strong>Hari/Tanggal:</strong> Minggu, 21 Januari 2024<br><strong>Waktu:</strong> 06.00 - 10.00 WIB<br><strong>Lokasi:</strong> Seluruh wilayah Desa Kawu</p><p>Harap membawa peralatan kebersihan masing-masing. Mari bersama-sama menjaga kebersihan desa kita!</p>',
                'kategori' => 'kegiatan',
                'status' => 'aktif',
                'tanggal_tayang' => '2024-01-10',
                'tanggal_berakhir' => '2024-01-21',
                'dibuat_oleh' => 'Admin Desa',
            ],
            [
                'judul' => 'Imunisasi Balita Posyandu Bulan Januari',
                'konten' => '<p>Diberitahukan kepada seluruh ibu yang memiliki balita, bahwa kegiatan imunisasi rutin bulanan akan dilaksanakan pada:</p><p><strong>Tanggal:</strong> 15 Januari 2024<br><strong>Waktu:</strong> 08.00 - 11.00 WIB<br><strong>Tempat:</strong> Balai Desa Kawu</p><p>Mohon membawa buku KIA (Kesehatan Ibu dan Anak) dan KTP orang tua. Kehadiran tepat waktu sangat diharapkan.</p>',
                'kategori' => 'kesehatan',
                'status' => 'aktif',
                'tanggal_tayang' => '2024-01-05',
                'tanggal_berakhir' => null,
                'dibuat_oleh' => 'Admin Desa',
            ],
            [
                'judul' => 'Perbaikan Jalan Dukuh Trinil Selesai Dikerjakan',
                'konten' => '<p>Kami dengan bangga mengumumkan bahwa proyek perbaikan jalan di Dukuh Trinil telah selesai dilaksanakan. Pekerjaan meliputi pengaspalan jalan sepanjang 500 meter dan perbaikan drainase.</p><p>Kami berterima kasih atas kesabaran warga selama proses perbaikan berlangsung. Harap menjaga fasilitas jalan ini agar tetap baik dan awet.</p>',
                'kategori' => 'infrastruktur',
                'status' => 'aktif',
                'tanggal_tayang' => '2024-01-08',
                'tanggal_berakhir' => null,
                'dibuat_oleh' => 'Admin Desa',
            ],
            [
                'judul' => 'Selamat Merayakan Tahun Baru 2024',
                'konten' => '<p>Pemerintah Desa Kawu mengucapkan Selamat Tahun Baru 2024 kepada seluruh warga Desa Kawu.</p><p>Semoga di tahun yang baru ini, Desa Kawu semakin maju, makmur, dan sejahtera. Mari kita bersama-sama membangun desa yang lebih baik untuk generasi mendatang.</p>',
                'kategori' => 'umum',
                'status' => 'aktif',
                'tanggal_tayang' => '2024-01-01',
                'tanggal_berakhir' => null,
                'dibuat_oleh' => 'Admin Desa',
            ],
        ];

        foreach ($pengumuman as $p) {
            Pengumuman::create($p);
        }

        // Sample Laporan
        $laporan = [
            [
                'nama_pelapor' => 'Budi Santoso',
                'kontak_pelapor' => '081234567890',
                'kategori' => 'jalan',
                'judul' => 'Jalan berlubang di depan SD Kawu',
                'deskripsi' => 'Terdapat lubang besar di jalan depan SDN Kawu yang berbahaya bagi pengendara motor dan anak-anak sekolah. Lubang sudah ada sejak 2 minggu lalu.',
                'foto' => null,
                'lokasi' => 'Depan SDN Kawu',
                'status' => 'selesai',
                'catatan_admin' => 'Sudah diperbaiki oleh tim DPUPR pada tanggal 10 Januari 2024.',
            ],
            [
                'nama_pelapor' => 'Siti Rahayu',
                'kontak_pelapor' => '085678901234',
                'kategori' => 'lingkungan',
                'judul' => 'Tumpukan sampah di pinggir sungai',
                'deskripsi' => 'Ada tumpukan sampah yang cukup besar di pinggir sungai dekat jembatan Trinil. Khawatir akan mencemari sungai terutama saat musim hujan.',
                'foto' => null,
                'lokasi' => 'Pinggir sungai dekat jembatan Trinil',
                'status' => 'diproses',
                'catatan_admin' => 'Sudah dikoordinasikan dengan petugas kebersihan, jadwal pengangkutan dalam 3 hari ke depan.',
            ],
            [
                'nama_pelapor' => 'Agus Wibowo',
                'kontak_pelapor' => '089012345678',
                'kategori' => 'fasilitas',
                'judul' => 'Lampu jalan mati di RT 03',
                'deskripsi' => 'Lampu jalan di RT 03 RW 02 sudah mati selama seminggu. Warga kesulitan beraktivitas malam hari dan khawatir soal keamanan.',
                'foto' => null,
                'lokasi' => 'RT 03 RW 02 Desa Kawu',
                'status' => 'baru',
                'catatan_admin' => null,
            ],
        ];

        foreach ($laporan as $l) {
            Laporan::create($l);
        }
    }
}
