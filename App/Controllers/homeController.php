<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class HomeController extends Controller{
public function index(){
    echo "hiiiii";
    $this->view('home');
}
}