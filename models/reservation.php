<?php
require_once __DIR__ . '/../includes/db.php';

class Reservation {
    public static function creer($id_client, $id_vehicule, $date_heure, $adresse_depart, $adresse_arrivee, $commentaire) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO reservation (id_client, id_vehicule, date_heure, adresse_depart, adresse_arrivee, commentaire) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_client, $id_vehicule, $date_heure, $adresse_depart, $adresse_arrivee, $commentaire]);


    // Met à jour la dispo du véhicule
    $update = $pdo->prepare("UPDATE vehicule SET disponible = 0 WHERE id = ?");
    $update->execute([$id_vehicule]);
}
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


}
