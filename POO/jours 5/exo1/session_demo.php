<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <?php if (!isset($_SESSION['username'])): ?>
            <p class="text-lg text-gray-700">Vous n'êtes pas connecté.</p>
            <a href="login.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">Se connecter</a>
        <?php else: ?>
            <h1 class="text-2xl font-bold text-gray-800">Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> 🎉</h1>
            <p class="text-gray-600"><?= htmlspecialchars($_SESSION['role']) ?></p>
            <a href="logout.php" class="mt-4 inline-block bg-red-500 text-white px-4 py-2 rounded-lg">Se déconnecter</a>
        <?php endif; ?>
    </div>
</body>
</html>
