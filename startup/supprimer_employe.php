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
    $id = $_GET['id'];

    $requete =$pdo->prepare("DELETE FROM `employes` WHERE `id` = '$id' ");

    $requete->execute();

        if ($requete==true ) {

        header("location:index.php");
    }
?>