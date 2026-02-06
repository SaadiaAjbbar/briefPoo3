<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repository\FormateurRepository;
use App\Services\FormateurService;
use App\Models\User;

class AdminFormateurController extends Controller
{
    private FormateurRepository $repo;

    public function __construct()
    {
        parent::__construct();
        $this->repo = new FormateurRepository();
    }

    public function index(): void
    {
        $formateurs = $this->repo->all();

        $this->render('admin.formateurs.index', [
            'formateurs' => $formateurs
        ]);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom    = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $email  = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $service = new FormateurService($this->repo);

            if ($service->addFormateur($nom, $prenom, $email, $password)) {
                header('Location: /admin/formateurs');
                exit;
            } else {
                echo "Erreur lors de l'ajout du formateur";
            }
            return;
        }

        // GET request → afficher le formulaire
        $this->render('admin.formateurs.create');
    }

    public function edit(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /admin/formateurs');
            exit;
        }

        $service = new \App\Services\FormateurService($this->repo);
        $formateur = $service->getFormateur((int)$id);

        if (!$formateur) {
            echo "Formateur introuvable";
            return;
        }

        $this->render('admin.formateurs.edit', ['formateur' => $formateur]);
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? null;
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';

        if (!$id) {
            header('Location: /admin/formateurs');
            exit;
        }

        $service = new \App\Services\FormateurService($this->repo);
        $success = $service->updateFormateur((int)$id, $nom, $prenom, $email);

        if ($success) {
            header('Location: /admin/formateurs');
            exit;
        } else {
            echo "Erreur lors de la mise à jour";
        }
    }




    public function delete(): void
    {
        $this->repo->delete((int) $_GET['id']);

        header('Location: /admin/formateurs');
        exit;
    }
}
