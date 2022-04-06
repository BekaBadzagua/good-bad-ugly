<?php 
    require_once('shared/utils.php');
    $pdo = require_once 'database/database.php';
    
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Validate
        if(!$_FILES['image']['name']){
            $errors['image'] = 'Image is Required!';
        }
        if(!$_POST['title']){
            $errors['title'] = 'Title is Required!';
        }
        if(!$_POST['description']){
            $errors['description'] = 'Description is Required!';
        }

        // Upload Image
        $imagePath = '';
        if ($_FILES['image'] && $_FILES['image']['tmp_name']) {
            $imagePath = 'assets/images/movies/' . randomString(8) . '/' . $_FILES['image']['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        // Upload Movie
        if(!$errors['image'] && !$errors['title'] && !$errors['description']){
            $statement = $pdo->prepare('INSERT INTO movies (image, title, description) VALUES (:image,:title,:description)');
            $statement->bindValue(':image',$imagePath);
            $statement->bindValue(':title',$_POST['title']);
            $statement->bindValue(':description',$_POST['description']);
            $statement->execute();

            header("Location: index.php");
            die();
        }
    }
?>

<?php require_once "views/layout/header.php"?>
    <h1 class="header">Add Movie</h1>
    <section class="create-form">
        <form method="POST" enctype='multipart/form-data'>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image">
                <?php if($errors['image']): ?>
                    <span class="error-message">* <?php echo $errors['image'] ?></span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $_POST['title']?>">
                <?php if($errors['title']): ?>
                    <span class="error-message">* <?php echo $errors['title'] ?></span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea  name="description" value="<?php echo $_POST['description']?>"></textarea>
                <?php if($errors['description']): ?>
                    <span class="error-message">* <?php echo $errors['description'] ?></span>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </form>
    </section>
<?php require_once "views/layout/footer.php" ?>
