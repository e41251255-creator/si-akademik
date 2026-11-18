<?php
require_once __DIR__ . '/../../controllers/ProdiController.php';

$controller = new ProdiController();
$prodi = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Program Studi</title>
</head>
<body>
    <h1>Data Program Studi</h1>

    <a href="create.php">Tambah Prodi</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($prodi)): ?>
                <tr>
                    <td colspan="4">Belum ada data program studi.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($prodi as $i => $p): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['nama']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a>
                            |
                            <a href="delete.php?id=<?= $p['id'] ?>"
                               onclick="return confirm('Yakin ingin menghapus prodi ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
