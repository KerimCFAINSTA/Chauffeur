<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container my-5">
    <!-- Intro -->
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">🚖 Nos Chauffeurs d’Exception</h1>
        <p class="lead text-muted">
            Chez <strong>VTC Réservation</strong>, nous ne vous proposons pas seulement un trajet, 
            mais une véritable expérience de confort et de sérénité.  
            Nos chauffeurs sont soigneusement sélectionnés pour leur <strong>professionnalisme</strong>, 
            leur <strong>ponctualité</strong> et leur <strong>savoir-être</strong>.
        </p>
    </div>

    <div class="row">
        <?php 
        $chauffeurs = [
            [
                "nom" => "Ali Karim",
                "desc" => "Avec plus de 10 ans d’expérience, Ali est reconnu pour sa ponctualité et son professionnalisme. Toujours élégant, il assure vos trajets d’affaires et vos transferts aéroport en toute sérénité.",
                "langues" => "Français, Anglais, Arabe",
                "specialite" => "Transferts aéroport & déplacements professionnels",
                "atouts" => [
                    "Connaissance parfaite des itinéraires rapides",
                    "Style de conduite fluide et sécuritaire",
                    "Très apprécié par les clients business"
                ],
                "avis" => "« Ali m’a conduit à l’aéroport, ponctuel et courtois, un vrai plaisir ! » – Jean D.",
                "img" => "ali-karim.jpg"
            ],
            [
                "nom" => "Sophie Diallo",
                "desc" => "Sophie est appréciée pour sa bienveillance et son sens du service. Spécialiste des trajets familiaux et touristiques, elle saura rendre votre voyage confortable et agréable.",
                "langues" => "Français, Anglais, Espagnol",
                "specialite" => "Tourisme, trajets familiaux & événements",
                "atouts" => [
                    "Patiente et attentionnée avec les familles",
                    "Excellente connaissance des sites touristiques",
                    "Conduite douce et rassurante"
                ],
                "avis" => "« Merci Sophie pour cette balade en toute sécurité avec mes enfants. » – Laura G.",
                "img" => "sophie-diallo.jpg"
            ],
            [
                "nom" => "Marc Bernard",
                "desc" => "Marc est un chauffeur fiable et souriant, expert en longues distances. Ses clients louent sa conduite fluide et son sens de l’orientation impeccable.",
                "langues" => "Français, Allemand",
                "specialite" => "Longues distances & trajets inter-villes",
                "atouts" => [
                    "Toujours ponctuel et souriant",
                    "Idéal pour les trajets longue durée",
                    "Grande capacité d’adaptation aux besoins des clients"
                ],
                "avis" => "« Marc est exceptionnel, le trajet Paris-Lyon n’a jamais été aussi agréable ! » – Ahmed B.",
                "img" => "marc-bernard.jpg"
            ]
        ];

        foreach ($chauffeurs as $c): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center">
                    <img src="/promo284/vtc_reservation/public/images/chauffeurs/<?= $c['img'] ?>" 
                         class="card-img-top"
                         alt="<?= $c['nom'] ?>"
                         style="width:100%; height:250px; object-fit:cover; display:block;"
                         onerror="this.src='https://via.placeholder.com/400x250?text=<?= urlencode($c['nom']) ?>';">
                    
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $c['nom'] ?></h5>
                        <p class="card-text"><?= $c['desc'] ?></p>
                        <p><strong>🌍 Langues parlées :</strong> <?= $c['langues'] ?></p>
                        <p><strong>⭐ Spécialité :</strong> <?= $c['specialite'] ?></p>

                        <ul class="list-unstyled text-start mt-3" style="word-wrap:break-word;">
                            <?php foreach ($c['atouts'] as $atout): ?>
                                <li>✅ <?= $atout ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <blockquote class="blockquote mt-3">
                            <small class="text-muted fst-italic"><?= $c['avis'] ?></small>
                        </blockquote>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Conclusion marketing -->
    <div class="text-center mt-5">
        <h3 class="fw-bold">Pourquoi Choisir VTC Réservation ?</h3>
        <p class="lead">
            Parce que nos chauffeurs ne sont pas seulement des conducteurs,  
            ce sont des <strong>partenaires de confiance</strong> qui mettent votre confort et votre sécurité au premier plan.  
            Que ce soit pour un <em>trajet professionnel, touristique ou personnel</em>,  
            vous êtes entre de bonnes mains 🚖✨.
        </p>
        <a href="http://localhost/promo284/vtc_reservation/reservation.php" class="btn btn-success btn-lg">Réserver dès maintenant</a>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
