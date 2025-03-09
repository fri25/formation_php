<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

session_start();

$key = "votre_cle_secrete";

// Fake utilisateur (remplace par une requête SQL)
$valid_user = "admin";
$valid_pass = "secret"; // Dans un vrai cas, hash avec password_hash()

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $valid_user && $password === $valid_pass) {
    $_SESSION['user'] = $username;
    
    // Générer un JWT
    $payload = [
        "iat" => time(),
        "exp" => time() + 3600,
        "data" => ["username" => $username]
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');

    echo json_encode(["message" => "Connexion réussie", "jwt" => $jwt]);
} else {
    echo json_encode(["error" => "Identifiants invalides"]);
}
?>
