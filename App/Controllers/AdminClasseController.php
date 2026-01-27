<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Repository\ClasseRepository;
use App\Services\ClasseService;

class AdminClasseController extends Controller
{
    private ClasseService $classeService;

    public function __construct()
    {
        parent::__construct();
        $repo = new ClasseRepository();
        $this->classeService = new ClasseService($repo);
    }

    // Liste des classes
    public function index()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            header('Location: /login');
            exit;
        }

        $classes = $this->classeService->getAllClasses();

        echo $this->view->run('admin.classes.index', ['classes' => $classes]);
    }

    public function create()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $annee = $_POST['annee_scolaire'] ?? '';

            if ($this->classeService->addClasse($nom, $annee)) {
                header('Location: /admin/classes');
                exit;
            } else {
                $error = "Veuillez remplir tous les champs";
            }
        }

        echo $this->view->run('admin.classes.create', ['error' => $error ?? null]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $this->classeService->deleteClasse($id);
            header('Location: /admin/classes');
            exit;
        }
    }
}
