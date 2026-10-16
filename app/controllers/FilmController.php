<?php
// Panggil file model Film
require_once __DIR__ . '/../models/Film.php';

class FilmController {
    private $model;

    public function __construct() {
        // Inisialisasi objek Model Film
        $this->model = new Film();
    }

    public function index() {
        return $this->model->getAllFilm();
    }

    public function tambah($data) {
        return $this->model->tambahDataFilm($data);
    }

    public function edit($id) {
        return $this->model->getFilmById($id);
    }

    public function update($data) {
        return $this->model->ubahDataFilm($data);
    }

    public function hapus($id) {
        return $this->model->hapusDataFilm($id);
    }
}
?>