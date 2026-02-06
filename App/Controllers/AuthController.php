<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct()
    {
        parent::__construct();              // 🔥 مهم
        $this->authService = new AuthService(); // 🔥 مهم
    }

    public function showLogin(): void
    {
        echo $this->view->run('auth.login');
    }

    public function login(): void
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->authService->login($email, $password);

        if (!$user) {
            echo "Email ou mot de passe incorrect";
            return;
        }

        $_SESSION['user'] = [
            'id'   => $user->getId(),
            'role' => $user->getRole(),
            'name' => $user->getPrenom()
        ];

        if ($user->getRole() === 'ADMIN') {
            header('Location: /admin/home');
            exit;
        }


        exit;
    }


    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
