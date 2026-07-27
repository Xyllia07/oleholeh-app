<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:50|unique:users,username,' . $user->id,
            'whatsapp'      => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'tanggal_lahir' => 'nullable|date',
            'gender'        => 'nullable|in:Perempuan,Laki-laki',
            'password'      => 'nullable|string|min:6|confirmed',
            // Foto sudah di-crop jadi persegi di sisi browser sebelum dikirim ke server
            'foto'          => 'nullable|image|max:2048',
        ], [
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max'   => 'Ukuran foto maksimal 2MB.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah dipakai akun lain.',
        ]);

        $user->name          = $validated['name'];
        $user->username      = $validated['username'];
        $user->whatsapp      = $validated['whatsapp'] ?? null;
        $user->email         = $validated['email'] ?? null;
        $user->tanggal_lahir = $validated['tanggal_lahir'] ?? null;
        $user->gender        = $validated['gender'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama biar storage tidak numpuk
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('avatar', 'public');
        }

        $user->save();

        return back()->with('success_profil', 'Profil berhasil diperbarui!');
    }
}
