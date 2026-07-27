<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $items = Keranjang::with('barang')
            ->where('user_id', Auth::id())
            ->get();

        $total = $items->sum(fn ($item) => $item->barang->harga * $item->jumlah);

        return view('keranjang', compact('items', 'total'));
    }

    public function tambah(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $jumlah = max(1, (int) $request->input('jumlah', 1));

        if ($barang->stok < 1) {
            return back()->with('error_keranjang', 'Maaf, stok barang ini sedang habis!');
        }

        $existing = Keranjang::where('user_id', Auth::id())
            ->where('barang_id', $barang->id)
            ->first();

        if ($existing) {
            $existing->increment('jumlah', $jumlah);
        } else {
            Keranjang::create([
                'user_id'   => Auth::id(),
                'barang_id' => $barang->id,
                'jumlah'    => $jumlah,
            ]);
        }

        return back()->with('success_keranjang', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $item = Keranjang::where('user_id', Auth::id())->findOrFail($id);
        $item->update(['jumlah' => $request->jumlah]);

        return back()->with('success_keranjang', 'Jumlah barang diperbarui.');
    }

    public function hapus($id)
    {
        Keranjang::where('user_id', Auth::id())->findOrFail($id)->delete();

        return back()->with('success_keranjang', 'Barang dihapus dari keranjang.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'nama_pembeli'      => 'required|string|max:255',
            'alamat_pengiriman' => 'required|string',
        ]);

        $items = Keranjang::with('barang')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back()->with('error_keranjang', 'Keranjang kamu masih kosong.');
        }

        try {
            $totalHarga = DB::transaction(function () use ($items, $request) {
                $total = 0;

                // Kunci & validasi stok semua barang di keranjang dulu sebelum diproses
                foreach ($items as $item) {
                    $barang = Barang::lockForUpdate()->find($item->barang_id);
                    if (!$barang || $barang->stok < $item->jumlah) {
                        $nama = $item->barang->nama_barang ?? 'barang';
                        throw new \RuntimeException("Stok '{$nama}' tidak mencukupi.");
                    }
                    $total += $barang->harga * $item->jumlah;
                }

                $transaksi = Transaksi::create([
                    'user_id'           => Auth::id(),
                    'nama_pembeli'      => $request->nama_pembeli,
                    'alamat_pengiriman' => $request->alamat_pengiriman,
                    'total_harga'       => $total,
                    'status'            => 'pending',
                ]);

                foreach ($items as $item) {
                    TransaksiDetail::create([
                        'transaksi_id' => $transaksi->id,
                        'barang_id'    => $item->barang_id,
                        'jumlah'       => $item->jumlah,
                        'harga_satuan' => $item->barang->harga,
                    ]);

                    Barang::where('id', $item->barang_id)->decrement('stok', $item->jumlah);
                    $item->delete();
                }

                return $total;
            });
        } catch (\RuntimeException $e) {
            return back()->with('error_keranjang', $e->getMessage());
        }

        return redirect('/katalog')->with('success_beli', 'Checkout berhasil! Pesananmu senilai Rp ' . number_format($totalHarga) . ' sedang diproses.');
    }
}
