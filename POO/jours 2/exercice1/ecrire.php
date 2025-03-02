<?php
$journal = "journal.txt";
$fichier = fopen($journal, "a"); // "a" pour ajouter du contenu sans écraser

if ($fichier) {
    fwrite($fichier, "PAS MAL\n");
    fclose($fichier);
    echo "Écriture réussie !";
} else {
    echo "Impossible d'écrire dans le fichier.";
}