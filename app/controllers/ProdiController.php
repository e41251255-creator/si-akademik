<?php
require_once __DIR__ . '/../models/Prodi.php';

class ProdiController
{
    private Prodi $prodi;

    public function __construct()
    {
        $this->prodi = new Prodi();
    }

    public function index(): array
    {
        return $this->prodi->all();
    }

    public function show(int $id): array|false
    {
        return $this->prodi->find($id);
    }

    public function store(array $data): bool
    {
        return $this->prodi->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->prodi->update($id, $data);
    }

    public function destroy(int $id): bool
    {
        return $this->prodi->delete($id);
    }
}
