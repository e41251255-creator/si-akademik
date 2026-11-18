<?php

require_once __DIR__ . '/BaseModel.php';

class MahasiswaRepository extends BaseModel {

    public function all(): array
    {
        $sql = "SELECT m.*, p.nama AS prodi_nama
                FROM mahasiswa m
                LEFT JOIN prodi p ON m.prodi_id = p.id
                ORDER BY m.nim ASC";

        return $this->db->query($sql)->fetchAll();
    }

    public function search(string $keyword): array
    {
        $sql = "SELECT m.*, p.nama AS prodi_nama
                FROM mahasiswa m
                LEFT JOIN prodi p ON m.prodi_id = p.id
                WHERE m.nama LIKE :nama OR m.nim LIKE :nim
                ORDER BY m.nim ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'nama' => '%' . $keyword . '%',
            'nim' => '%' . $keyword . '%'
        ]);

        return $stmt->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM mahasiswa WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO mahasiswa
                (nim, nama, email, prodi_id, angkatan)
                VALUES (:nim, :nama, :email, :prodi_id, :angkatan)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'] ?? null,
            'prodi_id' => $data['prodi_id'] ?: null,
            'angkatan' => $data['angkatan'] ?: null,
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE mahasiswa
                SET nim = :nim, nama = :nama, email = :email,
                    prodi_id = :prodi_id, angkatan = :angkatan
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'] ?? null,
            'prodi_id' => $data['prodi_id'] ?: null,
            'angkatan' => $data['angkatan'] ?: null,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM mahasiswa WHERE id = :id"
        );

        return $stmt->execute(['id' => $id]);
    }
}

