<?php
require_once __DIR__ . '/Database.php';

class MataKuliah
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM mata_kuliah ORDER BY kode_mk ASC"
        );

        return $stmt->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM mata_kuliah WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO mata_kuliah (kode_mk, nama_mk, sks)
             VALUES (:kode_mk, :nama_mk, :sks)"
        );

        return $stmt->execute([
            'kode_mk' => $data['kode_mk'],
            'nama_mk' => $data['nama_mk'],
            'sks' => $data['sks']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE mata_kuliah
             SET kode_mk = :kode_mk,
                 nama_mk = :nama_mk,
                 sks = :sks
             WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $id,
            'kode_mk' => $data['kode_mk'],
            'nama_mk' => $data['nama_mk'],
            'sks' => $data['sks']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM mata_kuliah WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }
}
