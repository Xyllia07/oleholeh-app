<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PaluKita - Keranjang Belanja</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                    "surface-container": "#f1ecf6",
                    "surface-container-high": "#ebe6f0",
                    "surface-container-highest": "#e5e1ea",
                    "on-surface": "#1c1b22",
                    "on-surface-variant": "#4c4354",
                    "outline": "#7e7385",
                    "outline-variant": "#cfc2d6",
                    "error": "#ba1a1a",
                },
                borderRadius: {
                    DEFAULT: "1rem",
                    lg: "2rem",
                    xl: "3rem",
                    full: "9999px",
                },
                spacing: {
                    xs: "4px", sm: "12px", base: "8px", md: "24px", lg: "32px", xl: "48px",
                    gutter: "16px", "container-padding": "20px",
                },
                fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
                fontSize: {
                    "label-sm": ["12px", { lineHeight: "16px", fontWeight: "700" }],
                    "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
                    "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.01em", fontWeight: "700" }],
                    "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                    "body-lg": ["18px", { lineHeight: "28px", fontWeight: "500" }],
                    "headline-md": ["24px", { lineHeight: "32px", fontWeight: "700" }],
                },
            },
        },
    }
</script>
<style>
    body {
        background-color: #FAF5FF;
        background-image: radial-gradient(#E9D5FF 1px, transparent 1px);
        background-size: 40px 40px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        vertical-align: middle;
    }
    .custom-shadow { box-shadow: 0 20px 40px rgba(126, 34, 206, 0.08); }
    .stepper-btn {
        width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;
        border-radius: 9999px; background: #ebe6f0; color: #6200a9; font-weight: 700;
        transition: all .2s;
    }
    .stepper-btn:hover { background: #7e22ce; color: #e4c5ff; }
    .input-pill {
        width: 100%; padding: 12px 24px; border-radius: 9999px; background: #f7f2fc;
        border: none; outline: none; transition: all .2s;
    }
    .input-pill:focus { box-shadow: 0 0 0 2px #6200a9; }
    .brand-logo-mark {
        width: 40px; height: 40px; border-radius: 9999px;
        background: linear-gradient(135deg, #7e22ce, #a43073);
        display: flex; align-items: center; justify-content: center;
        color: white; font-weight: 800; font-size: 16px; flex-shrink: 0;
    }
    .avatar-mark {
        width: 40px; height: 40px; border-radius: 9999px; background: #f1ecf6;
        display: flex; align-items: center; justify-content: center;
        color: #6200a9; font-weight: 800; font-size: 14px;
    }
</style>
</head>
<body class="min-h-screen text-on-surface">

<!-- Top Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full bg-surface/90 backdrop-blur-md shadow-lg z-50 flex justify-between items-center px-lg py-sm">
    <a href="/katalog" class="flex items-center gap-2">
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
        <span class="text-headline-md font-black text-primary">PaluKita ✨</span>
    </a>

    <!-- Progress Indicator -->
    <div class="hidden md:flex items-center gap-4 text-label-md">
        <div class="flex items-center gap-2 text-primary font-bold">
            <span class="w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-xs">1</span>
            <span>Keranjang Belanja</span>
        </div>
        <span class="text-outline-variant">➔</span>
        <div class="flex items-center gap-2 text-on-surface-variant">
            <span class="w-6 h-6 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center text-xs">2</span>
            <span>Pengiriman</span>
        </div>
        <span class="text-outline-variant">➔</span>
        <div class="flex items-center gap-2 text-on-surface-variant">
            <span class="w-6 h-6 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center text-xs">3</span>
            <span>Pembayaran</span>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <a href="/katalog" class="hidden sm:inline text-label-md font-bold text-on-surface-variant hover:text-primary transition-colors">← Belanja Lagi</a>
        <div class="relative group">
            <button type="button" class="relative p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 inline-flex">
                <span class="material-symbols-outlined text-primary">notifications</span>
                @if($notifJumlahBelumDibaca > 0)
                    <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 rounded-full bg-secondary text-white text-[10px] font-bold flex items-center justify-center">
                        {{ $notifJumlahBelumDibaca > 9 ? '9+' : $notifJumlahBelumDibaca }}
                    </span>
                @endif
            </button>
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
        <a href="/pesanan-saya" class="relative p-2 hover:bg-primary-container/20 rounded-full transition-all duration-300 inline-flex" title="Pesanan Saya">
            <span class="material-symbols-outlined text-primary">local_shipping</span>
        </a>
    </div>
</nav>

<!-- Main Content -->
<main class="max-w-7xl mx-auto pt-32 pb-24 px-container-padding">

    @if(session('success_keranjang'))
        <div class="mb-lg bg-green-100 text-green-800 border border-green-200 rounded-lg px-lg py-3 text-center font-semibold">✅ {{ session('success_keranjang') }}</div>
    @endif
    @if(session('error_keranjang'))
        <div class="mb-lg bg-red-100 text-red-800 border border-red-200 rounded-lg px-lg py-3 text-center font-semibold">⚠️ {{ session('error_keranjang') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-lg bg-red-100 text-red-800 border border-red-200 rounded-lg px-lg py-3 text-center font-semibold">⚠️ {{ $errors->first() }}</div>
    @endif

    @if($items->isEmpty())
        <div class="bg-surface rounded-lg custom-shadow p-xl text-center max-w-xl mx-auto">
            <span class="material-symbols-outlined text-6xl text-primary-container">shopping_cart</span>
            <h1 class="text-headline-md font-bold text-primary mt-md mb-2">Keranjang kamu masih kosong</h1>
            <p class="text-on-surface-variant mb-lg">Yuk cari oleh-oleh khas Palu favoritmu dulu ✨</p>
            <a href="/katalog" class="inline-block bg-primary text-white rounded-full px-xl py-3 font-bold hover:bg-primary-container transition-all squishy-interaction">Mulai Belanja 🛍️</a>
        </div>
    @else
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
        <!-- Left Column: Cart Items -->
        <div class="lg:col-span-8 space-y-lg">
            <section class="bg-surface rounded-lg p-lg custom-shadow">
                <h1 class="text-headline-md font-bold text-primary mb-lg flex items-center gap-2">
                    🛒 Keranjang Belanja PaluKita-mu <span class="text-secondary">❤</span>
                </h1>

                <div class="divide-y divide-outline-variant">
                    @foreach($items as $item)
                    <div class="py-md flex flex-col sm:flex-row items-center gap-md group">
                        <div class="w-24 h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0">
                            @if($item->barang->foto)
                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ Storage::url($item->barang->foto) }}" alt="{{ $item->barang->nama_barang }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-on-surface-variant text-label-sm text-center px-2">Belum ada foto</div>
                            @endif
                        </div>

                        <div class="flex-grow text-center sm:text-left">
                            <h3 class="text-body-lg font-bold text-on-surface">{{ $item->barang->nama_barang }}</h3>
                            <p class="text-primary font-bold">Rp {{ number_format($item->barang->harga) }}</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <form action="/keranjang/{{ $item->id }}" method="POST" class="flex items-center bg-surface-container rounded-full p-1 qty-form">
                                @csrf
                                @method('PATCH')
                                <button type="button" class="stepper-btn qty-minus">-</button>
                                <input type="number" name="jumlah" value="{{ $item->jumlah }}" min="1" max="{{ $item->barang->stok + $item->jumlah }}" class="w-12 text-center font-bold text-on-surface bg-transparent border-none outline-none qty-input">
                                <button type="button" class="stepper-btn qty-plus">+</button>
                            </form>

                            <div class="text-right min-w-[100px]">
                                <p class="text-label-sm text-outline">Total</p>
                                <p class="text-body-md font-bold text-on-surface">Rp {{ number_format($item->barang->harga * $item->jumlah) }}</p>
                            </div>

                            <form action="/keranjang/{{ $item->id }}" method="POST" onsubmit="return confirm('Hapus barang ini dari keranjang?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="material-symbols-outlined text-error hover:scale-110 transition-transform">delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a class="inline-block mt-lg text-primary font-bold hover:underline" href="/katalog">← Tambah Oleh-Oleh Lain</a>
            </section>

            <!-- Shipping Form Panel -->
            <section class="bg-surface rounded-lg p-lg custom-shadow">
                <h2 class="text-headline-md font-bold text-primary mb-lg flex items-center gap-2">
                    📍 Alamat Pengiriman Oleh-Oleh
                </h2>
                <form id="checkout-form" action="/keranjang/checkout" method="POST" class="grid grid-cols-1 gap-md">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-label-md ml-4">Nama Penerima</label>
                        <input class="input-pill" name="nama_pembeli" value="{{ old('nama_pembeli') }}" placeholder="Masukkan nama lengkap..." type="text" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-label-md ml-4">Nomor HP</label>
                        <input class="input-pill" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Contoh: 0812-3456-7890" type="tel" inputmode="numeric" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-label-md ml-4">Alamat Lengkap</label>
                        <textarea class="w-full px-6 py-4 rounded-lg bg-surface-container-low border-none focus:ring-2 focus:ring-primary transition-all text-on-surface placeholder:text-outline resize-none" name="alamat_pengiriman" placeholder="Tulis alamat detail pengiriman..." rows="3" required>{{ old('alamat_pengiriman') }}</textarea>
                    </div>
                </form>
            </section>
        </div>

        <!-- Right Column: Summary -->
        <div class="lg:col-span-4 h-fit lg:sticky lg:top-28">
            <div class="bg-surface rounded-lg p-lg custom-shadow border-2 border-primary-container/20">
                <h2 class="text-headline-md font-bold text-on-surface mb-lg">Ringkasan Belanja ✨</h2>
                <div class="space-y-md mb-lg">
                    <div class="flex justify-between items-center text-on-surface-variant">
                        <span class="text-body-md">Total Harga Produk</span>
                        <span class="font-bold">Rp {{ number_format($total) }}</span>
                    </div>
                    <div class="border-t border-dashed border-outline-variant pt-lg flex justify-between items-end">
                        <span class="text-body-lg font-bold">Total Pembayaran</span>
                        <span class="text-headline-md font-black text-primary-container">Rp {{ number_format($total) }}</span>
                    </div>
                </div>
                <button type="submit" form="checkout-form" class="w-full bg-[#34D399] text-white font-black text-body-lg py-4 rounded-full shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 mb-4">
                    Bayar &amp; Kirim Oleh-Oleh Sekarang! 🚀
                </button>
                <p class="text-center text-label-sm text-outline italic">
                    Belanja aman &amp; nyaman di PaluKita. Data Anda terlindungi.
                </p>
            </div>

            <!-- Souvenir Badge -->
            <div class="mt-lg flex items-center gap-4 p-md bg-secondary-container/10 rounded-lg border border-secondary-container/30">
                <div class="w-12 h-12 rounded-full border-2 border-primary flex items-center justify-center bg-surface flex-shrink-0">
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">stars</span>
                </div>
                <div>
                    <p class="text-label-md font-bold text-secondary">Local Favorites Guaranteed</p>
                    <p class="text-label-sm text-on-surface-variant">Kurasi terbaik dari UMKM Palu</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</main>

<!-- Footer -->
<footer class="bg-surface-container-low py-xl mt-24">
    <div class="max-w-7xl mx-auto px-md grid grid-cols-1 md:grid-cols-2 gap-lg text-center md:text-left">
        <div>
            <h3 class="text-headline-md font-black text-primary mb-4">PaluKita</h3>
            <p class="text-body-md text-on-surface-variant">Toko oleh-oleh favoritmu yang menghadirkan keajaiban Sulawesi Tengah langsung ke depan pintu rumahmu.</p>
        </div>
        <div>
            <h4 class="font-bold mb-4">Hubungi Kami</h4>
            <ul class="space-y-2 text-label-md text-on-surface-variant">
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
    // Stepper +/- lalu submit form PATCH ke server
    document.querySelectorAll('.qty-form').forEach(form => {
        const input = form.querySelector('.qty-input');
        const minus = form.querySelector('.qty-minus');
        const plus = form.querySelector('.qty-plus');
        const max = parseInt(input.getAttribute('max'), 10);

        function submitQty() {
            input.classList.add('scale-125');
            setTimeout(() => input.classList.remove('scale-125'), 150);
            form.submit();
        }

        minus.addEventListener('click', () => {
            const val = parseInt(input.value, 10);
            if (val > 1) {
                input.value = val - 1;
                submitQty();
            }
        });

        plus.addEventListener('click', () => {
            const val = parseInt(input.value, 10);
            if (val < max) {
                input.value = val + 1;
                submitQty();
            }
        });
    });
</script>
</body>
</html>
