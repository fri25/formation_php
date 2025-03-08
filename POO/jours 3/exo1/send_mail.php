<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure les fichiers de PHPMailer
require 'vendor/autoload.php';

// Création d'une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Remplace par Mailtrap si nécessaire
    $mail->SMTPAuth = true;
    $mail->Username = 'elfridayemadje5@gmail.com'; // Remplace par ton email
    $mail->Password = 'dbuw rxel mlkm kzei'; // Utilise un mot de passe d'application si Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom('elfridayemadje5@gmail.com', 'frida'); 
    $mail->addAddress('elfridayemadje5@gmail.com', 'Destinataire Test'); 

    // Sujet et corps du message
    $mail->Subject = 'Test PHPMailer';
    $mail->Body    = 'Ceci est un test d\'envoi d\'e-mail avec PHPMailer.';
    $mail->AltBody = 'Ceci est un test d\'e-mail en texte brut si le HTML ne s\'affiche pas.';

    // Envoyer l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès !';
} catch (Exception $e) {
    echo "Erreur d'envoi de l'e-mail : {$mail->ErrorInfo}";
}
