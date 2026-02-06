<?php
namespace App\Services;

use App\Repository\SprintRepository;

class SprintService
{
    private SprintRepository $repo;

    public function __construct(SprintRepository $repo)
    {
        $this->repo = $repo;
    }

    public function addSprint(string $nom, int $duree, string $ordre): bool
    {
        if (empty($nom) || empty($duree) || empty($ordre)) return false;
        return $this->repo->create($nom, $duree, $ordre);
    }

    public function getAllSprints(): array
    {
        return $this->repo->getAll();
    }

    public function getSprintById(int $id)
    {
        return $this->repo->getById($id);
    }

    public function updateSprint(int $id, string $nom, int $duree, string $ordre)
    {
        return $this->repo->update($id, $nom, $duree, $ordre);
    }

    public function deleteSprint(int $id)
    {
        return $this->repo->delete($id);
    }
}
