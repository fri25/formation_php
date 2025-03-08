<?php
// Démarrer la session
session_start();

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=contact_inscrit', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . htmlspecialchars($e->getMessage()));
    }

    // Vérifier si le token existe et n'est pas expiré
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = ? AND status = 0");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Vérifier si le token est expiré
        if (strtotime($user['token_expiration']) < time()) {
            echo "Erreur : Lien expiré.";
            exit();
        }

        // Activer le compte (mettre status à 1 et supprimer le token)
        $stmt = $pdo->prepare("UPDATE users SET status = 1, token = NULL, token_expiration = NULL WHERE id = ?");
        if ($stmt->execute([$user['id']])) {
            // Démarrer la session pour l'utilisateur
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_email'] = $user['email'];

            // Redirection vers le tableau de bord
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Erreur : Activation du compte impossible.";
        }
    } else {
        echo "Erreur : Lien de confirmation invalide ou compte déjà activé.";
    }
} else {
    echo "Erreur : Aucun token fourni.";
}
?>
