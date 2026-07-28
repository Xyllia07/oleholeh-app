<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profil - PaluKita</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" rel="stylesheet">
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
        gap: 6px;
        padding: 12px 22px;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 14px;
        color: #4c4354;
        cursor: pointer;
        transition: all .2s ease;
        border: 2px solid transparent;
    }
    .gender-option input:checked + span {
        background: #ffffff;
        border-color: #6200a9;
        color: #6200a9;
        box-shadow: 0 2px 8px rgba(98,0,169,0.15);
    }
    #cropModal { display: none; }
    #cropModal.active { display: flex; }
    #cropImageWrap { max-height: 60vh; }
    #cropImage { max-width: 100%; display: block; }
</style>
</head>
<body class="text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full glass-nav shadow-lg px-md py-sm flex justify-between items-center transition-all duration-300">
    <div class="flex items-center gap-sm">
        <img src="{{ asset('images/logo-palukita.png') }}" alt="PaluKita" class="w-10 h-10 rounded-full flex-shrink-0">
        <span class="text-headline-md font-headline-md text-primary font-black">PaluKita ✨</span>
    </div>
    <nav class="flex items-center gap-md">
        <a href="{{ Auth::user()->role === 'admin' ? '/admin/dashboard' : '/katalog' }}" class="flex items-center gap-1 text-on-surface-variant hover:text-primary transition-colors text-label-md font-bold squishy-interaction">
            <span class="material-symbols-outlined">arrow_back</span>
            <span class="hidden sm:inline">Kembali</span>
        </a>
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="text-label-sm font-bold text-on-surface-variant hover:text-primary transition-colors px-2">Keluar</button>
        </form>
    </nav>
</header>

<main class="max-w-3xl mx-auto px-container-padding pt-[120px] pb-xl">

    <div class="mb-lg">
        <h1 class="text-headline-lg font-black text-primary">Edit Profil Akun</h1>
        <p class="text-on-surface-variant text-body-md">Perbarui foto dan info akunmu di sini.</p>
    </div>

    @if(session('success_profil'))
        <div class="mb-lg bg-green-100 text-green-800 border border-green-200 rounded-lg px-lg py-3 text-center font-semibold">
            ✅ {{ session('success_profil') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-lg bg-red-100 text-error border border-red-200 rounded-lg px-lg py-3 font-semibold">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="formProfil" action="/profil" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-lg p-lg space-y-lg">
        @csrf

        <!-- FOTO PROFIL -->
        <div class="flex flex-col items-center gap-sm">
            <div class="relative w-32 h-32">
                <img id="previewFoto"
                     src="{{ $user->foto ? Storage::url($user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=6200a9&color=fff&size=256' }}"
                     alt="Foto profil"
                     class="w-32 h-32 rounded-full object-cover border-4 border-primary-container/30 shadow-md">
                <button type="button" id="btnPilihFoto"
                        class="absolute bottom-0 right-0 w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center shadow-md squishy-interaction hover:bg-primary-container transition-colors">
                    <span class="material-symbols-outlined text-lg">photo_camera</span>
                </button>
                <input type="file" id="fotoInputRaw" accept="image/*" class="hidden">
                <!-- Input file asli yang benar-benar dikirim ke server, hasil crop diisi ke sini via JS -->
                <input type="file" name="foto" id="fotoInput" accept="image/*" class="hidden">
            </div>
            <p class="text-label-sm text-on-surface-variant">Klik ikon kamera untuk ganti foto (bisa di-crop dulu)</p>
        </div>

        <!-- GRID DATA DIRI -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-lg gap-y-md">

            <!-- NAMA LENGKAP -->
            <div>
                <label class="block text-label-md text-primary mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="pill-field w-full px-lg py-3 text-body-md outline-none">
            </div>

            <!-- USERNAME -->
            <div>
                <label class="block text-label-md text-primary mb-2">Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" required
                       class="pill-field w-full px-lg py-3 text-body-md outline-none">
            </div>

            <!-- WHATSAPP -->
            <div>
                <label class="block text-label-md text-accent-amber mb-2">WhatsApp</label>
                <div class="pill-field w-full flex items-center px-lg py-3 gap-sm">
                    <span class="text-body-md font-bold text-on-surface-variant">+62</span>
                    <span class="w-px h-5 bg-on-surface-variant/20"></span>
                    <input type="text" name="whatsapp" inputmode="numeric"
                           value="{{ old('whatsapp', $user->whatsapp) }}"
                           placeholder="812-xxxx-xxxx"
                           class="bg-transparent w-full text-body-md outline-none">
                </div>
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-label-md text-accent-amber mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       placeholder="nama@example.com"
                       class="pill-field w-full px-lg py-3 text-body-md outline-none">
            </div>

            <!-- TANGGAL LAHIR -->
            <div>
                <label class="block text-label-md text-primary mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                       value="{{ old('tanggal_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}"
                       class="pill-field w-full px-lg py-3 text-body-md outline-none">
            </div>

            <!-- GENDER -->
            <div>
                <label class="block text-label-md text-accent-amber mb-2">Gender</label>
                <div class="pill-field w-full flex items-center gap-1 p-1">
                    <label class="gender-option flex-1">
                        <input type="radio" name="gender" value="Perempuan"
                               {{ old('gender', $user->gender) === 'Perempuan' ? 'checked' : '' }}>
                        <span class="justify-center w-full">Perempuan 🌸</span>
                    </label>
                    <label class="gender-option flex-1">
                        <input type="radio" name="gender" value="Laki-laki"
                               {{ old('gender', $user->gender) === 'Laki-laki' ? 'checked' : '' }}>
                        <span class="justify-center w-full">Laki-laki 🌿</span>
                    </label>
                </div>
            </div>

        </div>

        <div class="border-t border-surface-container-high pt-lg">
            <p class="text-label-md text-on-surface-variant mb-sm">Ganti Password (opsional, kosongkan jika tidak ingin ganti)</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm">
                <div>
                    <label class="block text-label-md text-on-surface mb-1">Password Baru</label>
                    <input type="password" name="password"
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>
                <div>
                    <label class="block text-label-md text-on-surface mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                           class="pill-field w-full px-lg py-3 text-body-md outline-none">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-teal-400 text-white font-bold rounded-full px-xl py-3 text-label-md shadow-lg hover:brightness-105 transition-all duration-300 squishy-interaction">
                Simpan Perubahan ✨
            </button>
        </div>
    </form>
</main>

<!-- MODAL CROP FOTO -->
<div id="cropModal" class="fixed inset-0 z-[100] bg-black/60 items-center justify-center px-4">
    <div class="bg-white rounded-lg shadow-2xl w-full max-w-lg p-lg">
        <h3 class="text-headline-md font-bold text-primary mb-sm">Sesuaikan Foto</h3>
        <p class="text-label-sm text-on-surface-variant mb-sm">Geser & perbesar untuk memotong foto jadi persegi.</p>
        <div id="cropImageWrap" class="bg-surface-container-low rounded-lg overflow-hidden">
            <img id="cropImage" src="" alt="Crop preview">
        </div>
        <div class="flex justify-end gap-sm mt-lg">
            <button type="button" id="btnBatalCrop" class="px-lg py-2 rounded-full font-bold text-label-md text-on-surface-variant hover:bg-surface-container-high transition-colors">
                Batal
            </button>
            <button type="button" id="btnSimpanCrop" class="px-lg py-2 rounded-full font-bold text-label-md bg-primary text-white hover:bg-primary-container transition-colors squishy-interaction">
                Pakai Foto Ini
            </button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
<script>
    const btnPilihFoto = document.getElementById('btnPilihFoto');
    const fotoInputRaw = document.getElementById('fotoInputRaw');
    const fotoInput = document.getElementById('fotoInput');
    const previewFoto = document.getElementById('previewFoto');

    const cropModal = document.getElementById('cropModal');
    const cropImage = document.getElementById('cropImage');
    const btnBatalCrop = document.getElementById('btnBatalCrop');
    const btnSimpanCrop = document.getElementById('btnSimpanCrop');

    let cropper = null;

    btnPilihFoto.addEventListener('click', () => fotoInputRaw.click());

    fotoInputRaw.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (ev) => {
            cropImage.src = ev.target.result;
            cropModal.classList.add('active');

            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(cropImage, {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                cropBoxMovable: true,
                cropBoxResizable: true,
                background: false,
            });
        };
        reader.readAsDataURL(file);
    });

    function tutupModalCrop() {
        cropModal.classList.remove('active');
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        fotoInputRaw.value = '';
    }

    btnBatalCrop.addEventListener('click', tutupModalCrop);

    btnSimpanCrop.addEventListener('click', () => {
        if (!cropper) return;

        const canvas = cropper.getCroppedCanvas({
            width: 512,
            height: 512,
            imageSmoothingQuality: 'high',
        });

        canvas.toBlob((blob) => {
            const file = new File([blob], 'foto-profil.jpg', { type: 'image/jpeg' });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fotoInput.files = dataTransfer.files;

            previewFoto.src = canvas.toDataURL('image/jpeg', 0.9);

            tutupModalCrop();
        }, 'image/jpeg', 0.9);
    });
</script>
</body>
</html>
