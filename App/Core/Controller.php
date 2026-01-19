<?php
namespace App\Core;

abstract class Controller{

    public function view($view,$data=[]){
        extract($data);
        require_once '../Views/'.$view.'.php';

    }
}