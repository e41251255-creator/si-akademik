<?php
require_once __DIR__ . '/../../controllers/ProdiController.php';

$controller = new ProdiController();

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    try {
        $controller->destroy($id);
    } catch (PDOException $e) {
        die('Prodi tidak dapat dihapus karena masih digunakan oleh data mahasiswa.');
    }
}

header('Location: index.php');
exit;
