<?php
namespace App\Repository;

use App\Core\Database;
use App\Models\Classe;
use PDO;

class ClasseRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(Classe $classe): bool
    {
        $sql = "INSERT INTO classe (nom, annee_scolaire) VALUES (:nom, :annee)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nom' => $classe->getNom(),
            'annee' => $classe->getAnneeScolaire()
        ]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM classe ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM classe WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
