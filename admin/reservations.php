<?php
require_once '../includes/db.php';
include '../includes/header.php';

// Requête pour récupérer toutes les réservations
$stmt = $pdo->query("
    SELECT 
        r.id, r.date_heure, r.adresse_depart, r.adresse_arrivee, r.statut,
        c.nom, c.prenom, c.email, c.telephone,
        v.marque, v.modele, v.type, v.chauffeur
    FROM reservation r
    JOIN client c ON r.id_client = c.id
    JOIN vehicule v ON r.id_vehicule = v.id
    ORDER BY r.date_heure DESC
");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2 class="mb-4">📋 Liste des Réservations</h2>

    <?php if (count($reservations) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Contact</th>
                    <th>Véhicule</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Date & Heure</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $res): ?>
                    <tr>
                        <td><?= $res['id'] ?></td>
                        <td><?= htmlspecialchars($res['prenom'] . ' ' . $res['nom']) ?></td>
                        <td><?= $res['email'] ?><br><?= $res['telephone'] ?></td>
                        <td>
                            <?= $res['marque'] . ' ' . $res['modele'] ?> <br>
                            <small><?= $res['type'] ?> — Chauffeur : <?= $res['chauffeur'] ?></small>
                        </td>
                        <td><?= $res['adresse_depart'] ?></td>
                        <td><?= $res['adresse_arrivee'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($res['date_heure'])) ?></td>
                        <td><span class="badge bg-info"><?= $res['statut'] ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">Aucune réservation pour le moment.</div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>

