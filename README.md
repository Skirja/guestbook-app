# Dokumentasi

Proyek ini merupakan aplikasi buku tamu sederhana yang dibangun menggunakan framework Laravel. Aplikasi ini memungkinkan pengunjung untuk meninggalkan pesan dan data kontak mereka, dan administrator dapat melihat, mengedit, menghapus, serta mengekspor data tamu ke dalam format PDF.

### Fitur

1. **Halaman Depan (Guest)**
    - Menampilkan form untuk mengisi buku tamu (nama, email, telepon, Alamat).
    - Melakukan validasi data input sebelum menyimpannya ke database.
    - Menampilkan pesan sukses setelah data berhasil disimpan.

2. **Dashboard Admin**
    - Menampilkan daftar tamu yang telah mengisi buku tamu.
    - Menyediakan fitur filter data berdasarkan rentang tanggal.
    - Menyediakan fitur export data ke PDF dengan atau tanpa filter tanggal.
    - Menyediakan fitur edit dan hapus data tamu.

3. **Autentikasi Admin**
    - Memiliki halaman login untuk admin.
    - Melakukan validasi data login dan redirect ke dashboard jika berhasil.
    - Melakukan logout dan invalidasi session untuk keamanan.

### Database

Aplikasi ini menggunakan database MySQL dengan tabel berikut:

- **`buku_tamu`**: Menyimpan data tamu (nama, email, telepon, alamat, timestamp).

### Instalasi

1. Clone repository proyek ini.
2. Jalankan `composer install` untuk menginstal dependensi PHP.
3. Buat database MySQL dan sesuaikan konfigurasi database pada file `.env`.
4. Jalankan `php artisan migrate` untuk membuat tabel database.
5. Jalankan `php artisan db:seed` untuk mengisi data awal (user admin).
6. Jalankan `php artisan serve` untuk menjalankan aplikasi.

### Penjelasan Kode

- **`app/Http/Controllers/GuestBookController.php`**: Menangani request dari halaman depan, seperti menampilkan form buku tamu dan menyimpan data tamu ke database.
- **`app/Http/Controllers/AdminController.php`**: Menangani request dari dashboard admin, seperti menampilkan daftar tamu, filter data, export PDF, edit data, dan hapus data.
- **`app/Http/Controllers/AuthController.php`**: Menangani proses login dan logout admin.
- **`app/Models/BukuTamu.php`**: Model Eloquent untuk tabel `buku_tamu`.
- **`app/Models/User.php`**: Model Eloquent untuk tabel `users`.
- **`database/migrations/2024_09_20_043710_create_buku_tamu_table.php`**: Migrasi untuk membuat tabel `buku_tamu`.
- **`database/seeders/AdminSeeder.php`**: Seeder untuk menambahkan data user admin ke database.
- **`resources/views/admin/pdf_export.blade.php`**: Template Blade untuk export data ke PDF.