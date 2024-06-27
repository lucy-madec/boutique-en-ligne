-- CREATE TABLE `pixel_plush`.`utilisateur` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `nom` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
--     `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
--     `mot_de passe` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
--     `date_inscription` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (`id`),
--     UNIQUE (`email`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`categorie` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `nom` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--     PRIMARY KEY (`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`commande` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `utilisateur_id` INT NOT NULL,
--     `date_commande` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (`id`),
--     FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur`(`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`sous_categorie` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `nom` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--     `categorie_id` INT NOT NULL,
--     PRIMARY KEY (`id`),
--     FOREIGN KEY (`categorie_id`) REFERENCES `categorie`(`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`produit` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `nom` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--     `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--     `prix` DECIMAL(10, 2) NOT NULL,
--     `sous_categorie_id` INT NOT NULL,
--     `phare` BOOLEAN NOT NULL DEFAULT 0,
--     `date_ajout` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (`id`),
--     FOREIGN KEY (`sous_categorie_id`) REFERENCES `sous_categorie`(`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`panier` (
--     `id` INT NOT NULL AUTO_INCREMENT,
--     `utilisateur_id` INT NOT NULL,
--     `date_creation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (`id`),
--     FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur`(`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`panier_produit` (
--     `panier_id` INT NOT NULL,
--     `produit_id` INT NOT NULL,
--     `quantite` INT NOT NULL,
--     PRIMARY KEY (`panier_id`, `produit_id`),
--     FOREIGN KEY (`panier_id`) REFERENCES `panier`(`id`),
--     FOREIGN KEY (`produit_id`) REFERENCES `produit`(`id`)
-- ) ENGINE = InnoDB;

-- CREATE TABLE `pixel_plush`.`commande_produit` (
--     `commande_id` INT NOT NULL,
--     `produit_id` INT NOT NULL,
--     `quantite` INT NOT NULL,
--     PRIMARY KEY (`commande_id`, `produit_id`),
--     FOREIGN KEY (`commande_id`) REFERENCES `commande`(`id`),
--     FOREIGN KEY (`produit_id`) REFERENCES `produit`(`id`)
-- ) ENGINE = InnoDB;

-- INSERT INTO
--     `categorie` (`id`, `nom`)
-- VALUES (1, 'jeux_video'),
--     (2, 'films_&_series');

-- INSERT INTO `sous_categorie` (`id`, `nom`, `categorie_id`) VALUES
-- (1, 'dc', 2),
-- (2, 'death_note', 2),
-- (3, 'marvel', 2),
-- (4, 'stranger_things', 2),
-- (5, 'minecraft', 1),
-- (6, 'pokemon', 1);

-- INSERT INTO
--     `sous_categorie` (`id`, `nom`, `categorie_id`)
-- VALUES ('7', 'disney', '2'),
--     (NULL, 'demon_slayer', '2'),
--     (NULL, 'mha', '2'),
--     (NULL, 'harry_potter', '2'),
--     (NULL,'league_of_legends','1'),
--     (NULL, 'mario', '1');


INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mot_de passe`, `date_inscription`, `admin`) VALUES
(1, 'lucy', 'lucy.admin@pixelplush.fr', 'Azerty123*', '2024-06-27 13:06:37', 1),
(2, 'lucy', 'lucy@laplateforme.io', 'Azerty123*', '2024-06-27 13:06:37', 0);