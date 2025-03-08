<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Token manquant.");
}

$conn = new mysqli('localhost', 'root', '', 'gestion_password');
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier si le token est valide et non expiré
$stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($email);
    $stmt->fetch();
} else {
    die("Lien expiré ou invalide.");
}
$stmt->close();

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Mettre à jour le mot de passe
    $stmt = $conn->prepare("UPDATE utilisateurs SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_password, $email);
    if ($stmt->execute()) {
        // Supprimer le token après utilisation
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        echo "Mot de passe mis à jour avec succès ! Vous pouvez maintenant vous connecter.";
        header("refresh:3;url=login.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du mot de passe.";
    }
}
$conn->close();
?>

<!-- Formulaire HTML -->
<form method="POST">
    <label for="password">Nouveau mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Réinitialiser</button>
</form>
