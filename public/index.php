<?php


session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();


$router->get('/', 'HomeController@index');


$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->get('/admin/home', 'AdminController@home');

$router->get('/admin/classes/create', 'AdminClasseController@create');
$router->post('/admin/classes/create', 'AdminClasseController@create');

$router->dispatch();
