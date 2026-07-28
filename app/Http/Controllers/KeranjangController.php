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
            'nomor_hp'          => 'required|string|max:20',
            'alamat_pengiriman' => 'required|string',
        ]);

        $items = Keranjang::with('barang')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back()->with('error_keranjang', 'Keranjang kamu masih kosong.');
        }

        try {
            $transaksi = DB::transaction(function () use ($items, $request) {
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

                $jamBatasWaktu = config('pembayaran.batas_waktu_jam', 3);

                $transaksi = Transaksi::create([
                    'user_id'                => Auth::id(),
                    'nama_pembeli'            => $request->nama_pembeli,
                    'nomor_hp'                => $request->nomor_hp,
                    'alamat_pengiriman'       => $request->alamat_pengiriman,
                    'total_harga'             => $total,
                    'status'                  => 'menunggu_pembayaran',
                    'batas_waktu_pembayaran'  => now()->addHours($jamBatasWaktu),
                ]);

                foreach ($items as $item) {
                    TransaksiDetail::create([
                        'transaksi_id' => $transaksi->id,
                        'barang_id'    => $item->barang_id,
                        'jumlah'       => $item->jumlah,
                        'harga_satuan' => $item->barang->harga,
                    ]);

                    // Stok dikunci di sini supaya nggak dibeli orang lain selama menunggu pembayaran.
                    // Kalau batas waktu lewat tanpa dibayar, stok ini dikembalikan otomatis.
                    Barang::where('id', $item->barang_id)->decrement('stok', $item->jumlah);
                    $item->delete();
                }

                return $transaksi;
            });
        } catch (\RuntimeException $e) {
            return back()->with('error_keranjang', $e->getMessage());
        }

        return redirect("/pembayaran/{$transaksi->id}");
    }
}
