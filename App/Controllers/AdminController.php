<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
   public function __construct()
{
    parent::__construct();
}
   public function home()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
        header('Location: /login');
        exit;
    }

    echo $this->view->run('admin.home');
}

}
