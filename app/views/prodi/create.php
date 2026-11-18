<?php
require_once __DIR__ . '/../../controllers/ProdiController.php';

$controller = new ProdiController();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller->store($_POST);
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        $error = 'Gagal menyimpan data: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Prodi</title>
</head>
<body>
    <h1>Tambah Program Studi</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Nama Program Studi</label><br>
            <input type="text" name="nama" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
