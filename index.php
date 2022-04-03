<?php 
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=common', 'common', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM movies');
    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="content">
        <h1 class="header">Movies</h1>

        <button class="btn btn-success btn-add">Add Movie</button>

        <section class="dashboard">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index =>$product):?>
                    <tr>
                        <th scope="row"><?php echo $index+1; ?></th>
                        <td>
                            <?php if($product['image']):?>
                                <img src="<?php echo $product['image'] ?>" alt="movie_<?php echo $index+1; ?>">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><button class="btn btn-info">Update</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
