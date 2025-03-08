<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charger PHPMailer

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50)); // Générer un token unique

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'gestion_password');
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Insérer l'utilisateur en base de données
    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, password, token, status) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $nom, $email, $password, $token);

    if ($stmt->execute()) {
        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Remplace par ton serveur SMTP
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 2;  // 0 = désactiver le débogage, 2 = affichage des détails de connexion
            $mail->Debugoutput = 'html';
            $mail->Username = 'elfridayemadje5@gmail.com'; // Ton email
            $mail->Password = 'dbuw rxel mlkm kzei'; // Ton mot de passe ou App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('elfridayemadje5@gmail.com', 'Nom');
            $mail->addAddress($email, $nom);
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de votre inscription';
            $mail->Body = "Bonjour $nom, <br><br>
                Merci de vous être inscrit ! <br>
                Cliquez sur le lien suivant pour activer votre compte : <br>
                <a href='http://localhost/POO/jours 3/exo5/confirmation.php?token=$token'>Activer mon compte</a> <br><br>
                Si vous n'êtes pas à l'origine de cette inscription, ignorez cet e-mail.";

            if ($mail->send()) {
                echo "Inscription réussie ! Un e-mail de confirmation a été envoyé.";
            } else {
                echo "Erreur lors de l'envoi de l'e-mail.";
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
        }
    } else {
        echo "Erreur lors de l'inscription.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="POST" action="inscription.php">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="submit" value="S'inscrire">
    </form>
</body>
</html>

