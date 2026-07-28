<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Penjualan - PaluKita Oleh-Oleh Khas Palu</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    "surface-container-low": "#f7f2fc",
                    "tertiary-container": "#006646",
                    "on-secondary": "#ffffff",
                    "tertiary-fixed-dim": "#45dfa4",
                    "primary-fixed-dim": "#ddb8ff",
                    "error-container": "#ffdad6",
                    "surface-bright": "#fcf8ff",
                    "primary-container": "#7e22ce",
                    "secondary-fixed": "#ffd8e7",
                    "outline": "#7e7385",
                    "surface-variant": "#e5e1ea",
                    "surface-container-high": "#ebe6f0",
                    "on-surface-variant": "#4c4354",
                    "on-primary-container": "#e4c5ff",
                    "on-secondary-container": "#76014e",
                    "on-tertiary-container": "#52e9ad",
                    "on-secondary-fixed-variant": "#85145a",
                    "surface-container": "#f1ecf6",
                    "error": "#ba1a1a",
                    "on-tertiary-fixed": "#002114",
                    "surface": "#fcf8ff",
                    "outline-variant": "#cfc2d6",
                    "on-secondary-fixed": "#3d0026",
                    "on-background": "#1c1b22",
                    "secondary-container": "#fc79bd",
                    "primary": "#6200a9",
                    "secondary": "#a43073",
                    "secondary-fixed-dim": "#ffafd3",
                    "on-surface": "#1c1b22",
                    "surface-container-lowest": "#ffffff",
                    "on-primary-fixed": "#2c0051",
                    "on-error": "#ffffff",
                    "tertiary": "#004c33",
                    "on-primary": "#ffffff",
                    "background": "#fcf8ff",
                    "tertiary-fixed": "#68fcbf",
                    "on-tertiary": "#ffffff",
                    "on-tertiary-fixed-variant": "#005137",
                },
                borderRadius: { DEFAULT: "1rem", lg: "2rem", xl: "3rem", full: "9999px" },
                spacing: { lg: "32px", sm: "12px", base: "8px", "container-padding": "20px", xl: "48px", md: "24px", xs: "4px", gutter: "16px" },
                fontFamily: { display: ["Plus Jakarta Sans", "sans-serif"] },
            },
        },
    }
</script>
<style>
    body {
        background-color: #FAF5FF;
        background-image: radial-gradient(#E9D5FF 0.5px, transparent 0.5px);
        background-size: 24px 24px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .soft-shadow { box-shadow: 0 20px 40px rgba(126, 34, 206, 0.08); }
    .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .card-hover:hover { transform: translateY(-4px) scale(1.01); box-shadow: 0 25px 50px rgba(126, 34, 206, 0.12); }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    html { scroll-behavior: smooth; }
</style>
</head>
<body class="text-on-background min-h-screen">

<!-- Sidebar -->
<aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-lowest shadow-[20px_0_40px_rgba(126,34,206,0.08)] rounded-r-lg z-50 flex flex-col py-lg overflow-y-auto scrollbar-hide">
    <div class="px-lg mb-xl flex items-center gap-3">
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-12 h-12 rounded-full flex-shrink-0">
        <div>
            <h1 class="text-2xl text-primary font-extrabold leading-tight">PaluKita</h1>
            <p class="text-xs text-on-surface-variant opacity-70 font-semibold">Souvenir Admin</p>
        </div>
    </div>

    <nav class="flex-1 space-y-2">
        <a href="/admin/dashboard" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm font-medium">Dashboard</span>
        </a>
        <a href="/admin/dashboard#pesanan-masuk" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">shopping_bag</span>
            <span class="text-sm font-medium">Pesanan Masuk</span>
        </a>
        <a href="/admin/dashboard#katalog" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="text-sm font-medium">Katalog &amp; Stok</span>
        </a>
        <a href="/admin/dashboard#tambah-produk" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">add_circle</span>
            <span class="text-sm font-medium">Tambah Produk</span>
        </a>
        <a href="/admin/pelanggan" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Pelanggan</span>
        </a>
        <a href="/admin/laporan" class="bg-primary-container text-on-primary-container rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">bar_chart</span>
            <span class="text-sm font-medium">Laporan Penjualan</span>
        </a>
    </nav>

    <div class="px-4 mt-auto pt-4">
        <div class="bg-surface-container rounded-lg p-4 flex items-center gap-3">
            <a href="/profil" title="Edit Profil" class="flex-shrink-0">
                @if(Auth::user()->foto)
                    <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Foto profil" class="w-10 h-10 rounded-full object-cover border-2 border-primary-container">
                @else
                    <div class="w-10 h-10 rounded-full border-2 border-primary-container bg-primary flex items-center justify-center text-on-primary font-bold text-sm">
                        {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                    </div>
                @endif
            </a>
            <a href="/profil" class="flex-1 min-w-0 hover:opacity-80 transition-opacity">
                <p class="text-sm font-semibold text-on-surface truncate">Hi, {{ Auth::user()->username }}</p>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-wider font-bold">Main Admin</p>
            </a>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" title="Keluar" class="w-8 h-8 flex items-center justify-center rounded-full text-error hover:bg-error hover:text-on-error transition-colors">
                    <span class="material-symbols-outlined text-lg">logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- Main -->
<main class="pl-72 min-h-screen flex flex-col">

    <header class="flex flex-col md:flex-row md:justify-between md:items-center w-full px-lg py-md gap-4 sticky top-0 bg-[#FAF5FF]/80 backdrop-blur-md z-40">
        <div class="flex flex-col">
            <h2 class="text-2xl text-primary font-bold">Laporan Penjualan 📊</h2>
            <p class="text-on-surface-variant text-sm font-medium">Rekap omset & produk terlaris per periode</p>
        </div>
        <form method="GET" action="/admin/laporan" class="flex items-center gap-2">
            <select name="bulan" class="bg-surface-container-lowest rounded-full py-2 px-4 border-none soft-shadow text-sm outline-none focus:ring-2 focus:ring-primary-container">
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $namaBulan)
                    <option value="{{ $i + 1 }}" @selected($bulan == $i + 1)>{{ $namaBulan }}</option>
                @endforeach
            </select>
            <select name="tahun" class="bg-surface-container-lowest rounded-full py-2 px-4 border-none soft-shadow text-sm outline-none focus:ring-2 focus:ring-primary-container">
                @foreach(range(now()->year, now()->year - 4) as $thn)
                    <option value="{{ $thn }}" @selected($tahun == $thn)>{{ $thn }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-primary text-on-primary px-6 py-2 rounded-full text-sm font-semibold hover:scale-105 transition-transform">Tampilkan</button>
        </form>
    </header>

    <div class="p-lg space-y-lg">

        <!-- Stats -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            <div class="bg-primary-container p-lg rounded-xl text-on-primary-container soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Total Omset Periode Ini</p>
                    <h3 class="text-3xl font-bold">Rp {{ number_format($totalOmset) }}</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">payments</span>
            </div>
            <div class="bg-tertiary-fixed text-on-tertiary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Transaksi Selesai</p>
                    <h3 class="text-3xl font-bold">{{ $totalTransaksi }}</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">receipt_long</span>
            </div>
            <div class="bg-secondary-fixed text-on-secondary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Item Terjual</p>
                    <h3 class="text-3xl font-bold">{{ $totalItemTerjual }} pcs</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">inventory_2</span>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
            <!-- Produk Terlaris Periode Ini -->
            <div class="bg-surface-container-lowest p-lg rounded-xl soft-shadow">
                <h4 class="text-xl text-primary font-bold mb-lg">Produk Terlaris Periode Ini</h4>
                <div class="space-y-6">
                    @forelse($produkTerjual as $row)
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-lg bg-surface-container overflow-hidden flex items-center justify-center shrink-0">
                                @if($row->barang->foto)
                                    <img class="w-full h-full object-cover" src="{{ Storage::url($row->barang->foto) }}" alt="{{ $row->barang->nama_barang }}">
                                @else
                                    <span class="material-symbols-outlined text-on-surface-variant">redeem</span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-on-surface truncate">{{ $row->barang->nama_barang }}</p>
                                <p class="text-xs text-tertiary-container font-bold">{{ $row->total_terjual }} terjual &bull; Rp {{ number_format($row->total_omset) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-on-surface-variant text-center py-6">Belum ada penjualan pada periode ini.</p>
                    @endforelse
                </div>
            </div>

            <!-- Rincian Transaksi -->
            <div class="lg:col-span-2 bg-surface-container-lowest p-lg rounded-xl soft-shadow overflow-hidden">
                <h4 class="text-xl text-primary font-bold mb-lg">Rincian Transaksi Selesai</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-surface-variant text-on-surface-variant">
                                <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Invoice</th>
                                <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Pembeli</th>
                                <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Item</th>
                                <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Tanggal</th>
                                <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-variant/50">
                            @forelse($transaksiSelesai as $t)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="py-4 text-sm font-bold text-on-surface">#INV-{{ str_pad($t->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-4 text-sm text-on-surface-variant">{{ $t->nama_pembeli }}</td>
                                <td class="py-4 text-xs text-on-surface-variant truncate max-w-[220px]">
                                    {{ $t->details->map(fn($d) => ($d->barang->nama_barang ?? 'Barang dihapus') . ' ' . $d->jumlah . 'x')->join(', ') }}
                                </td>
                                <td class="py-4 text-sm text-on-surface-variant">{{ $t->created_at->locale('id')->isoFormat('D MMM YYYY') }}</td>
                                <td class="py-4 text-sm font-bold text-on-surface">Rp {{ number_format($t->total_harga) }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="py-8 text-center text-on-surface-variant text-sm">Belum ada transaksi selesai pada periode ini.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <footer class="w-full pl-lg pr-lg py-lg flex flex-col md:flex-row justify-between items-center gap-2 border-t border-outline-variant/30 mt-auto opacity-80">
        <p class="text-sm font-semibold text-secondary">&copy; {{ date('Y') }} PaluKita Souvenirs</p>
        <p class="text-xs text-on-surface-variant">Toko Oleh-Oleh Khas Palu</p>
    </footer>
</main>
</body>
</html>
