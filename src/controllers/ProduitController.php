<?php

require_once '../../config/db.php'; // Chemin vers le fichier de configuration de la base de données
require_once '../models/Produit.php'; // Chemin vers le modèle Produit.php, ou Product.php maintenant

class ProduitController {
    private $productModel;

    public function __construct($pdo) {
        $this->productModel = new Product($pdo);
    }

    public function getFeaturedProducts() {
        return $this->productModel->getFeaturedProducts();
    }

    public function getLatestProducts() {
        return $this->productModel->getLatestProducts();
    }

    public function searchProducts($query) {
        return $this->productModel->searchProducts($query);
    }

    public function getSubcategories($category_id) {
        return $this->productModel->getSubcategories($category_id);
    }

    public function getProductsBySubcategory($subcategory_id) {
        return $this->productModel->getProductsBySubcategory($subcategory_id);
    }

    public function addProduct($name, $description, $price, $subcategory_id, $featured = 0) {
        return $this->productModel->addProduct($name, $description, $price, $subcategory_id, $featured);
    }

    public function updateProduct($id, $name, $description, $price, $subcategory_id, $featured = 0) {
        return $this->productModel->updateProduct($id, $name, $description, $price, $subcategory_id, $featured);
    }

    public function deleteProduct($id) {
        return $this->productModel->deleteProduct($id);
    }

}

// Instanciation du contrôleur avec la connexion PDO
$controller = new ProduitController($pdo);
?>
