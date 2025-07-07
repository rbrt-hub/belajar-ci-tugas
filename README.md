# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
- Sistem Autentikasi
  - Login/Register pengguna
  - Manajemen akun
- UI Responsif dengan NiceAdmin template

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

belajar-ci-tugas/
├── app/
│   ├── Config/
│   ├── Controllers/
│   │   ├── Home.php
│   │   ├── ProdukController.php
│   │   ├── produkKategori.php
│   │   ├── DiskonController.php
│   │   ├── TransaksiController.php
│   │   ├── ApiController.php
│   │   └── AuthController.php
│   ├── Models/
│   │   ├── ProductModel.php
│   │   ├── ProductCategoryModel.php
│   │   ├── DiskonModel.php
│   │   ├── TransactionModel.php
│   │   ├── TransactionDetailModel.php
│   │   └── UserModel.php
│   ├── Views/
|   |   ├── lauout_clear.php
│   │   ├── layout.php
│   │   ├── v_login.php
│   │   ├── v_home.php
│   │   ├── v_produk.php
│   │   ├── v_produkPDF.php
│   │   ├── kategori_produk.php
│   │   ├── v_diskon.php
│   │   ├── v_keranjang.php
│   │   ├── v_checkout.php
│   │   ├── v_profile.php
│   │   ├── v_contact.php
│   │   └── v_faq.php
│   │   ├── welcome_message.php
│  
│ 
├── public/
│   ├── index.php
│   ├── Dashboard-toko
│   │   └── index.php
│   └── assets/
│       └── (CSS, JS, Bootstrap, dll)
