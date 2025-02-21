<?php
try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=localhost;dbname=startup_db", "root", "");
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un employé</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class=" container ">
    <h2 class="bg-primary text-center text-white p-3 mt-3">
        Formulaire d'ajout des employés
    </h2>
    <form action="" method="post">
        <fieldset>
            <div>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
            <div> <br>
                <label for="poste" class="form-label">Poste :</label>
                <input type="text" class="form-control" name="poste" id="poste" required>
            </div>

            <div> <br>  
                <label for="email" class="form-label">Email :</label>
                <input type="text" class="form-control" name="email" id="email" required>
            </div>
                        
            <div>
                <input type="submit" value="Envoyer" class="btn btn-primary mt-3">
                <input type="reset" value="Annuler" class="btn btn-danger mt-3">
            </div>
        </fieldset>
        
    </form>

</body>
</html>


<?php
//envoyer dans la base de données
    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        $nom = $_POST["nom"];
       
        $poste= $_POST["poste"];

        $email= $_POST["email"];

        $verifierEmail = $pdo->prepare("SELECT * FROM `employes` WHERE `email` = :email");
        $verifierEmail->bindParam(':email', $email, PDO::PARAM_STR);
        $verifierEmail->execute();
        $emailExistant = $verifierEmail->fetch();

        if ($emailExistant) {
            // L'email existe déjà
            echo "<div class='alert alert-danger mt-3'>Cet email est déjà utilisé. Veuillez en choisir un autre.</div>";
        } else {
            
            $requete =$pdo->prepare("INSERT INTO `employes`( `nom`, `poste`, `email`) VALUES ('$nom','$poste','$email')");
            $requete->execute();

            if ($requete) {
                echo "<div class='alert alert-success mt-3'>L'exercice a été ajouté avec succès.</div>";
                header("location:index.php");

                } 
        }
    }

?>