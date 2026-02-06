<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repository\SprintRepository;
use App\Services\SprintService;

class AdminSprintController extends Controller
{
    private SprintService $sprintService;

    public function __construct()
    {
        parent::__construct();
        $repo = new SprintRepository();
        $this->sprintService = new SprintService($repo);
    }

    // Liste des sprints
    public function index()
    {
        $sprints = $this->sprintService->getAllSprints();
        echo $this->view->run('admin.sprints.index', ['sprints' => $sprints]);
    }

    // Création sprint
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $duree = $_POST['duree'] ?? '';
            $ordre = $_POST['ordre_chronologique'] ?? '';

            if ($this->sprintService->addSprint($nom, $duree, $ordre)) {
                header('Location: /admin/sprints');
                exit;
            } else {
                $error = "Veuillez remplir tous les champs";
            }
        }
        echo $this->view->run('admin.sprints.create', ['error' => $error ?? null]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0; // khoud id mn query string
        $sprint = $this->sprintService->getSprintById($id);

        if (!$sprint) {
            echo "Sprint introuvable";
            return;
        }

        echo $this->view->run('admin.sprints.edit', ['sprint' => $sprint]);
    }

    public function update()
    {
        $id = $_GET['id'] ?? 0;
        $nom = $_POST['nom'] ?? '';
        $duree = $_POST['duree'] ?? '';
        $ordre = $_POST['ordre_chronologique'] ?? '';

        $this->sprintService->updateSprint($id, $nom, $duree, $ordre);

        header('Location: /admin/sprints');
        exit;
    }


    // Supprimer sprint
    public function delete()
    {
        $id = $_POST['id'] ?? 0;
        $this->sprintService->deleteSprint($id);
        header('Location: /admin/sprints');
        exit;
    }
}
