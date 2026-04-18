<?php
require "../core/Router.php";

$router = new Router();

$router->get('/products','ProductController@index');
$router->get('/products/create','ProductController@create');
$router->post('/products/create','ProductController@create');
$router->get('/products/delete','ProductController@delete');

$router->dispatch();