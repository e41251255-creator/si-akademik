<?php
require_once __DIR__ . '/../../controllers/MataKuliahController.php';

$controller = new MataKuliahController();

$id = (int) ($_GET['id'] ?? 0);
$data = $controller->show($id);

if (!$data) {
    die('Data mata kuliah tidak ditemukan.');
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
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h1>Edit Mata Kuliah</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>Kode Mata Kuliah</label><br>
            <input type="text" name="kode_mk"
                   value="<?= htmlspecialchars($data['kode_mk']) ?>" required>
        </p>

        <p>
            <label>Nama Mata Kuliah</label><br>
            <input type="text" name="nama_mk"
                   value="<?= htmlspecialchars($data['nama_mk']) ?>" required>
        </p>

        <p>
            <label>Jumlah SKS</label><br>
            <input type="number" name="sks" min="1" max="6"
                   value="<?= htmlspecialchars((string) $data['sks']) ?>" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
