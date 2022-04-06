<?php 
    $pdo = require_once 'database/database.php';
    require_once('shared/validation.php');
    require_once('shared/imageTools.php');
    require_once('shared/utils.php');

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

        $errors = validate($_POST['title'], $_POST['description']);

        deleteImage($movie['image']);
        $imagePath = uploadImage($_FILES['image']);

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

<?php require_once "views/layout/header.php" ?>
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
<?php require_once "views/layout/footer.php" ?>
