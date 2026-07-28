<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifikasi Saya - PaluKita</title>
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
    .squishy-interaction:active {
        transform: scale(0.95);
    }
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
        <span class="brand-logo-mark">P</span>
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </div>
    <nav class="flex items-center gap-md">
        <a href="{{ Auth::user()->role === 'admin' ? '/admin/dashboard' : '/katalog' }}" class="flex items-center gap-1 text-on-surface-variant hover:text-primary transition-colors text-label-md font-bold squishy-interaction">
            <span class="material-symbols-outlined">arrow_back</span>
            <span class="hidden sm:inline">Kembali</span>
        </a>
    </nav>
</header>

<main class="max-w-3xl mx-auto px-container-padding pt-[120px] pb-xl">

    <div class="mb-lg flex items-center justify-between">
        <div>
            <h1 class="text-headline-lg font-black text-primary flex items-center gap-2">
                <span class="material-symbols-outlined text-3xl">notifications</span>
                Notifikasi Saya
            </h1>
            <p class="text-on-surface-variant text-body-md">Pantau pemberitahuan pesanan & pengiriman oleh-oleh kamu di sini.</p>
        </div>
    </div>

    <div class="space-y-md">
        @forelse($notifikasis as $notif)
            {{-- Diklik langsung menuju pesanan terkait di halaman Pesanan Saya --}}
            <a href="{{ $notif->transaksi_id ? '/pesanan-saya#pesanan-' . $notif->transaksi_id : '#' }}" class="bg-white rounded-lg p-lg shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high flex items-start gap-4 hover:border-primary/30 transition-colors">
                <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-primary">
                        {{ str_contains($notif->judul, 'Selesai') ? 'local_shipping' : (str_contains($notif->judul, 'Diproses') ? 'inventory_2' : 'receipt_long') }}
                    </span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between gap-2 flex-wrap">
                        <p class="text-body-md font-bold text-on-surface">{{ $notif->judul }}</p>
                        <span class="text-label-sm text-on-surface-variant/70">{{ $notif->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-body-md text-on-surface-variant mt-1">{{ $notif->pesan }}</p>
                </div>
                @if($notif->transaksi_id)
                    <span class="material-symbols-outlined text-on-surface-variant/40 self-center">chevron_right</span>
                @endif
            </a>
        @empty
            <div class="bg-white rounded-lg p-xl text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
                <span class="material-symbols-outlined text-5xl text-primary-container/40">notifications_off</span>
                <p class="text-body-md text-on-surface-variant mt-sm">Belum ada notifikasi pesanan atau pengiriman.</p>
            </div>
        @endforelse
    </div>
</main>
</body>
</html>
