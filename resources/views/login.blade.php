<!DOCTYPE html>

<html class="light" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - PaluKita</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-primary": "#ddb8ff",
                    "on-surface-variant": "#4c4354",
                    "surface": "#fcf8ff",
                    "background": "#fcf8ff",
                    "outline-variant": "#cfc2d6",
                    "primary": "#6200a9",
                    "surface-variant": "#e5e1ea",
                    "secondary-fixed-dim": "#ffafd3",
                    "inverse-on-surface": "#f4eff9",
                    "surface-container-high": "#ebe6f0",
                    "secondary-container": "#fc79bd",
                    "primary-container": "#7e22ce",
                    "surface-container-highest": "#e5e1ea",
                    "error": "#ba1a1a",
                    "on-error": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-error-container": "#93000a",
                    "tertiary": "#004c33",
                    "tertiary-fixed": "#68fcbf",
                    "surface-container": "#f1ecf6",
                    "on-secondary-container": "#76014e",
                    "on-tertiary-fixed": "#002114",
                    "on-tertiary-fixed-variant": "#005137",
                    "surface-container-low": "#f7f2fc",
                    "on-primary-container": "#e4c5ff",
                    "inverse-surface": "#312f37",
                    "primary-fixed-dim": "#ddb8ff",
                    "on-primary-fixed-variant": "#6800b4",
                    "on-primary-fixed": "#2c0051",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary-fixed": "#3d0026",
                    "tertiary-container": "#006646",
                    "on-background": "#1c1b22",
                    "on-secondary": "#ffffff",
                    "error-container": "#ffdad6",
                    "on-surface": "#1c1b22",
                    "outline": "#7e7385",
                    "secondary": "#a43073",
                    "secondary-fixed": "#ffd8e7",
                    "on-primary": "#ffffff",
                    "primary-fixed": "#f0dbff",
                    "tertiary-fixed-dim": "#45dfa4",
                    "surface-bright": "#fcf8ff",
                    "on-secondary-fixed-variant": "#85145a",
                    "surface-dim": "#ddd8e2",
                    "surface-tint": "#832ad3",
                    "on-tertiary-container": "#52e9ad"
            },
            "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
            },
            "spacing": {
                    "sm": "12px",
                    "xs": "4px",
                    "gutter": "16px",
                    "lg": "32px",
                    "base": "8px",
                    "xl": "48px",
                    "md": "24px",
                    "container-padding": "20px"
            },
            "fontFamily": {
                    "headline-lg": ["Plus Jakarta Sans"],
                    "label-md": ["Plus Jakarta Sans"],
                    "label-sm": ["Plus Jakarta Sans"],
                    "headline-md": ["Plus Jakarta Sans"],
                    "body-lg": ["Plus Jakarta Sans"],
                    "body-md": ["Plus Jakarta Sans"],
                    "headline-xl": ["Plus Jakarta Sans"],
                    "headline-lg-mobile": ["Plus Jakarta Sans"]
            },
            "fontSize": {
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                    "headline-lg-mobile": ["28px", {"lineHeight": "34px", "fontWeight": "700"}]
            }
          },
        },
      }
    </script>
<style>
        body {
            background-color: #FAF5FF;
            overflow-x: hidden;
            position: relative;
        }
        /* Repeating doodle pattern using SVG */
        .doodle-bg {
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: 0.15;
            background-image: url("data:image/svg+xml,%3Csvg width='200' height='200' viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23C084FC' fill-opacity='0.4'%3E%3Cpath d='M20 20h10v10H20z'/%3E%3Ccircle cx='150' cy='50' r='10'/%3E%3Cpath d='M50 150l10-10 10 10-10 10z'/%3E%3Cpath d='M100 20c5 0 10 5 10 10s-5 10-10 10-10-5-10-10 5-10 10-10z'/%3E%3Ctext x='120' y='140' font-family='serif' font-size='30'%3E❤%3E%3C/text%3E%3Cpath d='M30 120c0-10 10-10 10 0s-10 10-10 0z'/%3E%3Ccircle cx='40' cy='60' r='5'/%3E%3Ccircle cx='170' cy='170' r='8'/%3E%3Ctext x='10' y='180' font-size='20'%3E✨%3C/text%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }
        .soft-lavender-shadow {
            box-shadow: 0 20px 50px rgba(126, 34, 206, 0.12);
        }
        .float-animation { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="font-body-md text-on-surface h-screen overflow-hidden">
<div class="doodle-bg"></div>
<!-- Main Content Canvas -->
<main class="h-screen flex flex-col items-center justify-center px-gutter relative z-10">
<!-- Login Card -->
<div class="w-full max-w-[420px] bg-white rounded-[24px] p-md soft-lavender-shadow flex flex-col items-center text-center">
<!-- Mascot Badge -->
<div class="relative mb-md">
<div class="w-24 h-24 bg-[#F3E8FF] rounded-full flex items-center justify-center overflow-hidden border-4 border-white">
<img alt="PaluKita Logo" class="w-full h-full object-contain" src="{{ asset('images/logo-palukita.png') }}"/>
</div>
<div class="absolute top-0 -right-2 bg-[#F472B6] text-white p-1 rounded-full border-2 border-white float-animation">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
</div>
<h1 class="font-headline-md text-headline-md text-[#7E22CE] mb-xs">
                Hai, Selamat Datang di PaluKita! ❤
            </h1><div class="inline-flex items-center px-lg py-xs bg-[#F3E8FF] text-[#7E22CE] rounded-full font-label-md text-label-md mb-md">
    ✨ Toko Oleh-Oleh Favoritmu ✨
</div>
<p class="font-body-md text-body-md text-[#7e7385] mb-md">Yuk, masuk ke akunmu untuk mulai menjelajah!</p>

@if(session('success_register'))
<div class="w-full mb-sm px-gutter py-xs rounded-full bg-[#DCFCE7] text-[#166534] font-label-md text-label-md">
    {{ session('success_register') }}
</div>
@endif

@if($errors->has('login_error'))
<div class="w-full mb-sm px-gutter py-xs rounded-full bg-error-container text-on-error-container font-label-md text-label-md">
    {{ $errors->first('login_error') }}
</div>
@endif

<!-- Login Form -->
<form class="w-full space-y-sm" action="/login" method="POST">
@csrf
<div class="relative">
<span class="material-symbols-outlined absolute left-gutter top-1/2 -translate-y-1/2 text-[#C084FC]">person</span>
<input class="w-full h-[56px] pl-[48px] pr-gutter bg-[#FAF5FF] border-2 border-[#C084FC] focus:border-[#7E22CE] focus:ring-0 rounded-full font-body-md text-on-surface transition-all placeholder-[#7e7385]/60" placeholder="Nama Pengguna" type="text" name="username" value="{{ old('username') }}" required autofocus/>
</div>
@error('username')
<p class="text-[#BA1A1A] font-label-md text-label-md text-left px-gutter">{{ $message }}</p>
@enderror
<div class="relative">
<span class="material-symbols-outlined absolute left-gutter top-1/2 -translate-y-1/2 text-[#C084FC]">lock</span>
<input class="w-full h-[56px] pl-[48px] pr-gutter bg-[#FAF5FF] border-2 border-[#C084FC] focus:border-[#7E22CE] focus:ring-0 rounded-full font-body-md text-on-surface transition-all placeholder-[#7e7385]/60" placeholder="Kata Sandi" type="password" name="password" required/>
</div>
@error('password')
<p class="text-[#BA1A1A] font-label-md text-label-md text-left px-gutter">{{ $message }}</p>
@enderror
<button class="w-full h-[60px] bg-[#8B5CF6] text-white font-headline-md rounded-full shadow-lg shadow-[#8B5CF6]/30 hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-xs" type="submit">
                    Ayo Masuk! <span class="text-xl">✨</span>
</button>
</form>
<div class="mt-lg">
<a class="font-label-md text-label-md text-[#EC4899] hover:underline" href="#">
                    Lupa kata sandi?
                </a>
</div>
</div>
<!-- Secondary CTA -->
<div class="mt-md text-center">
<a class="font-label-md text-label-md text-[#7E22CE] hover:opacity-80 transition-opacity font-bold bg-white/80 backdrop-blur-md px-lg py-sm rounded-full shadow-sm border border-[#C084FC]/20" href="/register">
                Belum Punya Akun? Daftar di PaluKita, Yuk! ❤
            </a>
</div>
</main>
</body></html>
