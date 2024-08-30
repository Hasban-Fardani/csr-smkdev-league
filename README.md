<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://smkdev.storage.googleapis.com/wp/SMKDEV-Logo-Long.png" alt="Logo" width="150">
  </a>

  <h3 align="center">SMKDEV Coding League - CSR Management App</h3>

  <p align="center">
    Aplikasi manajemen CSR atau TJSL (Tanggung Jawab Sosial dan Lingkungan) untuk keperluan lomba SMKDEV Coding League 
    <br />
    <br />
    <a href="https://github.com/Hasban-Fardani/csr-smkdev-league#preview">Preview</a>
    ·
    <a href="https://github.com/Hasban-Fardani/csr-smkdev-league#installasi">Install</a>
    ·
    <a href="https://github.com/Hasban-Fardani/csr-smkdev-league#referensi">Referensi</a>
  </p>
</div>

## Preview

## Installasi
1. clone repositori ini
```bash
git clone https://github.com/Hasban-Fardani/csr-smkdev-league.git
```
2. masuk ke folder apps
```bash
cd csr-smkdev-league
```
3. install packages php dan laravel
```bash
composer install
bun install #jika menggunakan bun (disarankan)
npm install #jika menggunakan npm
```
4. copy file .env.example menjadi .env
```bash
cp .env.example .env
```

5. ubah data yang diperlukan untuk database jika diperlukan di file .env.
  note: sesuaikan dengan database anda
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_csr_smkdev
DB_USERNAME=<your_db_username>
DB_PASSWORD=<your_db_password>
```
6. ubah data untuk email service di file .env
```env
MAIL_MAILER=smtp  #ubah ini yang awalya log menjadi smtp
MAIL_HOST=<your_mail_host>
MAIL_PORT=<your_mail_port>
MAIL_USERNAME=<your_mail_username>
MAIL_PASSWORD=<your_mail_password>
MAIL_ENCRYPTION=<your_mail_encryption>  # ssl/tls
MAIL_FROM_ADDRESS=<your_mail_address>
MAIL_FROM_NAME="${APP_NAME}"
```

7. Setup akun admin. Buka file env lalu ubah bagian berikut
```env
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=password
```

8. migrate database
```bash
php artisan migrate

# untuk development
php artisan db:seed 

# untuk production
php artisan db:seed --class=AdminSeeder  # hanya membuat akun untuk admin
```

9. jalankan project
```bash
# build asset css dan js 
bun run build  # jika menggukana bun
npm run build  # jika menggunaan npm

# serve aplikasi
php artisan serve
```

10. jalankan queue untuk mengaktifkan fitur notifikasi dan email
```bash
php artisan queue:work
```

## Referensi
- [laravel captcha cloudflare turnstile](https://filamentphp.com/plugins/ousid-cloudflare-turnstile)
- [filamentphp.com](filamentphp.com)
- [mary-ui](https://mary-ui.com/)
