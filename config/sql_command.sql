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
--     (
--         NULL,
--         'league_of_legends',
--         '1'
--     ),
--     (NULL, 'mario', '1');

-- DC
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(1, 'batman', 'Batman, le Chevalier Noir de Gotham, prêt à combattre le crime et protéger la ville.', 20, 1, 0, CURRENT_TIMESTAMP),
(2, 'catwoman', 'Catwoman, l\'énigmatique voleuse avec un cœur tendre, prête à voler votre cœur.', 18, 1, 0, CURRENT_TIMESTAMP),
(3, 'superman', 'Superman, l\'Homme d\'Acier venu de Krypton, toujours prêt à sauver la planète.', 22, 1, 0, CURRENT_TIMESTAMP);

-- Death Note
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(4, 'l', 'L, le détective énigmatique et génial, toujours à la recherche de la justice.', 15, 2, 0, CURRENT_TIMESTAMP),
(5, 'light_yagami', 'Light Yagami, l\'étudiant brillant avec une ambition dangereuse.', 15, 2, 0, CURRENT_TIMESTAMP),
(6, 'ryuk', 'Ryuk, le shinigami facétieux qui adore les pommes et les drames humains.', 15, 2, 0, CURRENT_TIMESTAMP);

-- Marvel
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(7, 'black_widow', 'Black Widow, l\'espionne extraordinaire et Avenger redoutable.', 20, 3, 0, CURRENT_TIMESTAMP),
(8, 'iron_man', 'Iron Man, le génie milliardaire avec une armure indestructible.', 25, 3, 0, CURRENT_TIMESTAMP),
(9, 'spider_man', 'Spider-Man, le héros arachnéen qui balance de toile en toile pour sauver la ville.', 22, 3, 0, CURRENT_TIMESTAMP);

-- Stranger Things
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(10, 'demogorgon', 'Demogorgon, la créature terrifiante du Monde à l\'Envers.', 18, 4, 0, CURRENT_TIMESTAMP),
(11, 'eleven', 'Eleven, la fille aux pouvoirs télékinésiques et au courage immense.', 20, 4, 0, CURRENT_TIMESTAMP),
(12, 'lucas', 'Lucas, l\'aventurier fidèle et courageux du groupe d\'amis.', 18, 4, 0, CURRENT_TIMESTAMP);

-- Minecraft
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(13, 'creeper', 'Creeper, la créature verte qui explose avec un sourire sinistre.', 15, 5, 0, CURRENT_TIMESTAMP),
(14, 'ender_dragon', 'Ender Dragon, le boss ultime et majestueux du monde Minecraft.', 25, 5, 0, CURRENT_TIMESTAMP),
(15, 'renard', 'Renard, l\'adorable créature qui rôde dans les biomes enneigés.', 12, 5, 0, CURRENT_TIMESTAMP);

-- Pokémon
INSERT INTO produit (id, nom, description, prix, sous_categorie_id, phare, date_ajout) VALUES 
(16, 'capumain', 'Capumain, le Pokémon singe malicieux avec une queue en forme de main.', 10, 6, 0, CURRENT_TIMESTAMP),
(17, 'pikachu', 'Pikachu, le célèbre Pokémon électrique et mascotte adorée.', 15, 6, 0, CURRENT_TIMESTAMP),
(18, 'salameche', 'Salameche, le Pokémon de type feu avec une flamme sur sa queue.', 15, 6, 0, CURRENT_TIMESTAMP);
