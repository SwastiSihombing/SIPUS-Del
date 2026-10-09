# SIPUS-Del
### Sistem Informasi Perpustakaan Kampus

## 1. Deskripsi Proyek

SIPUS-Del merupakan aplikasi berbasis web untuk mengelola data koleksi buku dan kategori buku pada perpustakaan kampus. Aplikasi ini dikembangkan menggunakan Laravel dan database SQLite dengan pendekatan Model-View-Controller (MVC).

## 2. Fitur Utama

- Menampilkan daftar buku dengan pagination.
- Menambahkan, melihat detail, mengedit, dan menghapus buku.
- Mengelola kategori buku melalui fitur CRUD.
- Menghubungkan buku dengan kategori menggunakan relasi Eloquent.
- Melakukan validasi data pada sisi server.
- Mencegah penggunaan ISBN dan kode kategori yang duplikat.
- Menampilkan notifikasi setelah operasi berhasil atau gagal.
- Menolak penghapusan kategori yang masih digunakan oleh buku.
- Menggunakan eager loading untuk mengurangi query berulang.

## 3. Teknologi yang Digunakan

- PHP
- Laravel 13
- SQLite
- Blade Template
- HTML dan CSS
- Eloquent ORM

## 4. Struktur Aplikasi

- `app/Models/` — model Buku dan Kategori.
- `app/Http/Controllers/` — logika aplikasi.
- `database/migrations/` — struktur tabel database.
- `database/seeders/` — data awal kategori dan buku.
- `database/factories/` — pembuatan data buku contoh.
- `resources/views/` — tampilan aplikasi menggunakan Blade.
- `routes/web.php` — definisi route aplikasi.

## 5. Persyaratan

- PHP sesuai persyaratan versi Laravel yang digunakan.
- Composer.
- SQLite.
- Git (opsional untuk menjalankan aplikasi, diperlukan untuk version control).

## 6. Cara Menjalankan Aplikasi

1. Clone repository:

   ```bash
   git clone URL_REPOSITORY
   cd SIPUS-Del
   ```

2. Instal dependensi:

   ```bash
   composer install
   ```

3. Salin konfigurasi lingkungan pada Windows:

   ```powershell
   Copy-Item .env.example .env
   ```

4. Pastikan `.env` menggunakan konfigurasi database SQLite:

   ```dotenv
   DB_CONNECTION=sqlite
   ```

5. Pastikan file `database/database.sqlite` tersedia. Jika belum, buat file kosong tersebut.

6. Buat application key:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi dan seeder:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan server:

   ```bash
   php artisan serve
   ```

9. Buka `http://127.0.0.1:8000` di browser.

## 7. Database

Aplikasi memiliki dua tabel utama:

- **kategoris** — menyimpan kode, nama, dan deskripsi kategori.
- **bukus** — menyimpan ISBN, judul, penulis, penerbit, tahun terbit, stok, sinopsis, dan kategori.

Relasi database: satu kategori dapat memiliki banyak buku (*one-to-many*), sedangkan satu buku dimiliki oleh satu kategori.

## 8. Validasi dan Keamanan

- Validasi dilakukan melalui Laravel pada sisi server.
- Form menggunakan token CSRF.
- Kolom ISBN dan kode kategori memiliki aturan unik.
- Relasi kategori divalidasi menggunakan `exists`.
- Data ditampilkan menggunakan escaping bawaan Blade.
- Model menggunakan `$fillable` untuk membatasi atribut yang dapat diisi melalui mass assignment.

## 9. Pengujian

Pengujian aplikasi meliputi operasi CRUD buku dan kategori, validasi data wajib, ISBN duplikat, stok negatif, kode kategori duplikat, serta penghapusan kategori yang masih memiliki buku.

## 10. Pengembang

Nama: Swasti Maristella Sihombing  
NIM: 12S24030
Program Studi: Sistem Informasi  
Institusi: Institut Teknologi Del