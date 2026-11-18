<?php
require_once __DIR__ . '/../../models/Database.php';
require_once __DIR__ . '/../../models/MahasiswaRepository.php';
require_once __DIR__ . '/../../controllers/MahasiswaController.php';
require_once __DIR__ . '/../../models/Prodi.php';

$database = new Database();
$repository = new MahasiswaRepository($database);
$controller = new MahasiswaController($repository);

$prodiModel = new Prodi();
$prodi = $prodiModel->all();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller->store($_POST);
        header('Location: index.php');
        exit;
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    } catch (PDOException $e) {
        $error = 'Gagal menyimpan data: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>NIM</label><br>
            <input type="text" name="nim" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email">
        </p>

        <p>
            <label>Program Studi</label><br>
            <select name="prodi_id">
                <option value="">-- Pilih Program Studi --</option>
                <?php foreach ($prodi as $p): ?>
                    <option value="<?= $p['id'] ?>">
                        <?= htmlspecialchars($p['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label>Angkatan</label><br>
            <input type="number" name="angkatan" min="2000" max="2100">
        </p>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
