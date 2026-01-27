<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo $this->view->run('home');
    }
}
