// src/controllers/ProduitController.php
<?php
require_once 'config/db.php';
require_once 'src/models/Produits.php';

$produitsModel = new Produit($pdo);

$produitsPhares = $produitsModel->getProduitsPhares();

$derniersProduits = $produitsModel->getDerniersProduits();

$query = 'Peluche Mario';
$resultatsRecherche = $produitsModel->rechercheProduits($query);

require 'src/views/produits.php';
