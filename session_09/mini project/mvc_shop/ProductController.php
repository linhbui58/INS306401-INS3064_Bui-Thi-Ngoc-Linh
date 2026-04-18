<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Product.php';

class ProductController extends Controller {

    private $model;

    public function __construct(){
        $this->model = new Product();
    }

    public function index(){
        $products = $this->model-> all();
        $this->view('products/index', compact('products'));
    }

    public function create(){
        if($_POST){
            $this->model->create($_POST);
            $this->redirect('/products');
        }
        $this->view('products/create');
    }

    public function delete(){
        $this->model->delete($_GET['id']);
        $this->redirect('/products');
    }
}