<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Menambahkan kolom kategori ke tabel barangs supaya katalog pembeli bisa
// difilter per kategori (Makanan & Camilan / Kain & Tenun / Kerajinan & Souvenir).
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('kategori', 50)->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
