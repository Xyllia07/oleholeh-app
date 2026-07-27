<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfilController;

// 1. HALAMAN AWAL — LANGSUNG KE LOGIN
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/katalog');
    }

    return redirect('/login');
});

// 2. JALUR AUTENTIKASI (LOGIN & REGISTER)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// 3. AREA PROTEKSI USER (Harus Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/katalog', [PembeliController::class, 'index']);

    // EDIT PROFIL AKUN (nama, username, password, foto profil)
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // KERANJANG BELANJA
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
    Route::patch('/keranjang/{id}', [KeranjangController::class, 'update']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus']);
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout']);

    // AREA ADMIN (proteksi role Admin dilakukan lewat middleware di controller)
    Route::get('/admin/dashboard', [AdminTransaksiController::class, 'index']);
    Route::get('/admin/pelanggan', [AdminTransaksiController::class, 'pelanggan']);
    Route::get('/admin/laporan', [AdminTransaksiController::class, 'laporan']);
    Route::post('/admin/produk/tambah', [AdminTransaksiController::class, 'tambahProduk']);
    Route::post('/admin/transaksi/input', [AdminTransaksiController::class, 'inputTransaksi']);
    Route::post('/admin/transaksi/{transaksi}/proses', [AdminTransaksiController::class, 'prosesPesanan']);
});
