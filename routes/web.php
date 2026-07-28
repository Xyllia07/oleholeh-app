<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PembayaranController;

// 1. HALAMAN AWAL — landing page publik untuk tamu, redirect ke area masing-masing untuk yang sudah login
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/katalog');
    }

    return view('welcome');
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

    // PESANAN SAYA — status pesanan pembeli (dikonfirmasi/disiapkan/selesai & dikirim)
    Route::get('/pesanan-saya', [PembeliController::class, 'pesanan']);

    // EDIT PROFIL AKUN (nama, username, password, foto profil)
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // KERANJANG BELANJA
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
    Route::patch('/keranjang/{id}', [KeranjangController::class, 'update']);
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus']);
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout']);

    // PEMBAYARAN — QRIS & transfer rekening, batas waktu, konfirmasi tanpa upload bukti manual
    Route::get('/pembayaran/{transaksi}', [PembayaranController::class, 'show']);
    Route::post('/pembayaran/{transaksi}/konfirmasi', [PembayaranController::class, 'konfirmasi']);

    // NOTIFIKASI PESANAN & PENGIRIMAN
    Route::get('/notifikasi', [NotifikasiController::class, 'index']);
    Route::get('/notifikasi/{notifikasi}/buka', [NotifikasiController::class, 'buka']);
    Route::post('/notifikasi/{notifikasi}/baca', [NotifikasiController::class, 'tandaiDibaca']);
    Route::post('/notifikasi/baca-semua', [NotifikasiController::class, 'tandaiSemuaDibaca']);

    // AREA ADMIN (proteksi role Admin dilakukan lewat middleware di controller)
    Route::get('/admin/dashboard', [AdminTransaksiController::class, 'index']);
    Route::get('/admin/pelanggan', [AdminTransaksiController::class, 'pelanggan']);
    Route::get('/admin/laporan', [AdminTransaksiController::class, 'laporan']);
    Route::post('/admin/produk/tambah', [AdminTransaksiController::class, 'tambahProduk']);
    Route::post('/admin/produk/{barang}', [AdminTransaksiController::class, 'updateProduk']);
    Route::delete('/admin/produk/{barang}', [AdminTransaksiController::class, 'hapusProduk']);
    Route::post('/admin/transaksi/{transaksi}/proses', [AdminTransaksiController::class, 'prosesPesanan']);
});
