<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    public function index() {
        $model = new ProductModel();
        $products = $model->getAll();
        require_once __DIR__ . '/../views/products.php';
    }
}