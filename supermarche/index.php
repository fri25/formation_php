<?php
   require "config.php";

   // Vérifie si $pdo est défini et est une instance valide de PDO
    if (!isset($pdo) || !$pdo instanceof PDO) {
        die('La connexion à la base de données a échoué.');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SUPERMARCHE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
       
        <form action="rechercher.php" method="POST">
            <input type="text" name="nom" placeholder="Rechercher un produit..." required>
            <input type="submit" value="Rechercher">
        </form>

    </div>
    </nav> <br>
    
    <h2 class="text-center"> LISTES DES produits</h2>
    <a href="ajouter_produit.php" class="btn btn-sm btn-primary"> Nouvelle ajout</a>
    <table class="table table-hover table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>prix</th>
                <th>stock</th>
                <th>Actions</th>
            </tr>
            
        </thead>
        <tbody>

        <?php
         $stmt=$pdo->query("SELECT * FROM `produits`");
?>
        <?php while ( $produits = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?> 
                <tr>
                                      
                        <td><?php echo  htmlspecialchars($produits['nom']); ?></td>

                        <td><?php echo htmlspecialchars($produits['prix']); ?></td>

                        <td><?php echo htmlspecialchars($produits['stock']); ?></td>

                       <td>
                        <a  class="btn btn-sm btn-primary" href="modifier_produits.php?id=<?php echo $produits['id']; ?>">Modifier</a>
                        <a class="btn btn-sm btn-danger" href="supprimer_produits.php?id=<?php echo $produits['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette ligne ??')">Supprimer</a>
                       </td>
              </tr>
                
            <?php } ?>
                
        </tbody>
    </table>

    

</body>
</html>



