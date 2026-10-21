# Toko Setia — Marketplace Jasa Digital

Fondasi aplikasi marketplace jasa digital berbahasa Indonesia, dibangun di atas Laravel 13 dan PHP 8.3+.

## Konsep
Toko Setia bukan marketplace barang fisik. Katalog utamanya berisi jasa: pembuatan website, coding/debugging, desain UI/UX, konsultasi teknologi, pendampingan belajar, penulisan, dan layanan teman curhat non-klinis.

## Fitur yang direncanakan
- Katalog layanan, kategori, pencarian, filter, detail layanan, ulasan dan favorit.
- Akun pelanggan dan penyedia jasa, profil, dashboard, pesanan, status pekerjaan.
- Database MySQL/MariaDB atau PostgreSQL melalui konfigurasi Laravel.
- Asisten AI “AI Setia” untuk membantu mencari kategori, menyusun brief, dan merekomendasikan layanan. Kunci API hanya disimpan di environment server.
- Admin untuk moderasi katalog, kategori, pesanan, dan laporan.
- UI responsif dengan identitas orisinal: navy, coral, putih, dan aksen violet.

## Menjalankan proyek
Repository ini sebelumnya kosong. Untuk membuat kerangka Laravel 13 resmi terlebih dahulu:

```bash
composer create-project laravel/laravel:^13.0 toko-setia-app
cd toko-setia-app
```

Salin file fitur dari repository ini ke kerangka Laravel, gabungkan file yang bertumpang tindih, lalu jalankan:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Sesuaikan koneksi database dan konfigurasi AI pada `.env`. Jangan pernah commit file `.env` atau API key.

## Catatan penting
- AI memerlukan provider/API key yang sah agar jawaban nyata dapat dibuat; tanpa konfigurasi, fitur AI sebaiknya menampilkan status belum dikonfigurasi.
- Checkout pembayaran, escrow, chat real-time, dan verifikasi identitas harus diintegrasikan dan diuji sebelum dipakai untuk transaksi nyata.
- Layanan “curhat” diposisikan sebagai teman bicara umum, bukan layanan psikologis atau medis.
