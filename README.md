<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Panduan Menjalankan Proyek Indofood Inventory feat. Laravel:

## Prasyarat

Pastikan Anda telah menginstal prasyarat berikut di sistem Anda:

1. [Composer](https://getcomposer.org/)
2. [PHP](https://www.php.net/) (versi yang didukung oleh Laravel, versi 8.3 atau lebih baru)
3. [Node.js](https://nodejs.org/) dan [npm](https://www.npmjs.com/)

## Langkah-langkah

1. **Clone Repository**

    Clone repository proyek Laravel dari GitHub (atau sumber lainnya):

    ```bash
    git clone https://github.com/adzaky/indofood-inventory.git
    cd indofood-inventory
    ```

2. **Instal Dependensi PHP**

    Gunakan Composer untuk menginstal semua dependensi PHP yang dibutuhkan oleh Laravel:

    ```bash
    composer install
    ```

3. **Salin File Environment**

    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi sesuai dengan lingkungan Anda:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**

    Generate application key yang unik untuk proyek Laravel Anda:

    ```bash
    php artisan key:generate
    ```

5. **Konfigurasi Database**

    Buka file `.env` dan sesuaikan konfigurasi database:

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=indofood_inventory
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Migrasi dan Seeder Database**

    Jalankan migrasi untuk membuat tabel-tabel di database dan jalankan seeder jika ada data awal yang perlu dimasukkan:

    ```bash
    php artisan migrate
    ```

7. **Instal Dependensi Node.js**

    Gunakan npm untuk menginstal semua dependensi front-end:

    ```bash
    npm install
    ```

8. **Kompilasi Asset Front-end**

    Kompilasi asset front-end menggunakan Laravel Mix:

    ```bash
    npm run dev
    ```

9. **Menjalankan Server Pengembangan**

    Jalankan server pengembangan Laravel:

    ```bash
    php artisan serve
    ```

    Server akan berjalan di `http://127.0.0.1:8000` secara default.

10. **Akses Aplikasi**

    Buka browser dan akses aplikasi Anda di `http://127.0.0.1:8000`.
