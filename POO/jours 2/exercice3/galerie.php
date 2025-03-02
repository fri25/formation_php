<?php if (isset($_GET["message"])): ?>
    <div class="p-4 mb-4 text-center <?= strpos($_GET["message"], '✅') !== false ? 'bg-green-500' : 'bg-red-500'; ?> text-white rounded-lg">
        <?= htmlspecialchars($_GET["message"]); ?>
    </div>
<?php endif; ?>


<?php
$dossier = "uploads/";

if (!file_exists($dossier)) {
    mkdir($dossier, 0777, true);
}

$fichiers = array_diff(scandir($dossier), ['.', '..']);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <h2 class="text-2xl font-bold mb-4">📷 Galerie des images uploadées</h2>
    <div class="grid grid-cols-3 gap-4">
        <?php foreach ($fichiers as $fichier) : ?>
            <div class="bg-white p-4 rounded shadow">
                <img src="<?= $dossier . $fichier ?>" alt="Image" class="w-full h-48 object-cover rounded">
                <p class="text-center mt-2"><?= htmlspecialchars($fichier) ?></p>
                <a href="supprimer.php?file=nom_du_fichier.jpg=<?= urlencode($fichier) ?>" class="block text-center bg-red-500 text-white py-1 mt-2 rounded hover:bg-red-700">🗑 Supprimer</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
