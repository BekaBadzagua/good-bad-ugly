<?php

namespace app\controllers;

use app\database\Database;
use app\models\Movie;
use app\Router;

class MovieController
{
    public function index(Router $router)
    {
        $database = new Database();
        $movies = $database->getMovies();

        return $router->renderView('movies/index',['movies'=>$movies]);
    }
    
    public function create(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $movie = new Movie($_POST['id'],$_POST['title'],$_POST['description'],$_FILES['image']);
            $movie->save();
            header('Location: /public');
            exit;
        }
        return $router->renderView('movies/create');
    }
    
    public function update(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $movie = new Movie($_POST['id'],$_POST['title'],$_POST['description'],$_FILES['image']);
            $movie->save();
            header('Location: /public');
            exit;
        }
        else{
            $database = new Database();
            $movie = $database->getMovie($_GET['id']);
            return $router->renderView('movies/update',['movie'=>$movie]);
        }
    }
    
    public function delete()
    {
        $database = new Database();
        $database->deleteMovie($_POST['id']);
        header('Location: /public');
        exit;
    }
}