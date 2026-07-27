<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PaluKita - Toko Oleh-Oleh Favoritmu</title>
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
</style>
</head>
<body class="text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
    <div class="flex items-center gap-sm">
        {{-- 1. Logo brand PaluKita (sementara pakai monogram, tinggal ganti src gambar logo asli) --}}
        <span class="brand-logo-mark">P</span>
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </div>

    <div class="hidden md:flex flex-1 mx-xl">
        <div class="relative w-full">
            <input class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary rounded-full px-lg py-2 text-label-md outline-none transition-all duration-300" placeholder="Cari bawang goreng, kain tenun, souvenir... 🔍" type="text">
        </div>
    </div>

    <nav class="flex items-center gap-md">
        <div class="hidden lg:flex items-center gap-sm">
            <a class="text-primary font-bold border-b-2 border-primary px-2 py-1 text-label-md" href="/katalog">Beranda</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-label-md" href="#">Kategori</a>
        </div>
        <div class="flex items-center gap-sm">
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
            {{-- 3. Floating image belum diganti (menunggu aset baru dari kamu) --}}
            <div class="relative w-full max-w-[320px] animate-bounce" style="animation-duration: 3s;">
                <img class="w-full h-auto drop-shadow-2xl" src="https://lh3.googleusercontent.com/aida/AP1WRLv7trBjV2UQ3gtALl0EcGEOZxCcAxZ-tlN0A-DN49Bw5C2QaGBoz5AbLQw98se0pKOVE_05QgIh-tzLengRD2nn1NUCYcnzigI00AxiAsy6s6MmozaDUleDuJ-x_aVLa-w3f9qLIy66emx0mapf6Tl8FPf5rSI2jbxsuZO1yMDi-j5AUSvSK8Z2WE8qSlasYaMylbRxLegZplNLSvRphvQ0_y8GTac4-sMZ1xDeBKs2gLF4QipVDrogDg" alt="Floating brand logo">
                <div class="absolute -bottom-4 -left-4 bg-white/20 backdrop-blur-md rounded-lg p-3 rotate-12">
                    <span class="material-symbols-outlined text-white text-3xl">redeem</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Grid -->
    <section id="produk" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-lg">
        @forelse($all_barang as $item)
        <div class="product-card group bg-white rounded-lg p-sm shadow-[0_10px_30px_rgba(126,34,206,0.05)] transition-all duration-500 flex flex-col border border-surface-container-high">
            <div class="relative rounded-lg overflow-hidden mb-md aspect-square bg-surface-container-low">
                @if($item->foto)
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_barang }}">
                @else
                    <div class="w-full h-full flex items-center justify-center text-on-surface-variant text-label-sm">Belum ada foto</div>
                @endif
                {{-- 4. Label "Local Fav / Premium Art / dll" sudah dihapus dari kartu produk --}}
            </div>
            <div class="flex-1 px-2">
                <h3 class="text-body-lg font-bold mb-1 group-hover:text-primary transition-colors">{{ $item->nama_barang }}</h3>
                @if($item->deskripsi)
                    <p class="text-label-sm text-on-surface-variant mb-md">{{ $item->deskripsi }}</p>
                @endif
                <div class="flex items-center gap-1 mb-md">
                    <span class="text-secondary font-black text-headline-md">Rp {{ number_format($item->harga) }}</span>
                </div>
                <div class="mb-md">
                    @if($item->stok > 0)
                        <span class="text-label-sm text-on-surface-variant">Tersedia: {{ $item->stok }} pcs</span>
                    @else
                        <span class="text-label-sm text-red-600 font-bold">Stok Habis</span>
                    @endif
                </div>
            </div>

            @if($item->stok > 0)
                <form action="/keranjang/tambah/{{ $item->id }}" method="POST" class="mt-auto">
                    @csrf
                    <input type="number" name="jumlah" value="1" min="1" max="{{ $item->stok }}" class="w-full mb-2 border-2 border-surface-container-high rounded-full px-4 py-2 text-label-md outline-none focus:border-primary">
                    <button type="submit" class="w-full bg-primary text-white rounded-full py-4 font-bold flex items-center justify-center gap-sm hover:bg-primary-container shadow-md transition-all duration-300 squishy-interaction">
                        Tambah ke Keranjang 🛍️
                    </button>
                </form>
            @else
                <button class="w-full bg-surface-container-high text-on-surface-variant rounded-full py-4 font-bold mt-auto cursor-not-allowed" disabled>
                    Habis Terjual
                </button>
            @endif
        </div>
        @empty
        <p class="col-span-full text-center text-on-surface-variant py-xl">Belum ada produk tersedia.</p>
        @endforelse
    </section>
</main>

<!-- Footer -->
<footer class="bg-surface-container-low py-xl mt-xl">
    <div class="max-w-7xl mx-auto px-md grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg text-center md:text-left">
        <div class="space-y-sm">
            <span class="text-headline-md font-black text-primary">PaluKita</span>
            <p class="text-body-md text-on-surface-variant">Toko oleh-oleh favoritmu yang menghadirkan kehangatan khas kota Palu langsung ke pintu rumahmu.</p>
        </div>
        <div class="space-y-base">
            <h4 class="text-label-md font-bold text-primary uppercase tracking-wider">Tautan Cepat</h4>
            <ul class="space-y-xs text-on-surface-variant">
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="#">Tentang Kami</a></li>
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="#">Hubungi Kami</a></li>
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="#">Pengiriman</a></li>
            </ul>
        </div>
        <div class="space-y-base">
            <h4 class="text-label-md font-bold text-primary uppercase tracking-wider">Bantuan</h4>
            <ul class="space-y-xs text-on-surface-variant">
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="/keranjang">Keranjang Saya</a></li>
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="#">Syarat &amp; Ketentuan</a></li>
                <li><a class="hover:text-primary transition-colors underline text-label-sm" href="#">Kebijakan Privasi</a></li>
            </ul>
        </div>
        <div class="space-y-base">
            <h4 class="text-label-md font-bold text-primary uppercase tracking-wider">Ikuti Kami</h4>
            <div class="flex justify-center md:justify-start gap-sm">
                <button class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined">public</span>
                </button>
                <button class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined">chat</span>
                </button>
            </div>
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
</script>
</body>
</html>
