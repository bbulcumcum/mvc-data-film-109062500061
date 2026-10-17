# Aplikasi Data Film (PHP Native MVC)

Nama : [nama lengkap]
NIM  : [NIM]
Kelas: [kelas]

## Tentang Aplikasi
Ini adalah aplikasi CRUD sederhana untuk mengelola data film. Aplikasi dibuat dengan PHP Native memakai pola MVC (Model, View, Controller) dan database MySQL lewat PDO. Aplikasi ini dibuat untuk tugas akhir praktikum Pemrograman Web dengan tema Data Film.

## Fitur
- Menampilkan daftar film
- Menambah film baru
- Mengubah data film
- Menghapus data film
- Validasi input: semua kolom wajib diisi, tahun rilis dan rating dibatasi
- Pesan berhasil atau gagal setelah tambah, ubah, dan hapus

## Data yang Disimpan
Tabel `film` punya kolom berikut:
- id
- judul
- genre
- sutradara
- tahun_rilis
- rating

## Yang Dibutuhkan
- PHP 8.0 atau lebih baru
- MySQL / MariaDB
- XAMPP
- Git

## Cara Menjalankan
1. Salin folder project ini ke `C:\xampp\htdocs\`, jadi hasilnya `C:\xampp\htdocs\mvc-data-film`.
2. Nyalakan Apache dan MySQL di XAMPP.
3. Buka phpMyAdmin (`http://localhost/phpmyadmin`), lalu import file `database/film.sql`.
4. Cek pengaturan koneksi di `config/database.php`. Bawaan XAMPP: user `root`, password kosong, database `db_film`.
5. Buka `http://localhost/mvc-data-film/public/index.php` di browser.

## Struktur Folder
```
mvc-data-film/
├── app/
│   ├── controllers/   FilmController.php
│   ├── models/        Film.php
│   └── views/film/    index.php, create.php, edit.php
├── config/            database.php
├── database/          film.sql
├── public/            index.php, style.css
├── .gitignore
└── README.md
```

## Cara Kerja Singkat
1. Browser membuka `public/index.php`.
2. File itu membaca `page` dan `action` dari URL, lalu memanggil method di Controller.
3. Controller meminta data ke Model kalau butuh data dari database.
4. Model menjalankan query lewat PDO memakai prepared statement.
5. Controller mengirim hasilnya ke View, lalu View menampilkan HTML ke browser.

## Riwayat Git
Hasil `git log --oneline`:

```
[tempel hasil git log di sini]
```