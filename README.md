# Project Overview

## Pengertian

Proyek ini adalah aplikasi web berbasis Laravel, sebuah framework PHP yang kuat dan elegan untuk membangun aplikasi web modern. Laravel menyediakan struktur yang terorganisir dan berbagai fitur untuk memudahkan pengembangan aplikasi web yang skalabel dan mudah dipelihara.

## Tujuan dan Manfaat

Tujuan utama proyek ini adalah menyediakan sistem manajemen dokumen, analisis perubahan, pemantauan, dan perencanaan pengembangan secara terintegrasi dan efisien. Dengan menggunakan aplikasi ini, organisasi dapat:

- Mengelola dokumen-dokumen penting dengan mudah.
- Melakukan analisis perubahan yang terjadi dalam dokumen.
- Memantau perkembangan rencana perubahan secara real-time.
- Mendukung pengambilan keputusan berbasis data dan analisis.
- Meningkatkan kolaborasi dan transparansi dalam proses pengembangan.

## Tools dan Teknologi yang Digunakan

- **Laravel Framework**: Framework PHP untuk pengembangan aplikasi web dengan arsitektur MVC.
- **PHP**: Bahasa pemrograman utama aplikasi ini.
- **MySQL/MariaDB**: Database relasional untuk penyimpanan data.
- **Composer**: Dependency manager untuk PHP.
- **Blade Templating Engine**: Engine templating Laravel untuk membangun antarmuka pengguna.
- **Bootstrap dan Vite**: Digunakan untuk styling dan build assets frontend.
- **Git**: Version control system untuk manajemen kode sumber.

## Metodologi yang Digunakan

Proyek ini dikembangkan menggunakan pendekatan Model-View-Controller (MVC) yang merupakan pola desain perangkat lunak untuk mengorganisir kode aplikasi dengan memisahkan logika bisnis, tampilan, dan pengelolaan data. Laravel sebagai framework MVC mempermudah implementasi metodologi ini.

Selain itu, proyek menggunakan migrasi database untuk pengelolaan skema database yang mudah dan konsisten, serta menggunakan fitur notifikasi dan event broadcasting untuk interaksi real-time antar komponen aplikasi.

## Masalah yang Diselesaikan

- Kesulitan dalam pengelolaan dan tracking dokumen yang terus berkembang.
- Kurangnya transparansi dan pemantauan dalam proses perubahan dan pengembangan.
- Tantangan dalam menganalisis dan melacak perubahan dokumen untuk pengambilan keputusan.
- Perlunya sistem terintegrasi yang menggabungkan manajemen dokumen, analisis, dan pemantauan dengan fitur notifikasi.

## Fitur-fitur Utama

- **Manajemen Dokumen**: Membuat, mengedit, menghapus, dan melihat detail dokumen.
- **Analisis Perubahan**: Menganalisis perubahan yang dilakukan pada dokumen atau data terkait.
- **Pemantauan Perubahan**: Memantau status dan progres dari perubahan yang direncanakan.
- **Perencanaan Pengembangan**: Membantu dalam menyusun dan mengelola rencana pengembangan.
- **Autentikasi dan Otentikasi Pengguna**: Sistem login, registrasi, dan manajemen hak akses pengguna.
- **Notifikasi Real-time**: Mengirimkan notifikasi terkait dokumen dan perubahan kepada pengguna.
- **Role-based Access Control**: Pembatasan akses fitur berdasarkan peran pengguna.
  
## Cara Instalasi dan Menjalankan Project

### Prasyarat

- PHP >= 8.x
- Composer
- Web server (Apache/Nginx)
- Database MySQL/MariaDB
- Node.js dan npm (untuk mengelola assets frontend)

### Langkah-langkah Instalasi

1. Clone repository ini:

```bash
git clone [URL repository]
cd formulir-kesbangpol3
```

2. Install dependensi PHP menggunakan Composer:

```bash
composer install
```

3. Copy file environment dan sesuaikan konfigurasi:

```bash
cp .env.example .env
```

Edit file `.env` dan konfigurasikan database serta pengaturan lain sesuai kebutuhan.

4. Generate application key:

```bash
php artisan key:generate
```

5. Jalankan migrasi untuk membuat tabel-tabel di database:

```bash
php artisan migrate
```

6. Install dependensi frontend:

```bash
npm install
```

7. Build assets frontend:

```bash
npm run dev
```

8. Jalankan server lokal:

```bash
php artisan serve
```

Aplikasi dapat diakses melalui alamat `http://localhost:8000`.

### Catatan

- Pastikan database sudah dibuat dan konfigurasi dalam `.env` sudah benar.
- Jika menggunakan server lain seperti XAMPP, sesuaikan konfigurasi virtual host dan database.
- Untuk mode produksi, gunakan perintah build produksi:

```bash
npm run build
```

---

README ini memberikan panduan lengkap bagi pengguna maupun developer untuk memahami, menginstal, dan menjalankan proyek aplikasi berbasis Laravel ini dengan optimal.
