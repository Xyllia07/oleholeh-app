<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Tabel baru: rincian per-barang untuk setiap transaksi di tabel 'transaksis'.
// Tabel 'transaksis' yang sudah ada di database produksi hanya menyimpan
// total_harga per transaksi tanpa rincian item, jadi tabel ini menambahkan
// baris detail (barang + jumlah + harga_satuan) untuk tiap transaksi.
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga_satuan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_details');
    }
};
