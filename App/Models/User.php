<?php

namespace App\Models;

class User
{
    private ?int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private string $role;
    private ?int $classeId;

    public function __construct(
        ?int $id,
        string $nom,
        string $prenom,
        string $email,
        string $password,
        string $role,
        ?int $classeId = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->classeId = $classeId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function getClasseId(): ?int
    {
        return $this->classeId;
    }
}
