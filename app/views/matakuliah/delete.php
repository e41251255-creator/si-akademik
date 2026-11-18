<?php
require_once __DIR__ . '/../../controllers/MataKuliahController.php';

$controller = new MataKuliahController();

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $controller->destroy($id);
}

header('Location: index.php');
exit;
