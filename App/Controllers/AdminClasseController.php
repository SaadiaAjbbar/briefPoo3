<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Repository\ClasseRepository;
use App\Services\ClasseService;

class AdminClasseController extends Controller
{
    public function create()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $annee = $_POST['annee_scolaire'] ?? '';

            $db = Database::getInstance()->getConnection();
            $repo = new ClasseRepository($db);
            $service = new ClasseService($repo);

            if ($service->addClasse($nom, $annee)) {
                header('Location: /admin/classes');
                exit;
            }
        }

        $this->view('admin/classes/create');
    }
}
