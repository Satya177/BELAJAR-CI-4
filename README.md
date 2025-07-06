# 🛍️ Toko Online CodeIgniter 4 + Dashboard API

Proyek ini adalah platform toko online berbasis [CodeIgniter 4](https://codeigniter.com/) dengan integrasi **Dashboard Monitoring** yang mengambil data transaksi dari **webservice (API)**. Sistem ini melibatkan:

- Halaman toko (frontend)
- API server (backend)
- Dashboard transaksi (dashboard-toko)

---

## 📋 Daftar Isi

- [✨ Fitur](#-fitur)
- [🧰 Persyaratan Sistem](#-persyaratan-sistem)
- [⚙️ Instalasi](#️-instalasi)
- [🗂️ Struktur Proyek](#-struktur-proyek)

---

## ✨ Fitur

### 🔸 Toko
- Katalog produk (gambar, harga)
- Tambah ke keranjang
- Diskon per transaksi (pakai session)
- Checkout → tersimpan ke `transaction` dan `transaction_detail`

### 🔸 Webservice (API)
- Endpoint: `GET /api`
- Autentikasi API menggunakan header `Key`
- Mengirim data seluruh transaksi lengkap dengan `jumlah_item` (jumlah total produk per transaksi)

### 🔸 Dashboard Transaksi
- Dibuat di folder `public/dashboard-toko/index.php`
- Menampilkan data transaksi melalui `curl` dari API
- Menampilkan: username, alamat, total harga, ongkir, jumlah item, status, tanggal transaksi
- Desain menggunakan Bootstrap 5
- Tanggal dan jam real-time tampil di header

---

## 🧰 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server lokal (disarankan: XAMPP)
- Database: MySQL

---

## ⚙️ Instalasi

### 1. Clone & install
```bash
git clone [URL-repository]
cd toko
composer install


2. Konfigurasi .env

# .env setting
database.default.hostname = localhost
database.default.database = db_ci5
database.default.username = root
database.default.password = 

API_KEY=random123678abcgh


3. Setup Database
Jalankan XAMPP (Apache + MySQL)

Buat database db_ci5

Import struktur database dan data (transaction, transaction_detail, dll)

4. Jalankan Server

php spark serve

Akses:

Halaman toko: http://localhost:8080

Dashboard: http://localhost/dashboard-toko/index.php

🗂️ Struktur Proyek
toko/
├── app/
│   ├── Controllers/
│   │   ├── ApiController.php     # Endpoint API transaksi
│   │   ├── TransaksiController.php
│   ├── Models/
│   │   ├── TransactionModel.php
│   │   ├── TransactionDetailModel.php
│   │   └── UserModel.php
│
├── public/
│   ├── dashboard-toko/
│   │   └── index.php             # Halaman dashboard frontend
│   ├── img/
│   └── NiceAdmin/               # Template UI
│
├── writable/
├── .env
├── README.md
└── composer.json
