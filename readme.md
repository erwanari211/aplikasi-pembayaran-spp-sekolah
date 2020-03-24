## Aplikasi Pembayaran SPP Sekolah

Aplikasi Pembayaran SPP Sekolah berbasis web dengan menggunakan Laravel 5.8.

## Instalasi
- git clone https://github.com/erwanari211/aplikasi-pembayaran-spp-sekolah.git
- cd aplikasi-pembayaran-spp-sekolah
- composer install
- cp .env.example .env
- edit .env lalu sesuaikan setting database
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve
- buka http://localhost:8000
