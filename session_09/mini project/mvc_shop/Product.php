<?php
require_once __DIR__ . '/../../core/Model.php';

class Product extends Model {

    public function all(){
        return $this->db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stmt = $this->db->prepare("INSERT INTO products(name,price) VALUES(?,?)");
        $stmt->execute([$data['name'], $data['price']]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        $stmt->execute([$id]);
    }
}