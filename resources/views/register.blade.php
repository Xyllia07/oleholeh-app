<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Akun Pembeli Baru</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
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
                    "accent-amber": "#c8720a",
                    "surface": "#fcf8ff",
                    "surface-container-low": "#f7f2fc",
                    "surface-container-high": "#ebe6f0",
                    "on-surface": "#1c1b22",
                    "on-surface-variant": "#4c4354",
                    "error": "#ba1a1a",
                    "on-error": "#ffffff",
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
                    "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "700" }],
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
    .squishy-interaction:active {
        transform: scale(0.95);
    }
    .brand-logo-mark {
        width: 48px;
        height: 48px;
        border-radius: 9999px;
        background: linear-gradient(135deg, #7e22ce, #a43073);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 18px;
        flex-shrink: 0;
    }
    .pill-field {
        background-color: #f3eefc;
        border: 2px solid transparent;
        border-radius: 9999px;
        transition: all .2s ease;
    }
    .pill-field:focus-within {
        border-color: #6200a9;
        background-color: #ffffff;
    }
    .gender-option input { position: absolute; opacity: 0; width: 0; height: 0; }
    .gender-option span {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 12px 22px;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 14px;
        color: #4c4354;
        cursor: pointer;
        transition: all .2s ease;
        border: 2px solid transparent;
        width: 100%;
    }
    .gender-option input:checked + span {
        background: #ffffff;
        border-color: #6200a9;
        color: #6200a9;
        box-shadow: 0 2px 8px rgba(98,0,169,0.15);
    }
    .soft-lavender-shadow {
        box-shadow: 0 20px 50px rgba(126, 34, 206, 0.12);
    }
</style>
</head>
<body class="text-on-surface">

<main class="min-h-screen flex flex-col items-center justify-center px-gutter py-xl">
    <div class="w-full max-w-2xl bg-white rounded-[24px] p-lg soft-lavender-shadow">

        <!-- Header -->
        <div class="flex flex-col items-center text-center mb-lg">
            <div class="flex items-center gap-sm mb-sm">
                <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
                <span class="text-headline-md font-black text-primary">PaluKita ✨</span>
            </div>
            <h1 class="text-headline-lg font-black text-primary">Daftar Akun Pembeli</h1>
            <p class="text-body-md text-on-surface-variant mt-1">Yuk, buat akun untuk mulai belanja oleh-oleh khas Palu! ✨</p>
        </div>

        @if($errors->any())
            <div class="mb-lg bg-red-100 text-error border border-red-200 rounded-lg px-lg py-3 font-semibold">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" enctype="multipart/form-data" class="space-y-lg">
            @csrf

            <!-- FOTO PROFIL (opsional) -->
            <div class="flex flex-col items-center gap-sm">
                <div class="relative w-28 h-28">
                    <img id="previewFoto"
                         src="https://ui-avatars.com/api/?name=Pembeli+Baru&background=6200a9&color=fff&size=256"
                         alt="Foto profil"
                         class="w-28 h-28 rounded-full object-cover border-4 border-primary-container/30 shadow-md">
                    <button type="button" id="btnPilihFoto"
                            class="absolute bottom-0 right-0 w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center shadow-md squishy-interaction hover:bg-primary-container transition-colors">
                        <span class="material-symbols-outlined text-lg">photo_camera</span>
                    </button>
                    <input type="file" id="fotoInput" name="foto" accept="image/*" class="hidden">
                </div>
                <p class="text-label-sm text-on-surface-variant">Foto profil (opsional)</p>
            </div>

            <!-- GRID DATA DIRI -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-lg gap-y-md">

                <!-- NAMA LENGKAP -->
                <div>
                    <label class="block text-label-md text-primary mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>

                <!-- USERNAME -->
                <div>
                    <label class="block text-label-md text-primary mb-2">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" required
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>

                <!-- WHATSAPP -->
                <div>
                    <label class="block text-label-md text-accent-amber mb-2">WhatsApp</label>
                    <div class="pill-field w-full flex items-center px-lg py-3 gap-sm">
                        <span class="text-body-md font-bold text-on-surface-variant">+62</span>
                        <span class="w-px h-5 bg-on-surface-variant/20"></span>
                        <input type="text" name="whatsapp" inputmode="numeric"
                               value="{{ old('whatsapp') }}"
                               placeholder="812-xxxx-xxxx"
                               class="bg-transparent w-full text-body-md outline-none">
                    </div>
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="block text-label-md text-accent-amber mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="nama@example.com"
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>

                <!-- TANGGAL LAHIR -->
                <div>
                    <label class="block text-label-md text-primary mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>

                <!-- GENDER -->
                <div>
                    <label class="block text-label-md text-accent-amber mb-2">Gender</label>
                    <div class="pill-field w-full flex items-center gap-1 p-1">
                        <label class="gender-option flex-1">
                            <input type="radio" name="gender" value="Perempuan" {{ old('gender') === 'Perempuan' ? 'checked' : '' }}>
                            <span>Perempuan 🌸</span>
                        </label>
                        <label class="gender-option flex-1">
                            <input type="radio" name="gender" value="Laki-laki" {{ old('gender') === 'Laki-laki' ? 'checked' : '' }}>
                            <span>Laki-laki 🌿</span>
                        </label>
                    </div>
                </div>

            </div>

            <!-- PASSWORD -->
            <div class="border-t border-surface-container-high pt-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-lg gap-y-md">
                    <div>
                        <label class="block text-label-md text-primary mb-2">Password</label>
                        <input type="password" name="password" required
                               class="pill-field w-full px-lg py-3 text-body-md outline-none">
                    </div>
                    <div>
                        <label class="block text-label-md text-primary mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required
                               class="pill-field w-full px-lg py-3 text-body-md outline-none">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full h-[60px] bg-[#8B5CF6] text-white font-headline-md rounded-full shadow-lg shadow-[#8B5CF6]/30 hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-xs">
                Daftar Sekarang <span class="text-xl">✨</span>
            </button>
        </form>

        <div class="mt-lg text-center">
            <span class="text-body-md text-on-surface-variant">Sudah punya akun? </span>
            <a class="text-body-md font-bold text-secondary hover:underline" href="/login">Login di sini</a>
        </div>
    </div>
</main>

<script>
    const btnPilihFoto = document.getElementById('btnPilihFoto');
    const fotoInput = document.getElementById('fotoInput');
    const previewFoto = document.getElementById('previewFoto');

    btnPilihFoto.addEventListener('click', () => fotoInput.click());

    fotoInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (ev) => {
            previewFoto.src = ev.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
</body>
</html>
