<?php

// Pengaturan pembayaran toko. Ganti nilai di bawah ini sesuai data asli:
// - qris_image: path gambar QRIS, taruh file-nya di public/images/qris-palukita.png
// - rekening: daftar nomor rekening yang ditampilkan sebagai alternatif QRIS
// - batas_waktu_jam: batas waktu pembayaran dalam jam sejak checkout

return [
    'batas_waktu_jam' => 3,

    'qris_image' => '/images/qris-palukita.png',

    'rekening' => [
        [
            'bank'      => 'BCA',
            'nomor'     => '1234567890',
            'atas_nama' => 'PaluKita Store',
        ],
        [
            'bank'      => 'BRI',
            'nomor'     => '0987654321',
            'atas_nama' => 'PaluKita Store',
        ],
        [
            'bank'      => 'Mandiri',
            'nomor'     => '1122334455',
            'atas_nama' => 'PaluKita Store',
        ],
    ],
];
