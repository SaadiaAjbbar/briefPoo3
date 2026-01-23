<?php

namespace App\Services;

use App\Models\Classe;
use App\Repository\ClasseRepository;

class ClasseService
{
    private ClasseRepository $classeRepository;

    public function __construct(ClasseRepository $classeRepository)
    {
        $this->classeRepository = $classeRepository;
    }

    public function addClasse(string $nom, string $anneeScolaire): bool
    {
        if (empty($nom) || empty($anneeScolaire)) {
            return false;
        }

        $classe = new Classe(null, $nom, $anneeScolaire);

        return $this->classeRepository->create($classe);
    }
}
