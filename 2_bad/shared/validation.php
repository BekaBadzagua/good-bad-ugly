<?php 
/**
 * validate the form and return array of the errors
 * 
 * @param string $title title of the movie
 * @param string $description description of the movie
 * @param mixed $image object from $_FILES['image] specific to the movie
 * @return array
 */

function validate($title, $description, $image = null) : array
{
    $errors = [];
    if(!$title){
        $errors['title'] = 'Title is Required!';
    }
    if(!$description){
        $errors['description'] = 'Description is Required!';
    }
    if($image){
        if(!$image['name']){
            $errors['image'] = 'Image is Required!';
        }
    }

    return count($errors) ? $errors : [];
}