
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
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="https://searchengineland.com/wp-content/seloads/2015/08/movie-film-video-production-ss-1920.jpg" alt="movie_1"></td>
                        <td>Lord of the Rings</td>
                        <td>Use your own words, or search with titles, actors, directors, genres etc. We find movies for you to watch. Search tips.</td>
                        <td><button class="btn btn-info">Update</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><img src="https://searchengineland.com/wp-content/seloads/2015/08/movie-film-video-production-ss-1920.jpg" alt="movie_1"></td>
                        <td>Jacob</td>
                        <td>Use your own words, or search with titles, actors, directors, genres etc. We find movies for you to watch. Search tips.</td>
                        <td><button class="btn btn-info">Update</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><img src="https://searchengineland.com/wp-content/seloads/2015/08/movie-film-video-production-ss-1920.jpg" alt="movie_1"></td>
                        <td>Larry the Bird</td>
                        <td>Use your own words, or search with titles, actors, directors, genres etc. We find movies for you to watch. Search tips.</td>
                        <td><button class="btn btn-info">Update</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
