<?php
if (isset($_GET["file"])) {
    $fichier = basename($_GET["file"]); // Sécurisation du nom du fichier
    $chemin_fichier = "uploads/" . $fichier; // Chemin complet

    // Vérifier si le fichier existe avant de le supprimer
    if (file_exists($chemin_fichier) && is_file($chemin_fichier)) {
        
        if (unlink($chemin_fichier)) {
            $message = "✅ Fichier supprimé avec succès !";
        } else {
            $message = "❌ Erreur lors de la suppression du fichier.";
        }
    } else {
        $message = "⚠️ Fichier introuvable.";
    }
} else {
    $message = "⚠️ Aucun fichier spécifié.";
}

// Redirection avec message
header("Location: galerie.php?message=" . urlencode($message));
exit;
?>
