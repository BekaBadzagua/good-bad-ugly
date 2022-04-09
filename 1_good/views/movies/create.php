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
