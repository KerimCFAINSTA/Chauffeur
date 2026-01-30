<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container my-5 text-center">
    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
        <div class="alert alert-success p-4 shadow-sm">
            <h1 class="fw-bold">✅ Réservation confirmée !</h1>
            <p class="lead mt-3">
                Merci d’avoir choisi <strong>VTC Réservation</strong> 🚖<br>
                Votre demande a bien été enregistrée et l’ensemble de vos informations ont été prises en compte.
            </p>
        </div>

        <div class="mt-5">
            <h4>ℹ️ Et maintenant ?</h4>
            <ul class="list-unstyled mt-3">
                <li>📅 Vous recevrez une confirmation par email sous peu.</li>
                <li>👨‍✈️ Votre chauffeur vous contactera si nécessaire avant la course.</li>
                <li>📍 Pensez à vérifier que vos adresses de départ et d’arrivée sont correctes.</li>
                <li>⏰ Merci d’être prêt 5 minutes avant l’horaire prévu pour éviter tout retard.</li>
            </ul>
        </div>

        <div class="mt-5">
            <a href="http://localhost/promo284/vtc_reservation/index.php" class="btn btn-primary btn-lg">
                ⬅️ Retour à l’accueil
            </a>
            <a href="http://localhost/promo284/vtc_reservation/contact.php" class="btn btn-outline-secondary btn-lg ms-2">
                📬 Contacter le support
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger p-4 shadow-sm">
            <h1 class="fw-bold">❌ Oups !</h1>
            <p class="lead mt-3">
                Aucune réservation trouvée.<br>
                Merci de passer par le formulaire de réservation.
            </p>
            <a href="http://localhost/promo284/vtc_reservation/reservation.php" class="btn btn-warning btn-lg mt-3">
                📝 Faire une réservation
            </a>
        </div>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
