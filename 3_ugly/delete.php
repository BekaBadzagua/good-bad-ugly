<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$_POST['id']) {
        header('Location: index.php');
        exit;
    }

    $statement = $pdo->prepare("SELECT * FROM movies WHERE id = :id");
    $statement->bindValue(':id', $_POST['id']);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(empty($movies)){
        header('Location: index.php');
        exit;
    }

    if ($movies[0]['image']) {
        unlink($movies[0]['image']);
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $statement = $pdo->prepare('DELETE FROM movies WHERE id = :id');
        $statement->bindValue(':id',$_POST['id']);
        $statement->execute();
        header("Location: index.php");
        die();
    }
