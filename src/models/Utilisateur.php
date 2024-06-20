// src/models/Utilisateur.php
<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nom, $email, $mot_de_passe) {
        $stmt = $this->pdo->prepare('INSERT INTO Utilisateurs (nom, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$nom, $email, password_hash($mot_de_passe, PASSWORD_BCRYPT)]);
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM Utilisateurs');
        return $stmt->fetchAll();
    }
}
