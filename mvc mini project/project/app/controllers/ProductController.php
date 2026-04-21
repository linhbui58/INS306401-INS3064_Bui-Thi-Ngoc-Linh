<?php

require_once '../app/models/Product.php';

class ProductController {

    public function index() {
        $products = Product::all();
        require '../app/views/products/index.php';
    }

    public function create() {
        require '../app/views/products/create.php';
    }

    public function store() {

        $name = $_POST['name'] ?? '';

        if ($name != '') {
            Product::create($name);
        }

        // redirect chuẩn theo project
        $base = dirname($_SERVER['SCRIPT_NAME']);
        header("Location: $base/index.php/products");
        exit;
    }
}