<?php

function deleteImage(string $path) : void
{
    if($path && file_exists($path)){
        unlink($path);
    }
}

function uploadImage(array $image) : string
{
    if ($image && $image['tmp_name']) {
        $imagePath = "../../assets/images/" .randomString(8)."/".$image['name'];
        mkdir(dirname($imagePath));

        move_uploaded_file($image['tmp_name'], $imagePath);

        return $imagePath;
    }
}