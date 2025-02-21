<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class=" container ">
    <h2 class="bg-primary text-center text-white p-3 mt-3">
        Formulaire d'ajout des produits
    </h2>
    <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <fieldset>
            <div>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
            <div> <br>
                <label for="prix" class="form-label">prix :</label>
                <input type="text" class="form-control" name="prix" id="prix" required>
            </div>

            <div> <br>  
                <label for="stock" class="form-label">stock :</label>
                <input type="number" class="form-control" name="stock" id="stock" required>
            </div>
                        
            <div>
                <input type="submit" value="Envoyer" class="btn btn-primary mt-3">
                <input type="reset" value="Annuler" class="btn btn-danger mt-3">
            </div>
        </fieldset>
        
    </form>
   <a href="index.php" class="btn btn-primary mt-5">VOIR LA LISTE</a>
</body>
</html>


<?php
//envoyer dans la base de données
    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        $nom = $_POST["nom"];
       
        $prix= $_POST["prix"];

        $stock= $_POST["stock"];

        if (empty($nom) || empty($prix) || empty($stock)) {
            $error = "Tous les champs sont obligatoires.";
        } else {
            try {
                  
            $requete =$pdo->prepare("INSERT INTO `produits`( `nom`, `prix`, `stock`) VALUES ('$nom','$prix','$stock')");
            $requete->execute();
             
            } catch (PDOException $e) {
                $error = "Une erreur est survenue : " . $e->getMessage();
            }

                if ($requete) {
                    echo "<div class='alert alert-success mt-3'>Produit ajouté avec succès.</div>";
                    header("location:index.php");

                    } 
                }
        
    }
    

?>