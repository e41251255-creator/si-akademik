<?php

class Mahasiswa
{
    private string $nim;
    private string $nama;
    private ?string $email;
    private ?int $prodi_id;
    private ?int $angkatan;

    public function __construct(
        string $nim = '',
        string $nama = '',
        ?string $email = null,
        ?int $prodi_id = null,
        ?int $angkatan = null
    ) {
        $this->setNim($nim);
        $this->setNama($nama);
        $this->setEmail($email);
        $this->setProdiId($prodi_id);
        $this->setAngkatan($angkatan);
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function setNim(string $nim): void
    {
        if ($nim !== '' && !ctype_digit($nim)) {
            throw new InvalidArgumentException('NIM harus berupa angka.');
        }

        $this->nim = $nim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNama(string $nama): void
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException('Nama tidak boleh kosong.');
        }

        $this->nama = $nama;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getProdiId(): ?int
    {
        return $this->prodi_id;
    }

    public function setProdiId(?int $prodi_id): void
    {
        $this->prodi_id = $prodi_id;
    }

    public function getAngkatan(): ?int
    {
        return $this->angkatan;
    }

    public function setAngkatan(?int $angkatan): void
    {
        $this->angkatan = $angkatan;
    }
}