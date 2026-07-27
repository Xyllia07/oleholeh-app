# Fitur: Edit Profil Akun (dengan Crop Foto)

## Cara pakai
1. Extract zip ini, lalu timpa (overwrite) ke folder project `oleholeh-app` kamu — struktur foldernya sama persis jadi tinggal drag & drop.
2. Jalankan migration untuk menambah kolom `foto` ke tabel users:
   ```
   php artisan migrate
   ```
3. Pastikan symlink storage sudah ada (biasanya sudah, karena fitur foto barang juga pakai ini):
   ```
   php artisan storage:link
   ```
4. Selesai. Buka `/profil` (atau klik avatar/nama di navbar) untuk edit profil.

## File yang ditambah/diubah
- **database/migrations/2026_07_27_000001_add_foto_to_users_table.php** (baru) — nambah kolom `foto` di tabel `users`.
- **app/Models/User.php** — tambah `foto` ke `$fillable`.
- **app/Http/Controllers/ProfilController.php** (baru) — logic edit nama, username, ganti password (opsional), dan upload foto profil.
- **routes/web.php** — nambah route `GET /profil` dan `POST /profil` (di dalam grup middleware `auth`).
- **resources/views/profil.blade.php** (baru) — halaman edit profil, termasuk modal crop foto pakai Cropper.js (CDN).
- **resources/views/katalog_pembeli.blade.php**, **resources/views/keranjang.blade.php**, **resources/views/admin/dashboard.blade.php**, **resources/views/admin/pelanggan.blade.php**, **resources/views/admin/laporan.blade.php** — avatar/badge nama di navbar sekarang jadi link ke `/profil`, dan menampilkan foto profil kalau sudah diupload.

## Cara kerja crop foto
- Klik ikon kamera di halaman profil → pilih foto dari device.
- Muncul modal crop (pakai library Cropper.js) untuk atur area foto jadi persegi (1:1).
- Setelah klik "Pakai Foto Ini", hasil crop dikonversi jadi file gambar (JPEG) langsung di browser, lalu otomatis "dipasang" ke input file yang akan dikirim ke server saat submit form — jadi foto yang tersimpan di server sudah dalam bentuk yang sudah di-crop, bukan foto originalnya.
- Foto lama otomatis dihapus dari storage saat diganti foto baru.
