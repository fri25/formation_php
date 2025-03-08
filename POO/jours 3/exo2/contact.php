<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=mailer', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (isset($_POST['envoyer'])) {
    $nom = trim(htmlspecialchars($_POST['nom']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = trim(strip_tags($_POST['message']));
    $captcha = $_POST['captcha'];

    // Vérification du captcha
    if ($captcha != 7) {
        die("Erreur : Captcha incorrect !");
    }

    // Vérification des champs obligatoires
    if (!$nom || !$email || !$message) {
        die("Erreur : Tous les champs sont obligatoires.");
    }

    // Gestion des fichiers
    $types_autorises = ['application/pdf', 'image/jpeg', 'image/png'];
    $upload_dir = 'uploads/';
    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $fichiers_joints = [];

    if (!empty($_FILES['fichiers']['name'][0])) {
        foreach ($_FILES['fichiers']['name'] as $index => $nom_fichier) {
            $fichier_tmp = $_FILES['fichiers']['tmp_name'][$index];
            $type_fichier = $_FILES['fichiers']['type'][$index];
            $taille_fichier = $_FILES['fichiers']['size'][$index];

            if (in_array($type_fichier, $types_autorises) && $taille_fichier <= 2 * 1024 * 1024) {
                $chemin_fichier = $upload_dir . time() . '_' . basename($nom_fichier);
                if (move_uploaded_file($fichier_tmp, $chemin_fichier)) {
                    $fichiers_joints[] = $chemin_fichier;
                }
            }
        }
    }

    // Convertir la liste des fichiers en une chaîne JSON pour la base de données
    $fichiers_json = json_encode($fichiers_joints);

    // Enregistrer dans la base de données
    try {
        $stmt = $pdo->prepare("INSERT INTO message (nom, email, message, fichier) VALUES (:nom, :email, :message, :fichier)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':message' => $message,
            ':fichier' => $fichiers_json
        ]);
    } catch (PDOException $e) {
        die("Erreur d'insertion en base : " . $e->getMessage());
    }

    // Envoi de l'email avec PHPMailer
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'elfridayemadje5@gmail.com';
        $mail->Password = 'dbuw rxel mlkm kzei'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('elfridayemail5@gmail.com', 'Admin');

        // Sujet et message
        $mail->Subject = "Nouveau message de contact avec fichier joint";
        $mail->Body = "Nom : $nom\nE-mail : $email\nMessage : $message";
        $mail->AltBody = strip_tags($message);

        // Ajouter les pièces jointes
        foreach ($fichiers_joints as $fichier) {
            $mail->addAttachment($fichier);
        }

        // Envoi de l'email
        $mail->send();
        echo "Votre message a bien été envoyé et enregistré en base de données !";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
    }
}
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h2>Contactez-nous</h2>
    <form action="contact.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea><br><br>

        <label for="fichier">Pièce jointe :</label>
        <input type="file" id="fichier" name="fichiers[]" multiple><br><br>

        <label for="captcha">Combien font 3 + 4 ?</label>
        <input type="number" id="captcha" name="captcha" required><br><br>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</body>
</html>

