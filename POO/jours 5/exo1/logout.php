<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-red-600">Déconnexion réussie ! 👋</h1>
        <p class="text-gray-700">À bientôt !</p>
        <a href="session_demo.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">Retour</a>
    </div>
</body>
</html>
