-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_film;
USE db_film;

-- Membuat tabel film dengan kolom yang disinkronkan
CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    NamaFilm Film film VARCHAR(150) NOT NULL,
    GenreFilm Film film VARCHAR(100) NOT NULL
);

-- Memasukkan data contoh sesuai dengan data statis di index.php Anda
INSERT INTO film (id, NamaFilm Film, GenreFilm Film) VALUES 
(1, 'Spiderman', 'Action');