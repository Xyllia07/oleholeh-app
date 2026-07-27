<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Pembeli Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; display: flex; justify-content: center; align-items: center; padding: 40px 0; margin:0; }
        .box { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { margin-top:0; text-align: center; color: #0f172a; }
        .group { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-size: 13px; font-weight: 500; color: #475569; }
        input { width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
        button { width: 100%; padding: 10px; background: #2563eb; border: none; border-radius: 6px; color: white; font-weight: 600; cursor: pointer; margin-top: 10px; }
        button:hover { background: #1d4ed8; }
        .login-back { text-align: center; margin-top: 15px; font-size: 13px; }
        .login-back a { color: #2563eb; text-decoration: none; }
        .error { color: #dc2626; font-size: 12px; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Daftar Akun Pembeli</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="group">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required>
                @error('username') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="group">
                <label>Password</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit">Daftar Sekarang</button>
        </form>
        <div class="login-back">Sudah punya akun? <a href="/login">Login di sini</a></div>
    </div>
</body>
</html>
