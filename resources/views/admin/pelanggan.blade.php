<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pelanggan - PaluKita Oleh-Oleh Khas Palu</title>
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
        <a href="/admin/pelanggan" class="bg-primary-container text-on-primary-container rounded-full mx-4 py-3 px-6 flex items-center gap-3 transition-all">
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
<main class="pl-72 min-h-screen flex flex-col">

    <header class="flex flex-col md:flex-row md:justify-between md:items-center w-full px-lg py-md gap-4 sticky top-0 bg-[#FAF5FF]/80 backdrop-blur-md z-40">
        <div class="flex flex-col">
            <h2 class="text-2xl text-primary font-bold">Daftar Pelanggan 👥</h2>
            <p class="text-on-surface-variant text-sm font-medium">Rekap akun pembeli & riwayat belanja mereka</p>
        </div>
    </header>

    <div class="p-lg space-y-lg">

        <section class="grid grid-cols-1 md:grid-cols-3 gap-lg">
            <div class="bg-primary-container p-lg rounded-xl text-on-primary-container soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Total Pelanggan Terdaftar</p>
                    <h3 class="text-3xl font-bold">{{ $pelanggan->count() }}</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">group</span>
            </div>
            <div class="bg-tertiary-fixed text-on-tertiary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Pelanggan Sudah Pernah Belanja</p>
                    <h3 class="text-3xl font-bold">{{ $pelanggan->where('jumlah_pesanan', '>', 0)->count() }}</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">shopping_bag</span>
            </div>
            <div class="bg-secondary-fixed text-on-secondary-fixed-variant p-lg rounded-xl soft-shadow card-hover relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-sm opacity-80 mb-2">Total Belanja Semua Pelanggan</p>
                    <h3 class="text-3xl font-bold">Rp {{ number_format($pelanggan->sum('total_belanja')) }}</h3>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10">payments</span>
            </div>
        </section>

        <section class="bg-surface-container-lowest p-lg rounded-xl soft-shadow overflow-hidden">
            <h4 class="text-xl text-primary font-bold mb-lg">Rekap Pelanggan</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-surface-variant text-on-surface-variant">
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Nama</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Username</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Pesanan Selesai</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Total Belanja</th>
                            <th class="pb-4 text-xs font-semibold uppercase tracking-wider">Pesanan Terakhir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-variant/50">
                        @forelse($pelanggan as $p)
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($p->name, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-bold text-on-surface">{{ $p->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-on-surface-variant text-sm">{{ $p->username }}</td>
                            <td class="py-4 text-on-surface text-sm">{{ $p->jumlah_pesanan }} pesanan</td>
                            <td class="py-4 text-on-surface font-bold text-sm">Rp {{ number_format($p->total_belanja ?? 0) }}</td>
                            <td class="py-4 text-on-surface-variant text-sm">
                                {{ $p->pesanan_terakhir ? \Carbon\Carbon::parse($p->pesanan_terakhir)->locale('id')->isoFormat('D MMM YYYY') : '-' }}
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-8 text-center text-on-surface-variant text-sm">Belum ada pelanggan yang terdaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
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
