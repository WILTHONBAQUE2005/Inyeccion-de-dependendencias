<?php
require_once __DIR__ . '/../interfaces/ProductRepositoryInterface.php';
require_once __DIR__ . '/../modelos/Product.php';

class MySQLProductRepository implements ProductRepositoryInterface {
    /** @var PDO */
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM products");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($r) {
            return new Product($r['id'], $r['name'], (float)$r['price']);
        }, $rows);
    }

    public function getById(int $id): ?Product {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return new Product($r['id'], $r['name'], (float)$r['price']);
        }
        return null;
    }

    public function create(Product $p): bool {
        $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        return $stmt->execute([$p->name, $p->price]);
    }

    public function update(Product $p): bool {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
        return $stmt->execute([$p->name, $p->price, $p->id]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
