<?php
// Définition de la classe abstraite Personne
abstract class Personne {
    protected $nom; // Propriété protégée

    public function __construct($nom) {
        $this->nom = $nom;
    }

    // Méthode abstraite : chaque classe dérivée doit l'implémenter
    abstract public function afficherInfos();
}

// Classe Utilisateur héritant de Personne
class Utilisateur extends Personne {
    public function afficherInfos() {
        echo "Utilisateur : $this->nom<br>";
    }
}

// Classe Admin héritant de Personne
class Admin extends Personne {
    public function afficherInfos() {
        echo "Admin : $this->nom<br>";
    }
}

// Instanciation et test des classes
$user = new Utilisateur("Alice");
$admin = new Utilisateur("BOB");

$user->afficherInfos(); // Affichera "Utilisateur : Alice"
$admin->afficherInfos(); // Affichera "Admin : Bob"
?>
