<?php
// Définir un cookie nommé "user" qui expire dans 1 heure
setcookie("user", "Eurin", time() + 3600, "/", "", isset($_SERVER["HTTPS"]), true);
?>

<?php
// Définir le cookie avec des options sécurisées
setcookie("username", "Elfrida", [
    'expires' => time() + 3600,  // Expiration dans 1 heure
    'path' => '/',               // Disponible sur tout le site
    'domain' => '',              // Par défaut, le domaine actuel
    'secure' => isset($_SERVER['HTTPS']), // Secure si HTTPS
    'httponly' => true,          // Empêche l'accès via JavaScript
    'samesite' => 'Strict'       // Protection contre les attaques CSRF
]);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Défini</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-green-600">🍪 Cookie Défini !</h1>
        <p class="text-gray-700">Un cookie sécurisé a été créé avec succès.</p>
        <a href="cookie_get.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">Voir le cookie</a>
    </div>
</body>
</html>
