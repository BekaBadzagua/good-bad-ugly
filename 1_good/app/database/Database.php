<?php

namespace app\database;

use app\models\Movie;
use app\utils\Utils;
use PDO;

class Database
{
    public $pdo;
    public static ?Database $database = null;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$database = $this;
    }
    
    public function getMovies()
    {
        $statement = $this->pdo->prepare('SELECT * FROM movies');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMovie($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM movies Where id = :id');
        $statement->bindValue(':id',$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function createMovie(Movie $movie)
    {
        $statement = $this->pdo->prepare('INSERT INTO movies (image, title, description) VALUES (:image,:title,:description)');
        $statement->bindValue(':image',$movie->imagePath);
        $statement->bindValue(':title',$movie->title);
        $statement->bindValue(':description',$movie ->description);
        $statement->execute();
    }
    public function updateMovie(Movie $movie)
    {
        if($movie->imagePath){
            $statement = $this->pdo->prepare("UPDATE movies SET title=:title, image =:image, description=:description  WHERE id = :id;");
            $statement->bindValue(':image', $movie->imagePath);
        }
        else{
            $statement = $this->pdo->prepare('UPDATE movies SET title = :title, description =:description  WHERE id = :id;');
        }
        $statement->bindValue(':id', $movie->id);
        $statement->bindValue(':title', $movie->title);
        $statement->bindValue(':description', $movie->description);
        $statement->execute();
    }
    public function deleteMovie($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM movies WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(empty($movies)){
            header('Location: /public');
            exit;
        }

        if ($movies[0]['image']) {
            Utils::deleteImage($movies[0]['image']);
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $statement = $this->pdo->prepare('DELETE FROM movies WHERE id = :id');
            $statement->bindValue(':id',$id);
            $statement->execute();
            header('Location: /public');
            exit;
        }
    }
}