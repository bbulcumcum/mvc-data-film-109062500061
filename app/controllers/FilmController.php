<?php
// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_film";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengambil semua data film (Read)
function query($query_string) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query_string);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi Tambah Data (Create)
function tambah($data) {
    global $koneksi;
    // Variabel PHP tanpa spasi, mengambil data dari form input name="NamaFilm" dan name="GenreFilm"
    $NamaFilm  = htmlspecialchars($data['NamaFilm']);
    $GenreFilm = htmlspecialchars($data['GenreFilm']);

    $query = "INSERT INTO film (NamaFilm, GenreFilm) VALUES ('$NamaFilm', '$GenreFilm')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi Ubah Data (Update)
function ubah($data) {
    global $koneksi;
    $id    = $data['id'];
    $NamaFilm= htmlspecialchars($data['NamaFilm']);
    $GenreFilm = htmlspecialchars($data['GenreFilm']);

    $query = "UPDATE film SET NamaFilm = '$NamaFilm', GenreFilm = '$GenreFilm' WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi Hapus Data (Delete)
function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM film WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
?>