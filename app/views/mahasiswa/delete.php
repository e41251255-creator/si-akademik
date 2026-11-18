<?php
require_once __DIR__ . '/../../models/Database.php';
require_once __DIR__ . '/../../models/MahasiswaRepository.php';
require_once __DIR__ . '/../../controllers/MahasiswaController.php';

$database = new Database();
$repository = new MahasiswaRepository($database);
$controller = new MahasiswaController($repository);

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $controller->destroy($id);
}

header('Location: index.php');
exit;
