<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Pakai updateOrCreate supaya aman dijalankan berkali-kali
        // dan tidak menghapus data transaksi/keranjang yang sudah ada.

        // Akun Admin
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'Admin Toko Palu',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Akun User (Pembeli)
        User::updateOrCreate(
            ['username' => 'user'],
            [
                'name'     => 'User Demo',
                'password' => Hash::make('user123'),
                'role'     => 'pembeli',
            ]
        );
    }
}