<?php

require_once __DIR__ . '/../core/BaseController.php';

require_once __DIR__ . '/../models/Mahasiswa.php';
require_once __DIR__ . '/../models/MahasiswaRepository.php';

class MahasiswaController extends BaseController {
    private MahasiswaRepository $repository;

    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): array
    {
        return $this->repository->all();
    }


    public function halamanIndex(string $keyword = ''): void
    {
        $mahasiswa = $keyword !== ''
            ? $this->repository->search($keyword)
            : $this->repository->all();

        $this->view('mahasiswa/index', [
            'mahasiswa' => $mahasiswa,
            'keyword' => $keyword
        ]);
    }
    public function search(string $keyword): array
    {
        return $this->repository->search($keyword);
    }

    public function show(int $id): array|false
    {
        return $this->repository->find($id);
    }

    public function store(array $data): bool
    {
        $mahasiswa = $this->buatObjekMahasiswa($data);

        return $this->repository->create($this->ubahKeArray($mahasiswa));
    }

    public function update(int $id, array $data): bool
    {
        $mahasiswa = $this->buatObjekMahasiswa($data);

        return $this->repository->update(
            $id,
            $this->ubahKeArray($mahasiswa)
        );
    }

    public function destroy(int $id): bool
    {
        return $this->repository->delete($id);
    }

    private function buatObjekMahasiswa(array $data): Mahasiswa
    {
        return new Mahasiswa(
            (string) $data['nim'],
            (string) $data['nama'],
            $data['email'] ?? null,
            !empty($data['prodi_id']) ? (int) $data['prodi_id'] : null,
            !empty($data['angkatan']) ? (int) $data['angkatan'] : null
        );
    }

    private function ubahKeArray(Mahasiswa $mahasiswa): array
    {
        return [
            'nim' => $mahasiswa->getNim(),
            'nama' => $mahasiswa->getNama(),
            'email' => $mahasiswa->getEmail(),
            'prodi_id' => $mahasiswa->getProdiId(),
            'angkatan' => $mahasiswa->getAngkatan()
        ];
    }
}


