<?php
session_start();

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'gestion_password');
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Vérifier si le token existe
    $stmt = $conn->prepare("SELECT id, nom FROM utilisateurs WHERE token = ? AND status = 0");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Activer le compte
        $update = $conn->prepare("UPDATE utilisateurs SET status = 1, token = '' WHERE id = ?");
        $update->bind_param("i", $user['id']);
        if ($update->execute()) {
            // Démarrer la session après validation
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];

            echo "Votre compte a été activé avec succès ! Redirection...";
            header("refresh:3;url=dashboard.php");
            exit();
        } else {
            echo "Erreur lors de l'activation du compte.";
        }
    } else {
        echo "Lien invalide ou compte déjà activé.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Aucun token fourni.";
}
?>
