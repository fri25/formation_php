<?php
if (isset($_GET["file"])) {
    $file = basename($_GET["file"]); // Sécurisation du nom du fichier
    $filePath = "files/" . $file;

    if (file_exists($filePath) && is_file($filePath)) {
        unlink($filePath);
        echo "✅ Fichier supprimé !";
    } else {
        echo "⚠️ Fichier introuvable.";
    }
} else {
    echo "⚠️ Aucun fichier spécifié.";
}

header("Location: index.php");
exit;
?>
