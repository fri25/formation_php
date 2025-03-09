<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

session_start();
$key = "votre_cle_secrete";
$headers = getallheaders();
$jwt = $_SESSION['user'] ?? ($headers['Authorization'] ?? null);

if ($jwt) {
    try {
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        echo "Bienvenue, " . $decoded->data->username . " ! 🎉";
    } catch (Exception $e) {
        echo "Accès refusé : Token invalide ❌";
    }
} else {
    header("Location: login.php");
    exit();
}
?>
