<?php
// Définition de l'interface Authentifiable
interface Authentifiable {
    public function seConnecter();
}

// Classe Utilisateur implémente l'interface
class Utilisateur implements Authentifiable {
    protected $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function seConnecter() {
        echo "Connexion en tant qu'utilisateur : $this->nom<br>";
    }
}

// Classe Admin implémente aussi l'interface
class Admin extends Utilisateur {
    public function seConnecter() {
        echo "Connexion en tant qu'admin : $this->nom<br>";
    }
}

// Test de l'interface
$user = new Utilisateur("Alice");
$admin = new Utilisateur ("Bob");

$user->seConnecter(); // Affichera "Connexion en tant qu'utilisateur"
$admin->seConnecter(); // Affichera "Connexion en tant qu'admin"
