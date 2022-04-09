<?php

namespace app;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get(string $url, array $function) : void
    {
        $this->getRoutes[$url] = $function;
    }

    public function post(string $url, array $function) : void
    {
        $this->postRoutes[$url] = $function;
    }

    public function resolve() : void
    {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $function = $this->getRoutes[$currentUrl] ?? null;
        }
        else{
            $function = $this->postRoutes[$currentUrl] ?? null;
        }

        if($function){
            echo  call_user_func($function,$this);
        }
        else{
            echo 'Page Not Found!';
            exit;
        }
    }

    public function renderView($view,$params = [])
    {
        foreach($params as $key => $value)
        {
            $$key = $value;
        }
        $BASE_DIR = dirname(__DIR__);

        ob_start();
        include $BASE_DIR."/views/$view.php";
        $content = ob_get_clean();
        include $BASE_DIR."/views/_layout.php";
    }
}