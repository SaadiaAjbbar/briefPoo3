<?php

namespace App\Models;

class User
{
    public int $id;
    public string $prenom;
    public string $nom;
    public string $email;
    public string $password;
    public string $role;

    public function __construct(
        int $id = 0,
        string $prenom = '',
        string $nom = '',
        string $email = '',
        string $password = '',
        string $role = 'ETUDIANT'
    ) {
        $this->id         = $id;
        $this->prenom = $prenom;
        $this->nom  = $nom;
        $this->email      = $email;
        $this->password   = $password;
        $this->role       = $role;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'ADMIN';
    }

    public function isEtudiant(): bool
    {
        return $this->role === 'ETUDIANT';
    }
}
