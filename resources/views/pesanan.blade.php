<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pesanan Saya - PaluKita</title>
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
    /* Anchor tiap kartu pesanan diberi jarak dari navbar melayang supaya
       gak ketutup pas dituju langsung dari notifikasi (#pesanan-ID) */
    .order-card {
        scroll-margin-top: 140px;
        transition: box-shadow 0.4s ease, border-color 0.4s ease;
    }
    /* Kartu pesanan yang jadi tujuan klik notifikasi otomatis disorot */
    .order-card:target {
        border-color: #7e22ce;
        box-shadow: 0 0 0 3px rgba(126, 34, 206, 0.35), 0 10px 30px rgba(126, 34, 206, 0.12);
    }
    .filter-tab.active {
        background: #6200a9;
        color: #fff;
    }
    .stepper-line {
        background: #ebe6f0;
    }
    .stepper-line.done {
        background: #6200a9;
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

    @if(session('success_beli'))
        <div class="mb-lg bg-green-100 text-green-800 border border-green-200 rounded-lg px-lg py-3 text-center font-semibold">🛒 {{ session('success_beli') }}</div>
    @endif
    @if(session('error_keranjang'))
        <div class="mb-lg bg-red-100 text-red-800 border border-red-200 rounded-lg px-lg py-3 text-center font-semibold">⚠️ {{ session('error_keranjang') }}</div>
    @endif

    <div class="mb-lg">
        <h1 class="text-headline-lg font-black text-primary flex items-center gap-2">
            <span class="material-symbols-outlined text-3xl">local_shipping</span>
            Pesanan Saya
        </h1>
        <p class="text-on-surface-variant text-body-md">Pantau status pesanan oleh-oleh kamu, mulai dari disiapkan sampai dikirim.</p>
    </div>

    {{-- Tab filter status, murni tampilan (JS di bawah yang menyaring kartu) --}}
    <div class="flex items-center gap-2 mb-lg overflow-x-auto pb-1">
        <button type="button" data-filter="semua" class="filter-tab active whitespace-nowrap px-4 py-2 rounded-full text-label-md font-bold border border-primary/20 transition-colors squishy-interaction">Semua</button>
        <button type="button" data-filter="menunggu_pembayaran" class="filter-tab whitespace-nowrap px-4 py-2 rounded-full text-label-md font-bold border border-primary/20 text-on-surface-variant transition-colors squishy-interaction">Menunggu Pembayaran</button>
        <button type="button" data-filter="pending" class="filter-tab whitespace-nowrap px-4 py-2 rounded-full text-label-md font-bold border border-primary/20 text-on-surface-variant transition-colors squishy-interaction">Menunggu Konfirmasi</button>
        <button type="button" data-filter="diproses" class="filter-tab whitespace-nowrap px-4 py-2 rounded-full text-label-md font-bold border border-primary/20 text-on-surface-variant transition-colors squishy-interaction">Disiapkan</button>
        <button type="button" data-filter="selesai" class="filter-tab whitespace-nowrap px-4 py-2 rounded-full text-label-md font-bold border border-primary/20 text-on-surface-variant transition-colors squishy-interaction">Selesai &amp; Dikirim</button>
    </div>

    <div class="space-y-lg" id="daftar-pesanan">
        @forelse($transaksis as $t)
            @php
                $urutanStatus = ['pending' => 1, 'diproses' => 2, 'selesai' => 3];
                $stepAktif = $urutanStatus[$t->status] ?? 0;

                $labelStatus = [
                    'menunggu_pembayaran' => 'Menunggu Pembayaran',
                    'pending'             => 'Menunggu Konfirmasi',
                    'diproses'            => 'Sedang Disiapkan',
                    'selesai'             => 'Selesai & Dikirim',
                    'dibatalkan'          => 'Dibatalkan',
                ][$t->status] ?? ucfirst($t->status);

                $warnaBadge = [
                    'menunggu_pembayaran' => 'bg-orange-100 text-orange-700',
                    'pending'             => 'bg-amber-100 text-amber-700',
                    'diproses'            => 'bg-blue-100 text-blue-700',
                    'selesai'             => 'bg-green-100 text-green-700',
                    'dibatalkan'          => 'bg-red-100 text-red-700',
                ][$t->status] ?? 'bg-surface-container-high text-on-surface-variant';
            @endphp
            <div id="pesanan-{{ $t->id }}" data-status="{{ $t->status }}" class="order-card bg-white rounded-lg p-lg shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">

                {{-- Header kartu: nomor invoice, tanggal, badge status --}}
                <div class="flex items-start justify-between gap-3 flex-wrap mb-md">
                    <div>
                        <p class="text-body-md font-bold text-on-surface">Pesanan #INV-{{ str_pad($t->id, 5, '0', STR_PAD_LEFT) }}</p>
                        <p class="text-label-sm text-on-surface-variant/70">{{ $t->created_at->translatedFormat('d M Y, H:i') }}</p>
                    </div>
                    <span class="text-label-sm font-bold px-3 py-1 rounded-full {{ $warnaBadge }}">{{ $labelStatus }}</span>
                </div>

                @if($t->status === 'menunggu_pembayaran')
                    <a href="/pembayaran/{{ $t->id }}" class="inline-flex items-center gap-1 text-label-sm font-bold text-white bg-primary px-4 py-2 rounded-full mb-md squishy-interaction">
                        <span class="material-symbols-outlined text-base">qr_code_2</span>
                        Lanjutkan Pembayaran
                    </a>
                @endif

                {{-- Stepper progres status pesanan --}}
                <div class="flex items-center mb-md">
                    @foreach ([1 => ['icon' => 'receipt_long', 'label' => 'Dikonfirmasi'], 2 => ['icon' => 'inventory_2', 'label' => 'Disiapkan'], 3 => ['icon' => 'local_shipping', 'label' => 'Dikirim']] as $step => $info)
                        <div class="flex items-center {{ $step < 3 ? 'flex-1' : '' }}">
                            <div class="flex flex-col items-center gap-1 shrink-0">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center {{ $step <= $stepAktif ? 'bg-primary text-white' : 'bg-surface-container-high text-on-surface-variant/60' }}">
                                    <span class="material-symbols-outlined text-lg">{{ $info['icon'] }}</span>
                                </div>
                                <span class="text-[10px] font-bold text-center {{ $step <= $stepAktif ? 'text-primary' : 'text-on-surface-variant/60' }}">{{ $info['label'] }}</span>
                            </div>
                            @if($step < 3)
                                <div class="stepper-line h-1 flex-1 mx-1 rounded-full {{ $step < $stepAktif ? 'done' : '' }}"></div>
                            @endif
                        </div>
                    @endforeach
                </div>

                {{-- Ringkasan item --}}
                <div class="space-y-2 border-t border-surface-container-high pt-md">
                    @foreach ($t->details as $d)
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-surface-container-low overflow-hidden shrink-0">
                                @if($d->barang && $d->barang->foto)
                                    <img class="w-full h-full object-cover" src="{{ Storage::url($d->barang->foto) }}" alt="{{ $d->barang->nama_barang }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-on-surface-variant/40">
                                        <span class="material-symbols-outlined text-lg">redeem</span>
                                    </div>
                                @endif
                            </div>
                            <p class="text-label-md text-on-surface flex-1 min-w-0 truncate">{{ $d->barang->nama_barang ?? 'Produk telah dihapus' }}</p>
                            <p class="text-label-sm text-on-surface-variant shrink-0">{{ $d->jumlah }}x</p>
                        </div>
                    @endforeach
                </div>

                {{-- Total & alamat --}}
                <div class="flex items-center justify-between gap-3 flex-wrap border-t border-surface-container-high mt-md pt-md">
                    <p class="text-label-sm text-on-surface-variant flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">location_on</span>
                        <span class="truncate max-w-[220px]">{{ $t->alamat_pengiriman }}</span>
                    </p>
                    <p class="text-body-md font-black text-primary">Rp{{ number_format($t->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg p-xl text-center shadow-[0_10px_30px_rgba(126,34,206,0.05)] border border-surface-container-high">
                <span class="material-symbols-outlined text-5xl text-primary-container/40">local_shipping</span>
                <p class="text-body-md text-on-surface-variant mt-sm">Belum ada pesanan. Yuk mulai belanja oleh-oleh khas Palu!</p>
                <a href="/katalog" class="inline-block mt-md bg-primary text-white font-bold text-label-md px-lg py-2.5 rounded-full squishy-interaction">Belanja Sekarang</a>
            </div>
        @endforelse
    </div>
</main>

<script>
    // Filter tab murni di sisi klien: sembunyikan/tampilkan kartu pesanan sesuai status yang dipilih
    document.querySelectorAll('.filter-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.filter-tab').forEach(function (t) {
                t.classList.remove('active', 'text-white');
                t.classList.add('text-on-surface-variant');
            });
            tab.classList.add('active');
            tab.classList.remove('text-on-surface-variant');

            var filter = tab.getAttribute('data-filter');
            document.querySelectorAll('#daftar-pesanan > .order-card').forEach(function (card) {
                card.style.display = (filter === 'semua' || card.getAttribute('data-status') === filter) ? '' : 'none';
            });
        });
    });
</script>
</body>
</html>
