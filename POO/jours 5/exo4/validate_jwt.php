<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json");

// Clé secrète utilisée pour générer le JWT
$key = "votre_cle_secrete";

// Récupération du token depuis l'en-tête Authorization ou GET
$headers = getallheaders();
$jwt = $headers['Authorization'] ?? $_GET['token'] ?? null;

if (!$jwt) {
    echo json_encode(["error" => "Aucun token fourni"]);
    exit();
}

try {
    // Décodage et validation du JWT
    $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

    // Réponse si le token est valide
    echo json_encode([
        "message" => "Accès autorisé ✅",
        "userData" => $decoded
    ]);

} catch (Exception $e) {
    // Gestion des erreurs (token expiré, invalide, etc.)
    echo json_encode(["error" => "Token invalide ❌", "details" => $e->getMessage()]);
}
?>
