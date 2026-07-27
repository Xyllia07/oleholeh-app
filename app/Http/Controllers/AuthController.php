<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // REDIRECT BERDASARKAN ROLE USER (role tersimpan lowercase: 'admin' / 'pembeli')
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/katalog');
        }

        return back()->withErrors([
            'login_error' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:50|unique:users,username',
            'whatsapp'      => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255|unique:users,email',
            'tanggal_lahir' => 'nullable|date',
            'gender'        => 'nullable|in:Perempuan,Laki-laki',
            'password'      => 'required|string|min:6|confirmed',
            'foto'          => 'nullable|image|max:2048',
        ], [
            'foto.image'   => 'File yang diunggah harus berupa gambar.',
            'foto.max'     => 'Ukuran foto maksimal 2MB.',
            'email.email'  => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah dipakai akun lain.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('avatar', 'public');
        }

        User::create([
            'name'          => $validated['name'],
            'username'      => $validated['username'],
            'whatsapp'      => $validated['whatsapp'] ?? null,
            'email'         => $validated['email'] ?? null,
            'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
            'gender'        => $validated['gender'] ?? null,
            'foto'          => $fotoPath,
            'password'      => Hash::make($validated['password']),
            'role'          => 'pembeli',
        ]);

        return redirect('/login')->with('success_register', 'Akun Pembeli berhasil dibuat! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
