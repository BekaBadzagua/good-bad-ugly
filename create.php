<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Coming Soon..
    // $statement = $pdo->prepare('SELECT * FROM movies');
    // $statement->execute();

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    $errors = [
        'image' => '',
        'title' => '',
        'description' => '',
    ];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!$_FILES['image']['name']){
            $errors['image'] = 'Image is Required!';
        }
        if(!$_POST['title']){
            $errors['title'] = 'Title is Required!';
        }
        if(!$_POST['description']){
            $errors['description'] = 'Description is Required!';
        }

        if(!$errors['image'] && !$errors['title'] && !$errors['description']){
            // Save the Movie
            // Coming Soon..
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
                    <input type="text" name="description" value="<?php echo $_POST['description']?>">
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
