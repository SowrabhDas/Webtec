<?php
require_once __DIR__ . '/../models/ProductModel.php';

class AdminController
{
    public function index()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . 'index.php?page=login');
            exit;
        }

        $model = new ProductModel();
        $products = $model->getAll();
        require_once __DIR__ . '/../views/admin.php';
    }

    public function updateProduct()
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . 'index.php?page=login');
            exit;
        }

        $id = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
        $discount = isset($_POST['discount']) ? (float)$_POST['discount'] : 0;
        $image_url = trim($_POST['image_url'] ?? '');

        $errors = [];
        if (empty($name)) $errors[] = 'Name required';
        if ($price <= 0) $errors[] = 'Invalid price';

        if (empty($errors)) {
            $model = new ProductModel();
            if ($model->update($id, $name, $description, $price, $discount, $image_url)) {
                $_SESSION['admin_success'] = 'Product updated!';
            } else {
                $errors[] = 'Update failed';
            }
        }

        $_SESSION['admin_errors'] = $errors;
        header('Location: ' . BASE_URL . 'index.php?page=admin');
        exit;
    }
}