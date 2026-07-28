<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function index()
    {
        // Mencegah Admin nyasar ke halaman katalog pembeli biasa
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        // Filter katalog per kategori lewat query string, contoh:
        // /katalog?kategori=makanan_camilan — dipilih dari dropdown "Kategori" di navbar
        $kategoriAktif = request('kategori');

        $all_barang = Barang::when($kategoriAktif, function ($query) use ($kategoriAktif) {
            $query->where('kategori', $kategoriAktif);
        })->get();

        return view('katalog_pembeli', compact('all_barang', 'kategoriAktif'));
    }

    // Halaman "Pesanan Saya" — daftar transaksi milik pembeli beserta status
    // progresnya (Dikonfirmasi -> Disiapkan -> Selesai & Terkirim)
    public function pesanan()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        $transaksis = Transaksi::where('user_id', Auth::id())
            ->with('details.barang')
            ->orderByDesc('created_at')
            ->get();

        return view('pesanan', compact('transaksis'));
    }
}
