<?php include 'includes/header.php'; ?>

<div class="d-flex flex-column min-vh-100">
    <main class="flex-fill">
        <div class="container mt-5">
            <h2 class="mb-4">📬 Contactez-nous</h2>
            
            <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
                <div class="alert alert-success">Votre message a bien été envoyé. Nous vous répondrons rapidement !</div>
            <?php endif; ?>

            <form method="post" action="contact.php">
                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    require_once 'includes/db.php';

    $stmt = $pdo->prepare("INSERT INTO contact (nom, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $email, $message]);

    header("Location: contact.php?success=1");
    exit;
}
?>
