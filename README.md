# 🏀 Najwan Store — Toko Online Sepatu Basket

<p align="center">
  <strong>Aplikasi Toko Online Berbasis Web Menggunakan Laravel</strong>
</p>

<p align="center">
  Project Tugas 3 — Pengembangan Aplikasi Web
</p>

---

## 📌 Deskripsi

**Najwan Store** merupakan aplikasi toko online berbasis web yang berfokus pada penjualan sepatu basket. Aplikasi ini dikembangkan menggunakan framework Laravel dan basis data MySQL untuk mengelola produk, pengguna, serta transaksi pembelian.

Aplikasi memungkinkan pengunjung melihat katalog produk tanpa harus login. Untuk melakukan pembelian, pengguna perlu melakukan registrasi atau login terlebih dahulu. Setelah login, pengguna dapat menambahkan produk ke keranjang, mengatur jumlah pembelian, melakukan checkout, dan melihat riwayat pesanan.

Project ini dibuat sebagai penerapan konsep pengembangan aplikasi web, mulai dari routing, controller, autentikasi, pengelolaan basis data, hingga proses transaksi.

## ✨ Fitur Utama

- **Katalog Produk** — Menampilkan gambar, nama, deskripsi, harga, dan stok sepatu basket.
- **Registrasi Pengguna** — Memungkinkan pengguna membuat akun baru.
- **Login dan Logout** — Mengelola autentikasi dan sesi pengguna.
- **Keranjang Belanja** — Menambahkan produk, mengubah jumlah pembelian, dan menghapus produk.
- **Perhitungan Total Harga** — Menghitung subtotal setiap produk dan total belanja.
- **Validasi Stok** — Membatasi jumlah pembelian agar tidak melebihi stok yang tersedia.
- **Checkout** — Memproses pesanan dengan alamat pengiriman tanpa biaya pengiriman tambahan.
- **Penyimpanan Transaksi** — Menyimpan pesanan dan rincian pembelian ke basis data.
- **Pengurangan Stok Otomatis** — Mengurangi stok berdasarkan jumlah produk yang dibeli setelah checkout berhasil.
- **Riwayat Pesanan** — Menampilkan transaksi dan detail pesanan milik pengguna yang sedang login.

## 🛠️ Teknologi yang Digunakan

- **PHP** — Bahasa pemrograman sisi server.
- **Laravel** — Framework pengembangan aplikasi web.
- **MySQL** — Sistem manajemen basis data.
- **HTML5** — Struktur halaman web.
- **CSS3** — Desain dan tata letak antarmuka.
- **Blade Template** — Sistem templating Laravel.
- **XAMPP** — Lingkungan server lokal.
- **phpMyAdmin** — Pengelolaan basis data.
- **Visual Studio Code** — Editor kode program.
- **Composer** — Pengelolaan dependensi PHP.

## 🗄️ Struktur Basis Data

Aplikasi menggunakan basis data `toko_online` dengan empat tabel utama.

**`users`**  
Menyimpan informasi pengguna, seperti nama lengkap, email, username, password, nomor telepon, dan alamat.

**`products`**  
Menyimpan data produk, meliputi ID barang, nama barang, deskripsi, harga, stok, dan gambar.

**`orders`**  
Menyimpan informasi transaksi, seperti ID pesanan, ID pengguna, tanggal pesanan, total harga, dan alamat pengiriman.

**`order_details`**  
Menyimpan rincian produk yang dibeli dalam setiap pesanan, termasuk ID barang, harga satuan, dan jumlah pembelian.

## 🚀 Cara Menjalankan Project

### 1. Clone Repository

```bash
git https://github.com/NajwanRachman/Tugas-3-toko-online-Projek-3.git
```

Ganti `USERNAME/Toko-Online` dengan alamat repository GitHub yang sebenarnya.

### 2. Masuk ke Folder Project

```bash
cd Toko-Online
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Siapkan File Environment

Salin `.env.example` menjadi `.env`.

Untuk Windows Command Prompt:

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buat database bernama `toko_online` melalui phpMyAdmin, kemudian sesuaikan konfigurasi di file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko_online
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password database dengan konfigurasi lokal yang digunakan.

### 7. Jalankan Migration

```bash
php artisan migrate
```

Jalankan perintah ini hanya jika database belum memiliki tabel yang diperlukan. Jika database sudah berisi tabel dan data, jangan gunakan `migrate:fresh` karena perintah tersebut dapat menghapus data.

### 8. Jalankan Server Laravel

```bash
php artisan serve
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## 📂 Struktur Project

```text
Toko-Online/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       ├── ProductController.php
│   │       ├── CartController.php
│   │       ├── CheckoutController.php
│   │       └── OrderController.php
│   └── Models/
├── database/
│   └── migrations/
├── public/
│   └── images/
├── resources/
│   └── views/
│       ├── auth/
│       ├── cart/
│       ├── checkout/
│       ├── orders/
│       └── home.blade.php
├── routes/
│   └── web.php
├── .env.example
├── artisan
├── composer.json
└── README.md
```

Struktur di atas merupakan gambaran struktur utama aplikasi. Susunan folder dapat berbeda sesuai implementasi project.

## 🖼️ Dokumentasi Aplikasi

Tambahkan screenshot asli aplikasi pada bagian ini agar pengunjung repository dapat melihat hasil implementasinya.

Dokumentasi yang disarankan:

1. Halaman utama dan katalog sepatu basket.
2. Halaman registrasi dan login.
3. Halaman keranjang belanja.
4. Halaman checkout.
5. Notifikasi pesanan berhasil dibuat.
6. Halaman riwayat pesanan.
7. Halaman detail pesanan.
8. Basis data transaksi pada phpMyAdmin.

## 🎯 Tujuan Pembelajaran

Project ini bertujuan menerapkan konsep dasar pengembangan aplikasi web menggunakan Laravel dan MySQL, memahami hubungan antara routing, controller, model, dan view, serta mempelajari pengelolaan autentikasi, keranjang belanja, stok produk, dan transaksi pembelian.

## 👨‍💻 Identitas Pengembang

**Nama:** Najwan Rachman  
**Program Studi:** D3 Teknik Informatika  
**Institusi:** Politeknik Negeri Bandung  
**Mata Kuliah:** Projek 3  
**Project:** Tugas 3 Toko Online



<p align="center">
  <strong>Najwan Store</strong><br>
  Basketball Footwear for Your Everyday Game.
</p>
