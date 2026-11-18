<?php
require_once __DIR__ . '/../models/MataKuliah.php';

class MataKuliahController
{
    private MataKuliah $mataKuliah;

    public function __construct()
    {
        $this->mataKuliah = new MataKuliah();
    }

    public function index(): array
    {
        return $this->mataKuliah->all();
    }

    public function show(int $id): array|false
    {
        return $this->mataKuliah->find($id);
    }

    public function store(array $data): bool
    {
        return $this->mataKuliah->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->mataKuliah->update($id, $data);
    }

    public function destroy(int $id): bool
    {
        return $this->mataKuliah->delete($id);
    }
}
