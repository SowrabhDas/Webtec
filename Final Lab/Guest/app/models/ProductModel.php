<?php
// Load database bootstrap relative to this file's directory
$dbPath = __DIR__ . '/../../database.php';
$realDbPath = realpath($dbPath);

if (!$realDbPath || !is_readable($realDbPath)) {
    // Helpful debugging message — change to exception or error log in production
    die("Required file not found or unreadable: $dbPath (resolved: " . var_export($realDbPath, true) . ")");
}

require_once $realDbPath;

class ProductModel {
    public function getAllDiscounted() {
        $db = getDB();
        $stmt = $db->query('SELECT * FROM products WHERE discount > 0');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $db = getDB();
        $stmt = $db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $db = getDB();
        $stmt = $db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $description, $price, $discount, $image_url) {
        $db = getDB();
        $stmt = $db->prepare('UPDATE products SET name = :name, description = :description, price = :price, discount = :discount, image_url = :image_url WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'image_url' => $image_url
        ]);
    }
}