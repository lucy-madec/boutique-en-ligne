<?php
require_once '../../src/controllers/ProduitController.php'; // Chemin vers le contrôleur ProduitController.php

// Récupérer toutes les catégories principales
$stmt = $pdo->query("SELECT id, nom FROM categorie");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer toutes les sous-catégories pour une catégorie donnée (si une catégorie est sélectionnée)
$sous_categories = [];
if (isset($_GET['categorie']) && $_GET['categorie'] != '') {
    $categorie_id = $_GET['categorie'];
    $stmt = $pdo->prepare("SELECT id, nom FROM sous_categorie WHERE categorie_id = ?");
    $stmt->execute([$categorie_id]);
    $sous_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer les produits en fonction des filtres
$produits = [];
if (isset($_GET['categorie']) && $_GET['categorie'] != '') {
    $categorie_id = $_GET['categorie'];
    if (isset($_GET['sous_categorie']) && $_GET['sous_categorie'] != '') {
        $sous_categorie_id = $_GET['sous_categorie'];
        // Filtrer par sous-catégorie
        $stmt = $pdo->prepare("SELECT * FROM produit WHERE sous_categorie_id = ?");
        $stmt->execute([$sous_categorie_id]);
    } else {
        // Filtrer par catégorie principale seulement
        $stmt = $pdo->prepare("SELECT * FROM produit WHERE sous_categorie_id IN (SELECT id FROM sous_categorie WHERE categorie_id = ?)");
        $stmt->execute([$categorie_id]);
    }
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Aucun filtre sélectionné, récupérer tous les produits
    $stmt = $pdo->query("SELECT * FROM produit");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits avec Filtrage</title>
    <style>
        /* Ajoutez vos styles ici */
    </style>
</head>
<body>
    <h1>Liste des Produits avec Filtrage</h1>

    <!-- Formulaire de filtrage par catégorie et sous-catégorie -->
    <form action="filtrage.php" method="GET">
        <label for="categorie">Filtrer par catégorie :</label>
        <select name="categorie" id="categorie">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>" <?php if (isset($_GET['categorie']) && $_GET['categorie'] == $categorie['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($categorie['nom']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="sous_categorie">Filtrer par sous-catégorie :</label>
        <select name="sous_categorie" id="sous_categorie">
            <option value="">Toutes les sous-catégories</option>
            <?php foreach ($sous_categories as $sous_categorie): ?>
                <option value="<?php echo $sous_categorie['id']; ?>" <?php if (isset($_GET['sous_categorie']) && $_GET['sous_categorie'] == $sous_categorie['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($sous_categorie['nom']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Filtrer</button>
    </form>

    <!-- Liste des produits filtrés -->
    <?php if (!empty($produits)): ?>
        <ul>
            <?php foreach ($produits as $produit): ?>
                <li>
                    <h3><?php echo htmlspecialchars($produit['nom']); ?></h3>
                    <p><?php echo htmlspecialchars($produit['description']); ?></p>
                    <p>Prix: <?php echo htmlspecialchars($produit['prix']); ?> €</p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
</body>
</html>
        