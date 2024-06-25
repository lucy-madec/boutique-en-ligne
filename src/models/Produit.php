<?php
class Produit {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer les produits phares
    public function getProduitsPhares() {
        $stmt = $this->pdo->prepare('SELECT * FROM produits WHERE phare = 1');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les derniers produits ajoutés
    public function getDerniersProduits() {
        $stmt = $this->pdo->prepare('SELECT * FROM produits ORDER BY date_ajout DESC LIMIT 5');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Recherche de produits par nom
    public function rechercheProduits($query) {
        $stmt = $this->pdo->prepare('SELECT * FROM produits WHERE nom LIKE ?');
        $stmt->execute(["%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les sous-catégories d'une catégorie spécifique
    public function getSousCategories($categorie_id) {
        $stmt = $this->pdo->prepare('SELECT * FROM sous_categories WHERE categorie_id = ?');
        $stmt->execute([$categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les produits par sous-catégorie
    public function getProduitsParSousCategorie($sous_categorie_id) {
        $stmt = $this->pdo->prepare('SELECT * FROM produits WHERE sous_categorie_id = ?');
        $stmt->execute([$sous_categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un nouveau produit
    public function ajouterProduit($nom, $description, $prix, $sous_categorie_id, $phare = 0) {
        $stmt = $this->pdo->prepare('INSERT INTO produits (nom, description, prix, sous_categorie_id, phare) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$nom, $description, $prix, $sous_categorie_id, $phare]);
    }

    // Modifier un produit existant
    public function modifierProduit($id, $nom, $description, $prix, $sous_categorie_id, $phare = 0) {
        $stmt = $this->pdo->prepare('UPDATE produits SET nom = ?, description = ?, prix = ?, sous_categorie_id = ?, phare = ? WHERE id = ?');
        return $stmt->execute([$nom, $description, $prix, $sous_categorie_id, $phare, $id]);
    }

    // Supprimer un produit
    public function supprimerProduit($id) {
        $stmt = $this->pdo->prepare('DELETE FROM produits WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
?>
