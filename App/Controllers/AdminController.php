<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function home()
    {
        
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            header('Location: /login');
            exit;
        }

        $this->view('admin/home');
    }
}
