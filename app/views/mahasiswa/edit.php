<?php
require_once __DIR__ . '/../../models/Database.php';
require_once __DIR__ . '/../../models/MahasiswaRepository.php';
require_once __DIR__ . '/../../controllers/MahasiswaController.php';
require_once __DIR__ . '/../../models/Prodi.php';

$database = new Database();
$repository = new MahasiswaRepository($database);
$controller = new MahasiswaController($repository);

$prodiModel = new Prodi();

$id = (int) ($_GET['id'] ?? 0);
$data = $controller->show($id);

if (!$data) {
    die('Data mahasiswa tidak ditemukan.');
}

$prodi = $prodiModel->all();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller->update($id, $_POST);
        header('Location: index.php');
        exit;
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    } catch (PDOException $e) {
        $error = 'Gagal mengubah data: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <p>
            <label>NIM</label><br>
            <input type="text" name="nim"
                   value="<?= htmlspecialchars($data['nim']) ?>" required>
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama"
                   value="<?= htmlspecialchars($data['nama']) ?>" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="<?= htmlspecialchars($data['email'] ?? '') ?>">
        </p>

        <p>
            <label>Program Studi</label><br>
            <select name="prodi_id">
                <option value="">-- Pilih Program Studi --</option>
                <?php foreach ($prodi as $p): ?>
                    <option value="<?= $p['id'] ?>"
                        <?= $data['prodi_id'] == $p['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label>Angkatan</label><br>
            <input type="number" name="angkatan"
                   value="<?= htmlspecialchars((string) ($data['angkatan'] ?? '')) ?>">
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
