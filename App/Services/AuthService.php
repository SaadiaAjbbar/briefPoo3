<?php

namespace App\Services;

use App\Repository\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        
    }

    public function login(string $email, string $password)
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user->password)) {
            return null;
        }

        return $user;
    }
}
