<?php

namespace App\Repository;

use PDO;
use App\Models\Classe;

class ClasseRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(Classe $classe): bool
    {
        $sql = "INSERT INTO classe (nom, annee_scolaire)
                VALUES (:nom, :annee_scolaire)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nom' => $classe->getNom(),
            'annee_scolaire' => $classe->getAnneeScolaire()
        ]);
    }
}
