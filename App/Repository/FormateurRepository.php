<?php
namespace App\Repository;

use App\Core\Database;
use App\Models\User;
use PDO;

class FormateurRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


public function all(): array
    {
        $sql = "
            SELECT id, nom, prenom, email 
            FROM \"user\"
            WHERE role = 'FORMATEUR'
            ORDER BY nom
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(); 
    }


    public function create(User $user): bool
    {
        $sql = "INSERT INTO \"user\" (nom, prenom, email, password, role)
                VALUES (:nom, :prenom, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ]);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM \"user\" WHERE id = :id AND role = 'FORMATEUR'"
        );
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    public function update(User $user): bool
    {
        $sql = "UPDATE \"user\" 
                SET nom = :nom, prenom = :prenom, email = :email
                WHERE id = :id AND role = 'FORMATEUR'";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'id' => $user->getId()
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM \"user\" WHERE id = :id AND role = 'FORMATEUR'"
        );
        return $stmt->execute(['id' => $id]);
    }
}
