<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'gestion_password');
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Vérification sans révéler l'existence de l'e-mail
    $stmt = $conn->prepare("SELECT email FROM utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Générer un token sécurisé et une date d'expiration
        $token = bin2hex(random_bytes(50));
        $expires_at = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        // Insérer ou mettre à jour le token en base de données
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?) 
                                ON DUPLICATE KEY UPDATE token = ?, expires_at = ?");
        $stmt->bind_param("sssss", $email, $token, $expires_at, $token, $expires_at);
        $stmt->execute();

        // Envoi de l'e-mail avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'elfridayemadje5@gmail.com';
            $mail->Password = 'dbuw rxel mlkm kzei';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('elfridayemadje5@gmail.com', 'Support');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body = "Bonjour,<br><br>
                Cliquez sur le lien ci-dessous pour réinitialiser votre mot de passe :<br>
                <a href='http://localhost/POO/jours 3/exo5/reset_password.php?token=$token'>Réinitialiser mon mot de passe</a><br><br>
                Ce lien expirera dans 30 minutes.";

            $mail->send();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
        }
    }

    // Toujours afficher un message neutre
    echo "Si cet e-mail est enregistré, un lien de réinitialisation a été envoyé.";
    $stmt->close();
    $conn->close();
}
?>

<!-- Formulaire HTML -->
<form method="POST">
    <label for="email">Entrez votre e-mail :</label>
    <input type="email" name="email" required>
    <button type="submit">Envoyer</button>
</form>
