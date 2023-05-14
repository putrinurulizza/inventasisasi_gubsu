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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->foreignId('id_kategori')->constrained('kategoris')->onUpdate('cascade')->onDelete('restrict');
            $table->string('deskripsi_barang');
            $table->string('serial_number')->unique();
            $table->string('lokasi_user');
            $table->year('tahun_pengadaan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('kondisi_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
