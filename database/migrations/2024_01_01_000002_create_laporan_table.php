<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('kontak_pelapor'); // No. HP / WA
            $table->enum('kategori', ['jalan', 'fasilitas', 'lingkungan', 'keamanan', 'lainnya'])->default('lainnya');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('foto')->nullable(); // path file foto
            $table->string('lokasi')->nullable();
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
