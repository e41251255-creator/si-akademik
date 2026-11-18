<?php

require_once __DIR__ . '/../app/models/Database.php';
require_once __DIR__ . '/../app/models/MahasiswaRepository.php';
require_once __DIR__ . '/../app/controllers/MahasiswaController.php';

$database = new Database();
$repository = new MahasiswaRepository($database);
$controller = new MahasiswaController($repository);

$keyword = trim($_GET['keyword'] ?? '');

$controller->halamanIndex($keyword);
