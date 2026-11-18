<?php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <p>Sistem Informasi Akademik - Politeknik Negeri Jember</p>

    <a href="create.php">Tambah Mahasiswa</a>

    <h3>Pencarian Mahasiswa</h3>

    <form method="GET">
        <input
            type="text"
            name="keyword"
            placeholder="Cari berdasarkan NIM atau nama..."
            value="<?= htmlspecialchars($keyword) ?>"
        >
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Program Studi</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($mahasiswa)): ?>
                <tr>
                    <td colspan="7">Data mahasiswa tidak ditemukan.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($mahasiswa as $i => $m): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($m['nim']) ?></td>
                        <td><?= htmlspecialchars($m['nama']) ?></td>
                        <td><?= htmlspecialchars($m['email'] ?? '') ?></td>
                        <td><?= htmlspecialchars($m['prodi_nama'] ?? '-') ?></td>
                        <td><?= htmlspecialchars((string) ($m['angkatan'] ?? '-')) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $m['id'] ?>">Edit</a>
                            |
                            <a href="delete.php?id=<?= $m['id'] ?>"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
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

