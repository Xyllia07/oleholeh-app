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
        overflow-x: hidden;
    }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); }
    .squishy-interaction:active { transform: scale(0.95); }

    /* Mascot float */
    .float-animation { animation: float 6s ease-in-out infinite; }
    @keyframes float {
        0% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-14px) rotate(-2deg); }
        100% { transform: translateY(0px) rotate(0deg); }
    }

    /* Animated gradient hero background */
    .hero-gradient {
        background: linear-gradient(120deg, #6200a9, #a43073, #7e22ce, #6200a9);
        background-size: 300% 300%;
        animation: gradient-flow 10s ease infinite;
    }
    @keyframes gradient-flow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Ambient sparkles drifting in the hero */
    .sparkle {
        position: absolute;
        pointer-events: none;
        animation: sparkle-drift 5s ease-in-out infinite, sparkle-twinkle 2.4s ease-in-out infinite;
        opacity: 0;
    }
    @keyframes sparkle-drift {
        0% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(-18px) translateX(6px); }
        100% { transform: translateY(0px) translateX(0px); }
    }
    @keyframes sparkle-twinkle {
        0%, 100% { opacity: 0; transform: scale(.6); }
        50% { opacity: .9; transform: scale(1); }
    }

    /* Scroll reveal */
    .reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity .7s cubic-bezier(.16,.84,.44,1), transform .7s cubic-bezier(.16,.84,.44,1);
    }
    .reveal.reveal-visible { opacity: 1; transform: translateY(0); }
    .reveal-stagger.reveal-visible > * { opacity: 1; transform: translateY(0) scale(1); }
    .reveal-stagger > * {
        opacity: 0;
        transform: translateY(22px) scale(.97);
        transition: opacity .6s cubic-bezier(.16,.84,.44,1), transform .6s cubic-bezier(.16,.84,.44,1);
    }
    .reveal-stagger.reveal-visible > *:nth-child(1) { transition-delay: .05s; }
    .reveal-stagger.reveal-visible > *:nth-child(2) { transition-delay: .15s; }
    .reveal-stagger.reveal-visible > *:nth-child(3) { transition-delay: .25s; }

    /* Category cards: lift + icon bounce */
    .category-card {
        transition: transform .35s cubic-bezier(.34,1.56,.64,1), box-shadow .35s ease;
    }
    .category-card:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 20px 40px rgba(126, 34, 206, 0.15); }
    .category-card:hover .category-icon { animation: icon-pop .5s ease; }
    @keyframes icon-pop {
        0% { transform: scale(1) rotate(0deg); }
        40% { transform: scale(1.25) rotate(-8deg); }
        70% { transform: scale(0.95) rotate(4deg); }
        100% { transform: scale(1) rotate(0deg); }
    }

    /* Gentle looping pulse for "kenapa palukita" icons */
    .pulse-icon { animation: gentle-pulse 3s ease-in-out infinite; }
    .pulse-icon:nth-child(1) { animation-delay: 0s; }
    @keyframes gentle-pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.12); }
    }

    /* Shine sweep on primary CTA buttons */
    .shine-btn { position: relative; overflow: hidden; }
    .shine-btn::after {
        content: '';
        position: absolute;
        top: 0; left: -75%;
        width: 50%; height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255,255,255,.55), transparent);
        transform: skewX(-20deg);
        transition: left .6s ease;
    }
    .shine-btn:hover::after { left: 125%; }

    /* Nav entrance */
    .nav-enter { animation: nav-drop .6s cubic-bezier(.16,.84,.44,1) both; }
    @keyframes nav-drop {
        0% { opacity: 0; transform: translate(-50%, -24px); }
        100% { opacity: 1; transform: translate(-50%, 0); }
    }
    .hero-enter { animation: hero-fade-in .8s cubic-bezier(.16,.84,.44,1) both; }
    .hero-enter-delay { animation: hero-fade-in .8s cubic-bezier(.16,.84,.44,1) .15s both; }
    @keyframes hero-fade-in {
        0% { opacity: 0; transform: translateY(18px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .category-card { --i: 0; }
    @media (prefers-reduced-motion: reduce) {
        .float-animation, .hero-gradient, .sparkle, .pulse-icon, .nav-enter, .hero-enter, .hero-enter-delay {
            animation: none !important;
        }
        .reveal, .reveal-stagger > * { opacity: 1 !important; transform: none !important; transition: none !important; }
    }
</style>
</head>
<body class="text-on-surface">

<!-- TopNavBar -->
<header class="nav-enter fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
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
    <section class="hero-gradient relative mb-xl overflow-hidden rounded-xl p-xl flex flex-col md:flex-row items-center justify-between min-h-[400px] shadow-2xl">
        <div class="absolute inset-0 opacity-10">
            <div class="grid grid-cols-6 gap-4 p-4 h-full w-full">
                <span class="material-symbols-outlined text-white text-6xl">shopping_bag</span>
                <span class="material-symbols-outlined text-white text-4xl">local_mall</span>
                <span class="material-symbols-outlined text-white text-5xl">auto_awesome</span>
                <span class="material-symbols-outlined text-white text-3xl">celebration</span>
            </div>
        </div>
        {{-- Bintang-bintang kecil yang melayang pelan di latar hero --}}
        <span class="sparkle text-white text-2xl" style="top:12%; left:8%; animation-delay:.2s, .2s;">✨</span>
        <span class="sparkle text-white text-xl" style="top:70%; left:18%; animation-delay:1.1s, 1.1s;">⭐</span>
        <span class="sparkle text-white text-3xl" style="top:20%; left:92%; animation-delay:.6s, .6s;">✨</span>
        <span class="sparkle text-white text-lg" style="top:85%; left:88%; animation-delay:1.6s, 1.6s;">💫</span>
        <span class="sparkle text-white text-xl" style="top:50%; left:5%; animation-delay:2s, 2s;">⭐</span>

        <div class="hero-enter relative z-10 md:w-3/5 text-center md:text-left space-y-md">
            <h1 class="text-headline-xl font-headline-xl text-white leading-tight">
                Oleh-Oleh Khas Palu Terlengkap &amp; Paling Imut! ✨
            </h1>
            <p class="text-body-lg text-on-primary-container/90 max-w-lg">
                Jelajahi kuliner gurih, Kain Tenun Donggala, hingga kerajinan kayu Eboni langsung dari pengrajin lokal — dikirim ke seluruh Indonesia.
            </p>
            <div class="pt-4 flex flex-col sm:flex-row items-center gap-3 justify-center md:justify-start">
                <a href="/login" class="shine-btn bg-[#34D399] text-white hover:bg-[#10b981] hover:scale-105 active:scale-95 transition-all duration-300 px-xl py-4 rounded-full font-bold text-lg inline-flex items-center gap-sm shadow-xl">
                    Belanja Sekarang 🚀
                </a>
                <a href="/login" class="bg-white/15 text-white border border-white/40 hover:bg-white/25 hover:scale-105 transition-all duration-300 px-lg py-4 rounded-full font-bold text-lg inline-flex items-center gap-sm">
                    Sudah Punya Akun? Masuk
                </a>
            </div>
        </div>
        <div class="hero-enter-delay relative z-10 md:w-2/5 flex justify-center mt-xl md:mt-0">
            <div class="relative w-full max-w-[320px] float-animation">
                <img class="w-full h-auto drop-shadow-2xl" src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita">
                <div class="absolute -bottom-4 -left-4 bg-white/20 backdrop-blur-md rounded-lg p-3 rotate-12">
                    <span class="material-symbols-outlined text-white text-3xl">redeem</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Unggulan -->
    <section class="reveal mb-xl">
        <h2 class="text-headline-md font-black text-primary mb-lg text-center">Kategori Favorit</h2>
        <div class="reveal-stagger grid grid-cols-1 sm:grid-cols-3 gap-md">
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
                <span class="category-icon material-symbols-outlined text-primary text-5xl mb-2 inline-block">bakery_dining</span>
                <h3 class="font-bold text-body-lg mb-1">Makanan &amp; Camilan</h3>
                <p class="text-label-md text-on-surface-variant">Kuliner khas Palu yang gurih dan legit.</p>
            </div>
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
                <span class="category-icon material-symbols-outlined text-primary text-5xl mb-2 inline-block">checkroom</span>
                <h3 class="font-bold text-body-lg mb-1">Kain &amp; Tenun</h3>
                <p class="text-label-md text-on-surface-variant">Kain Tenun Donggala asli dari pengrajin lokal.</p>
            </div>
            <div class="category-card bg-white rounded-lg p-lg text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
                <span class="category-icon material-symbols-outlined text-primary text-5xl mb-2 inline-block">redeem</span>
                <h3 class="font-bold text-body-lg mb-1">Kerajinan &amp; Souvenir</h3>
                <p class="text-label-md text-on-surface-variant">Kerajinan kayu Eboni khas Sulawesi Tengah.</p>
            </div>
        </div>
    </section>

    <!-- Kenapa PaluKita -->
    <section class="reveal mb-xl bg-white rounded-xl p-lg md:p-xl shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
        <h2 class="text-headline-md font-black text-primary mb-lg text-center">Kenapa Belanja di PaluKita?</h2>
        <div class="reveal-stagger grid grid-cols-1 sm:grid-cols-3 gap-lg text-center">
            <div>
                <span class="pulse-icon material-symbols-outlined text-secondary text-4xl mb-2 inline-block">verified</span>
                <h3 class="font-bold text-body-md mb-1">Kurasi UMKM Lokal</h3>
                <p class="text-label-md text-on-surface-variant">Semua produk langsung dari pengrajin & pelaku UMKM di Palu.</p>
            </div>
            <div>
                <span class="pulse-icon material-symbols-outlined text-secondary text-4xl mb-2 inline-block" style="animation-delay:.3s">local_shipping</span>
                <h3 class="font-bold text-body-md mb-1">Dikirim ke Seluruh Indonesia</h3>
                <p class="text-label-md text-on-surface-variant">Dikemas rapi dan aman sampai ke depan pintu rumahmu.</p>
            </div>
            <div>
                <span class="pulse-icon material-symbols-outlined text-secondary text-4xl mb-2 inline-block" style="animation-delay:.6s">payments</span>
                <h3 class="font-bold text-body-md mb-1">Pembayaran Mudah</h3>
                <p class="text-label-md text-on-surface-variant">QRIS maupun transfer bank, aman dan nyaman.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="reveal text-center mb-xl">
        <h2 class="text-headline-md font-black text-primary mb-sm">Yuk, Mulai Belanja Oleh-Oleh Khas Palu!</h2>
        <p class="text-body-md text-on-surface-variant mb-lg max-w-xl mx-auto">Daftar sekarang, gratis, dan langsung bisa jelajahi ratusan produk oleh-oleh pilihan.</p>
        <a href="/login" class="shine-btn inline-flex items-center gap-sm bg-primary text-white font-bold px-xl py-4 rounded-full shadow-xl hover:bg-primary-container hover:scale-105 active:scale-95 transition-all duration-300">
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

<script>
    // Scroll-reveal: elemen ber-class "reveal" atau "reveal-stagger" muncul fade+slide saat masuk viewport
    const revealTargets = document.querySelectorAll('.reveal, .reveal-stagger');
    if ('IntersectionObserver' in window && revealTargets.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealTargets.forEach(el => observer.observe(el));
    } else {
        revealTargets.forEach(el => el.classList.add('reveal-visible'));
    }
</script>

</body>
</html>
