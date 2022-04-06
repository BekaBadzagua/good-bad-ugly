<?php 
    require_once('../../utils/utils.php');

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!$_GET['id'] && !$_POST['id']){
        header('Location: index.php');
        exit;
    }

    $statement = $pdo->prepare('SELECT * FROM movies WHERE id = :id');
    $statement->bindValue(':id',$_GET['id'] ?? $_POST['id']);
    $statement->execute();
    $movie = $statement->fetchAll(PDO::FETCH_ASSOC)[0];

    if(!$movie){
        header('Location: index.php');
        exit;
    }

    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Validate
        if(!$_POST['title']){
            $errors['title'] = 'Title is Required!';
        }
        if(!$_POST['description']){
            $errors['description'] = 'Description is Required!';
        }

        // Upload Image
        $imagePath = null;
        if ($_FILES['image'] && $_FILES['image']['tmp_name']) {
            if($movie['image']){
                unlink($movie['image']);
            }
            $imagePath = 'assets/images/movies/' . randomString(8) . '/' . $_FILES['image']['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        // Update Movie
        if(!$errors['title'] && !$errors['description']){
            if($imagePath){
                $statement = $pdo->prepare("UPDATE movies SET title=:title, image =:image, description=:description  WHERE id = :id;");
                $statement->bindValue(':image', $imagePath);
            }
            else{
                $statement = $pdo->prepare('UPDATE movies SET title = :title, description =:description  WHERE id = :id;');
            }
            $statement->bindValue(':title', $_POST['title']);
            $statement->bindValue(':description', $_POST['description']);
            $statement->bindValue(':id', $_POST['id']);
            $statement->execute();

            header("Location: index.php");
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="content">
        <h1 class="header">Update Movie <?php echo $id?></h1>
        <section class="create-form">
            <form method="POST" enctype='multipart/form-data'>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
            </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                    <?php if($errors['image']): ?>
                        <span class="error-message">* <?php echo $errors['image'] ?></span>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $movie['title']?>">
                    <?php if($errors['title']): ?>
                        <span class="error-message">* <?php echo $errors['title'] ?></span>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea  name="description"><?php echo $movie['description']?></textarea>
                    <?php if($errors['description']): ?>
                        <span class="error-message">* <?php echo $errors['description'] ?></span>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>
        </section>
    </div>
</body>
</html>
