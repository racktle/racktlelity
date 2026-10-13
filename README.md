<<<<<<< HEAD
# Racktility

Aplikasi kelas online berbasis Laravel 11, Bootstrap 5, dan MySQL. Antarmuka menggunakan Bahasa Indonesia dengan warna primer abu-abu `#808080`.

## Persyaratan

- PHP 8.2+ dengan ekstensi PDO MySQL
- Composer
- MySQL

## Menjalankan aplikasi

1. Buat database MySQL bernama `kelasngasal`.
2. Salin `.env.example` menjadi `.env`, lalu sesuaikan `DB_USERNAME`, `DB_PASSWORD`, `ADMIN_EMAIL`, dan `ADMIN_PASSWORD`. Gunakan kata sandi admin yang kuat; panjang minimal 12 karakter.
3. Pasang dependency dan siapkan database:

   ```bash
   composer install
   php artisan key:generate
   php artisan migrate --seed
   ```

4. Jalankan server lokal:

   ```bash
   php artisan serve
   ```

5. Buka `http://127.0.0.1:8000`. Login admin menggunakan email dan kata sandi yang diatur pada `.env`; pengguna baru mendaftar melalui halaman Daftar.

## Halaman dan akses

- `/login` dan `/register`: autentikasi pengguna.
- `/dashboard`: dashboard pelajar; akun admin diarahkan ke dashboard admin.
- `/admin/dashboard`: dashboard admin, dilindungi middleware role admin.

Registrasi publik selalu memberikan role `user`. Akun admin dibuat melalui database seeder dan konfigurasi `.env`, bukan melalui pilihan role di form pendaftaran.
=======
# Racktility

Aplikasi kelas online berbasis Laravel 11, Bootstrap 5, dan MySQL. Antarmuka menggunakan Bahasa Indonesia dengan warna primer abu-abu `#808080`.

## Persyaratan

- PHP 8.2+ dengan ekstensi PDO MySQL
- Composer
- MySQL

## Menjalankan aplikasi

1. Buat database MySQL bernama `kelasngasal`.
2. Salin `.env.example` menjadi `.env`, lalu sesuaikan `DB_USERNAME`, `DB_PASSWORD`, `ADMIN_EMAIL`, dan `ADMIN_PASSWORD`. Gunakan kata sandi admin yang kuat; panjang minimal 12 karakter.
3. Pasang dependency dan siapkan database:

   ```bash
   composer install
   php artisan key:generate
   php artisan migrate --seed
   ```

4. Jalankan server lokal:

   ```bash
   php artisan serve
   ```

5. Buka `http://127.0.0.1:8000`. Login admin menggunakan email dan kata sandi yang diatur pada `.env`; pengguna baru mendaftar melalui halaman Daftar.

## Halaman dan akses

- `/login` dan `/register`: autentikasi pengguna.
- `/dashboard`: dashboard pelajar; akun admin diarahkan ke dashboard admin.
- `/admin/dashboard`: dashboard admin, dilindungi middleware role admin.

Registrasi publik selalu memberikan role `user`. Akun admin dibuat melalui database seeder dan konfigurasi `.env`, bukan melalui pilihan role di form pendaftaran.
>>>>>>> 4e2f1b646b911e03cc6c38cbcf07405c709c07aa
