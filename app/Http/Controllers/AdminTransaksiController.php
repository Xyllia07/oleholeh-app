<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminTransaksiController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // Cegah user dengan role Pembeli mengakses fitur admin lewat URL langsung
            new Middleware(function ($request, $next) {
                if (auth()->user()->role !== 'admin') {
                    abort(403, 'Akses ditolak. Halaman ini khusus Admin.');
                }
                return $next($request);
            }),
        ];
    }

    public function index()
    {
        // Mengambil semua barang untuk ditampilkan di katalog dashboard
        $all_barang = Barang::orderBy('nama_barang')->get();

        // Total omset dari transaksi yang sudah selesai bulan ini
        $totalOmsetBulanIni = Transaksi::where('status', 'selesai')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_harga');

        // Pesanan dari pembeli (checkout) yang masih perlu diproses admin
        $pesananMasuk = Transaksi::with('details.barang')
            ->whereIn('status', ['pending', 'diproses'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Produk dengan stok menipis (ambang batas 10 pcs)
        $ambangStokMenipis = 10;
        $stokMenipisCount = Barang::where('stok', '<=', $ambangStokMenipis)->count();

        // Produk terlaris berdasarkan akumulasi jumlah terjual di semua transaksi
        $produkTerlaris = TransaksiDetail::select('barang_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('barang_id')
            ->orderByDesc('total_terjual')
            ->with('barang')
            ->take(5)
            ->get()
            ->filter(fn ($row) => $row->barang !== null);

        return view('admin.dashboard', compact(
            'all_barang',
            'totalOmsetBulanIni',
            'pesananMasuk',
            'stokMenipisCount',
            'ambangStokMenipis',
            'produkTerlaris'
        ));
    }

    // Memajukan status pesanan yang masuk dari checkout pembeli: pending -> diproses -> selesai
    public function prosesPesanan(Transaksi $transaksi)
    {
        $urutanStatus = ['pending' => 'diproses', 'diproses' => 'selesai'];

        if (!isset($urutanStatus[$transaksi->status])) {
            return back()->withErrors(['transaksi_error' => 'Pesanan ini sudah selesai diproses.']);
        }

        $statusBaru = $urutanStatus[$transaksi->status];
        $transaksi->update(['status' => $statusBaru]);

        $pesan = $statusBaru === 'diproses'
            ? "Pesanan #{$transaksi->id} ditandai sedang diproses."
            : "Pesanan #{$transaksi->id} selesai & siap dikirim!";

        return redirect('/admin/dashboard#pesanan-masuk')->with('success_pesanan', $pesan);
    }

    // Halaman Pelanggan: daftar semua akun pembeli beserta rekap belanjanya
    public function pelanggan()
    {
        $pelanggan = User::where('role', 'pembeli')
            ->withCount(['transaksis as jumlah_pesanan' => function ($q) {
                $q->where('status', 'selesai');
            }])
            ->withSum(['transaksis as total_belanja' => function ($q) {
                $q->where('status', 'selesai');
            }], 'total_harga')
            ->withMax('transaksis as pesanan_terakhir', 'created_at')
            ->orderByDesc('total_belanja')
            ->get();

        return view('admin.pelanggan', compact('pelanggan'));
    }

    // Halaman Laporan Penjualan: rekap omset & produk terjual per bulan, bisa difilter
    public function laporan(Request $request)
    {
        $bulan = (int) $request->input('bulan', now()->month);
        $tahun = (int) $request->input('tahun', now()->year);

        $filterPeriode = function ($query) use ($bulan, $tahun) {
            $query->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);
        };

        $transaksiSelesai = Transaksi::with('details.barang')
            ->where('status', 'selesai')
            ->where($filterPeriode)
            ->orderByDesc('created_at')
            ->get();

        $totalOmset = $transaksiSelesai->sum('total_harga');
        $totalTransaksi = $transaksiSelesai->count();
        $totalItemTerjual = $transaksiSelesai->sum(fn ($t) => $t->details->sum('jumlah'));

        $produkTerjual = TransaksiDetail::select('barang_id', DB::raw('SUM(jumlah) as total_terjual'), DB::raw('SUM(jumlah * harga_satuan) as total_omset'))
            ->whereHas('transaksi', function ($q) use ($filterPeriode) {
                $q->where('status', 'selesai')->where($filterPeriode);
            })
            ->groupBy('barang_id')
            ->orderByDesc('total_terjual')
            ->with('barang')
            ->get()
            ->filter(fn ($row) => $row->barang !== null);

        return view('admin.laporan', compact(
            'transaksiSelesai',
            'totalOmset',
            'totalTransaksi',
            'totalItemTerjual',
            'produkTerjual',
            'bulan',
            'tahun'
        ));
    }

    // PILAR 3: Anti-SQLi lewat Eloquent ORM Parameterized Query
    public function tambahProduk(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga'       => 'required|integer|min:1000',
            'stok'        => 'required|integer|min:0',
            'deskripsi'   => 'nullable|string',
            'foto'        => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('barang', 'public');
        }

        Barang::create($validated);

        return redirect('/admin/dashboard')->with('success_produk', 'Barang oleh-oleh baru berhasil ditambahkan!');
    }

    public function inputTransaksi(Request $request)
    {
        $request->validate([
            'barang_id'         => 'required|exists:barangs,id',
            'jumlah'            => 'required|integer|min:1',
            'nama_pembeli'      => 'required|string|max:255',
            'alamat_pengiriman' => 'nullable|string',
        ]);

        // Membungkus query dalam DB Transaction untuk menjaga integritas data keuangan
        return DB::transaction(function () use ($request) {
            $barang = Barang::lockForUpdate()->find($request->barang_id);

            // Validasi aturan bisnis: Cek stok fisik di toko
            if ($barang->stok < $request->jumlah) {
                return back()->withErrors(['transaksi_error' => 'Stok barang tidak mencukupi untuk jumlah tersebut.']);
            }

            $totalHarga = $barang->harga * $request->jumlah;

            // Memasukkan data ke tabel master transaksi (dianggap selesai karena dilayani langsung di toko)
            $transaksi = Transaksi::create([
                'user_id'           => auth()->id(), // Mencatat id admin yang sedang aktif memproses
                'nama_pembeli'      => $request->nama_pembeli,
                'alamat_pengiriman' => $request->alamat_pengiriman ?: 'Pembelian langsung di toko',
                'total_harga'       => $totalHarga,
                'status'            => 'selesai',
            ]);

            // Memasukkan data ke tabel rincian item nota belanja
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'barang_id'    => $barang->id,
                'jumlah'       => $request->jumlah,
                'harga_satuan' => $barang->harga,
            ]);

            // Mengurangi kapasitas stok barang induk
            $barang->decrement('stok', $request->jumlah);

            return redirect('/admin/dashboard')->with('success_transaksi', 'Nota Penjualan senilai Rp ' . number_format($totalHarga) . ' berhasil diproses!');
        });
    }
}
