<?php
// Paramètres de connexion
$host = 'localhost';
$db   = 'vtc';
$user = 'root';
$pass = ''; // Remplace par 'root' si nécessaire sur ton environnement

try {
    // Connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=vtc;charset=utf8", $user, $pass);

    // Mode d'erreur : exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // (Optionnel) Mode de récupération par défaut en tableau associatif
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // En cas d’erreur de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
