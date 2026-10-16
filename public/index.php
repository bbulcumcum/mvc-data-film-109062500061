<?php
// public/index.php

// Panggil Controller Film yang berada di folder app/controllers/
require_once '../mvc-data-film/app/controllers/FilmController.php';

// Inisialisasi objek Controller
$controller = new FilmController();

// Ambil data seluruh film melalui fungsi/metode di controller
$films = $controller->index();

// Muat tampilan (View) daftar film
require_once '../app/views/film/index.php';
?>