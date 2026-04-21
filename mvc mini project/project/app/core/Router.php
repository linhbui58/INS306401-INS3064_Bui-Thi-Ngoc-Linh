<?php

class Router {
    public function route() {

        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        // Lấy phần sau index.php
        $pos = strpos($uri, 'index.php');
        if ($pos !== false) {
            $uri = substr($uri, $pos + strlen('index.php'));
        }

        // Nếu rỗng → mặc định vào products
        if ($uri == '' || $uri == '/') {
            $uri = '/products';
        }

        // ROUTES
        if ($uri == '/products' && $method == 'GET') {
            require_once '../app/controllers/ProductController.php';
            (new ProductController())->index();
        }

        elseif ($uri == '/products/create' && $method == 'GET') {
            require_once '../app/controllers/ProductController.php';
            (new ProductController())->create();
        }

        elseif ($uri == '/products/create' && $method == 'POST') {
            require_once '../app/controllers/ProductController.php';
            (new ProductController())->store();
        }

        else {
            echo "404 Router: " . $uri;
        }
    }
}