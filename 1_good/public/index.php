<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\controllers\MovieController;

$router = new Router();

$router->get('/',         [new MovieController(),'index']);
$router->get('/create',   [new MovieController(),'create']);
$router->post('/create',  [new MovieController(),'create']);
$router->get('/update',   [new MovieController(),'update']);
$router->post('/update',  [new MovieController(),'update']);
$router->post('/delete', [new MovieController(),'delete']);

$router->resolve();
