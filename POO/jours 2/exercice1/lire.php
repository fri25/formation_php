<?php
$journal = "journal.txt";
$fichier = fopen($journal, "r"); // Ouvrir en lecture seule

if ($fichier) {
    $contenu = fread($fichier, filesize($journal)); // Lire tout le fichier
    fclose($fichier); // Toujours fermer le fichier après utilisation
    echo nl2br($contenu); // Afficher le contenu avec sa mise en forme
} else {
    echo "Impossible d'ouvrir le fichier.";
}