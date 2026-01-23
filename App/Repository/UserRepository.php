<?php

namespace App\Repository;

use App\Core\Database;
use App\Models\User;
use PDO;

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM "user" WHERE email = :email LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User(
            $data['id'],
            $data['prenom'],
            $data['nom'],
            $data['email'],
            $data['password'],
            $data['role']
        );
    }
}
