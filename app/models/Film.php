<?php
class Film
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT id, judul, sutradara, tahun, genre, sinopsis FROM films ORDER BY judul');
        return $stmt->fetchAll();
    }

    public function findById(int $id): array | false
    {
        $stmt = $this->db->prepare('SELECT id, judul, sutradara, tahun, genre, sinopsis FROM films WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO films (judul, sutradara, tahun, genre, sinopsis) VALUES (:judul, :sutradara, :tahun, :genre, :sinopsis)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul' => $data['judul'],
            ':sutradara' => $data['sutradara'],
            ':tahun' => $data['tahun'],
            ':genre' => $data['genre'],
            ':sinopsis' => $data['sinopsis']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE films SET judul = :judul, sutradara = :sutradara, tahun = :tahun, genre = :genre, sinopsis = :sinopsis WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':judul' => $data['judul'],
            ':sutradara' => $data['sutradara'],
            ':tahun' => $data['tahun'],
            ':genre' => $data['genre'],
            ':sinopsis' => $data['sinopsis']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM films WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
?>