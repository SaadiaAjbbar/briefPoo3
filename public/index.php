<?php 

class Router{

private $list=[];

public function get($uri,$action){
    $this->list['GET'][$uri]=$action;
}
public function post($uri,$action){
    $this->list['POST'][$uri]=$action;
}

public function dispatch(){
    $path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $methode=$_SERVER['REQUEST_METHOD'];
    $act=$this->list[$methode][$path];
    $nomController=explode('@',$act)[0];
    $functionController=explode('@',$act)[1];
    require_once '../App/Controllers/'.$nomController.'.php';
    $nomContr=new $nomController();
    $nomContr->$functionController();
}

}

$router=new Router();
$router->get('/','homeController@index');

$router->dispatch();
