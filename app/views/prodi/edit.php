<?php
require_once __DIR__ . '/../../controllers/ProdiController.php';

$controller = new ProdiController();

$id = (int) ($_GET['id'] ?? 0);
$data = $controller->show($id);

if (!$data) {
    die('Data program studi tidak ditemukan.');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller->update($id, $_POST);
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        $error = 'Gagal mengubah data: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Prodi</title>
</head>
<body>
    <h1>Edit Program Studi</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Nama Program Studi</label><br>
            <input type="text" name="nama"
                   value="<?= htmlspecialchars($data['nama']) ?>" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
