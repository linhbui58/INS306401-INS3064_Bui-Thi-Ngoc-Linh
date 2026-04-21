<?php

class Product {
    public static $products = [];

    public static function all() {
        return self::$products;
    }

    public static function create($name) {
        self::$products[] = $name;
    }
}