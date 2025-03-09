<?php
// Vérifier si le cookie existe
$username = isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : 'Aucun cookie trouvé';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture du Cookie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-blue-600">🍪 Cookie Récupéré</h1>
        <p class="text-gray-700">Nom d'utilisateur : <span class="font-semibold"><?= $username ?></span></p>
        <a href="cookie_set.php" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded-lg">Redéfinir le cookie</a>
    </div>
</body>
</html>
