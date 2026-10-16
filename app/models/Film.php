<?php
require_once __DIR__ . '/../config/database.php';

class Film {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function getAllFilm() {
        $result = mysqli_query($this->conn, "SELECT * FROM film");
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getFilmById($id) {
        $result = mysqli_query($this->conn, "SELECT * FROM film WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    public function tambahDataFilm($data) {
        $nama  = htmlspecialchars($data['nama']);
        $genre = htmlspecialchars($data['genre']);

        $query = "INSERT INTO film (nama, genre) VALUES ('$nama', '$genre')";
        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }

    public function ubahDataFilm($data) {
        $id    = $data['id'];
        $nama  = htmlspecialchars($data['nama']);
        $genre = htmlspecialchars($data['genre']);

        $query = "UPDATE film SET nama = '$nama', genre = '$genre' WHERE id = $id";
        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }

    public function hapusDataFilm($id) {
        mysqli_query($this->conn, "DELETE FROM film WHERE id = $id");
        return mysqli_affected_rows($this->conn);
    }
}
?>