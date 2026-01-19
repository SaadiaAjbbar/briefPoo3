<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class homeController extends Controller{
private $db;
public function __construct()
{
    $this->db=new Database('localhost', 'root', 'wahiba06', 'TestDb');
}
public function index(){
    echo "hiiiii";
    $this->view('home');
}
}