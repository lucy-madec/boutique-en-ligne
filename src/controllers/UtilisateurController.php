// src/controllers/UtilisateurController.php
<?php
require_once 'config/db.php';
require_once 'src/models/Utilisateur.php';

$utilisateur = new Utilisateur($pdo);

// Création d'utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $utilisateur->create($nom, $email, $mot_de_passe);
}

// Affichage de tous les utilisateurs
$utilisateurs = $utilisateur->getAll();
foreach ($utilisateurs as $user) {
    echo $user['nom'] . ' - ' . $user['email'] . '<br>';
}
