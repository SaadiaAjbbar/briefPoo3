<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function showLogin(): void
    {
        $this->view('auth/login');
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

        session_start();
        $_SESSION['user'] = [
            'id'    => $user->id,
            'role'  => $user->role,
            'name'  => $user->first_name
        ];

        switch ($user->role) {
            case 'ADMIN':
                header('Location: /admin/home');
                break;

            case 'FORMATEUR':
                header('Location: /teacher/dashboard');
                break;

            case 'ETUDIANT':
                header('Location: /etudiant/dashboard');
                break;
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
