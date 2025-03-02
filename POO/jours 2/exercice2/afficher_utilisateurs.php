<?php
$utilisateurs = [];
if (($fichier = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($fichier, 1000, ",")) !== FALSE) {
        $utilisateurs[] = $data;
    }
    fclose($fichier);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center mb-4">Liste des utilisateurs</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Nom</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $index => $utilisateur): ?>
                    <?php if ($index > 0): ?> <!-- Ignorer l'en-tête -->
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($utilisateur[0]) ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($utilisateur[1]) ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($utilisateur[2]) ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="flex justify-between mt-4">
            <a href="ajouter_utilisateur.php" class="text-blue-500 hover:underline">Ajouter un utilisateur</a>
            <a href="export_json.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Exporter en JSON</a>
        </div>
    </div>
</body>
</html>