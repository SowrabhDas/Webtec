<?php
require_once __DIR__ . '/../models/ProductModel.php';

class HomeController {
    public function index() {
        $model = new ProductModel();
        $products = $model->getAllDiscounted();
        require_once __DIR__ . '/../views/home.php';
    }
}
?>