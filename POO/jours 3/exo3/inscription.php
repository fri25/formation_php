<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validation des champs
    if (empty($nom) || empty($email) || empty($password)) {
        die("Erreur : Tous les champs sont obligatoires.");
    }

    // Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=contact_inscrit', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("Erreur : Cet email est déjà utilisé.");
    }

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Générer un token unique
    $token = bin2hex(random_bytes(50));
    $expiration_time = date('Y-m-d H:i:s', strtotime('+24 hours'));

    // Insérer l'utilisateur dans la base de données avec status = 0
    $stmt = $pdo->prepare("INSERT INTO users (nom, email, password, token, token_expiration, status) VALUES (?, ?, ?, ?, ?, 0)");
    if ($stmt->execute([$nom, $email, $hashed_password, $token, $expiration_time])) {
        // Envoi de l'email de confirmation
        $confirmation_link = "http://localhost/POO/jours 3/exo3/confirmation.php?token=$token";
        $subject = "Confirmation de votre inscription";
        $body = "Bonjour $nom,\n\nMerci de vous être inscrit. Veuillez cliquer sur le lien suivant pour confirmer votre inscription :\n$confirmation_link\n\nCe lien est valide pendant 24 heures.";

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'elfridayemadje5@gmail.com'; // Remplace avec ton email
            $mail->Password = 'dbuw rxel mlkm kzei'; // Remplace avec ton mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('elfridayemadje5@gmail.com', 'Admin');
            $mail->addAddress($email);

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            echo "Un email de confirmation vous a été envoyé.";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        }
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="inscription.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
