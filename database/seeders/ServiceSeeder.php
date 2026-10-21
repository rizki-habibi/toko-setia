<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['provider_name'=>'Setia Dev Studio','category'=>'Website & Full Stack','title'=>'Website Bisnis Laravel Modern','slug'=>'website-bisnis-laravel-modern','summary'=>'Website bisnis responsif dengan halaman profil, layanan, dan formulir kontak.','description'=>'Pembuatan website bisnis menggunakan Laravel dengan struktur rapi dan desain responsif. Detail akhir disepakati bersama penyedia.','price_from'=>750000,'rating'=>4.9,'orders_count'=>42,'delivery_days'=>7,'is_featured'=>true],
            ['provider_name'=>'Debug Partner','category'=>'Coding & Debugging','title'=>'Bantu Debugging PHP dan Laravel','slug'=>'bantu-debugging-php-laravel','summary'=>'Analisis error, telusuri penyebab, dan bantu perbaiki bug kode.','description'=>'Sesi debugging dengan penjelasan penyebab dan langkah perbaikan.','price_from'=>100000,'rating'=>4.9,'orders_count'=>36,'delivery_days'=>2,'is_featured'=>true],
            ['provider_name'=>'Ruang Desain','category'=>'Desain UI/UX','title'=>'Desain UI/UX Website atau Aplikasi','slug'=>'desain-ui-ux-website-aplikasi','summary'=>'Wireframe dan desain antarmuka modern untuk produk digital.','description'=>'Desain UI/UX yang disesuaikan dengan kebutuhan produk dan pengguna.','price_from'=>350000,'rating'=>5.0,'orders_count'=>28,'delivery_days'=>4,'is_featured'=>true],
            ['provider_name'=>'Teman Dengar','category'=>'Teman Curhat','title'=>'Teman Curhat dan Pendengar Online','slug'=>'teman-curhat-pendengar-online','summary'=>'Ruang ngobrol santai yang suportif dan tidak menghakimi.','description'=>'Teman bicara umum untuk berbagi cerita. Bukan pengganti psikolog, dokter, atau layanan darurat.','price_from'=>50000,'rating'=>4.8,'orders_count'=>19,'delivery_days'=>1,'is_featured'=>true],
            ['provider_name'=>'Kakak Koding','category'=>'Belajar Pemrograman','title'=>'Mentoring Dasar Pemrograman','slug'=>'mentoring-dasar-pemrograman','summary'=>'Belajar konsep pemrograman lewat contoh dan latihan terarah.','description'=>'Sesi belajar disesuaikan dengan level dan tujuan peserta.','price_from'=>80000,'rating'=>4.8,'orders_count'=>21,'delivery_days'=>1,'is_featured'=>false],
            ['provider_name'=>'Dokumen Digital','category'=>'Penulisan & Dokumentasi','title'=>'Dokumentasi Proyek dan README GitHub','slug'=>'dokumentasi-proyek-readme-github','summary'=>'Bantu susun README, panduan instalasi, dan dokumentasi teknis.','description'=>'Dokumentasi proyek yang mudah diikuti dan sesuai struktur aplikasi.','price_from'=>120000,'rating'=>4.9,'orders_count'=>15,'delivery_days'=>3,'is_featured'=>false],
            ['provider_name'=>'AI Workflow Lab','category'=>'Otomasi & AI','title'=>'Konsultasi Integrasi AI ke Website','slug'=>'konsultasi-integrasi-ai-website','summary'=>'Rancang alur chatbot, integrasi API, dan batas keamanan dasar.','description'=>'Konsultasi teknis integrasi AI dengan estimasi dan ruang lingkup yang disepakati.','price_from'=>250000,'rating'=>4.9,'orders_count'=>17,'delivery_days'=>3,'is_featured'=>false],
            ['provider_name'=>'Konsul Teknologi','category'=>'Konsultasi IT','title'=>'Review Arsitektur Aplikasi','slug'=>'review-arsitektur-aplikasi','summary'=>'Tinjau struktur proyek dan susun rekomendasi perbaikan.','description'=>'Review awal struktur kode, risiko, dan prioritas pengembangan.','price_from'=>180000,'rating'=>4.8,'orders_count'=>12,'delivery_days'=>2,'is_featured'=>false],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service + ['is_active' => true]);
        }
    }
}
