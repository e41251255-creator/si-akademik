<?php

require_once __DIR__ . '/app/models/Mahasiswa.php';

try {
    $mahasiswa = new Mahasiswa(
        '2404111001',
        'Ilma',
        'ilma@example.com',
        1,
        2026
    );

    echo "NIM: " . $mahasiswa->getNim() . PHP_EOL;
    echo "Nama: " . $mahasiswa->getNama() . PHP_EOL;

    $mahasiswa->setNama('Ilma Nur Fadhilah');

    echo "Nama setelah diubah: " . $mahasiswa->getNama() . PHP_EOL;

    echo "Pengujian Getter dan Setter berhasil!";
} catch (InvalidArgumentException $e) {
    echo "Validasi gagal: " . $e->getMessage();
}
