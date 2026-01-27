<?php
namespace App\Services;

use App\Models\Classe;
use App\Repository\ClasseRepository;

class ClasseService
{
    private ClasseRepository $repo;

    public function __construct(ClasseRepository $repo)
    {
        $this->repo = $repo;
    }

    public function addClasse(string $nom, string $anneeScolaire): bool
    {
        if (empty($nom) || empty($anneeScolaire)) {
            return false;
        }
        $classe = new Classe(null, $nom, $anneeScolaire);
        return $this->repo->create($classe);
    }

    public function getAllClasses(): array
    {
        return $this->repo->getAll();
    }

    public function deleteClasse(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
