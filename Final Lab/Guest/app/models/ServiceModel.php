<?php
require_once __DIR__ . '/../../database.php';

class ServiceModel {
    protected $db;

    public function __construct() {
        $this->db = getDB();
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT id, slug, name, description, base_price FROM services ORDER BY name');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBySlug($slug) {
        $stmt = $this->db->prepare('SELECT id, slug, name, description, base_price FROM services WHERE slug = :slug LIMIT 1');
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->db->prepare('SELECT id, slug, name, description, base_price FROM services WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}