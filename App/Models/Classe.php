<?php

namespace App\Models;

class Classe
{
    private ?int $id;
    private string $nom;
    private string $anneeScolaire;

    public function __construct(?int $id, string $nom, string $anneeScolaire)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->anneeScolaire = $anneeScolaire;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAnneeScolaire(): string
    {
        return $this->anneeScolaire;
    }
}
