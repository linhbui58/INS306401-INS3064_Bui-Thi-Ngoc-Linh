<?php
class Controller {

    public function view($view, $data = []){
        extract($data);
        require __DIR__ . "/../app/Views/layouts/main.php";
    }

    public function redirect($url){
        header("Location: $url");
        exit;
    }
}