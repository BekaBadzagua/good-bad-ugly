<?php

namespace app\utils;

class Utils
{
    static public function randomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }

        return $str;
    }

    static public function uploadImage(array $image) : string
    {
        if ($image && $image['tmp_name']) {
            $imagePath = dirname(dirname(__DIR__))."/public/images/" .Utils::randomString(8)."/".$image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
    
            return $imagePath;
        }
    }
}
