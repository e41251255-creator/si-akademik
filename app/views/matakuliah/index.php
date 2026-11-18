<?php
require_once __DIR__ . '/../../controllers/MataKuliahController.php';

$controller = new MataKuliahController();
$mataKuliah = $controller->index();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
</head>
<body>
    <h1>Data Mata Kuliah</h1>

    <a href="create.php">Tambah Mata Kuliah</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($mataKuliah)): ?>
                <tr>
                    <td colspan="5">Belum ada data mata kuliah.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($mataKuliah as $i => $mk): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($mk['kode_mk']) ?></td>
                        <td><?= htmlspecialchars($mk['nama_mk']) ?></td>
                        <td><?= htmlspecialchars((string) $mk['sks']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $mk['id'] ?>">Edit</a>
                            |
                            <a href="delete.php?id=<?= $mk['id'] ?>"
                               onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
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
