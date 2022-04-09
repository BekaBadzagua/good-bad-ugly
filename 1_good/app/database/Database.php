<?php

namespace app\database;

use app\models\Movie;
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

    public function createMovie(Movie $movie)
    {
        $statement = $this->pdo->prepare('INSERT INTO movies (image, title, description) VALUES (:image,:title,:description)');
        $statement->bindValue(':image',$movie->imagePath);
        $statement->bindValue(':title',$movie->title);
        $statement->bindValue(':description',$movie ->description);
        $statement->execute();
    }

}