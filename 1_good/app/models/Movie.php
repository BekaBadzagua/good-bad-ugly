<?php

namespace app\models;

use app\database\Database;
use app\utils\Utils;

class Movie
{
    public ?string $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?array $image = null;
    public ?string $imagePath = null;

    function __construct(string $id = null, string $title = null, string $description = null, mixed $image = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    public function save()
    {
        if($this->isValid()){
            if($this->image){
                $this->imagePath = Utils::uploadImage($this->image);
            }
            $database = new Database();
            if($this->id){
                $database->updateMovie($this);
            }
            else {
                $database->createMovie($this);
            }
        }
    }

    function isValid() : bool
    {
        return $this->title && $this->description;
    }
}