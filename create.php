<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Coming Soon..
    // $statement = $pdo->prepare('SELECT * FROM movies');
    // $statement->execute();

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
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description">
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>
        </section>
    </div>
</body>
</html>
