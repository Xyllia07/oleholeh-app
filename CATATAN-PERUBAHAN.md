# Catatan Perubahan

## 1. Fitur yang diaktifkan (sebelumnya "Segera" / disabled di sidebar admin)
- **Pelanggan** (`/admin/pelanggan`) — daftar semua akun pembeli, jumlah pesanan
  selesai, total belanja, dan tanggal pesanan terakhir.
- **Laporan Penjualan** (`/admin/laporan`) — rekap omset, jumlah transaksi, item
  terjual, dan produk terlaris per bulan (bisa difilter bulan/tahun), plus
  rincian tiap transaksi selesai.

File baru: `app/Http/Controllers/AdminTransaksiController.php` (method
`pelanggan()` & `laporan()`), `routes/web.php`, `resources/views/admin/pelanggan.blade.php`,
`resources/views/admin/laporan.blade.php`. Sidebar di `admin/dashboard.blade.php`
diubah dari badge "Segera" (non-klik) jadi link aktif.

## 2. Bug yang ditemukan & sudah diperbaiki
- **Migration tabel `barangs`, `transaksis`, `keranjangs` tidak pernah ada.**
  Kalau project ini di-setup dari nol pakai `php artisan migrate`, akan gagal
  total karena tabel-tabel inti belum pernah dibuatkan file migration-nya
  (DB kamu selama ini jalan karena tabelnya dibuat manual/lewat SQL dump, bukan
  lewat migration Laravel). Sudah dibuatkan 3 migration baru yang urutannya
  disesuaikan supaya foreign key ke `transaksi_details` tetap valid.
- **Migration `users` masih skema default Laravel** (pakai kolom `email`),
  padahal kode aplikasi (login, register, seeder) pakai kolom `username` +
  `role`. Sudah diperbaiki supaya `php artisan migrate` menghasilkan skema yang
  sama persis dengan yang dipakai aplikasi & dump SQL kamu.
- **Symlink `public/storage` belum ada**, jadi foto barang yang diupload lewat
  form "Tambah Produk" tidak akan pernah muncul (401/404 gambar). Sudah dibuat
  symlink-nya (setara hasil `php artisan storage:link`).
- **Foto produk tidak tampil di katalog pembeli** — halaman admin sudah
  menampilkan foto, tapi halaman katalog pembeli (`katalog_pembeli.blade.php`)
  belum. Sudah ditambahkan.

## 3. Ditemukan tapi BELUM diperbaiki (perlu keputusan kamu dulu)
- **Link "Lupa kata sandi?" di halaman login** (`resources/views/login.blade.php`)
  masih `href="#"` alias belum berfungsi. Untuk benar-benar jalan, aplikasi ini
  perlu ditambah kolom **email** di tabel `users` (saat ini user cuma punya
  `username`, tidak ada alamat pengiriman email), plus konfigurasi SMTP asli
  (di `.env` sekarang `MAIL_MAILER=log`, jadi email reset cuma kecatat di log,
  tidak benar-benar terkirim). Beri tahu saya kalau mau saya lanjutkan —
  aku perlu tahu mau nambah kolom email atau pakai cara lain (misal reset via
  admin).
- Belum ada fitur edit/hapus produk dan edit role/hapus pelanggan dari sisi
  admin — kalau dibutuhkan, tinggal bilang saja.

## Cara pakai di server
1. Copot / timpa file-file di atas ke folder project Laravel kamu (struktur
   foldernya sama persis).
2. Jalankan `php artisan migrate` (kalau database masih kosong / fresh install).
   Kalau database kamu **sudah** berisi data produksi seperti yang ada di
   `oleholeh.sql`, migration baru ini tidak perlu dijalankan lagi — cukup
   pastikan `php artisan migrate:status` menandai migration lama sebagai
   sudah jalan (`insert` manual ke tabel `migrations` kalau perlu), supaya
   Laravel tidak mencoba membuat ulang tabel yang sudah ada.
3. Jalankan `php artisan storage:link` kalau symlink `public/storage` di zip
   ini tidak ikut ter-upload dengan benar oleh hosting kamu.
