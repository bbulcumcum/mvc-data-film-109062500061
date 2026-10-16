<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_film";
    private $conn;

    public function __construct() {
        // Melakukan koneksi ke database MySQL
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        // Cek koneksi
        if (!$this->conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    }

    // Mengembalikan objek koneksi agar bisa digunakan oleh Model
    public function getConnection() {
        return $this->conn;
    }
}
?>