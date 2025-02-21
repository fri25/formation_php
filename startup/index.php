<?php
try {
    // Connexion à la base de données
    $pdo = new PDO("mysql: host=localhost; dbname=startup_db", "root", "");
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur
    die("Erreur : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <h2 class="text-center"> LISTES DES EMPLOYES</h2>
    <a href="ajouter_employe.php" class="btn btn-sm btn-primary"> Nouvelle ajout</a>
    <table class="table table-hover table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Poste</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            
        </thead>
        <tbody>

        <?php
         $stmt=$pdo->query("SELECT * FROM `employes`");
?>
        <?php while ( $employes = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                ?> 
                <tr>
                                      
                        <td><?php echo $employes["nom"]; ?></td>

                        <td><?php echo $employes["poste"]; ?></td>

                        <td><?php echo $employes["email"]; ?></td>

                       <td>
                        <a  class="btn btn-sm btn-primary" href="modifier_employe.php?id=<?php echo $employes['id']; ?>">Modifier</a>
                        <a class="btn btn-sm btn-danger" href="supprimer_employe.php?id=<?php echo $employes['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette ligne ??')">Supprimer</a>
                       </td>
              </tr>
                
            <?php } ?>
                
        </tbody>
    </table>


</body>
</html>



