<?php

namespace app\database;

use PDO;

class Database
{
    public $pdo;
    public static ?Database $db = null;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }
    
    public function getMovies()
    {
        $statement = $this->pdo->prepare('SELECT * FROM movies');
        $statement->execute();
    
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}