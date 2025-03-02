<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4">Ajouter un utilisateur</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom"] ?? "";
            $email = $_POST["email"] ?? "";
            $telephone = $_POST["telephone"] ?? "";
            
            if (!empty($nom) && !empty($email) && !empty($telephone)) {
                $fichier = fopen("users.csv", "a");
                fputcsv($fichier, [$nom, $email, $telephone]);
                fclose($fichier);
                echo "<p class='text-green-500 text-center'>Utilisateur ajouté avec succès !</p>";
            } else {
                echo "<p class='text-red-500 text-center'>Veuillez remplir tous les champs.</p>";
            }
        }
        ?>
        <form method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700">Nom :</label>
                <input type="text" name="nom" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-gray-700">Email :</label>
                <input type="email" name="email" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-gray-700">Téléphone :</label>
                <input type="text" name="telephone" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Ajouter</button>
        </form>
        <div class="text-center mt-4">
            <a href="afficher_utilisateurs.php" class="text-blue-500 hover:underline">Voir la liste des utilisateurs</a>
        </div>
    </div>
</body>
</html>
