<?php

class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Get featured products
    public function getFeaturedProducts() {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE featured = 1');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get latest added products
    public function getLatestProducts() {
        $stmt = $this->pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 5');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search products by name
    public function searchProducts($query) {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE name LIKE ?');
        $stmt->execute(["%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get subcategories of a specific category
    public function getSubcategories($category_id) {
        $stmt = $this->pdo->prepare('SELECT * FROM subcategories WHERE category_id = ?');
        $stmt->execute([$category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get products by subcategory
    public function getProductsBySubcategory($subcategory_id) {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE subcategory_id = ?');
        $stmt->execute([$subcategory_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new product
    public function addProduct($name, $description, $price, $subcategory_id, $featured = 0) {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, description, price, subcategory_id, featured) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $description, $price, $subcategory_id, $featured]);
    }

    // Update an existing product
    public function updateProduct($id, $name, $description, $price, $subcategory_id, $featured = 0) {
        $stmt = $this->pdo->prepare('UPDATE products SET name = ?, description = ?, price = ?, subcategory_id = ?, featured = ? WHERE id = ?');
        return $stmt->execute([$name, $description, $price, $subcategory_id, $featured, $id]);
    }

    // Delete a product
    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

?>
