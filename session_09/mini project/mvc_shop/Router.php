<?php

class Router {

    private $routes = [];

    // Đăng ký GET
    public function get($path, $action){
        $this->routes['GET'][$this->normalize($path)] = $action;
    }

    // Đăng ký POST
    public function post($path, $action){
        $this->routes['POST'][$this->normalize($path)] = $action;
    }

    // Chuẩn hóa URL
    private function normalize($path){
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }

    // Lấy path hiện tại
    private function getCurrentPath(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Base folder (auto detect)
        $base = dirname($_SERVER['SCRIPT_NAME']);

        // Remove base path
        $path = str_replace($base, '', $uri);

        // Remove index.php nếu có
        $path = str_replace('/index.php', '', $path);

        // Chuẩn hóa
        $path = $this->normalize($path);

        return $path === '' ? '/' : $path;
    }

    // Dispatch request
    public function dispatch(){
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $this->getCurrentPath();

        // Default route
        if($path === '/'){
            $path = '/products';
        }

        // DEBUG (bật nếu cần)
        // echo "METHOD: $method | PATH: $path"; die();

        if(isset($this->routes[$method][$path])){

            [$controller, $action] = explode('@', $this->routes[$method][$path]);

            $controllerFile = dirname(__DIR__) . "/app/Controller/" . $controller . ".php";

            if(!file_exists($controllerFile)){
                die("Controller not found: $controller");
            }

            require_once $controllerFile;

            if(!class_exists($controller)){
                die("Class not found: $controller");
            }

            $obj = new $controller();

            if(!method_exists($obj, $action)){
                die("Method not found: $action");
            }

            return $obj->$action();

        } else {
            http_response_code(404);
            echo "<h2 style='color:red'>404 Not Found</h2>";
            echo "<p>Path: $path</p>";
        }
    }
}