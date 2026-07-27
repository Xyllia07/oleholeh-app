<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Tabel ini sebelumnya sudah ada langsung di database produksi, tapi file
// migration-nya belum pernah dibuat/di-commit — akibatnya `php artisan migrate`
// di instalasi baru akan gagal karena tabel 'transaksis' tidak pernah terbentuk
// (padahal migration transaksi_details butuh tabel ini).
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('nama_pembeli');
            $table->text('alamat_pengiriman');
            $table->integer('total_harga');
            $table->string('status', 50)->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
