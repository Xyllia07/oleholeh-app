<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran - PaluKita</title>
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
    .rekening-row:active {
        transform: scale(0.98);
    }
</style>
</head>
<body class="text-on-surface">

<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
    <div class="flex items-center gap-sm">
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </div>
    <nav class="flex items-center gap-md">
        <a href="/katalog" class="flex items-center gap-1 text-on-surface-variant hover:text-primary transition-colors text-label-md font-bold squishy-interaction">
            <span class="material-symbols-outlined">arrow_back</span>
            <span class="hidden sm:inline">Kembali</span>
        </a>
    </nav>
</header>

<main class="max-w-lg mx-auto px-container-padding pt-[120px] pb-xl">

    <div class="mb-lg text-center">
        <h1 class="text-headline-lg font-black text-primary flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-3xl">qr_code_2</span>
            Selesaikan Pembayaran
        </h1>
        <p class="text-on-surface-variant text-body-md">Pesanan #INV-{{ str_pad($transaksi->id, 5, '0', STR_PAD_LEFT) }}</p>
    </div>

    {{-- Hitung mundur batas waktu pembayaran --}}
    <div class="bg-white rounded-lg p-md mb-lg border border-primary/20 text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)]">
        <p class="text-label-sm text-on-surface-variant/70 mb-1">Selesaikan pembayaran dalam</p>
        <p id="countdown" class="text-headline-lg font-black text-primary tabular-nums">--:--:--</p>
    </div>

    <div class="bg-white rounded-lg p-lg mb-lg shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high text-center">
        <p class="text-label-sm text-on-surface-variant/70 mb-1">Total Pembayaran</p>
        <p class="text-headline-lg font-black text-primary">Rp{{ number_format($transaksi->total_harga) }}</p>
    </div>

    {{-- QRIS --}}
    <div class="bg-white rounded-lg p-lg mb-lg shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
        <p class="text-label-md font-bold text-on-surface mb-md flex items-center gap-1">
            <span class="material-symbols-outlined text-lg">qr_code_2</span>
            Bayar dengan QRIS
        </p>
        <div class="flex justify-center">
            <img src="{{ $qrisImage }}" alt="QRIS PaluKita" class="w-56 h-56 object-contain rounded-lg border border-surface-container-high bg-white p-2"
                 onerror="this.onerror=null;this.src='';this.alt='';this.closest('div').innerHTML += '<p class=\'text-label-sm text-on-surface-variant/60 text-center\'>Gambar QRIS belum tersedia.</p>'">
        </div>
        <p class="text-label-sm text-on-surface-variant/70 text-center mt-sm">Scan pakai aplikasi e-wallet atau m-banking apa saja.</p>
    </div>

    {{-- Transfer rekening --}}
    <div class="bg-white rounded-lg p-lg mb-lg shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
        <p class="text-label-md font-bold text-on-surface mb-md flex items-center gap-1">
            <span class="material-symbols-outlined text-lg">account_balance</span>
            Atau Transfer ke Rekening
        </p>
        <div class="space-y-2">
            @foreach ($rekening as $rek)
                <div class="rekening-row flex items-center justify-between gap-3 bg-surface-container-low rounded-lg px-3 py-2 transition-transform">
                    <div>
                        <p class="text-label-md font-bold text-on-surface">{{ $rek['bank'] }} — {{ $rek['nomor'] }}</p>
                        <p class="text-label-sm text-on-surface-variant/70">a.n. {{ $rek['atas_nama'] }}</p>
                    </div>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ $rek['nomor'] }}'); this.innerText='Tersalin!'; setTimeout(() => this.innerText='Salin', 1500);"
                            class="text-label-sm font-bold text-primary squishy-interaction shrink-0">Salin</button>
                </div>
            @endforeach
        </div>
    </div>

    <form action="/pembayaran/{{ $transaksi->id }}/konfirmasi" method="POST">
        @csrf
        <button type="submit" class="w-full bg-primary text-white font-bold text-label-md py-sm rounded-full squishy-interaction shadow-lg hover:bg-primary-container transition-colors">
            Saya Sudah Bayar
        </button>
    </form>
    <p class="text-label-sm text-on-surface-variant/60 text-center mt-sm">Setelah kamu konfirmasi, pesanan langsung masuk ke antrean toko untuk diproses.</p>

</main>

<script>
    const batasWaktu = new Date("{{ $transaksi->batas_waktu_pembayaran->toIso8601String() }}").getTime();
    const countdownEl = document.getElementById('countdown');

    function updateCountdown() {
        const sisa = batasWaktu - Date.now();

        if (sisa <= 0) {
            countdownEl.textContent = '00:00:00';
            countdownEl.classList.add('text-red-600');
            clearInterval(timer);
            // Batas waktu lewat: reload supaya server menandai pesanan dibatalkan & tampilkan pesannya
            window.location.reload();
            return;
        }

        const jam = Math.floor(sisa / 3600000);
        const menit = Math.floor((sisa % 3600000) / 60000);
        const detik = Math.floor((sisa % 60000) / 1000);

        countdownEl.textContent =
            String(jam).padStart(2, '0') + ':' +
            String(menit).padStart(2, '0') + ':' +
            String(detik).padStart(2, '0');

        if (sisa < 5 * 60 * 1000) {
            countdownEl.classList.add('text-red-600');
        }
    }

    updateCountdown();
    const timer = setInterval(updateCountdown, 1000);
</script>

</body>
</html>
