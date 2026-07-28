<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            if (! Schema::hasColumn('transaksis', 'batas_waktu_pembayaran')) {
                $table->timestamp('batas_waktu_pembayaran')->nullable()->after('status');
            }
            if (! Schema::hasColumn('transaksis', 'dibayar_at')) {
                $table->timestamp('dibayar_at')->nullable()->after('batas_waktu_pembayaran');
            }
        });
    }

    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $columns = array_filter(
                ['batas_waktu_pembayaran', 'dibayar_at'],
                fn ($column) => Schema::hasColumn('transaksis', $column)
            );

            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
