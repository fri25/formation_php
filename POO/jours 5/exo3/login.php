<?php
session_start();

$error = "";

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérification des identifiants (admin / secret)
    if ($username === "admin" && $password === "1234") {
        session_regenerate_id(true); // Sécurisation de la session
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirection après connexion
        exit();
    } else {
        $error = "Identifiants incorrects ❌";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
        <h1 class="text-2xl font-bold text-gray-800">🔐 Connexion</h1>
        <?php if ($error): ?>
            <p class="text-red-500"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" class="mt-4">
            <input type="text" name="username" placeholder="Identifiant" class="w-full p-2 border rounded mb-3">
            <input type="password" name="password" placeholder="Mot de passe" class="w-full p-2 border rounded mb-3">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Se connecter</button>
        </form>
    </div>
</body>
</html>
