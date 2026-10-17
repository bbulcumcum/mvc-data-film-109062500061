<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        $flash = $this->pullFlash();
        $old   = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data  = $this->validateInput($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $_SESSION['old'] = $data;
            $this->redirect('create', $error, 'error');
        }

        try {
            $this->model->insert($data);
            $this->redirect('index', 'Data film berhasil ditambahkan.', 'success');
        } catch (PDOException $e) {
            $this->redirect('index', 'Gagal menambahkan data film.', 'error');
        }
    }

    public function edit(): void
    {
        $id   = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }

        $flash = $this->pullFlash();
        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id    = (int) ($_POST['id'] ?? 0);
        $data  = $this->validateInput($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $this->redirect('edit&id=' . $id, $error, 'error');
        }

        try {
            $this->model->update($id, $data);
            $this->redirect('index', 'Data film berhasil diperbarui.', 'success');
        } catch (PDOException $e) {
            $this->redirect('index', 'Gagal memperbarui data film.', 'error');
        }
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->redirect('index', 'Data film berhasil dihapus.', 'success');
        } catch (PDOException $e) {
            $this->redirect('index', 'Gagal menghapus data film.', 'error');
        }
    }

    private function validateInput(array $input): array
    {
        return [
            'judul'       => trim($input['judul'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'sutradara'   => trim($input['sutradara'] ?? ''),
            'tahun_rilis' => trim($input['tahun_rilis'] ?? ''),
            'rating'      => trim($input['rating'] ?? '')
        ];
    }

    private function validate(array $d): ?string
    {
        foreach ($d as $value) {
            if ($value === '') {
                return 'Semua field wajib diisi.';
            }
        }
        if (!ctype_digit($d['tahun_rilis']) || (int) $d['tahun_rilis'] < 1888 || (int) $d['tahun_rilis'] > 2100) {
            return 'Tahun rilis harus berupa angka antara 1888 dan 2100.';
        }
        if (!is_numeric($d['rating']) || $d['rating'] < 0 || $d['rating'] > 10) {
            return 'Rating harus berupa angka antara 0 dan 10.';
        }
        return null;
    }

    private function redirect(string $action, string $message, string $type): never
    {
        $_SESSION['flash'] = ['message' => $message, 'type' => $type];
        header('Location: index.php?page=film&action=' . $action);
        exit;
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }
}
