# SIPUS-Del
## Sistem Informasi Perpustakaan Kampus

SIPUS-Del merupakan aplikasi berbasis web untuk membantu pengelolaan koleksi buku dan kategori buku pada perpustakaan kampus. Aplikasi ini dikembangkan menggunakan Laravel dan SQLite dengan pendekatan Model-View-Controller (MVC).

Aplikasi menyediakan pengelolaan data buku dan kategori, validasi input, relasi antar tabel, serta tampilan yang konsisten menggunakan Blade.

## 1. Fitur Aplikasi

### Pengelolaan Buku
- Menampilkan daftar buku dengan pagination.
- Menambahkan buku baru.
- Melihat detail buku.
- Mengubah informasi buku.
- Menghapus buku.
- Menampilkan kategori dari setiap buku.

### Pengelolaan Kategori
- Menampilkan daftar kategori.
- Menambahkan kategori baru.
- Melihat detail kategori beserta buku yang terkait.
- Mengubah informasi kategori.
- Menghapus kategori yang tidak sedang digunakan oleh buku.

### Fitur Pendukung
- Validasi data pada sisi server.
- Pencegahan ISBN dan kode kategori duplikat.
- Notifikasi setelah operasi berhasil atau gagal.
- Tampilan pesan ketika data belum tersedia.
- Eloquent ORM untuk pengelolaan relasi.
- Eager loading untuk mengurangi query berulang saat mengambil data buku dan kategorinya.

## 2. Teknologi yang Digunakan

- PHP
- Laravel 13
- SQLite
- Blade Template
- HTML dan CSS
- Eloquent ORM
- Composer
- Git dan GitHub

Catatan: Versi framework yang digunakan pada proyek ini adalah Laravel 13. Pastikan versi ini sesuai dengan ketentuan tugas. Dipenugasan memang ditentukan menggunakan Laravel 11, namun pada saat kelas praktikum sudah disepakati menggunakan Laravel 13.

## 3. Struktur Proyek

```text
SIPUS-Del/
├── app/
│   ├── Http/Controllers/
│   │   ├── BukuController.php
│   │   └── KategoriController.php
│   └── Models/
│       ├── Buku.php
│       └── Kategori.php
├── database/
│   ├── factories/
│   │   └── BukuFactory.php
│   ├── migrations/
│   └── seeders/
│       ├── BukuSeeder.php
│       ├── KategoriSeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── buku/
│       ├── kategori/
│       └── components/
│           └── layout.blade.php
├── routes/
│   └── web.php
├── tests/
├── .env.example
├── composer.json
└── README.md
```

## 4. Desain Database

Aplikasi menggunakan database SQLite dengan dua tabel utama, yaitu `kategoris` dan `bukus`.

### Tabel `kategoris`

| Kolom | Tipe data | Keterangan |
|---|---|---|
| id | Integer | Primary key |
| kode_kategori | String, maksimal 20 karakter | Kode unik kategori |
| nama_kategori | String, maksimal 100 karakter | Nama kategori |
| deskripsi | Text, nullable | Deskripsi kategori |
| created_at | Timestamp | Waktu pembuatan |
| updated_at | Timestamp | Waktu pembaruan |

### Tabel `bukus`

| Kolom | Tipe data | Keterangan |
|---|---|---|
| id | Integer | Primary key |
| isbn | String, maksimal 20 karakter | ISBN unik buku |
| judul | String, maksimal 200 karakter | Judul buku |
| penulis | String, maksimal 150 karakter | Nama penulis |
| penerbit | String, maksimal 150 karakter | Nama penerbit |
| tahun_terbit | Unsigned small integer | Tahun terbit |
| stok | Unsigned integer | Jumlah stok, default 0 |
| sinopsis | Text, nullable | Ringkasan buku |
| kategori_id | Foreign key | Mengacu ke `kategoris.id` |
| created_at | Timestamp | Waktu pembuatan |
| updated_at | Timestamp | Waktu pembaruan |

### Relasi Antar Tabel

Relasi yang digunakan adalah one-to-many:

- Satu kategori dapat memiliki banyak buku.
- Satu buku terhubung dengan satu kategori.
- Kolom `bukus.kategori_id` menjadi foreign key yang mengacu pada `kategoris.id`.
- Model `Kategori` menggunakan relasi `hasMany`.
- Model `Buku` menggunakan relasi `belongsTo`.

Kategori yang masih memiliki buku tidak dapat dihapus melalui aplikasi.

## 5. Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan perangkat telah memiliki:

- PHP dengan versi yang memenuhi persyaratan Laravel 13.
- Composer.
- SQLite.
- Git jika ingin mengambil kode dari GitHub.

## 6. Instalasi dan Cara Menjalankan

### A. Clone Repository

```bash
```bash
git clone https://github.com/SwastiSihombing/ppw-2026-week5-12S24030.git
cd ppw-2026-week5-12S24030
```

### B. Instal Dependensi

```bash
composer install
```

### C. Siapkan File Environment

Pada Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Pastikan konfigurasi database pada `.env` menggunakan SQLite:

```dotenv
DB_CONNECTION=sqlite
```

### D. Siapkan Database SQLite

Pastikan file berikut tersedia:

```text
database/database.sqlite
```

Jika belum ada, buat file SQLite kosong tersebut dari terminal PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File
```

Jika file sudah ada, jangan jalankan perintah pembuatan file tersebut lagi.

### E. Buat Application Key

```bash
php artisan key:generate
```

### F. Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Perintah ini membuat tabel yang didefinisikan dalam migrasi dan menjalankan seeder yang terdaftar di `DatabaseSeeder`.

Seeder proyek menyiapkan lima kategori awal dan menambah data buku contoh hingga mencapai target minimal 20 buku berdasarkan logika seeder yang digunakan.

Jangan gunakan `migrate:fresh` pada database yang berisi data penting karena perintah tersebut menghapus tabel sebelum membuat ulang.

### G. Jalankan Server

```bash
php artisan serve
```

Buka alamat berikut di browser:

http://127.0.0.1:8000

## 7. Validasi dan Keamanan

Aplikasi menerapkan beberapa mekanisme validasi dan keamanan:

- ISBN buku harus unik.
- Kode kategori harus unik.
- Judul, penulis, penerbit, tahun terbit, stok, dan kategori divalidasi sesuai aturan pada controller.
- Kategori yang dipilih harus tersedia di database.
- Form menggunakan token CSRF melalui direktif `@csrf`.
- Form pembaruan dan penghapusan menggunakan metode HTTP yang sesuai melalui `@method`.
- Model menggunakan `$fillable` untuk membatasi atribut yang dapat diisi melalui mass assignment.
- Blade menggunakan escaping bawaan pada ekspresi `{{ }}` untuk menampilkan data.
- Penghapusan kategori ditolak jika kategori masih memiliki buku.

## 8. Pengujian Aplikasi

Pengujian dilakukan untuk memeriksa fungsi dan validasi aplikasi.

### Pengujian Fungsional
- Menampilkan daftar buku dan kategori.
- Menambahkan buku dan kategori.
- Melihat detail buku dan kategori.
- Mengubah data buku dan kategori.
- Menghapus buku.
- Menghapus kategori yang tidak sedang digunakan.
- Menolak penghapusan kategori yang masih memiliki buku.

### Pengujian Validasi
- ISBN duplikat ditolak.
- Kode kategori duplikat ditolak.
- Kolom wajib yang kosong ditolak.
- Stok negatif ditolak.
- Kategori yang tidak tersedia ditolak.

### Menjalankan Tes Otomatis

```bash
php artisan test
```

Hasil pengujian harus diperbarui berdasarkan hasil aktual ketika perintah dijalankan. Jangan menyatakan seluruh tes lulus sebelum semua tes terkait berhasil.

## 9. Audit SQL dan Optimasi Query

Pengambilan daftar buku menggunakan Eloquent eager loading:

```php
Buku::with('kategori')->latest()->paginate(10);
```

Eager loading digunakan agar data kategori dimuat secara efisien ketika daftar buku ditampilkan. Pendekatan ini membantu menghindari pola N+1 query, yaitu pengambilan data relasi secara berulang untuk setiap buku.

Audit query dilakukan dengan Laravel Tinker menggunakan query log untuk memeriksa query yang dieksekusi. Jumlah dan isi query yang dilaporkan harus sesuai dengan hasil pemeriksaan aktual.

## 10. Screenshot Aplikasi

1. ![Halaman daftar buku](<docs/screenshoots/Halaman daftar buku..png>)

2. ![Form tambah buku](<docs/screenshoots/Form tambah buku..png>)

3. ![Halaman detail buku](<docs/screenshoots/Halaman detail buku.png>)

4. ![Halaman edit buku](<docs/screenshoots/Halaman edit buku.png>)

5. ![Halaman daftar kategori](<docs/screenshoots/Halaman daftar kategori.png>)

6. ![Form tambah kategori](<docs/screenshoots/Form tambah kategori.png>)

7. ![pesan validasi ketika input tidak sesuai](<docs/screenshoots/Contoh pesan validasi ketika input tidak sesuai.png>)

8. ![Contoh penolakan penghapusan kategori yang masih memiliki buku](<docs/screenshoots/Contoh penolakan penghapusan kategori yang masih memiliki buku.png>)


## 11. Repository dan Version Control

Proyek dikelola menggunakan Git dan diunggah ke GitHub.

Repository: [ppw-2026-week5-12S24030 di GitHub](https://github.com/SwastiSihombing/ppw-2026-week5-12S24030.git)

File `.env` lokal tidak boleh diunggah karena dapat berisi konfigurasi sensitif. Gunakan `.env.example` sebagai contoh konfigurasi lingkungan.

## 12. Identitas Pengembang

- Nama: Swasti Maristella Sihombing
- NIM: 12S24030
- Program Studi: Sistem Informasi
- Institusi: Institut Teknologi Del
