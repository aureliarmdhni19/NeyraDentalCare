# Panduan Penggunaan, Hosting, dan Backup Website Klinik Gigi

Dokumen ini berisi langkah-langkah untuk menyiapkan, menghosting, dan melakukan backup terhadap website *Klinik Gigi Aesthetic*.

## 1. Setup Lokal menggunakan Laragon
1. Salin seluruh folder `KlinikGigi` ke dalam folder root Laragon Anda (biasanya `C:\laragon\www`).
2. Buka Laragon dan pastikan layanan **Apache** dan **MySQL** sudah berjalan (Start All).
3. Buka browser dan ketik: `http://localhost/phpmyadmin` (atau gunakan fitur Database di Laragon / HeidiSQL).
4. Buat database baru bernama `klinik_gigi`.
5. Import atau jalankan isi dari file `database.sql` untuk membuat tabel `layanan` dan `reservasi`.
6. Buka browser dan ketik: `http://localhost/KlinikGigi`. Website sudah siap digunakan.

## 2. Panduan Hosting (Deployment)
Jika Anda ingin mengonline-kan website ini:
1. Pesan Hosting & Domain di penyedia hosting seperti Niagahoster, Hostinger, atau JagoanHosting.
2. Login ke cPanel hosting Anda.
3. Buka **MySQL Databases / Database Wizard**, lalu buat sebuah database baru. Ingat nama database, user database, dan passwordnya.
4. Buka **phpMyAdmin** dari cPanel. Pilih database yang baru dibuat, lalu pilih opsi **Import**. Unggah file `database.sql` dari komputer Anda lalu tekan OK.
5. Kembali ke cPanel, buka **File Manager**, lalu navigasi ke folder `public_html`.
6. Kompres/Zip isi dari folder `KlinikGigi` (bukan foldernya sendiri, tapi isinya) dan Upload (unggah) ke dalam `public_html`. Lalu ekstrak di sana.
7. Edit file `db.php` yang ada di `public_html`. Ubah bagian ini sesuai dengan informasi database di Hosting Anda:
   ```php
   $host = 'localhost'; // biasanya tetap localhost
   $user = 'user_database_anda'; 
   $pass = 'password_database_anda';     
   $dbname = 'nama_database_anda';
   ```
8. Simpan, dan website Anda sekarang bisa diakses melalui nama domain public Anda.

## 3. Panduan Backup Data Website
Untuk melakukan backup (mencadangkan) secara manual:
1. **Backup File**: Buka File Manager (di Laragon `www/KlinikGigi` atau `public_html` di cPanel). Compress (Zip) semua file yang ada lalu download ke komputer atau Google Drive Anda.
2. **Backup Database MySQL**: 
   - Buka phpMyAdmin (lokal atau cPanel).
   - Klik database `klinik_gigi` (atau nama db hosting Anda).
   - Klik tab **Export**.
   - Biarkan format tetap *SQL*.
   - Klik tombol **Go** atau **Export**. 
   - File berekstensi `.sql` akan terunduh. Simpan file ini dengan baik.

> **Catatan:** Lakukan kegiatan backup ini minimal seminggu sekali jika data reservasi yang masuk lumayan banyak.
