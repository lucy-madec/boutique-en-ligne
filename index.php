<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>PixelPlush</title>
</head>
<header>

    <body>
        <header>
            <nav>
                <div class="logo">Boutique Peluches</div>
                <img src="public/images/logo.png" class="img_logo" alt="logo">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="#">Produits</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>

        <section class="section section-primary">
            <h1>Produits phares</h1>
            <div class="bloc_card">
                <div class="product-card">
                    <img src="public\images\categories\films_&_series\stranger_things\demogorgon.jpg" alt="Peluche">
                    <h2>Peluche Mario</h2>
                    <p>Une peluche de Mario de haute qualité.</p>
                    <div class="price">€29.99</div>
                    <button class="button-primary">Ajouter au panier</button>
                </div>
                <div class="product-card">
                    <img src="public\images\categories\films_&_series\harry_potter\touffu.jpg" alt="Peluche">
                    <h2>Peluche Mario</h2>
                    <p>Une peluche de Mario de haute qualité.</p>
                    <div class="price">€29.99</div>
                    <button class="button-primary">Ajouter au panier</button>
                </div>
            </div>
        </section>

        <section id="produits-phares">
            <h2>Produits Phares</h2>
            <?php foreach ($produitsPhares as $produit) : ?>
                <div class="produit">
                    <h3><?php echo $produit['nom']; ?></h3>
                    <p><?php echo $produit['description']; ?></p>
                    <p>Prix: <?php echo $produit['prix']; ?>€</p>
                </div>
            <?php endforeach; ?>
        </section>
        <section id="derniers-produits">
            <h2>Derniers Produits</h2>
            <?php foreach ($derniersProduits as $produit) : ?>
                <div class="produit">
                    <h3><?php echo $produit['nom']; ?></h3>
                    <p><?php echo $produit['description']; ?></p>
                    <p>Prix: <?php echo $produit['prix']; ?>€</p>
                </div>
            <?php endforeach; ?>
        </section>
        <footer>
            <p>&copy; 2024 Boutique Peluches. Tous droits réservés.</p>
        </footer>
    </body>

</html>