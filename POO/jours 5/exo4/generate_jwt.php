<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "votre_cle_secrete"; // Clé secrète de signature
$payload = [
    "iss" => "http://votresite.com",     // Émetteur
    "aud" => "http://votresite.com",     // Audience
    "iat" => time(),                     // Date d'émission
    "nbf" => time(),                     // Date à partir de laquelle le token est valide
    "exp" => time() + 3600,              // Expiration (1 heure)
    "data" => [
        "userId" => 123,
        "username" => "Fleur"
    ]
];

// Spécifier l'algorithme de signature
$jwt = JWT::encode($payload, $key, 'HS256');

echo "Votre JWT : " . $jwt;
?>
