<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rechercher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<?php

include "config.php";

if (isset($_POST['nom']) && !empty(trim($_POST['nom']))) {
    $search = trim(htmlspecialchars($_POST['nom'])); 

    // Requête SQL sécurisée 
    $execution = $pdo->prepare("SELECT * FROM produits WHERE nom LIKE ?");
    $execution->execute(["%$search%"]);

    $results = $execution->fetchAll();

    echo "<h2 class='bg-primary text-center text-white p-3 mt-3'>LISTE DES PRODUITS</h2>";

    if ($results) {
        echo "<table class='table table-bordered table-hover'>
                <thead class='table-dark'>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($results as $produit) {
            echo "<tr>
                    <td>" . htmlspecialchars($produit['id']) ." </td>
                    <td>" . htmlspecialchars($produit['nom']) ."</td>
                    <td>" . htmlspecialchars($produit['prix']) ."</td>
                    <td>" . htmlspecialchars($produit['stock']) ."</td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='text-danger text-center'>Aucun produit trouvé.</p>";
    }
} else {
    echo "<p class='text-warning text-center'>Veuillez entrer un mot-clé.</p>";
}
?>
<a href="index.php"><button class="btn btn-primary mt-3"> retour </button></a> 

</body>
</html>

