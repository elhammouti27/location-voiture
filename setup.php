<?php
try {
    // Connexion au serveur MySQL (sans base)
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base si elle n'existe pas
    $pdo->exec("CREATE DATABASE IF NOT EXISTS cars_ehm CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

    echo "Base de données 'cars_ehm' créée ou déjà existante.<br>";

    // Connexion à la base
    $pdo = new PDO("mysql:host=localhost;dbname=cars_ehm;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la table utilisateurs
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS utilisateurs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100),
            prenom VARCHAR(100),
            cin VARCHAR(50),
            telephone VARCHAR(20),
            email VARCHAR(150),
            permis VARCHAR(100),
            password VARCHAR(255)
        )
    ");

    echo "Table 'utilisateurs' créée ou déjà existante.<br>";

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
