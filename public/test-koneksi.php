<?php

require_once __DIR__ . '/../app/models/Database.php';

try {
    $pdo = Database::getInstance();

    echo "Koneksi database berhasil!";
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
}