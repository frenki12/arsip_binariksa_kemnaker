<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arsip_items', function (Blueprint $table) {
            $table->id();

            // 🗂 Nomor & Kode Arsip
            $table->string('nomor_berkas')->nullable();
            $table->string('nomor_item_arsip')->nullable();
            $table->string('kode_klasifikasi')->nullable();
            $table->string('nama_klasifikasi')->nullable();

            // 📨 Informasi Surat
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('dari')->nullable();
            $table->string('ke')->nullable();
            $table->string('perihal')->nullable();

            // 📄 Lainnya
            $table->integer('jumlah_lembar')->nullable();

            $table->string('tingkat_perkembangan')->nullable();      // contoh: "Selesai"
            $table->string('klasifikasi_keamanan')->nullable();       // contoh: "Rahasia"
            $table->string('hak_akses')->nullable();                  // contoh: "Internal"
            $table->string('akses_publik')->nullable();               // contoh: "Ya/Tidak"
            $table->string('dasar_pertimbangan')->nullable();

            // Link file / lampiran
            $table->string('link_tautan')->nullable();

            // Status
            $table->string('status_folder')->nullable();              // contoh: "Belum di Folder"
            $table->string('status_kasus')->nullable();               // contoh: "Pending"

            // Soft delete + timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_items');
    }
};
