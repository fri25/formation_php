<?php
    include "db.php";

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Validation des données
    if (empty($nom) || empty($email) || empty($telephone)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO clients (nom, email, telephone) VALUES (:nom, :email, :telephone)");
            $stmt->execute([':nom' => $nom, ':email' => $email, ':telephone' => $telephone]);
            header("Location: commande.php");
            exit;
        } catch (PDOException $e) {
            $error = "Une erreur est survenue : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <!-- tailwindcss -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="w-full items-center">
        <h1 class="text-3xl font-bold underline  text-center">INSCRIPTION</h1>
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST" action="" class="bg-white shadow-md rounded px-40 pt-15 pb-8">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2" for="username">Nom :</label>
                <input type="text" name="nom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2" for="username">email :</label>
                <input type="text" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2" for="username">telephone :</label>
                <input type="text" name="telephone" id="telephone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">s'incrire</button>
               <input type="reset" value="annuler" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">    
            </div>
        </form>
    </div>
</body>
</html>