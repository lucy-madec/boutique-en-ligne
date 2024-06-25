// src/controllers/HomeController.php
<?php
require_once 'config/db.php';
require_once 'src/models/Produit.php';

$produit = new Produit($pdo);
$produitsPhares = $produit->getProduitsPhares();
$derniersProduits = $produit->getDerniersProduits();

require 'src/views/home.php';
