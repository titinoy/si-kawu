<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanTable extends Migration
{
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('konten');
            $table->enum('kategori', ['umum', 'kegiatan', 'penting', 'kesehatan', 'infrastruktur'])->default('umum');
            $table->enum('status', ['aktif', 'arsip'])->default('aktif');
            $table->date('tanggal_tayang');
            $table->date('tanggal_berakhir')->nullable();
            $table->string('dibuat_oleh')->default('Admin Desa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengumuman');
    }
}
