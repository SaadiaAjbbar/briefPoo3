<?php
namespace App\Repository;

use App\Core\Database;
use PDO;

class SprintRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(string $nom, int $duree, string $ordre): bool
    {
        $stmt = $this->db->prepare("INSERT INTO sprint (nom, duree, ordre_chronologique) VALUES (:nom, :duree, :ordre)");
        return $stmt->execute(['nom'=>$nom, 'duree'=>$duree, 'ordre'=>$ordre]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM sprint ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM sprint WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, string $nom, int $duree, string $ordre)
    {
        $stmt = $this->db->prepare("UPDATE sprint SET nom=:nom, duree=:duree, ordre_chronologique=:ordre WHERE id=:id");
        return $stmt->execute(['nom'=>$nom,'duree'=>$duree,'ordre'=>$ordre,'id'=>$id]);
    }

    public function delete(int $id)
    {
        $stmt = $this->db->prepare("DELETE FROM sprint WHERE id=:id");
        return $stmt->execute(['id'=>$id]);
    }
}
