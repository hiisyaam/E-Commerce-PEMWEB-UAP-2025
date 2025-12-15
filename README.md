# **Ujian Praktikum Pemrograman Web Aplikasi E-Commerce (Laravel)** 

Kelompok 6:
1. Naila Rahma Ningrum - 245150600111017
2. Nuraliza Shafira - 245150607111015

# 🌸 Lovellea Beauty

Platform e-commerce kecantikan dengan harga ramah dompet dan kualitas terpercaya.

Lovellea Beauty hadir sebagai ruang digital bagi para pecinta skincare dan beauty products. Ibarat rak-rak kosmetik yang ditata dengan ketelitian, Lovellea mengumpulkan berbagai brand skincare ternama, produk original, dan penawaran yang nyaman dilihat maupun dibeli.

Platform ini dibangun agar proses belanja dan berjualan terasa jernih, terstruktur, dan dapat dipercaya; baik untuk member, seller, maupun admin yang menjaga keseimbangan ekosistem.

---

## ✨ Fitur Utama

Lovellea Beauty menyediakan fitur inti untuk menunjang pengalaman marketplace kecantikan:

* Katalog produk lengkap (skincare, kosmetik, dan perawatan tubuh)
* Sistem toko dan manajemen produk untuk seller
* Role Based Access Control (RBAC)
* Sistem pembayaran berbasis Wallet dan Virtual Account
* Halaman pembayaran terpusat
* Manajemen pesanan dan transaksi
* Rating dan review produk
* Dashboard berbeda sesuai peran pengguna
* Autentikasi akun dan keamanan transaksi
* Antarmuka modern, lembut, dan mudah dipahami

---

## 👥 Role Pengguna & Hak Akses (RBAC)

Lovellea menerapkan Role Based Access Control untuk membatasi akses halaman sesuai peran pengguna. Setiap role memiliki fungsi dan tanggung jawab yang berbeda.

### 1. **Member / Customer**

Pengguna yang terdaftar sebagai pembeli.

Hak dan akses:

* Mengakses halaman pelanggan
* Menjelajahi produk dan kategori
* Melihat detail produk
* Melakukan checkout
* Memilih metode pembayaran (Wallet / Transfer VA)
* Melihat riwayat transaksi
* Memberikan review produk
* Melakukan topup saldo wallet

Member adalah pusat aktivitas belanja di Lovellea.

---

### 2. **Seller / Penjual**

Pengguna yang membuka toko di Lovellea.
Akses seller hanya diberikan kepada pengguna dengan **role member** yang telah memiliki entri pada tabel **stores** dan diverifikasi.

Hak dan akses:

* Mendaftarkan dan mengelola toko
* Mengelola profil toko dan rekening bank
* CRUD kategori produk
* CRUD produk dan gambar produk
* Mengatur stok dan harga
* Melihat pesanan masuk
* Mengubah status pesanan dan mengisi nomor resi
* Melihat saldo toko dan riwayat saldo
* Mengajukan penarikan dana

Seller berperan sebagai pemilik etalase digital yang menjaga kualitas produk.

---

### 3. **Admin**

Pengelola utama sistem Lovellea.

Hak dan akses:

* Mengakses seluruh halaman admin
* Verifikasi atau penolakan pendaftaran toko
* Mengelola data seluruh user dan store
* Mengawasi transaksi dan aktivitas platform
* Menjaga keamanan dan keteraturan sistem

Admin bertugas sebagai penjaga alur dan stabilitas platform.

---

## 💰 Sistem Pembayaran & Keuangan

Lovellea mengimplementasikan sistem keuangan berbasis **User Wallet** dan **Virtual Account (VA)** melalui tabel `user_balances`.

### Opsi A: Pembayaran dengan Wallet (Saldo)

Member dapat melakukan topup saldo terlebih dahulu melalui VA.
Saat checkout, saldo akan otomatis dipotong sesuai total pembayaran.

### Opsi B: Pembayaran Langsung via Virtual Account

Saat checkout, sistem akan menghasilkan kode VA unik yang terhubung langsung dengan `transaction_id`.
Pembayaran melalui VA ini akan mengubah status transaksi menjadi **paid** dan menambahkan saldo ke toko seller.

---

## 🧾 Halaman Pembayaran Terpusat (Payment Page)

Lovellea menyediakan satu halaman khusus untuk memproses seluruh pembayaran VA.

Alur singkat:

1. Pengguna mengakses halaman Payment
2. Memasukkan kode Virtual Account
3. Sistem menampilkan detail pembayaran
4. Pengguna memasukkan nominal transfer (simulasi)
5. Konfirmasi pembayaran

Jika berhasil:

* Topup → saldo user bertambah
* Pembelian → status transaksi menjadi **paid** dan saldo toko bertambah

---

## 🏗️ Teknologi yang Digunakan

* Laravel 12.x
* MySQL
* Blade Template
* Tailwind CSS
* Alpine.js
* Vite
* Laravel Authentication

---

## 🚀 Tujuan Proyek

Lovellea Beauty dikembangkan untuk:

* Menjadi marketplace kecantikan yang terpercaya
* Menyediakan produk original dengan harga terjangkau
* Memberikan pengalaman belanja yang nyaman dan aman
* Membuka peluang bagi seller lokal untuk berkembang
* Menghadirkan sistem transaksi yang terstruktur dan transparan
