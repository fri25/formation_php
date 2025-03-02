<?php
// Définition d'une classe
class Utilisateur {
    public $nom; // Propriété de la classe
    public $email;

    // Constructeur : s’exécute automatiquement à l’instanciation
    public function __construct($nom, $email) {
        $this-> nom = $nom;
        $this-> email = $email;

    }

    // Méthode : une fonction à l’intérieur d’une classe
    public function afficherNom() {
        return "l'utilisateur s'appelle $this->nom et son mail est: $this->email";
    }
}

// Instanciation d'un objet
$user1 = new Utilisateur("Frida", "elfridayemadje@gmail.com");
$user2 = new Utilisateur("Toni", "toni@gmail.com");
echo $user1->afficherNom(); 
echo $user2->afficherNom();
?>