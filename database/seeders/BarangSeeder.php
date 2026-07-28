<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Seed 10 data dummy barang.
     * Pakai updateOrCreate (berdasarkan nama_barang) supaya aman
     * dijalankan berkali-kali tanpa membuat duplikat.
     */
    public function run(): void
    {
        $items = [
            [
                'nama_barang' => 'Kaledo Khas Palu',
                'harga'       => 45000,
                'stok'        => 25,
                'deskripsi'   => 'Bumbu instan kaledo khas Palu, siap masak, rasa otentik.',
                'kategori'    => 'Makanan & Camilan',
            ],
            [
                'nama_barang' => 'Keripik Kaledo',
                'harga'       => 20000,
                'stok'        => 40,
                'deskripsi'   => 'Keripik renyah dengan cita rasa khas Kaledo.',
                'kategori'    => 'Makanan & Camilan',
            ],
            [
                'nama_barang' => 'Kacang Goyang Palu',
                'harga'       => 15000,
                'stok'        => 50,
                'deskripsi'   => 'Kacang tanah goreng dengan bumbu khas, gurih dan renyah.',
                'kategori'    => 'Makanan & Camilan',
            ],
            [
                'nama_barang' => 'Dodol Kambaru',
                'harga'       => 25000,
                'stok'        => 30,
                'deskripsi'   => 'Dodol manis legit khas daerah Kambaru.',
                'kategori'    => 'Makanan & Camilan',
            ],
            [
                'nama_barang' => 'Kain Tenun Donggala',
                'harga'       => 350000,
                'stok'        => 10,
                'deskripsi'   => 'Kain tenun tradisional Donggala dengan motif khas dan warna cerah.',
                'kategori'    => 'Kain & Tenun',
            ],
            [
                'nama_barang' => 'Sarung Tenun Sabbe',
                'harga'       => 275000,
                'stok'        => 12,
                'deskripsi'   => 'Sarung tenun sabbe hasil tenun tangan pengrajin lokal.',
                'kategori'    => 'Kain & Tenun',
            ],
            [
                'nama_barang' => 'Selendang Tenun Donggala',
                'harga'       => 150000,
                'stok'        => 15,
                'deskripsi'   => 'Selendang tenun dengan motif khas Donggala, cocok untuk oleh-oleh.',
                'kategori'    => 'Kain & Tenun',
            ],
            [
                'nama_barang' => 'Gantungan Kunci Khas Palu',
                'harga'       => 10000,
                'stok'        => 60,
                'deskripsi'   => 'Gantungan kunci souvenir dengan ukiran khas Palu.',
                'kategori'    => 'Kerajinan & Souvenir',
            ],
            [
                'nama_barang' => 'Miniatur Rumah Adat Souraja',
                'harga'       => 85000,
                'stok'        => 18,
                'deskripsi'   => 'Miniatur rumah adat Souraja, kerajinan tangan pengrajin lokal.',
                'kategori'    => 'Kerajinan & Souvenir',
            ],
            [
                'nama_barang' => 'Tas Anyaman Rotan Palu',
                'harga'       => 120000,
                'stok'        => 20,
                'deskripsi'   => 'Tas anyaman rotan buatan tangan, kuat dan bermotif etnik.',
                'kategori'    => 'Kerajinan & Souvenir',
            ],
        ];

        foreach ($items as $item) {
            Barang::updateOrCreate(
                ['nama_barang' => $item['nama_barang']],
                $item
            );
        }
    }
}
