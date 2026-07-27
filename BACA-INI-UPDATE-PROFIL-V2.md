# Update: Field Profil Baru (WhatsApp, Email, Tanggal Lahir, Gender)

## Cara pakai
1. Extract zip ini, lalu timpa (overwrite) ke folder project `oleholeh-app` kamu —
   struktur foldernya sama persis jadi tinggal drag & drop.
2. Jalankan migration untuk menambah kolom baru ke tabel `users`:
   ```
   php artisan migrate
   ```
3. Selesai. Buka `/profil` untuk lihat tampilan barunya.

## File yang diubah/ditambah
- **database/migrations/2026_07_27_000002_add_profil_fields_to_users_table.php** (baru)
  — nambah kolom `whatsapp`, `email` (unique), `tanggal_lahir`, `gender` di tabel `users`.
- **app/Models/User.php** — tambah 4 kolom baru ke `$fillable`, cast `tanggal_lahir` ke `date`.
- **app/Http/Controllers/ProfilController.php** — validasi & simpan field baru
  (whatsapp bebas format, email harus unik & valid, tanggal_lahir format tanggal,
  gender hanya boleh "Perempuan" atau "Laki-laki").
- **resources/views/profil.blade.php** — tampilan form diubah jadi grid 2 kolom
  (Nama Lengkap, Username, WhatsApp dengan prefix +62, Email, Tanggal Lahir,
  dan Gender berupa 2 tombol pill Perempuan/Laki-laki), sesuai desain yang diberikan.
  Fitur upload & crop foto profil yang sudah ada sebelumnya tetap dipertahankan.
