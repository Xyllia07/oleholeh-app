<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    // Halaman "Notifikasi Saya" — daftar lengkap pemberitahuan pesanan & pengiriman
    public function index()
    {
        $notifikasis = Notifikasi::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        // Buka halaman ini otomatis menandai semua notifikasi sudah dibaca
        Notifikasi::where('user_id', Auth::id())
            ->where('dibaca', false)
            ->update(['dibaca' => true]);

        return view('notifikasi', compact('notifikasis'));
    }

    // Tandai satu notifikasi sebagai sudah dibaca (dipakai saat diklik dari dropdown navbar)
    public function tandaiDibaca(Notifikasi $notifikasi)
    {
        if ($notifikasi->user_id !== Auth::id()) {
            abort(403);
        }

        $notifikasi->update(['dibaca' => true]);

        return back();
    }

    // Dipanggil saat notifikasi DIKLIK (dari dropdown lonceng maupun halaman
    // Notifikasi Saya): tandai sudah dibaca lalu langsung arahkan ke pesanan
    // terkait di halaman "Pesanan Saya" supaya user bisa lihat status
    // pesanannya (disiapkan / selesai & dikirim).
    public function buka(Notifikasi $notifikasi)
    {
        if ($notifikasi->user_id !== Auth::id()) {
            abort(403);
        }

        $notifikasi->update(['dibaca' => true]);

        if ($notifikasi->transaksi_id) {
            return redirect('/pesanan-saya#pesanan-' . $notifikasi->transaksi_id);
        }

        return redirect('/pesanan-saya');
    }

    // Tandai semua notifikasi milik user sebagai sudah dibaca
    public function tandaiSemuaDibaca(Request $request)
    {
        Notifikasi::where('user_id', Auth::id())
            ->where('dibaca', false)
            ->update(['dibaca' => true]);

        return back();
    }
}
