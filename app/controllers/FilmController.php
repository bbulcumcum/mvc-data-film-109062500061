<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);
        header('Location: index.php?page=film');
        exit;
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);
        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }
        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);
        $this->model->update($id, $data);
        header('Location: index.php?page=film');
        exit;
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $this->model->delete($id);
        header('Location: index.php?page=film');
        exit;
    }

    private function validateInput(array $input): array
    {
        $data = [
            'judul' => trim($input['judul'] ?? ''),
            'sutradara' => trim($input['sutradara'] ?? ''),
            'tahun' => (int) ($input['tahun'] ?? 0),
            'genre' => trim($input['genre'] ?? ''),
            'sinopsis' => trim($input['sinopsis'] ?? '')
        ];

        if ($data['judul'] === '' || $data['sutradara'] === '' || $data['tahun'] <= 0 || $data['genre'] === '') {
            exit('Judul, sutradara, tahun, dan genre wajib diisi dengan benar.');
        }

        return $data;
    }
}
?>