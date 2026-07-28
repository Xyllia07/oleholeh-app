<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Notifikasi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function show(Transaksi $transaksi)
    {
        abort_unless($transaksi->user_id === Auth::id(), 403);

        $this->batalkanJikaKedaluwarsa($transaksi);

        // Kalau sudah dibayar / diproses / dibatalkan, halaman bayar ini sudah tidak relevan lagi
        if ($transaksi->status !== 'menunggu_pembayaran') {
            return redirect('/pesanan-saya')->with(
                $transaksi->status === 'dibatalkan' ? 'error_keranjang' : 'success_beli',
                $transaksi->status === 'dibatalkan'
                    ? 'Pesanan #INV-' . str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) . ' dibatalkan karena melewati batas waktu pembayaran.'
                    : 'Pesanan #INV-' . str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) . ' sedang diproses.'
            );
        }

        $qrisImage = config('pembayaran.qris_image');
        $rekening  = config('pembayaran.rekening', []);

        return view('pembayaran', compact('transaksi', 'qrisImage', 'rekening'));
    }

    public function konfirmasi(Transaksi $transaksi)
    {
        abort_unless($transaksi->user_id === Auth::id(), 403);

        $this->batalkanJikaKedaluwarsa($transaksi);

        if ($transaksi->status !== 'menunggu_pembayaran') {
            return redirect('/pesanan-saya')->with('error_keranjang', 'Batas waktu pembayaran untuk pesanan ini sudah lewat.');
        }

        // Tidak ada verifikasi bukti transfer manual: begitu user menekan tombol ini,
        // pesanan langsung masuk antrean "Menunggu Konfirmasi" admin (status: pending),
        // memakai alur status yang sama seperti sebelumnya (pending -> diproses -> selesai).
        $transaksi->update([
            'status'     => 'pending',
            'dibayar_at' => now(),
        ]);

        Notifikasi::create([
            'user_id'      => $transaksi->user_id,
            'transaksi_id' => $transaksi->id,
            'judul'        => 'Pesanan Diterima ✅',
            'pesan'        => 'Pesanan #INV-' . str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) . ' senilai Rp ' . number_format($transaksi->total_harga) . ' sudah kami terima dan akan segera diproses.',
        ]);

        return redirect('/pesanan-saya')->with('success_beli', 'Terima kasih! Pesananmu sedang menunggu konfirmasi dari toko.');
    }

    // Kalau batas waktu pembayaran sudah lewat dan belum dibayar, batalkan otomatis & kembalikan stok
    private function batalkanJikaKedaluwarsa(Transaksi $transaksi): void
    {
        if (
            $transaksi->status === 'menunggu_pembayaran'
            && $transaksi->batas_waktu_pembayaran
            && now()->greaterThan($transaksi->batas_waktu_pembayaran)
        ) {
            foreach ($transaksi->details as $detail) {
                Barang::where('id', $detail->barang_id)->increment('stok', $detail->jumlah);
            }

            $transaksi->update(['status' => 'dibatalkan']);
        }
    }
}
