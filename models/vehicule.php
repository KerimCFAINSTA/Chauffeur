<?php
require_once __DIR__ . '/../includes/db.php';

class Vehicule {
    // Liste tous les véhicules disponibles (optionnellement par type)
    public static function getDisponibles($type = null) {
        global $pdo;
        if ($type) {
            $stmt = $pdo->prepare("SELECT * FROM vehicule WHERE disponible = 1 AND type = ?");
            $stmt->execute([$type]);
        } else {
            $stmt = $pdo->query("SELECT * FROM vehicule WHERE disponible = 1");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère les types de véhicules distincts
    public static function getTypes() {
        global $pdo;
        $stmt = $pdo->query("SELECT DISTINCT type FROM vehicule");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
   

}
