<?php

require_once __DIR__ . '/app/models/Database.php';
require_once __DIR__ . '/app/models/MahasiswaRepository.php';

try {
    $database = new Database();
    $repository = new MahasiswaRepository($database);

    echo "Repository berhasil dibuat!" . PHP_EOL;

    $data = $repository->all();

    echo "Jumlah data mahasiswa: " . count($data) . PHP_EOL;

} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
