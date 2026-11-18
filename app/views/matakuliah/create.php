<?php
require_once __DIR__ . '/../../controllers/MataKuliahController.php';

$controller = new MataKuliahController();
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
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Kode Mata Kuliah</label><br>
            <input type="text" name="kode_mk" required>
        </p>

        <p>
            <label>Nama Mata Kuliah</label><br>
            <input type="text" name="nama_mk" required>
        </p>

        <p>
            <label>Jumlah SKS</label><br>
            <input type="number" name="sks" min="1" max="6" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
