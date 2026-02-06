<?php
namespace App\Services;

use App\Models\User;
use App\Repository\FormateurRepository;

class FormateurService
{
    private FormateurRepository $repo;

    public function __construct(FormateurRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listFormateurs(): array
{
    return $this->repo->all(); 
}

    public function addFormateur(string $nom, string $prenom, string $email, string $password): bool
{
    if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
        return false;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $formateur = new User(
        null,            
        $nom,
        $prenom,
        $email,
        $hashedPassword,
        'FORMATEUR'      
    );

    return $this->repo->create($formateur);
}


    public function getFormateur(int $id): ?array
    {
        return $this->repo->findById($id);
    }

    public function updateFormateur(int $id, string $nom, string $prenom, string $email): bool
    {
        $formateur = new User(
            $id,
            $nom,
            $prenom,
            $email,
            '',
            'FORMATEUR'
        );

        return $this->repo->update($formateur);
    }

    public function deleteFormateur(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
