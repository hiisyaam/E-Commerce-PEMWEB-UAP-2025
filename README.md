# **Ujian Praktikum Pemrograman Web Aplikasi E-Commerce (Laravel)** 

## **Konteks Proyek**

Kalian diberikan sebuah repositori proyek Laravel 12 yang sudah dilengkapi dengan:

1. Starter Kit **Laravel Breeze** untuk basic autentikasi.  
2. Semua file **Migrations** yang diperlukan untuk membuat struktur database e-commerce (tabel users, products, transactions, stores, etc.).

**Tugas utama Kalian** adalah membangun web aplikasi full-stack E-Commerce yang fungsional (CRUD) berdasarkan skema database yang disediakan, dengan implementasi khusus pada Role Based Access Control (RBAC) dan Flow Pembayaran.

## **Struktur Database**

![alt text](arsitektur-database.png)

## **Persyaratan Teknis & Setup Awal**

1. **Framework:** Laravel 12\.  
2. Jalankan **`composer install`** untuk menginstal seluruh dependensi PHP yang dibutuhkan.  
3. Salin file **`.env.example`** menjadi **`.env`**, lalu edit pengaturan database sesuai server database Kalian  
4. Jalankan **`php artisan key:generate`** untuk menghasilkan application key baru  
5. **Database:** Terapkan semua *file* *migration* yang telah disediakan (**`php artisan migrate`**).  
6. **Seeder:** Kalian **wajib** membuat *Database Seeder* untuk membuat data awal. Silahkan lakukan langkah ini pada folder `database/seeders` dan buat file seeder sesuai tabel dengan data yang diperlukan, minimal:  
   * Satu pengguna dengan role: 'admin'.  
   * Dua pengguna dengan role: 'member'.  
   * Satu Toko (stores) yang dimiliki oleh salah satu member.  
   * Lima Kategori Produk (product\_categories).  
   * Sepuluh Produk (products) yang dijual oleh Toko tersebut.  
7. Jalankan **`php artisan serve`** untuk menjalankan development server  
8. Buka terminal lain dan jalankan **`npm install && npm run build`** untuk menginstal package Node yang diperlukan.  
9. Jalankan **`npm run dev`** untuk meng-compile asset dalam mode development  
10. Buka browser dan akses [**http://localhost:**](http://localhost:8000)`{PORT}` untuk melihat aplikasi

## **Tantangan Khusus (*Challenge*)**

Implementasi Kalian harus mencakup tiga tantangan inti berikut:

### **1\. Role Based Access Control (RBAC)**

Batasi akses ke halaman tertentu berdasarkan peran pengguna.

| Peran (users.role) | Akses ke Halaman | Aturan Akses |
| :---- | :---- | :---- |
| **Admin** | Halaman Admin. | Akses penuh ke menu admin. |
| **Seller/Penjual** | Dasbor Penjual. | Wajib memiliki role: 'member' **DAN** wajib memiliki entri di tabel stores. |
| **Member/Customer** | Halaman Pelanggan. | Akses ke halaman pembelian dan riwayat. |

### 

### **2\. Implementasi Sistem Keuangan (User Wallet & VA)**

Kalian harus membuat **Tabel Baru** bernama **user\_balances** (untuk *user wallet*/saldo) dan mengimplementasikan dua skema pembayaran:

| Skema Pembayaran | Flow Penggunaan |
| :---- | :---- |
| **Opsi A: Bayar dengan Saldo (*Wallet*)** | Pelanggan dapat *Topup* Saldo terlebih dahulu (melalui VA). Saat *checkout*, saldo user\_balances akan langsung dipotong. |
| **Opsi B: Bayar Langsung (Transfer VA)** | Saat *checkout* produk, sistem akan membuat kode **Virtual Account (VA) yang unik** yang terkait langsung dengan transaction\_id. |

### 

### **3\. Halaman Pembayaran Terpusat (*Dedicated Payment Page*)**

Buat satu halaman/fitur untuk memproses konfirmasi pembayaran VA dari Opsi A (*Topup*) dan Opsi B (Pembelian Langsung).

* **Flow:** Pengguna mengakses halaman Payment \-\> Masukkan Kode VA \-\> Sistem menampilkan detail (jumlah yang harus dibayar) \-\> Pengguna memasukkan nominal transfer (simulasi) \-\> Konfirmasi Pembayaran.  
* Jika sukses, sistem akan:  
  * **Untuk Topup:** Menambahkan saldo ke user\_balances.  
  * **Untuk Pembelian:** Mengubah transactions.payment\_status menjadi paid **dan** menambahkan dana ke store\_balances penjual.

## **Fitur yang Harus Diimplementasikan (Berdasarkan Halaman)**

Implementasikan fungsionalitas CRUD untuk setiap peran:

### **I. Halaman Pengguna (Customer Side)**

| Halaman | Fungsionalitas Wajib |
| :---- | :---- |
| **Homepage** (/) | Menampilkan daftar **semua produk** yang tersedia. **Filter** berdasarkan product\_categories. |
| **Halaman Produk** (/product/{slug}) | Menampilkan detail produk, semua product\_images, nama store, product\_reviews, dan tombol **"Beli"**. |
| **Checkout** (/checkout) | Proses pengisian alamat, pemilihan *shipping* (shipping\_type, kalkulasi shipping\_cost), pemilihan Opsi Pembayaran (Saldo / Transfer VA). Membuat entri di transactions dan transaction\_details. |
| **Riwayat Transaksi** (/history) | Melihat daftar transactions yang pernah dilakukan. Dapat melihat detail produk yang dibeli (transaction\_details). |
| **Topup Saldo** (/wallet/topup) | Mengajukan *topup* saldo pribadi. Menghasilkan VA unik. |

### 

### **II. Halaman Toko (Seller Dashboard)**

Halaman ini hanya dapat diakses oleh *Member* yang sudah mendaftar sebagai Toko.

| Halaman | Fungsionalitas Wajib |
| :---- | :---- |
| **Pendaftaran Toko** (/store/register) | CRUD untuk membuat profil Toko (mengisi stores.name, logo, about, dll.). |
| **Manajemen Toko** (/seller/profile) | CRUD untuk mengelola (update/delete) data Toko dan detail rekening bank. |
| **Manajemen Kategori** (/seller/categories) | **CRUD** untuk product\_categories. |
| **Manajemen Produk** (/seller/products) | **CRUD** untuk products dan product\_images (termasuk penKalianan is\_thumbnail). |
| **Manajemen Pesanan** (/seller/orders) | Melihat daftar pesanan masuk (transactions). Mengubah status pesanan dan mengisi tracking\_number. |
| **Saldo Toko** (/seller/balance) | Melihat saldo saat ini (store\_balances.balance) dan riwayat saldo (store\_balance\_histories). |
| **Penarikan Dana** (/seller/withdrawals) | Mengajukan Penarikan dana (membuat entri di withdrawals) dan melihat riwayat withdrawals. |

### 

### **III. Halaman Admin (Admin Only)**

Halaman ini hanya dapat diakses oleh pengguna dengan role: 'admin'.

| Halaman | Fungsionalitas Wajib |
| :---- | :---- |
| **Verifikasi Toko** (/admin/verification) | Melihat daftar Toko yang belum terverifikasi (is\_verified: false). Fitur untuk **Memverifikasi** atau **Menolak** pendaftaran toko (mengubah stores.is\_verified). |
| **Manajemen User & Store** (/admin/users) | Melihat dan mengelola daftar semua users dan stores yang terdaftar. |

## **Penilaian**

Persentase nilai dilakukan berdasarkan indikator berikut

* Tampilan 15%  
* Presentasi Projek 20% (jika nanti memungkinkan)  
* Penerapan MVC \+ Efisiensi code 15%  
* Kelengkapan Project sesuai kriteria 50%

Penilaian akan dilakukan berdasarkan commit nya. Semakin banyak dan kompleks yang dilakukan per individu dalam kelompok, bobot nilai yang diberikan akan semakin besar dan berlaku sebaliknya.

## **Informasi Tambahan**

1. Silahkan fork repositori ini, lalu mulai kerjakan di laptop masing masing dan jangan lupa invite partner kelompok ke dalam repositori.  
2. Berikan penjelasan aplikasi yang kalian buat sebagaimana readme pada repositori ini dan jangan lupa sertakan nama dan NIM anggota kelompok pada file [readme.md](http://readme.md)  
3. Dipersilahkan membuat improvisasi pada codingan, library, dan sumber apapun yang dibutuhkan selama tidak merubah arsitektur aplikasi yang diberikan pada poin diatas.  
4. Jika ada yang kurang dipahami dari perintah soal yang diberikan, feel free untuk menghubungi kami.

---
![alt text](<No Problem Running GIF by ProBit Global.gif>)

Semangatt, badai pasti berlalu 


Kelompok 9
- Zahra Adiva Nathania (245150600111019)
- Zuraini Tiafany Simatupang (245150601111018)

Web E-Commerce (Stationary dan Alat Tulis)
Toko : Etherial Stationary

Website sederhana yang kami buat tentang Stationary dan Alat tulis dengan nama toko Etherial Stationary. Pertama kami membuat seeder terlebih dahulu agar nanti website yang bisa terhubung di database uap_e-commerce. Seeder yang kamu buat ada 

1. AdminUserSedeeder = Kode AdminUserSeeder ini dipakai untuk mengubah data pengguna dengan ID 1 menjadi admin. Jadi saat seeder dijalankan, Laravel akan mencari user dengan id = 1, lalu memperbarui kolom role milik user tersebut menjadi "admin", 
2. DatabaseSeeder = mengatur dan menjalankan semua seeder agar database terisi otomatis dengan data dasar yang dibutuhkan web, 
3. ProductCategorySeeder = Digunakan untuk mengisi tabel kategori produk secara otomatis. Di dalamnya ada daftar kategori Pulpen, Buku, Pensil, Highliter, Washie-Tape. Setiap kategori dibuat beserta slug dan deskripsinya. Tujuannya agar kategori produk langsung tersedia tanpa input manual.
4. ProductImageSeeder = Untuk menambahkan gambar untuk setiap produk. Setiap produk memiliki file gambar dan penanda apakah gambar tersebut adalah thumbnail. Tujuannya agar produk punya foto yang langsung tersimpan di database.
5. ProductSeeder = Untuk mengisi daftar produk awal di toko. Setiap produk berisi nama, harga, stok, berat, deskripsi, kategori, dan slug. Tujuannya agar aplikasi langsung memiliki contoh produk lengkap tanpa harus menginput satu-satu.
6. ShippingTypeSeeder = Untuk menambahkan jenis pengiriman, yaitu Regular dan Express, masing-masing dengan biaya tertentu.Tujuannya supaya metode pengiriman sudah siap dipakai di checkout.
7. StoreBalanceSeeder = Untuk membuat saldo toko (store balance) untuk setiap toko yang ada. Jika toko belum punya saldo, otomatis dibuat dengan nilai awal 0. Tujuannya supaya fitur keuangan toko dapat berjalan.
8. StoreSeeder = Untuk membuat toko milik user tertentu, menggunakan email pemiliknya. Toko akan dibuat dengan informasi seperti nama toko, logo, alamat, kota, dan status verifikasi. Tujuannya untuk menyediakan contoh toko utama dalam web.
9. UserSeeder = Untuk membuat akun admin dan beberapa akun member. Setiap user berisi email, nama, password (yang di-hash), dan role. Tujuannya agar aplikasi langsung memiliki akun pengguna siap pakai.
10. WalletSeeder = Untuk membuat saldo dompet (wallet) untuk setiap user. Jika seorang user belum punya wallet, akan dibuat dengan saldo awal 0. Tujuannya untuk mendukung fitur pembayaran menggunakan e-wallet di web.

Selanjutnya pada app/http/Controller kami membuat folder admin, user, dan member. Untuk folder auth nya sudah disediakan.
Controller controller pada bagian admin berfungsi untuk mengelola seluruh data yang ada di dashboard admin. 

1. AdminController digunakan untuk menampilkan ringkasan data seperti jumlah user, jumlah toko, dan toko yang masih menunggu verifikasi. 
2. StoreManagementController dipakai untuk mengelola data toko, mulai dari menampilkan daftar toko, menambah toko baru, mengedit, hingga menghapusnya. 
3. StoreVerificationController digunakan untuk melihat daftar toko yang belum diverifikasi serta memberikan keputusan approve atau reject. 
4. UserManagementController berfungsi untuk menampilkan semua user dan menghapus user tertentu, dengan pengecualian bahwa admin tidak dapat menghapus akunnya sendiri. 

Controller–controller pada bagian Auth mengatur seluruh proses autentikasi pengguna. 

1. AuthenticatedSessionController menangani proses login, mengarahkan user sesuai role, dan logout. 2. ConfirmablePasswordController digunakan saat pengguna perlu mengonfirmasi password sebelum melakukan aksi penting. EmailVerificationNotificationController mengirim ulang email verifikasi, 3. 3. EmailVerificationPromptController menampilkan halaman verifikasi jika email belum diverifikasi. LoginController menangani login manual dan mengarahkan user berdasarkan peran (admin, seller, member). 
4. NewPasswordController mengatur proses reset password ketika pengguna lupa password.
5. PasswordController digunakan untuk mengganti password saat user sudah login.
6. PasswordResetLinkController mengirimkan link reset password ke email pengguna.
7. RegisteredUserController mengatur proses registrasi user baru dan langsung login setelah berhasil daftar. 
8. VerifyEmailController menandai email pengguna sebagai terverifikasi. 

1. CartController
Kami membuat controller ini untuk mengatur keranjang belanja. Saat user menekan tombol Add to Cart, kami mengambil produk berdasarkan product_id, lalu menambahkannya ke session. Jika produk sudah ada di cart, jumlahnya kami tambahkan. Setelah itu user diarahkan ke halaman checkout.
2. CheckoutController
Kami membuat controller ini untuk proses checkout hingga pembuatan transaksi.
Di dalamnya kami menangani dua metode pembayaran:
- Wallet (saldo) → kami cek saldo user, memotong saldo, lalu transaksi otomatis menjadi paid.
- Virtual Account (VA) → transaksi dibuat dengan status unpaid, lalu kami generate nomor VA agar user bisa membayar secara simulasi.
Controller ini juga membuat detail transaksi dan menghitung subtotal, ongkir, serta total pembayaran.
3. MemberDashboardController
Kami membuat controller ini untuk menampilkan halaman dashboard member. Data yang ditampilkan yaitu produk terbaru dan semua kategori, sehingga user bisa langsung melihat produk terbaru saat membuka dashboard.
4. PaymentController
Kami membuat controller ini untuk mengatur halaman pembayaran menggunakan Virtual Account (VA).
Fungsinya:
- Menampilkan halaman input VA, menampilkan halaman bayar VA dari transaksi tertentu dan mengonfirmasi pembayaran VA.
Jika transaksi dibayar, status kami ubah menjadi paid dan saldo store bertambah.
Controller ini juga menampung fitur pengecekan VA untuk topup maupun pembelian.
5. ProductController
Kami membuat controller ini untuk menampilkan daftar produk dan detail setiap produk.Di halaman detail, kami memuat toko, gambar-gambar produk, serta ulasan dari pembeli. Hal ini memudahkan user melihat informasi lengkap produk.
6. TransactionHistoryController
Kami membuat controller ini untuk menampilkan riwayat transaksi user. Di halaman ini user bisa melihat transaksi apa saja yang sudah dilakukan, termasuk produk dan jumlah yang dibeli. User juga bisa membuka halaman detail transaksi.
7. WalletController
Kami membuat controller ini untuk mengatur fitur top-up saldo (wallet).
Fitur utamanya:
- Menampilkan saldo dan riwayat top-up.
- Membuat Virtual Account untuk top-up.
- Menampilkan halaman pembayaran VA untuk top-up.
- Mensimulasikan pembayaran top-up dan menambahkan saldo user.
Top-up dan pembelian berjalan terpisah agar alurnya lebih rapi dan aman.

Kami membuat controller untuk sisi Seller agar pemilik toko dapat mengelola seluruh aktivitas tokonya. Controller ini menangani pendaftaran toko, pengelolaan profil toko, dan pengaturan kategori produk melalui fitur CRUD. Kami juga menyediakan controller untuk manajemen produk, termasuk upload gambar dan penentuan thumbnail. Selain itu, kami membuat controller pesanan untuk seller agar dapat melihat transaksi yang masuk, mengubah status pesanan, dan mengisi nomor resi. Untuk keuangan toko, kami membuat controller saldo yang menampilkan saldo dan riwayatnya, serta controller penarikan dana yang memungkinkan seller mengajukan withdrawal dan melihat riwayat pencairan. 

Kami membuat middleware khusus untuk membatasi akses berdasarkan peran pengguna. AdminOnly memastikan bahwa hanya pengguna dengan role admin yang dapat masuk ke halaman admin; jika bukan admin, sistem langsung menolak akses dengan error 403. MemberOnly digunakan untuk membatasi halaman khusus member, yaitu pengguna biasa yang bukan admin atau seller. Middleware ini memaksa user login terlebih dahulu, kemudian memeriksa role: jika admin maka diarahkan ke dashboard admin, jika member maka akses diperbolehkan. Selain itu, kami juga menyiapkan SellerOnly, yaitu middleware yang membatasi halaman untuk pemilik toko; hanya user dengan role seller yang dapat mengakses fitur-fitur seller seperti mengelola toko, produk, pesanan, dan saldo. 

Migration–migration ini adalah fondasi dari website yang kami bangun. Mulai dari tabel user, toko, produk, transaksi, sampai saldo dan dompet digital, semuanya kami susun biar sistem marketplace ini bisa jalan lancar. Setiap file migration punya tugasnya masing-masing, dan kalau semuanya digabung, terbentuklah struktur database yang lengkap untuk mengatur pembeli, penjual, admin, produk, pesanan, hingga alur uang masuk-keluar. Singkatnya inilah rangka tulang dari web yang kami kerjakan. Ada
create_users_table
create_cache_table
create_jobs_table
create_stores_table
create_store_balances_table
create_store_balance_histories_table
create_withdrawals_table
create_product_categories_table
create_products_table
create_product_images_table
create_product_reviews_table
create_transactions_table
create_transaction_details_table
create_shipping_types_table
create_user_balances_table
create_wallet_transactions_table
create_order_payments_table
update_address_id_nullable_in_transactions_table
add_payment_fields_to_transactions_table
add_wallet_to_users_table
create_wallets_table

Folder public/assets/images adalah tempat penyimpanan gambar-gambar produk yang digunakan oleh aplikasi. Di dalamnya terdapat subfolder berdasarkan ID produk (misalnya folder 1, 2, 3, dst.). Setiap folder menyimpan file gambar yang terkait dengan produk tersebut, seperti foto pena, buku, atau alat tulis lainnya.

Kode pada file bootstrap/app.php bertugas mengonfigurasi aplikasi Laravel saat pertama kali dijalankan. Di dalamnya diatur file routing yang digunakan, seperti web routes, console routes, hingga health check. Bagian terpenting adalah pendaftaran alias middleware, di mana middleware admin dan member resmi didaftarkan agar bisa digunakan pada route. Sistem dapat membedakan akses antara admin dan member ketika pengguna membuka halaman tertentu. 

File routes/web.php berisi pengaturan seluruh rute utama dalam aplikasi, mulai dari login user biasa, login admin, hingga halaman-halaman yang membutuhkan middleware khusus seperti admin dan member. Pada bagian admin, rute yang diproteksi oleh AdminOnly mencakup dashboard, manajemen user, manajemen toko, dan verifikasi toko. Sementara pada bagian member, rute yang dilindungi oleh middleware member meliputi dashboard member, daftar produk, detail produk, checkout, pembayaran, dompet (wallet), sampai riwayat transaksi. Setiap kelompok rute diberi prefix (admin/ atau member/) dan namespace nama (admin. atau member.) agar lebih terstruktur dan mudah dipanggil.

Sedangkan file routes/auth.php berisi rute-rute standar autentikasi bawaan Laravel Breeze, seperti register, login, reset password, verifikasi email, update password, dan logout. Semua rute dikelompokkan menggunakan middleware guest untuk pengguna yang belum login, dan auth untuk pengguna yang sudah login

#**ALUR** 
Pada sistem ini, alur kerja web dimulai dari proses pengguna (customer) melakukan registrasi atau login menggunakan akun yang telah disediakan oleh UserSeeder. Setelah berhasil masuk, pengguna dapat melihat daftar kategori produk yang telah di-seed oleh ProductCategorySeeder. Setiap kategori berisi beberapa produk yang dimasukkan melalui ProductSeeder, lengkap dengan gambar produk dari ProductImageSeeder. Ketika pengguna memilih sebuah produk, mereka dapat melihat detail lengkap termasuk harga, deskripsi, dan foto. Setelah itu, jika pengguna ingin membeli produk, pengguna dapat menambahkannya ke keranjang dan melanjutkan ke proses checkout. Pada tahap ini, pengguna dapat memilih metode pengiriman berdasarkan data dari ShippingTypeSeeder serta memilih metode pembayaran seperti e-wallet atau virtual account, yang datanya dikelola oleh WalletSeeder.

Sementara itu, setiap produk berasal dari berbagai toko yang di-seed oleh StoreSeeder. Saldo toko akan bertambah ketika ada transaksi berhasil, mengikuti data awal dari StoreBalanceSeeder. Setelah pembayaran diverifikasi, sistem akan mencatat transaksi, mengurangi saldo wallet customer, menambah saldo toko, dan menandai pesanan sebagai berhasil. Dengan demikian, seluruh proses berjalan dari login, memilih kategori, melihat produk, checkout, memilih pengiriman, membayar, hingga pesanan tercatat dan saldo toko terupdate.

Selain alur untuk customer, sistem ini juga memiliki admin yang berfungsi mengelola seluruh data pada platform. Admin dibuat melalui UserSeeder, biasanya dengan role khusus seperti admin atau superadmin. Setelah login ke dashboard admin, admin dapat mengatur kategori produk, menambah atau menghapus produk, mengecek dan mengelola toko, serta memonitor saldo setiap toko yang dikelola lewat StoreBalanceSeeder. Admin juga bisa melihat transaksi yang masuk, memeriksa apakah pembayaran customer berhasil, serta memastikan bahwa pengiriman sesuai dengan tipe pengiriman yang telah dibuat melalui ShippingTypeSeeder.

Admin bertindak sebagai pusat kontrol yang mengawasi seluruh aktivitas marketplace—mulai dari verifikasi data produk, mengelola stock, memastikan gambar produk valid, memantau saldo toko, hingga mengawasi proses pembayaran dan memastikan tidak ada transaksi bermasalah. Alur sistem terbagi menjadi dua: flow customer (login → pilih kategori → pilih produk → checkout → bayar → pesanan sukses), dan flow admin (login → kelola data user, kategori, produk, toko, pengiriman, saldo, dan transaksi). Admin memastikan seluruh proses berjalan lancar dan aman.

Selain admin dan customer, sistem juga memiliki seller, yaitu member yang telah mendaftarkan diri sebagai pemilik toko. Seller memiliki alur khusus setelah login sebagai member. Pertama, seller harus melakukan pendaftaran toko dengan melengkapi profil seperti nama toko, logo, deskripsi, dan data rekening agar dapat menerima pembayaran. Setelah toko berhasil dibuat dan diverifikasi, seller dapat masuk ke Seller Dashboard untuk mengelola seluruh aktivitas tokonya.

Dalam dashboard tersebut, seller dapat melakukan CRUD kategori produk, membuat kategori khusus milik tokonya. Seller juga dapat mengelola produk, termasuk menambahkan foto produk, menentukan mana gambar yang menjadi thumbnail, mengatur stok, deskripsi, dan harga. Ketika ada pesanan baru, seller dapat membukanya melalui halaman Manajemen Pesanan, melihat transaksi yang masuk, memproses pesanan, mengubah status (misalnya: diproses, dikirim, selesai), serta mengisi nomor resi untuk pengiriman.

Seller juga memiliki halaman Saldo Toko, yaitu tempat melihat saldo hasil penjualan yang otomatis masuk ketika transaksi berhasil. Riwayat pergerakan saldo dapat dilihat melalui store_balance_histories. Jika saldo cukup, seller dapat mengajukan penarikan dana (withdraw), dan permohonan tersebut tercatat pada tabel withdrawals agar dapat diproses. 


Terimakasih kak...
