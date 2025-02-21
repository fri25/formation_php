<?php
    require "config.php";

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }


    $id = $_GET['id'];

    $requete= $pdo->prepare("SELECT * FROM `produits` WHERE id = '$id' ");
    $requete->execute();

    $produits = $requete->fetch() ;

        $nom = $produits["nom"];
        $prix = $produits["prix"];
        $stock = $produits["stock"];


        if ($_SERVER["REQUEST_METHOD"]=="POST") {

            $id = $_POST["id"];
            $nom = $_POST["nom"];
            $prix = $_POST["prix"];
            $stock = $_POST["stock"];

            if (empty($nom) || empty($prix) || empty($stock)) {
                $error = "Tous les champs sont obligatoires.";
            } else {
                try {
    
            $execution2 = $pdo->prepare(" UPDATE `produits` SET `nom`='$nom',`prix`='$prix',`stock`='$stock' WHERE `id`='$id';");
            $execution2->execute();
            header(header: "location:index.php");
            exit;

                } catch (PDOException $e)  {
                    $error = "Une erreur est survenue : " . $e->getMessage();
                }
    
            
            }
        }
        
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
        Formulaire d'ajout d'un produit
    </h2>
    <form action="" method="post">
        <fieldset>
        <div>
        <input type="hidden" name="id" value="<?php echo $id;?>">
    </div>
            <div>
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" id="nom" value ="<?php echo $nom;?>" required>
            </div>
            <div> <br>
                <label for="prix" class="form-label">Prix:</label>
                <input type="text" class="form-control" name="prix" id="prix" value ="<?php echo $prix;?>" required>
            </div>

            <div> <br>
                <label for="stock" class="form-label">stock :</label>
                <input type="number" class="form-control" name="stock" id="stock" value ="<?php echo $stock;?>" required>
            </div>
                        
            <div>
                <input type="submit" value="Envoyer" class="btn btn-primary mt-3">
                <input type="reset" value="Annuler" class="btn btn-danger mt-3">
            </div>
        </fieldset>
        
    </form>



</body>
</html>




