<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\controllers\MovieController;

$router = new Router();

$router->get('/',         [MovieController:class,'index']);
$router->get('/create',   [MovieController:class,'create']);
$router->post('/create',  [MovieController:class,'create']);
$router->get('/update',   [MovieController:class,'update']);
$router->post('/update',  [MovieController:class,'update']);
$router->post('/destroy', [MovieController:class,'destroy']);

$router->resolve();