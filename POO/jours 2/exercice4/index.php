<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de fichiers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">📂 Gestion de fichiers</h2>

        <!-- Formulaire d'upload -->
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-4">
            <input type="file" name="files[]" multiple required class="border p-2 rounded-lg w-full">
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">📤 Uploader</button>
        </form>

        <!-- Liste des fichiers -->
        <h3 class="text-xl font-semibold mb-2">📜 Fichiers disponibles :</h3>
        <ul class="space-y-2">
            <?php
            $dir = "files/";
            if (!is_dir($dir)) mkdir($dir, 0777, true); // Crée le dossier s'il n'existe pas
            $files = array_diff(scandir($dir), ['.', '..']);

            if (count($files) === 0) {
                echo "<li class='text-gray-500'>Aucun fichier trouvé.</li>";
            } else {
                foreach ($files as $file) {
                    $filePath = $dir . $file;
                    echo "<li class='flex justify-between items-center bg-gray-200 p-2 rounded-lg'>
                            <a href='$filePath' download class='text-blue-600 hover:underline'>$file</a>
                            <a href='delete.php?file=$file' class='text-red-500 hover:text-red-700'>🗑 Supprimer</a>
                          </li>";
                }
            }
            ?>
        </ul>
    </div>

</body>
</html>
