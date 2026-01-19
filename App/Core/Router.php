<?php
namespace App\Core;
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
    echo $path;
}

}