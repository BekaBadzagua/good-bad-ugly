<?php

namespace app\controllers;

use app\database\Database;
use app\Router;

class MovieController
{
    public function index(Router $router)
    {
        $database = new Database();
        $movies = $database->getMovies();

        return $router->renderView('movies/index',['movies'=>$movies]);
    }
    
    public function create()
    {
        // Coming Soon..
        return 'create Route';
    }
    
    public function update()
    {
        // Coming Soon..
        return 'update Route';
    }
    
    public function destroy()
    {
        // Coming Soon..
        return 'destroy Route';
    }
}