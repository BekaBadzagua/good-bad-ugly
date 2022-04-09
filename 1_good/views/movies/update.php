<h1 class="header">Update Movie <?php echo $id?></h1>
<section class="create-form">
    <form method="POST" enctype='multipart/form-data'>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $movie['title']?>">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea  name="description"><?php echo $movie['description']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
    </form>
</section>