<?php 

use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();

$router->get('/', ['App\\Controllers\Home', 'index']);
$router->get('/office/{name}', ['App\\Controllers\Home', 'test']);
$router->post('home/create', ['App\\Controllers\Home', 'create']);
$router->get('office/{name}/test', ['App\\Controllers\Home', 'test2']);

