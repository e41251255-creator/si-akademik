<?php
require_once __DIR__ . '/Database.php';

class Prodi
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM prodi ORDER BY nama ASC"
        );

        return $stmt->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM prodi WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO prodi (nama) VALUES (:nama)"
        );

        return $stmt->execute([
            'nama' => $data['nama']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE prodi SET nama = :nama WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $id,
            'nama' => $data['nama']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM prodi WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }
}
