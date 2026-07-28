<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PaluKita - Toko Oleh-Oleh Khas Palu Terlengkap</title>
<meta name="description" content="PaluKita adalah toko oleh-oleh khas Palu & Sulawesi Tengah: makanan & camilan, kain tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal. Belanja online, dikirim ke seluruh Indonesia.">

<!-- Open Graph / Share Preview -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="PaluKita">
<meta property="og:title" content="PaluKita - Toko Oleh-Oleh Khas Palu Terlengkap">
<meta property="og:description" content="Kuliner gurih, Kain Tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal di Palu, Sulawesi Tengah.">
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
                    md: "24px", lg: "32px", xl: "48px", sm: "12px",
                    base: "8px", xs: "4px", gutter: "16px", "container-padding": "20px",
                },
                fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
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
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); }
    .squishy-interaction:active { transform: scale(0.95); }
    .float-animation { animation: float 6s ease-in-out infinite; }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .category-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(126, 34, 206, 0.12); }
</style>
</head>
<body class="text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
    <a href="/" class="flex items-center gap-sm">
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </a>
    <nav class="flex items-center gap-sm">
        <a href="/login" class="text-label-md font-bold text-on-surface-variant hover:text-primary transition-colors px-3 py-2 squishy-interaction">Masuk</a>
        <a href="/login" class="bg-primary text-white text-label-md font-bold px-5 py-2.5 rounded-full shadow-md hover:bg-primary-container transition-colors squishy-interaction">Daftar Gratis</a>
    </nav>
</header>

<main class="max-w-7xl mx-auto px-container-padding pt-[120px] pb-xl">

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
                Jelajahi kuliner gurih, Kain Tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal — dikirim ke seluruh Indonesia.
            </p>
            <div class="pt-4 flex flex-col sm:flex-row items-center gap-3 justify-center md:justify-start">
                <a href="/login" class="bg-[#34D399] text-white hover:bg-[#10b981] hover:scale-105 active:scale-95 transition-all duration-300 px-xl py-4 rounded-full font-bold text-lg inline-flex items-center gap-sm shadow-xl">
                    Belanja Sekarang 🚀
                </a>
                <a href="/login" class="bg-white/15 text-white border border-white/40 hover:bg-white/25 transition-all duration-300 px-lg py-4 rounded-full font-bold text-lg inline-flex items-center gap-sm">
                    Sudah Punya Akun? Masuk
                </a>
            </div>
        </div>
        <div class="relative z-10 md:w-2/5 flex justify-center mt-xl md:mt-0">
            <div class="relative w-full max-w-[320px] float-animation">
                <img class="w-full h-auto drop-shadow-2xl" src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita">
                <div class="absolute -bottom-4 -left-4 bg-white/20 backdrop-blur-md rounded-lg p-3 rotate-12">
                    <span class="material-symbols-outlined text-white text-3xl">redeem</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Unggulan -->
    <section class="mb-xl">
        <h2 class="text-headline-md font-black text-primary mb-lg text-center">Kategori Favorit</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-md">
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high transition-all duration-300">
                <span class="material-symbols-outlined text-primary text-5xl mb-2">bakery_dining</span>
                <h3 class="font-bold text-body-lg mb-1">Makanan &amp; Camilan</h3>
                <p class="text-label-md text-on-surface-variant">Kuliner khas Palu yang gurih dan legit.</p>
            </div>
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high transition-all duration-300">
                <span class="material-symbols-outlined text-primary text-5xl mb-2">checkroom</span>
                <h3 class="font-bold text-body-lg mb-1">Kain &amp; Tenun</h3>
                <p class="text-label-md text-on-surface-variant">Kain Tenun Donggala asli dari pengrajin lokal.</p>
            </div>
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high transition-all duration-300">
                <span class="material-symbols-outlined text-primary text-5xl mb-2">redeem</span>
                <h3 class="font-bold text-body-lg mb-1">Kerajinan &amp; Souvenir</h3>
                <p class="text-label-md text-on-surface-variant">Kerajinan kayu Eboni khas Sulawesi Tengah.</p>
            </div>
        </div>
    </section>

    <!-- Kenapa PaluKita -->
    <section class="mb-xl bg-white rounded-xl p-lg md:p-xl shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
        <h2 class="text-headline-md font-black text-primary mb-lg text-center">Kenapa Belanja di PaluKita?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-lg text-center">
            <div>
                <span class="material-symbols-outlined text-secondary text-4xl mb-2">verified</span>
                <h3 class="font-bold text-body-md mb-1">Kurasi UMKM Lokal</h3>
                <p class="text-label-md text-on-surface-variant">Semua produk langsung dari pengrajin & pelaku UMKM di Palu.</p>
            </div>
            <div>
                <span class="material-symbols-outlined text-secondary text-4xl mb-2">local_shipping</span>
                <h3 class="font-bold text-body-md mb-1">Dikirim ke Seluruh Indonesia</h3>
                <p class="text-label-md text-on-surface-variant">Dikemas rapi dan aman sampai ke depan pintu rumahmu.</p>
            </div>
            <div>
                <span class="material-symbols-outlined text-secondary text-4xl mb-2">payments</span>
                <h3 class="font-bold text-body-md mb-1">Pembayaran Mudah</h3>
                <p class="text-label-md text-on-surface-variant">QRIS maupun transfer bank, aman dan nyaman.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="text-center mb-xl">
        <h2 class="text-headline-md font-black text-primary mb-sm">Yuk, Mulai Belanja Oleh-Oleh Khas Palu!</h2>
        <p class="text-body-md text-on-surface-variant mb-lg max-w-xl mx-auto">Daftar sekarang, gratis, dan langsung bisa jelajahi ratusan produk oleh-oleh pilihan.</p>
        <a href="/login" class="inline-flex items-center gap-sm bg-primary text-white font-bold px-xl py-4 rounded-full shadow-xl hover:bg-primary-container hover:scale-105 active:scale-95 transition-all duration-300">
            Daftar Sekarang ✨
        </a>
    </section>
</main>

<!-- Footer -->
<footer class="bg-surface-container-low py-xl">
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

</body>
</html>
