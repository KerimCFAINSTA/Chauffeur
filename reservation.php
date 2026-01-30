<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=vtc;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Traitement du formulaire de réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $id_vehicule = $_POST['id_vehicule'];
    $adresse_depart = $_POST['adresse_depart'];
    $adresse_arrivee = $_POST['adresse_arrivee'];
    $distance_km = $_POST['distance_km'];
    $date_heure = $_POST['date_heure'];
    $commentaire = $_POST['commentaire'];

    // Id client fictif (à remplacer par système d’authentification)
    $id_client = 1;

    // Insertion dans la base
    $stmt = $pdo->prepare("
        INSERT INTO reservation (
            id_client, id_vehicule, date_heure, statut,
            adresse_depart, adresse_arrivee, distance_km, commentaire
        ) VALUES (
            :id_client, :id_vehicule, :date_heure, 'en attente',
            :adresse_depart, :adresse_arrivee, :distance_km, :commentaire
        )
    ");

    $stmt->execute([
        'id_client' => $id_client,
        'id_vehicule' => $id_vehicule,
        'date_heure' => $date_heure,
        'adresse_depart' => $adresse_depart,
        'adresse_arrivee' => $adresse_arrivee,
        'distance_km' => $distance_km,
        'commentaire' => $commentaire
    ]);

    header('Location: confirmation.php?success=1');
    exit();
}

require_once __DIR__ . '/models/Vehicule.php';
$types = Vehicule::getTypes();
$type_selectionne = $_GET['type'] ?? null;
$vehicules = Vehicule::getDisponibles($type_selectionne);

include 'includes/header.php';
?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">🚗 Réserver un Véhicule avec Chauffeur</h1>
        <p class="text-muted">Choisissez un véhicule disponible selon vos besoins, puis remplissez le formulaire ci-dessous.</p>
    </div>

    <!-- Filtre -->
    <form method="get" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <select name="type" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Tous les types de véhicules --</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type ?>" <?= ($type == $type_selectionne) ? 'selected' : '' ?>>
                            <?= ucfirst($type) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </form>

    <!-- Formulaire de réservation -->
    <div class="card p-4 shadow-sm mb-5">
        <h4 class="mb-3">📝 Informations Client</h4>
        <form action="reservation.php" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <label>Nom :</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Prénom :</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Téléphone :</label>
                    <input type="text" name="telephone" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Choisir un véhicule :</label>
                    <select name="id_vehicule" class="form-select" required>
                        <?php foreach ($vehicules as $vehicule): ?>
                            <option value="<?= $vehicule['id'] ?>">
                                <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' (' . $vehicule['type'] . ')' ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Adresse de départ :</label>
                    <input type="text" name="adresse_depart" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Adresse d’arrivée :</label>
                    <input type="text" name="adresse_arrivee" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Distance estimée (en km) :</label>
                    <input type="number" name="distance_km" class="form-control" min="1" step="0.1" required>
                </div>
                <div class="col-md-6">
                    <label>Date et heure :</label>
                    <input type="datetime-local" name="date_heure" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="commentaire">Commentaire pour le chauffeur :</label>
                    <textarea name="commentaire" id="commentaire" class="form-control" rows="3" placeholder="Ex : Je suis en fauteuil roulant, merci de prévoir un véhicule adapté."></textarea>
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success btn-lg">✅ Réserver</button>
            </div>
        </form>
    </div>

    <!-- Liste des véhicules -->
    <?php if (!empty($vehicules)): ?>
        <div class="mb-4 text-center">
            <h4 class="fw-bold">🚘 Véhicules Disponibles</h4>
        </div>
        <div class="row">
            <?php foreach ($vehicules as $v): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= $v['marque'] . ' ' . $v['modele'] ?></h5>
                            <p class="card-text">Type : <strong><?= ucfirst($v['type']) ?></strong></p>
                            <p class="card-text">Chauffeur : <strong><?= $v['chauffeur'] ?></strong></p>
                        </div>
                        <div class="card-footer bg-light text-center">
                            <span class="badge bg-success">✅ Disponible</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">Aucun véhicule disponible pour ce type pour le moment.</div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
