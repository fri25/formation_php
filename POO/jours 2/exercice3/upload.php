<?php
if (isset($_FILES["fichier"])) {
    $dossier_destination = "uploads/";

    // Vérification si le dossier existe, sinon création
    if (!file_exists($dossier_destination)) {
        mkdir($dossier_destination, 0777, true);
    }

    // Liste des extensions autorisées
    $extensions_autorisees = ["jpg", "jpeg", "png", "pdf"];
    
    // Récupérer l'extension et forcer en minuscule
    $extension = strtolower(pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION));

    // Vérification de l'extension
    if (!in_array($extension, $extensions_autorisees)) {
        die("Format non autorisé !");
    }

    // Vérification du type MIME
    $type_mime = mime_content_type($_FILES["fichier"]["tmp_name"]);
    $mimes_autorises = ["image/jpeg", "image/png", "application/pdf"];

    if (!in_array($type_mime, $mimes_autorises)) {
        die("Type de fichier non valide !");
    }

    // Vérification de la taille
    $taille_max = 2 * 1024 * 1024; // 2 Mo
    if ($_FILES["fichier"]["size"] > $taille_max) {
        die("Fichier trop volumineux !");
    }

    // Génération d'un nom unique pour éviter les conflits
    $nom_fichier = uniqid("file_") . "." . $extension;
    $chemin_fichier = $dossier_destination . $nom_fichier;

    // Déplacement du fichier après validation
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_fichier)) {
        // Redirection avec un message de succès
        header("Location: galerie.php?message=" . urlencode("✅ Fichier uploadé avec succès !"));
        exit;
    } else {
        die("Erreur lors de l'upload.");
    }
}
?>
