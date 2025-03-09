<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-green-600">🎉 Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> !</h1>
        <p class="text-gray-700">Vous êtes connecté.</p>
        <a href="logout.php" class="mt-4 inline-block bg-red-500 text-white px-4 py-2 rounded-lg">Se déconnecter</a>
    </div>
</body>
</html>
