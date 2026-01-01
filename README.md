<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Informasi Inventory Gudang

** FKOM UNIKU - KP Kelompok 23 **  

Sistem Informasi Inventory Gudang berbasis web adalah aplikasi yang digunakan untuk mengelola persediaan barang di gudang secara efisien dan terstruktur.  
Sistem ini mempermudah proses administrasi, pencatatan, serta pelaporan stok barang secara real-time melalui antarmuka web yang responsif.


## Fitur Utama

### Data Master
- Data Barang  
- Jenis Barang  
- Satuan  
- Perusahaan  
  - Customer  
  - Supplier  

### Transaksi
- Barang Masuk  
- Barang Keluar  

### Forecasting
- Generate periode
- hasil generate

### Laporan
- Laporan Stok (Print)  
- Laporan Barang Masuk (Print)  
- Laporan Barang Keluar (Print)  

### Manajemen Pengguna
- Data User  
- Hak Akses (Role)  
- Activity Log  
- Ubah Password  


## Teknologi yang Digunakan

Proyek ini dibangun menggunakan kombinasi teknologi berikut:

| Teknologi | Deskripsi |
|------------|------------|
| **Laravel** | Framework PHP untuk pengembangan web modern |
| **JavaScript** | Bahasa pemrograman utama untuk interaktivitas frontend |
| **jQuery** | Library JS untuk manipulasi DOM dan AJAX |
| **Bootstrap** | Framework CSS untuk tampilan yang responsif dan mobile-first |


## Cara Instalasi

### Clone Repository
```bash

bash
Copy code
cd inventorygudang
Install Dependencies
bash
Copy code
composer install
npm install
Buat Database
Buat database baru dengan nama:

nginx
Copy code
inventorygudang
Konfigurasi File .env
Ubah nama file:

bash
Copy code
.env.example ➜ .env
Kemudian sesuaikan konfigurasi database:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventorygudang
DB_USERNAME=root
DB_PASSWORD=
Lalu generate application key:

bash
Copy code
php artisan key:generate
Migrasi dan Seeder Database
Jalankan migrasi untuk membuat tabel:

bash
Copy code
php artisan migrate
Atau jika ingin mengatur ulang database dan menambahkan data contoh:

bash
Copy code
php artisan migrate:fresh --seed
Jalankan Server Lokal
Jalankan perintah berikut untuk menyalakan server:

bash
Copy code
php artisan serve
Akses aplikasi melalui browser:

cpp
Copy code
http://127.0.0.1:8000
Atau:

arduino
Copy code
http://localhost:8000
kun Login Default (Seeder)
```

Jika kamu menjalankan php artisan migrate:fresh --seed, maka akun default akan otomatis dibuat






