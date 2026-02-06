<?php

namespace App\Services;

use App\Repository\UserRepository;

class AuthService
{
    private UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function login(string $email, string $password)
    {
        $user = $this->userRepo->findByEmail($email);

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user->getPassword())) {
            return null;
        }

        return $user;
    }
}
