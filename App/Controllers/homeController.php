<?php
require_once '../Core/Controller.php';
require_once '../Core/Database.php';
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