<h1 class="header">Movies</h1>
<a href="../public/create" type="button" class="btn btn-success btn-add">Add Movie</a>

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
            <?php foreach ($movies as $index =>$movie):?>
            <tr>
                <th scope="row"><?php echo $index+1; ?></th>
                <td>
                    <?php if($movie['image']):?>
                        <img src="<?php echo $movie['image'] ?>" alt="movie_<?php echo $index+1; ?>">
                    <?php endif; ?>
                </td>
                <td><?php echo $movie['title']; ?></td>
                <td><?php echo $movie['description']; ?></td>
                <td><a href="/update?id=<?php echo $movie['id'];?>" type="button" class="btn btn-info">Update</button></td>
                <td>
                    <form action="/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $movie['id']?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>