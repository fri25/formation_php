<?php
session_start();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation du token dans le script PHP de traitement
    
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur : Token CSRF invalide.");
    }

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    echo "Profil mis à jour avec succès !";

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
} else {
    // Affichage du formulaire : Génération d'un token CSRF unique et stockage dans la session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Profil</title>
    <!-- Vous pouvez inclure ici du CSS pour styliser votre formulaire -->
</head>
<body>
    <h1>Modifier votre profil</h1>
    <form method="POST" action="">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <br>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <!-- Inclusion du token -->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
