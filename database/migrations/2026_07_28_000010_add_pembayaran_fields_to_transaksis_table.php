<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->timestamp('batas_waktu_pembayaran')->nullable()->after('status');
            $table->timestamp('dibayar_at')->nullable()->after('batas_waktu_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['batas_waktu_pembayaran', 'dibayar_at']);
        });
    }
};
