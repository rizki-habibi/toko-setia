# Blueprint Produk Toko Setia

## Arsitektur yang disarankan
- Backend: Laravel 13, PHP 8.3+, Laravel Eloquent, Form Request, Policies.
- UI: Blade + Tailwind CSS + Vite; mobile-first, aksesibel, bahasa Indonesia.
- Database: MySQL/MariaDB atau PostgreSQL.
- AI: Laravel AI SDK / provider adapter; konfigurasi melalui environment server.
- Pengujian: PHPUnit/Pest, feature tests untuk autentikasi, katalog, pesanan, dan AI.

## Struktur data inti
1. users: nama, email unik, password hash, peran (admin/pelanggan/penyedia), status.
2. categories: nama, slug unik, deskripsi, ikon, status.
3. services: provider_id, category_id, judul, slug, ringkasan, deskripsi, harga dasar, estimasi hari, status publikasi.
4. service_packages: service_id, nama paket, harga, estimasi hari, revisi, rincian.
5. orders: buyer_id, provider_id, service_id, paket, brief, harga snapshot, status, tenggat.
6. order_messages: order_id, sender_id, pesan, lampiran opsional.
7. reviews: order_id unik, reviewer_id, provider_id, rating 1–5, komentar.
8. favorites: user_id + service_id unik.
9. ai_conversations / ai_messages: pemilik, pesan, metadata penggunaan; jangan menyimpan data sensitif yang tidak diperlukan.
10. payments: order_id, provider transaksi, referensi, jumlah, status; jangan menyimpan nomor kartu mentah.
11. reports: pelapor, objek laporan, alasan, status moderasi.

## Peran dan akses
- Pengunjung: melihat dan mencari katalog.
- Pelanggan: favorit, membuat pesanan, mengirim brief, melihat progres, memberi ulasan setelah pesanan selesai.
- Penyedia: mengelola profil dan layanan sendiri, menerima pesanan, mengirim hasil.
- Admin: moderasi, kategori, pengguna, laporan, ringkasan operasional.

## Kategori seed awal
- Website & Full Stack
- Coding & Debugging
- Desain UI/UX
- Konsultasi IT
- Belajar Pemrograman
- Penulisan & Dokumentasi
- Teman Curhat
- Otomasi & AI

## UI beranda
Header dengan pencarian global, hero utama, kategori, layanan unggulan, layanan terbaru, cara kerja, kepercayaan/keamanan, CTA daftar, dan tombol AI Setia yang dapat dibuka sebagai panel samping.
