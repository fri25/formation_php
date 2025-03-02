<?php
$utilisateurs = [];
if (($fichier = fopen("users.csv", "r")) !== FALSE) {
    $entetes = fgetcsv($fichier, 1000, ","); // Lire la première ligne (titres)
    while (($data = fgetcsv($fichier, 1000, ",")) !== FALSE) {
        $utilisateurs[] = array_combine($entetes, $data);
    }
    fclose($fichier);
}

$json = json_encode($utilisateurs, JSON_PRETTY_PRINT);
file_put_contents("users.json", $json);

header("Content-Type: application/json");
echo $json;
?>

