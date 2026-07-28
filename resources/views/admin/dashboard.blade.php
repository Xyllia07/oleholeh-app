<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - PaluKita Oleh-Oleh Khas Palu</title>
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
        <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-display font-extrabold text-lg">PK</div>
        <div>
            <h1 class="text-2xl text-primary font-extrabold leading-tight">PaluKita</h1>
            <p class="text-xs text-on-surface-variant opacity-70 font-semibold">Souvenir Admin</p>
        </div>
    </div>

    <nav class="flex-1 space-y-2">
        <a href="#top" class="bg-primary-container text-on-primary-container rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm font-medium">Dashboard</span>
        </a>
        <a href="#pesanan-masuk" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center justify-between transition-all">
            <span class="flex items-center gap-3">
                <span class="material-symbols-outlined">shopping_bag</span>
                <span class="text-sm font-medium">Pesanan Masuk</span>
            </span>
            @if($pesananMasuk->count() > 0)
                <span class="bg-error text-on-error text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pesananMasuk->count() }}</span>
            @endif
        </a>
        <a href="#katalog" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="text-sm font-medium">Katalog &amp; Stok</span>
        </a>
        <a href="#tambah-produk" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">add_circle</span>
            <span class="text-sm font-medium">Tambah Produk</span>
        </a>
        <a href="/admin/pelanggan" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Pelanggan</span>
        </a>
        <a href="/admin/laporan" class="text-on-surface-variant hover:bg-surface-variant rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
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
<main class="pl-72 min-h-screen flex flex-col" id="top">

    <header class="flex flex-col md:flex-row md:justify-between md:items-center w-full px-lg py-md gap-4 sticky top-0 bg-[#FAF5FF]/80 backdrop-blur-md z-40">
        <div class="flex flex-col">
            <h2 class="text-2xl text-primary font-bold">Semangat Kerja Hari Ini, {{ Auth::user()->username }}! ✨</h2>
            <p class="text-on-surface-variant text-sm font-medium">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
        </div>
        <div class="relative w-full md:w-80">
            <input id="cari-katalog" class="w-full bg-surface-container-lowest rounded-full py-3 pl-12 pr-6 border-none soft-shadow focus:ring-2 focus:ring-primary-container text-sm outline-none transition-all" placeholder="Cari produk di katalog..." type="text">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
        </div>
    </header>

    <div class="p-lg space-y-lg">

        <!-- Alerts -->
        @if(session('success_produk'))
            <div class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-6 py-4 rounded-xl font-semibold text-sm soft-shadow">✨ {{ session('success_produk') }}</div>
        @endif
        @if(session('success_pesanan'))
            <div class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-6 py-4 rounded-xl font-semibold text-sm soft-shadow">📦 {{ session('success_pesanan') }}</div>
        @endif

        <!-- Section A: Stats -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            <div class="bg-primary-container p-lg rounded-xl text-on-primary-container soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Total Omset Bulan Ini</p>
                    <h3 class="text-3xl font-bold mb-4">Rp {{ number_format($totalOmsetBulanIni) }}</h3>
                    <div class="inline-flex items-center gap-1 bg-white/20 px-3 py-1 rounded-full text-xs font-semibold">
                        <span class="material-symbols-outlined text-sm">receipt_long</span>
                        <span>Dari transaksi berstatus selesai</span>
                    </div>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">payments</span>
            </div>

            <div class="bg-tertiary-fixed text-on-tertiary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Pesanan Perlu Diproses</p>
                    <h3 class="text-3xl font-bold mb-4">{{ $pesananMasuk->count() }} Pesanan</h3>
                    <a href="#pesanan-masuk" class="inline-block bg-tertiary-container text-on-tertiary-container px-6 py-2 rounded-full text-xs font-semibold hover:scale-105 active:scale-95 transition-transform">Lihat Pesanan</a>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">inventory</span>
            </div>

            <div class="bg-secondary-fixed text-on-secondary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Stok Hampir Habis (&le; {{ $ambangStokMenipis }})</p>
                    <h3 class="text-3xl font-bold mb-4">{{ $stokMenipisCount }} Produk</h3>
                    <a href="#katalog" class="inline-block bg-secondary-container text-on-secondary-container px-6 py-2 rounded-full text-xs font-semibold hover:scale-105 active:scale-95 transition-transform">Lihat Stok</a>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">error_outline</span>
            </div>
        </section>

        <!-- Section B: Pesanan Masuk & Produk Terlaris -->
        <section id="pesanan-masuk" class="grid grid-cols-1 lg:grid-cols-3 gap-lg scroll-mt-24">
            <div class="lg:col-span-2 bg-surface-container-lowest p-lg rounded-xl soft-shadow">
                <div class="flex justify-between items-center mb-lg">
                    <h4 class="text-xl text-primary font-bold">Pesanan Masuk dari Pembeli</h4>
                </div>
                <div class="space-y-4">
                    @forelse($pesananMasuk as $pesanan)
                        @php
                            $isPending = $pesanan->status === 'pending';
                            $daftarItem = $pesanan->details->map(function ($d) {
                                return ($d->barang->nama_barang ?? 'Barang dihapus') . ' ' . $d->jumlah . 'x';
                            })->join(', ');
                        @endphp
                        <div class="p-4 bg-surface-container rounded-lg flex flex-col md:flex-row md:items-center justify-between gap-4 border-l-4 {{ $isPending ? 'border-tertiary-container' : 'border-secondary-container' }}">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-on-surface">#INV-{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }} &bull; {{ $pesanan->nama_pembeli }}</p>
                                    @if($pesanan->nomor_hp)
                                        <p class="text-xs text-on-surface-variant">📱 {{ $pesanan->nomor_hp }}</p>
                                    @endif
                                    <p class="text-xs text-on-surface-variant truncate">{{ $daftarItem }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 shrink-0">
                                <span class="{{ $isPending ? 'bg-tertiary-fixed text-on-tertiary-fixed-variant' : 'bg-secondary-fixed text-on-secondary-fixed-variant' }} px-4 py-1 rounded-full text-xs font-bold">
                                    {{ $isPending ? 'Perlu Diproses' : 'Sedang Dikemas' }}
                                </span>
                                <form action="/admin/transaksi/{{ $pesanan->id }}/proses" method="POST" class="m-0">
                                    @csrf
                                    @if($isPending)
                                        <button type="submit" class="bg-primary text-on-primary px-6 py-2 rounded-full text-xs font-semibold hover:scale-105 transition-transform">Proses Pesanan</button>
                                    @else
                                        <button type="submit" class="text-primary-container px-6 py-2 rounded-full text-xs font-semibold border-2 border-primary-container hover:bg-primary-container hover:text-white transition-colors">Tandai Selesai</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl opacity-40">inbox</span>
                            <p class="text-sm mt-2">Belum ada pesanan masuk dari pembeli.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-surface-container-lowest p-lg rounded-xl soft-shadow">
                <h4 class="text-xl text-primary font-bold mb-lg">Produk Terlaris</h4>
                <div class="space-y-6">
                    @forelse($produkTerlaris as $row)
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
                                <p class="text-xs text-tertiary-container font-bold">{{ $row->total_terjual }} Terjual</p>
                            </div>
                            <div class="w-9 h-9 rounded-full bg-secondary-fixed flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-on-secondary-fixed-variant text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-on-surface-variant text-center py-6">Belum ada data penjualan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Section C: Katalog & Stok -->
        <section id="katalog" class="bg-surface-container-lowest p-lg rounded-xl soft-shadow overflow-hidden scroll-mt-24">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-lg gap-4">
                <h4 class="text-xl text-primary font-bold">Katalog Inventory</h4>
                <a href="#tambah-produk" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-2 rounded-full text-sm font-semibold hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-base">add</span> Tambah Produk
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left" id="tabel-katalog">
                    <thead>
                        <tr class="border-b border-surface-variant text-on-surface-variant">
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Foto &amp; Nama</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Harga</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Sisa Stok</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Status Stok</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-variant/50">
                        @forelse($all_barang as $item)
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-lg bg-surface-container overflow-hidden flex items-center justify-center shrink-0">
                                        @if($item->foto)
                                            <img class="w-full h-full object-cover" src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_barang }}">
                                        @else
                                            <span class="material-symbols-outlined text-on-surface-variant">redeem</span>
                                        @endif
                                    </div>
                                    <span class="text-sm font-bold text-on-surface">
                                        {{ $item->nama_barang }}
                                        <br>
                                        @php
                                            $labelKategori = [
                                                'makanan_camilan'   => 'Makanan & Camilan',
                                                'kain_tenun'        => 'Kain & Tenun',
                                                'kerajinan_souvenir'=> 'Kerajinan & Souvenir',
                                            ][$item->kategori] ?? null;
                                        @endphp
                                        @if($labelKategori)
                                            <span class="text-[10px] font-semibold text-primary bg-primary-container/10 px-2 py-0.5 rounded-full">{{ $labelKategori }}</span>
                                        @else
                                            <span class="text-[10px] font-semibold text-error bg-error/10 px-2 py-0.5 rounded-full">Belum ada kategori</span>
                                        @endif
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 text-on-surface font-bold text-sm">Rp {{ number_format($item->harga) }}</td>
                            <td class="py-4 text-on-surface-variant text-sm">{{ $item->stok }} pcs</td>
                            <td class="py-4">
                                @if($item->stok > $ambangStokMenipis)
                                    <div class="flex items-center gap-2 text-tertiary-container font-bold text-xs">
                                        <span class="w-2 h-2 rounded-full bg-tertiary-container"></span> Stok Aman
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 text-error font-bold text-xs">
                                        <span class="w-2 h-2 rounded-full bg-error animate-pulse"></span> Stok Menipis
                                    </div>
                                @endif
                            </td>
                            <td class="py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <button type="button" onclick="bukaModalEdit({{ $item->id }})" class="w-9 h-9 flex items-center justify-center rounded-full bg-primary-container/20 text-primary hover:bg-primary-container/40 transition-colors" title="Edit produk">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                    <form action="/admin/produk/{{ $item->id }}" method="POST" onsubmit="return confirm('Hapus &quot;{{ $item->nama_barang }}&quot; dari katalog? Tindakan ini tidak bisa dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-full bg-error/10 text-error hover:bg-error/20 transition-colors" title="Hapus produk">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                </div>

                                <!-- Modal Edit: khusus item ini -->
                                <div id="modal-edit-{{ $item->id }}" class="hidden fixed inset-0 z-[60] items-center justify-center bg-black/50 p-4">
                                    <div class="bg-surface-container-lowest rounded-xl soft-shadow w-full max-w-md p-lg max-h-[90vh] overflow-y-auto">
                                        <div class="flex items-center justify-between mb-lg">
                                            <h4 class="text-lg text-primary font-bold">Edit Barang</h4>
                                            <button type="button" onclick="tutupModalEdit({{ $item->id }})" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-surface-container transition-colors">
                                                <span class="material-symbols-outlined text-on-surface-variant">close</span>
                                            </button>
                                        </div>
                                        <form action="/admin/produk/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                            @csrf
                                            <div>
                                                <label class="block text-xs font-semibold text-on-surface-variant mb-1">Nama Varian Oleh-Oleh</label>
                                                <input type="text" name="nama_barang" required value="{{ $item->nama_barang }}" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-xs font-semibold text-on-surface-variant mb-1">Harga Jual (Rp)</label>
                                                    <input type="number" name="harga" required min="1000" value="{{ $item->harga }}" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-semibold text-on-surface-variant mb-1">Jumlah Stok</label>
                                                    <input type="number" name="stok" required min="0" value="{{ $item->stok }}" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold text-on-surface-variant mb-1">Deskripsi (opsional)</label>
                                                <textarea name="deskripsi" rows="2" class="w-full bg-surface-container rounded-xl py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">{{ $item->deskripsi }}</textarea>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold text-on-surface-variant mb-1">Kategori</label>
                                                <select name="kategori" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                                                    <option value="" {{ !$item->kategori ? 'selected' : '' }}>— Pilih kategori —</option>
                                                    <option value="makanan_camilan" {{ $item->kategori === 'makanan_camilan' ? 'selected' : '' }}>Makanan &amp; Camilan</option>
                                                    <option value="kain_tenun" {{ $item->kategori === 'kain_tenun' ? 'selected' : '' }}>Kain &amp; Tenun</option>
                                                    <option value="kerajinan_souvenir" {{ $item->kategori === 'kerajinan_souvenir' ? 'selected' : '' }}>Kerajinan &amp; Souvenir</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-semibold text-on-surface-variant mb-1">Foto Barang (opsional, kosongkan jika tidak diganti)</label>
                                                <input type="file" name="foto" accept="image/*" class="w-full text-sm">
                                            </div>
                                            <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-full text-sm font-semibold hover:scale-[1.01] active:scale-95 transition-transform">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-on-surface-variant text-sm">Belum ada barang. Tambahkan lewat form di bawah.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Section D: Tambah Produk -->
        <section id="tambah-produk" class="grid grid-cols-1 lg:grid-cols-2 gap-lg scroll-mt-24">
            <div class="bg-surface-container-lowest p-lg rounded-xl soft-shadow">
                <h4 class="text-xl text-primary font-bold mb-lg">Tambah Master Barang</h4>
                <form action="/admin/produk/tambah" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-on-surface-variant mb-1">Nama Varian Oleh-Oleh</label>
                        <input type="text" name="nama_barang" required placeholder="Misal: Bawang Goreng Premium 250g" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-on-surface-variant mb-1">Harga Jual (Rp)</label>
                            <input type="number" name="harga" required min="1000" placeholder="65000" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-on-surface-variant mb-1">Jumlah Stok</label>
                            <input type="number" name="stok" required min="0" placeholder="50" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface-variant mb-1">Deskripsi (opsional)</label>
                        <textarea name="deskripsi" rows="2" placeholder="Deskripsi singkat barang" class="w-full bg-surface-container rounded-xl py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface-variant mb-1">Kategori</label>
                        <select name="kategori" class="w-full bg-surface-container rounded-full py-3 px-5 border-none text-sm outline-none focus:ring-2 focus:ring-primary-container">
                            <option value="">— Pilih kategori —</option>
                            <option value="makanan_camilan">Makanan &amp; Camilan</option>
                            <option value="kain_tenun">Kain &amp; Tenun</option>
                            <option value="kerajinan_souvenir">Kerajinan &amp; Souvenir</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-on-surface-variant mb-1">Foto Barang (opsional)</label>
                        <input type="file" name="foto" accept="image/*" class="w-full text-sm">
                    </div>
                    <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-full text-sm font-semibold hover:scale-[1.01] active:scale-95 transition-transform">Simpan ke Katalog</button>
                </form>
            </div>
        </section>
    </div>

    <footer class="w-full pl-lg pr-lg py-lg flex flex-col md:flex-row justify-between items-center gap-2 border-t border-outline-variant/30 mt-auto opacity-80">
        <p class="text-sm font-semibold text-secondary">&copy; {{ date('Y') }} PaluKita Souvenirs</p>
        <p class="text-xs text-on-surface-variant">Toko Oleh-Oleh Khas Palu</p>
    </footer>
</main>

<!-- FAB -->
<a href="#tambah-produk" class="fixed bottom-lg right-lg w-16 h-16 bg-primary-container text-on-primary-container rounded-full soft-shadow hover:scale-110 active:scale-95 transition-all flex items-center justify-center z-50">
    <span class="material-symbols-outlined text-3xl">add</span>
</a>

<script>
    // Buka/tutup modal edit produk per-item
    function bukaModalEdit(id) {
        document.getElementById('modal-edit-' + id)?.classList.remove('hidden');
        document.getElementById('modal-edit-' + id)?.classList.add('flex');
    }
    function tutupModalEdit(id) {
        document.getElementById('modal-edit-' + id)?.classList.add('hidden');
        document.getElementById('modal-edit-' + id)?.classList.remove('flex');
    }
    // Tutup modal kalau klik area luar (backdrop)
    document.querySelectorAll('[id^="modal-edit-"]').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.add('hidden');
        });
    });

    // Filter tabel katalog secara live berdasarkan nama produk
    const inputCari = document.getElementById('cari-katalog');
    const baris = document.querySelectorAll('#tabel-katalog tbody tr');
    inputCari?.addEventListener('input', () => {
        const kata = inputCari.value.trim().toLowerCase();
        baris.forEach(tr => {
            const nama = tr.textContent.toLowerCase();
            tr.style.display = nama.includes(kata) ? '' : 'none';
        });
    });
</script>
</body>
</html>
