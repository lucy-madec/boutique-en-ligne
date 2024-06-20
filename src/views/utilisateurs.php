// src/views/utilisateurs.php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <?php
    foreach ($utilisateurs as $user) {
        echo $user['nom'] . ' - ' . $user['email'] . '<br>';
    }
    ?>
</body>
</html>
