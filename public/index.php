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

// crud des classes
$router->get('/admin/classes', 'AdminClasseController@index');

$router->get('/admin/classes/create', 'AdminClasseController@create');
$router->post('/admin/classes/create', 'AdminClasseController@create');
$router->post('/admin/classes/delete', 'AdminClasseController@delete');


// crud sprints
$router->get('/admin/sprints', 'AdminSprintController@index');
$router->get('/admin/sprints/create', 'AdminSprintController@create');
$router->post('/admin/sprints/create', 'AdminSprintController@create');

$router->get('/admin/sprints/edit', 'AdminSprintController@edit');
$router->post('/admin/sprints/edit', 'AdminSprintController@update');


$router->post('/admin/sprints/delete', 'AdminSprintController@delete');

$router->get('/admin/formateurs', 'AdminFormateurController@index');

$router->get('/admin/formateurs/create', 'AdminFormateurController@create');
$router->post('/admin/formateurs/create', 'AdminFormateurController@create');

$router->get('/admin/formateurs/edit', 'AdminFormateurController@edit');
$router->post('/admin/formateurs/edit', 'AdminFormateurController@update');

$router->get('/admin/formateurs/delete', 'AdminFormateurController@delete');


$router->dispatch();
