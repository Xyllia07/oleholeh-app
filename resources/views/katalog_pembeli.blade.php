<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PaluKita - Toko Oleh-Oleh Favoritmu</title>
<meta name="description" content="Belanja oleh-oleh khas Palu: makanan & camilan, kain tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal.">
<meta property="og:type" content="website">
<meta property="og:site_name" content="PaluKita">
<meta property="og:title" content="PaluKita - Toko Oleh-Oleh Favoritmu">
<meta property="og:description" content="Belanja oleh-oleh khas Palu: makanan & camilan, kain tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal.">
<meta property="og:image" content="{{ asset('images/logo-palukita.png') }}">
<meta name="twitter:card" content="summary_large_image">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#6200a9",
                    "primary-container": "#7e22ce",
                    "on-primary-container": "#e4c5ff",
                    "secondary": "#a43073",
                    "secondary-container": "#fc79bd",
                    "on-secondary-container": "#76014e",
                    "surface": "#fcf8ff",
                    "surface-container-low": "#f7f2fc",
                    "surface-container-high": "#ebe6f0",
                    "on-surface": "#1c1b22",
                    "on-surface-variant": "#4c4354",
                },
                borderRadius: {
                    DEFAULT: "1rem",
                    lg: "2rem",
                    xl: "3rem",
                    full: "9999px",
                },
                spacing: {
                    md: "24px",
                    lg: "32px",
                    xl: "48px",
                    sm: "12px",
                    base: "8px",
                    xs: "4px",
                    gutter: "16px",
                    "container-padding": "20px",
                },
                fontFamily: {
                    sans: ["Plus Jakarta Sans", "sans-serif"],
                },
                fontSize: {
                    "label-sm": ["12px", { lineHeight: "16px", fontWeight: "700" }],
                    "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
                    "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.01em", fontWeight: "700" }],
                    "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                    "body-lg": ["18px", { lineHeight: "28px", fontWeight: "500" }],
                    "headline-xl": ["40px", { lineHeight: "48px", letterSpacing: "-0.02em", fontWeight: "800" }],
                    "headline-md": ["24px", { lineHeight: "32px", fontWeight: "700" }],
                },
            },
        },
    }
</script>
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #FAF5FF;
        background-image: radial-gradient(#E9D5FF 1px, transparent 1px);
        background-size: 40px 40px;
    }
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .glass-nav {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
    }
    .product-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(126, 34, 206, 0.12);
    }
    .squishy-interaction:active {
        transform: scale(0.95);
    }
    /* Ganti file ini kalau logo brand PaluKita sudah ada:
       <img src="{{ asset('images/logo-palukita.png') }}" ...>
       menggantikan .brand-logo-mark di bawah */
    .brand-logo-mark {
        width: 40px;
        height: 40px;
        border-radius: 9999px;
        background: linear-gradient(135deg, #7e22ce, #a43073);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 16px;
        flex-shrink: 0;
    }
    #mobile-menu-panel {
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease;
    }
    #mobile-menu-panel.open {
        max-height: 80vh;
        overflow-y: auto;
    }
</style>
</head>
<body class="text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
    <div class="flex items-center gap-sm">
        {{-- Logo brand PaluKita --}}
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </div>

    <form action="/katalog" method="GET" class="hidden md:flex flex-1 mx-xl">
        @if($kategoriAktif)
            <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
        @endif
        <div class="relative w-full">
            <input class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary rounded-full px-lg py-2 text-label-md outline-none transition-all duration-300" placeholder="Cari bawang goreng, kain tenun, souvenir... 🔍" type="text" name="cari" value="{{ $kataCari }}">
        </div>
    </form>

    <nav class="flex items-center gap-md">
        {{-- Tombol menu mobile: search & kategori dipindah ke sini di layar kecil --}}
        <button type="button" id="mobile-menu-toggle" class="lg:hidden p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 squishy-interaction inline-flex" aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu-panel">
            <span class="material-symbols-outlined text-primary" id="mobile-menu-icon">menu</span>
        </button>
        <div class="hidden lg:flex items-center gap-sm">
            <a class="text-primary font-bold border-b-2 border-primary px-2 py-1 text-label-md" href="/katalog">Beranda</a>
            <div class="relative group">
                <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md inline-flex items-center gap-1 px-2 py-1 {{ $kategoriAktif ? 'text-primary font-bold' : '' }}" href="{{ $kategoriAktif ? '/katalog#produk' : '#produk' }}">
                    Kategori
                    <span class="material-symbols-outlined text-base transition-transform duration-200 group-hover:rotate-180">expand_more</span>
                </a>
                {{-- Jembatan tak kasat mata biar dropdown gak ketutup pas kursor digeser turun --}}
                <div class="absolute left-0 top-full h-3 w-full"></div>
                <div class="absolute left-0 top-full pt-3 opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50">
                    <div class="w-56 bg-white rounded-xl shadow-xl border border-surface-container-high p-2">
                        <a href="/katalog#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ !$kategoriAktif ? 'bg-primary-container/10 text-primary' : '' }}">
                            <span class="material-symbols-outlined text-lg">apps</span> Semua Produk
                        </a>
                        <a href="/katalog?kategori=makanan_camilan#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'makanan_camilan' ? 'bg-primary-container/10 text-primary' : '' }}">
                            <span class="material-symbols-outlined text-lg">bakery_dining</span> Makanan &amp; Camilan
                        </a>
                        <a href="/katalog?kategori=kain_tenun#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'kain_tenun' ? 'bg-primary-container/10 text-primary' : '' }}">
                            <span class="material-symbols-outlined text-lg">checkroom</span> Kain &amp; Tenun
                        </a>
                        <a href="/katalog?kategori=kerajinan_souvenir#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'kerajinan_souvenir' ? 'bg-primary-container/10 text-primary' : '' }}">
                            <span class="material-symbols-outlined text-lg">redeem</span> Kerajinan &amp; Souvenir
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-sm">
            <div class="relative group">
                <button type="button" class="relative p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 squishy-interaction inline-flex">
                    <span class="material-symbols-outlined text-primary">notifications</span>
                    @if($notifJumlahBelumDibaca > 0)
                        <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 rounded-full bg-secondary text-white text-[10px] font-bold flex items-center justify-center">
                            {{ $notifJumlahBelumDibaca > 9 ? '9+' : $notifJumlahBelumDibaca }}
                        </span>
                    @endif
                </button>
                {{-- Jembatan tak kasat mata biar dropdown gak ketutup pas kursor digeser turun --}}
                <div class="absolute right-0 top-full h-3 w-full"></div>
                <div class="absolute right-0 top-full pt-3 opacity-0 invisible translate-y-1 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50">
                    <div class="w-80 bg-white rounded-xl shadow-xl border border-surface-container-high p-2 max-h-96 overflow-y-auto">
                        <div class="px-3 py-2 flex items-center justify-between">
                            <span class="text-label-md font-bold text-primary">Notifikasi</span>
                            <a href="/notifikasi" class="text-label-sm text-secondary hover:underline">Lihat Semua</a>
                        </div>
                        @forelse($notifTerbaru as $notif)
                            {{-- Notifikasi bisa diklik: langsung tandai dibaca & diarahkan ke pesanan terkait di halaman Pesanan Saya --}}
                            <a href="/notifikasi/{{ $notif->id }}/buka" class="block px-3 py-2.5 rounded-lg hover:bg-primary-container/10 transition-colors {{ $notif->dibaca ? '' : 'bg-primary-container/5' }}">
                                <div class="flex items-start gap-2">
                                    @if(!$notif->dibaca)
                                        <span class="w-2 h-2 mt-1.5 rounded-full bg-secondary shrink-0"></span>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="text-label-sm font-bold text-on-surface">{{ $notif->judul }}</p>
                                        <p class="text-label-sm text-on-surface-variant line-clamp-2">{{ $notif->pesan }}</p>
                                        <p class="text-[10px] text-on-surface-variant/70 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-3 py-6 text-center text-on-surface-variant text-label-sm">Belum ada notifikasi.</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <a href="/pesanan-saya" class="relative p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 squishy-interaction inline-flex" title="Pesanan Saya">
                <span class="material-symbols-outlined text-primary">local_shipping</span>
            </a>
            <a href="/keranjang" class="relative p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 squishy-interaction inline-flex">
                <span class="material-symbols-outlined text-primary">shopping_cart</span>
            </a>
            <a href="/profil" class="flex items-center gap-2 bg-primary-container/10 hover:bg-primary-container/20 px-3 py-1.5 rounded-full border border-primary/10 transition-colors squishy-interaction">
                @if(Auth::user()->foto)
                    <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Foto profil" class="w-7 h-7 rounded-full object-cover">
                @else
                    <span class="w-7 h-7 rounded-full bg-primary text-white flex items-center justify-center text-[11px] font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                @endif
                {{-- 2. Sapaan disesuaikan dengan nama akun yang sedang login --}}
                <span class="text-label-md text-primary font-bold">Hi, {{ explode(' ', Auth::user()->name)[0] }} ❤</span>
            </a>
            <form action="/logout" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="text-label-sm font-bold text-on-surface-variant hover:text-primary transition-colors px-2">Keluar</button>
            </form>
        </div>
    </nav>
</header>

{{-- Panel menu mobile: muncul di bawah navbar saat tombol hamburger ditekan (khusus layar < lg) --}}
<div id="mobile-menu-panel" class="lg:hidden fixed top-[76px] left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-40 rounded-lg glass-nav shadow-lg">
    <div class="p-md space-y-md">
        <form action="/katalog" method="GET" class="md:hidden">
            @if($kategoriAktif)
                <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
            @endif
            <div class="relative w-full">
                <input class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary rounded-full px-lg py-2 text-label-md outline-none transition-all duration-300" placeholder="Cari bawang goreng, kain tenun, souvenir... 🔍" type="text" name="cari" value="{{ $kataCari }}">
            </div>
        </form>

        <div>
            <p class="text-label-sm font-bold text-on-surface-variant uppercase tracking-wider mb-2">Kategori</p>
            <div class="flex flex-col gap-1">
                <a href="/katalog#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ !$kategoriAktif ? 'bg-primary-container/10 text-primary' : '' }}">
                    <span class="material-symbols-outlined text-lg">apps</span> Semua Produk
                </a>
                <a href="/katalog?kategori=makanan_camilan#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'makanan_camilan' ? 'bg-primary-container/10 text-primary' : '' }}">
                    <span class="material-symbols-outlined text-lg">bakery_dining</span> Makanan &amp; Camilan
                </a>
                <a href="/katalog?kategori=kain_tenun#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'kain_tenun' ? 'bg-primary-container/10 text-primary' : '' }}">
                    <span class="material-symbols-outlined text-lg">checkroom</span> Kain &amp; Tenun
                </a>
                <a href="/katalog?kategori=kerajinan_souvenir#produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md {{ $kategoriAktif === 'kerajinan_souvenir' ? 'bg-primary-container/10 text-primary' : '' }}">
                    <span class="material-symbols-outlined text-lg">redeem</span> Kerajinan &amp; Souvenir
                </a>
            </div>
        </div>

        <div class="border-t border-surface-container-high pt-md">
            <p class="text-label-sm font-bold text-on-surface-variant uppercase tracking-wider mb-2">Akun</p>
            <div class="flex flex-col gap-1">
                <a href="/pesanan-saya" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md">
                    <span class="material-symbols-outlined text-lg">local_shipping</span> Pesanan Saya
                </a>
                <a href="/keranjang" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md">
                    <span class="material-symbols-outlined text-lg">shopping_cart</span> Keranjang
                </a>
                <a href="/notifikasi" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md">
                    <span class="material-symbols-outlined text-lg">notifications</span> Notifikasi
                    @if($notifJumlahBelumDibaca > 0)
                        <span class="ml-auto min-w-[18px] h-[18px] px-1 rounded-full bg-secondary text-white text-[10px] font-bold flex items-center justify-center">{{ $notifJumlahBelumDibaca > 9 ? '9+' : $notifJumlahBelumDibaca }}</span>
                    @endif
                </a>
                <a href="/profil" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-primary-container/10 hover:text-primary transition-colors text-label-md">
                    <span class="material-symbols-outlined text-lg">person</span> Profil (Hi, {{ explode(' ', Auth::user()->name)[0] }})
                </a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-50 text-red-600 transition-colors text-label-md text-left">
                        <span class="material-symbols-outlined text-lg">logout</span> Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<main class="max-w-7xl mx-auto px-container-padding pt-[120px] pb-xl">

    @if(session('success_beli'))
        <div class="mb-lg bg-green-100 text-green-800 border border-green-200 rounded-lg px-lg py-3 text-center font-semibold">🛒 {{ session('success_beli') }}</div>
    @endif
    @if(session('success_keranjang'))
        <div class="mb-lg bg-green-100 text-green-800 border border-green-200 rounded-lg px-lg py-3 text-center font-semibold">✅ {{ session('success_keranjang') }}</div>
    @endif
    @if(session('error_keranjang'))
        <div class="mb-lg bg-red-100 text-red-800 border border-red-200 rounded-lg px-lg py-3 text-center font-semibold">⚠️ {{ session('error_keranjang') }}</div>
    @endif

    <!-- Hero Banner -->
    <section class="relative mb-xl overflow-hidden rounded-xl bg-gradient-to-br from-primary to-secondary p-xl flex flex-col md:flex-row items-center justify-between min-h-[400px] shadow-2xl">
        <div class="absolute inset-0 opacity-10">
            <div class="grid grid-cols-6 gap-4 p-4 h-full w-full">
                <span class="material-symbols-outlined text-white text-6xl">shopping_bag</span>
                <span class="material-symbols-outlined text-white text-4xl">local_mall</span>
                <span class="material-symbols-outlined text-white text-5xl">auto_awesome</span>
                <span class="material-symbols-outlined text-white text-3xl">celebration</span>
            </div>
        </div>
        <div class="relative z-10 md:w-3/5 text-center md:text-left space-y-md">
            <h1 class="text-headline-xl font-headline-xl text-white leading-tight">
                Oleh-Oleh Khas Palu Terlengkap &amp; Paling Imut! ✨
            </h1>
            <p class="text-body-lg text-on-primary-container/90 max-w-lg">
                Jelajahi kuliner gurih, Kain Tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal.
            </p>
            <div class="pt-4">
                <a href="#produk" class="bg-[#34D399] text-white hover:bg-[#10b981] hover:scale-105 active:scale-95 transition-all duration-300 px-xl py-4 rounded-full font-bold text-lg inline-flex items-center gap-sm shadow-xl mx-auto md:mx-0">
                    Belanja Sekarang 🚀
                </a>
            </div>
        </div>
        <div class="relative z-10 md:w-2/5 flex justify-center mt-xl md:mt-0">
            {{-- Floating brand logo --}}
            <div class="relative w-full max-w-[320px] animate-bounce" style="animation-duration: 3s;">
                <img class="w-full h-auto drop-shadow-2xl" src="{{ asset('images/logo-palukita.png') }}" alt="Floating brand logo">
                <div class="absolute -bottom-4 -left-4 bg-white/20 backdrop-blur-md rounded-lg p-3 rotate-12">
                    <span class="material-symbols-outlined text-white text-3xl">redeem</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Chip penanda kategori yang sedang difilter --}}
    @if($kategoriAktif)
        @php
            $labelKategoriAktif = [
                'makanan_camilan'    => 'Makanan & Camilan',
                'kain_tenun'         => 'Kain & Tenun',
                'kerajinan_souvenir' => 'Kerajinan & Souvenir',
            ][$kategoriAktif] ?? $kategoriAktif;
        @endphp
        <div class="flex items-center gap-2 mb-md">
            <span class="text-on-surface-variant text-label-md">Menampilkan kategori:</span>
            <span class="inline-flex items-center gap-1.5 bg-primary text-white font-bold text-label-sm px-4 py-1.5 rounded-full">
                {{ $labelKategoriAktif }}
                <a href="/katalog#produk" class="hover:opacity-70" title="Hapus filter">
                    <span class="material-symbols-outlined text-sm">close</span>
                </a>
            </span>
        </div>
    @endif

    {{-- Chip penanda kata pencarian yang sedang aktif --}}
    @if($kataCari !== '')
        <div class="flex items-center gap-2 mb-md">
            <span class="text-on-surface-variant text-label-md">Hasil pencarian untuk:</span>
            <span class="inline-flex items-center gap-1.5 bg-secondary text-white font-bold text-label-sm px-4 py-1.5 rounded-full">
                "{{ $kataCari }}"
                <a href="{{ $kategoriAktif ? '/katalog?kategori=' . $kategoriAktif . '#produk' : '/katalog#produk' }}" class="hover:opacity-70" title="Hapus pencarian">
                    <span class="material-symbols-outlined text-sm">close</span>
                </a>
            </span>
        </div>
    @endif

    <!-- Product Grid -->
    <section id="produk" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-md">
        @php
            // Kumpulan ulasan contoh (belum ada sistem review sungguhan di database),
            // dirotasi per produk supaya tiap kartu tampil beda.
            $kumpulanUlasan = [
                [
                    ['nama' => 'Rina S.', 'rating' => 5, 'komentar' => 'Kualitasnya bagus banget, packingnya juga rapi. Recommended!'],
                    ['nama' => 'Budi P.', 'rating' => 4, 'komentar' => 'Rasanya enak, pengiriman agak lama tapi worth it.'],
                    ['nama' => 'Sari W.', 'rating' => 5, 'komentar' => 'Sudah kedua kalinya order di sini, selalu puas.'],
                ],
                [
                    ['nama' => 'Andi K.', 'rating' => 4, 'komentar' => 'Barang sesuai deskripsi, harga juga worth it.'],
                    ['nama' => 'Maya L.', 'rating' => 5, 'komentar' => 'Suka banget, jadi oleh-oleh favorit keluarga.'],
                    ['nama' => 'Dedi H.', 'rating' => 4, 'komentar' => 'Pengemasan aman, kualitas barangnya oke.'],
                ],
                [
                    ['nama' => 'Fitri A.', 'rating' => 5, 'komentar' => 'Wangi dan segar, langsung habis dimakan sekeluarga.'],
                    ['nama' => 'Hendra T.', 'rating' => 3, 'komentar' => 'Cukup bagus, tapi pengiriman bisa lebih cepat.'],
                    ['nama' => 'Nina P.', 'rating' => 5, 'komentar' => 'Top banget, bakal order lagi buat oleh-oleh.'],
                ],
            ];
        @endphp
        @forelse($all_barang as $item)
        @php
            $ulasanProduk = $kumpulanUlasan[$item->id % count($kumpulanUlasan)];
            $ratingRataRata = round(collect($ulasanProduk)->avg('rating'), 1);
        @endphp
        <div class="product-card group bg-white rounded-lg p-2 shadow-[0_10px_30px_rgba(126,34,206,0.05)] transition-all duration-500 flex flex-col border border-surface-container-high cursor-pointer"
             onclick="bukaModalProduk({{ $item->id }})">
            <div class="relative rounded-lg overflow-hidden mb-2 aspect-square bg-surface-container-low">
                @if($item->foto)
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_barang }}">
                @else
                    <div class="w-full h-full flex items-center justify-center text-on-surface-variant text-label-sm">Belum ada foto</div>
                @endif
                @if($item->stok <= 0)
                    <div class="absolute inset-0 bg-white/70 flex items-center justify-center">
                        <span class="text-label-sm text-red-600 font-bold">Stok Habis</span>
                    </div>
                @endif
            </div>
            <div class="px-1 pb-1">
                <h3 class="text-label-md font-bold leading-snug mb-1 line-clamp-2 group-hover:text-primary transition-colors">{{ $item->nama_barang }}</h3>
                <span class="text-secondary font-black text-body-md">Rp {{ number_format($item->harga) }}</span>
            </div>
        </div>

        <!-- Modal Detail Produk -->
        <div id="modal-produk-{{ $item->id }}" class="hidden fixed inset-0 z-[60] bg-black/50 backdrop-blur-sm items-center justify-center p-4" onclick="tutupModalJikaBackdrop(event, {{ $item->id }})">
            <div class="bg-white rounded-lg w-full max-w-lg max-h-[90vh] overflow-y-auto p-lg relative" onclick="event.stopPropagation()">
                <button type="button" onclick="tutupModalProduk({{ $item->id }})" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-surface-container-low flex items-center justify-center hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>

                <div class="rounded-lg overflow-hidden mb-md aspect-square bg-surface-container-low">
                    @if($item->foto)
                        <img class="w-full h-full object-cover" src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_barang }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-on-surface-variant text-label-sm">Belum ada foto</div>
                    @endif
                </div>

                <h3 class="text-headline-md font-bold mb-1">{{ $item->nama_barang }}</h3>

                <div class="flex items-center gap-2 mb-md">
                    <span class="text-yellow-500 text-label-md">{{ str_repeat('★', (int) floor($ratingRataRata)) }}{{ str_repeat('☆', 5 - (int) floor($ratingRataRata)) }}</span>
                    <span class="text-label-sm text-on-surface-variant">{{ $ratingRataRata }} ({{ count($ulasanProduk) }} ulasan)</span>
                </div>

                @if($item->deskripsi)
                    <p class="text-body-md text-on-surface-variant mb-md">{{ $item->deskripsi }}</p>
                @endif

                <div class="flex items-center justify-between mb-md">
                    <span class="text-secondary font-black text-headline-md">Rp {{ number_format($item->harga) }} <span class="text-label-sm font-normal text-on-surface-variant">/pcs</span></span>
                    @if($item->stok > 0)
                        <span class="text-label-sm text-on-surface-variant">Tersedia: {{ $item->stok }} pcs</span>
                    @else
                        <span class="text-label-sm text-red-600 font-bold">Stok Habis</span>
                    @endif
                </div>

                @if($item->stok > 0)
                    <form action="/keranjang/tambah/{{ $item->id }}" method="POST" class="mb-lg">
                        @csrf
                        <div class="flex gap-2">
                            <input type="number" name="jumlah" value="1" min="1" max="{{ $item->stok }}" class="w-24 border-2 border-surface-container-high rounded-full px-4 py-2 text-label-md outline-none focus:border-primary">
                            <button type="submit" class="flex-1 bg-primary text-white rounded-full py-3 font-bold flex items-center justify-center gap-sm hover:bg-primary-container shadow-md transition-all duration-300 squishy-interaction">
                                Tambah ke Keranjang 🛍️
                            </button>
                        </div>
                    </form>
                @else
                    <button class="w-full bg-surface-container-high text-on-surface-variant rounded-full py-3 font-bold mb-lg cursor-not-allowed" disabled>
                        Habis Terjual
                    </button>
                @endif

                <div class="border-t border-surface-container-high pt-md">
                    <h4 class="text-label-md font-bold text-primary uppercase tracking-wider mb-sm">Ulasan Pembeli</h4>
                    <div class="max-h-48 overflow-y-auto space-y-3 pr-1">
                        @foreach($ulasanProduk as $review)
                            <div class="bg-surface-container-low rounded-lg p-3">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="font-bold text-label-md">{{ $review['nama'] }}</span>
                                    <span class="text-yellow-500 text-label-sm">{{ str_repeat('★', $review['rating']) }}{{ str_repeat('☆', 5 - $review['rating']) }}</span>
                                </div>
                                <p class="text-label-sm text-on-surface-variant">{{ $review['komentar'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-on-surface-variant py-xl">
            @if($kataCari !== '')
                Tidak ada produk yang cocok dengan pencarian "{{ $kataCari }}".
            @elseif($kategoriAktif)
                Belum ada produk di kategori ini.
            @else
                Belum ada produk tersedia.
            @endif
        </p>
        @endforelse
    </section>
</main>

<!-- Footer -->
<footer class="bg-surface-container-low py-xl mt-xl">
    <div class="max-w-7xl mx-auto px-md grid grid-cols-1 md:grid-cols-2 gap-lg text-center md:text-left">
        <div class="space-y-sm">
            <span class="text-headline-md font-black text-primary">PaluKita</span>
            <p class="text-body-md text-on-surface-variant">Toko oleh-oleh favoritmu yang menghadirkan kehangatan khas kota Palu langsung ke pintu rumahmu.</p>
        </div>
        <div class="space-y-base">
            <h4 class="text-label-md font-bold text-primary uppercase tracking-wider">Hubungi Kami</h4>
            <ul class="space-y-xs text-on-surface-variant text-label-sm">
                <li class="flex items-center justify-center md:justify-start gap-2">
                    <span class="material-symbols-outlined text-primary text-lg">location_on</span>
                    Jl. Diponegoro No. 10, Palu, Sulawesi Tengah
                </li>
                <li class="flex items-center justify-center md:justify-start gap-2">
                    <span class="material-symbols-outlined text-primary text-lg">call</span>
                    0812-3456-7890 (WhatsApp)
                </li>
                <li class="flex items-center justify-center md:justify-start gap-2">
                    <span class="material-symbols-outlined text-primary text-lg">mail</span>
                    halo@palukita.id
                </li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-md mt-xl pt-lg border-t border-surface-container-high text-center text-label-sm text-on-surface-variant">
        © {{ date('Y') }} PaluKita - Toko Oleh-Oleh Favoritmu
    </div>
</footer>

<script>
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('header');
        if (window.scrollY > 20) {
            nav.classList.add('py-2', 'w-full', 'top-0', 'rounded-none');
            nav.classList.remove('top-4', 'w-[95%]', 'rounded-full');
        } else {
            nav.classList.remove('py-2', 'w-full', 'top-0', 'rounded-none');
            nav.classList.add('top-4', 'w-[95%]', 'rounded-full');
        }
    });

    // Buka/tutup modal detail produk (foto, deskripsi, harga, & ulasan)
    function bukaModalProduk(id) {
        document.getElementById('modal-produk-' + id)?.classList.remove('hidden');
        document.getElementById('modal-produk-' + id)?.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }
    function tutupModalProduk(id) {
        document.getElementById('modal-produk-' + id)?.classList.add('hidden');
        document.getElementById('modal-produk-' + id)?.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }
    function tutupModalJikaBackdrop(event, id) {
        if (event.target === event.currentTarget) {
            tutupModalProduk(id);
        }
    }

    // Toggle panel menu mobile (hamburger)
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const menuPanel = document.getElementById('mobile-menu-panel');
    const menuIcon = document.getElementById('mobile-menu-icon');
    menuToggle?.addEventListener('click', () => {
        const isOpen = menuPanel.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        menuIcon.textContent = isOpen ? 'close' : 'menu';
    });
</script>
</body>
</html>
