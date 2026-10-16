CREATE DATABASE IF NOT EXISTS db_film
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
USE db_film;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    tahun_rilis SMALLINT NOT NULL,
    rating DECIMAL(3,1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO film (judul, genre, sutradara, tahun_rilis, rating) VALUES
('Spiderman', 'Action', 'Sam Raimi', 2002, 7.4),
('Inception', 'Sci-Fi', 'Christopher Nolan', 2010, 8.8),
('Laskar Pelangi', 'Drama', 'Riri Riza', 2008, 7.8);
