<?php

namespace app\controllers;

use app\Router;

class MovieController
{
    public function index(Router $router)
    {
        // take data from database

        // render view
        return $router->renderView('movies/index',['foo'=>'asdasdasd']);
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