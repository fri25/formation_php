<?php
// Classe Utilisateur avec encapsulation
class Utilisateur {
    protected $nom;
    private $email; 

    public function __construct($nom, $email) {
        $this->nom = $nom;
        $this->setEmail($email); // Utilisation du setter pour initialiser l'email
    }

    // Getter pour récupérer l'email
    public function getEmail() {
        return $this->email;
    }

    // Setter pour modifier l'email (avec validation)
   public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Vérifie que c'est un email valide
            $this->email = $email;
        } else {
            echo "Erreur : Email invalide !<br>";
        }
    }

    public function afficherInfos() {
        echo "Nom: $this->nom, Email: " . $this->getEmail() . "<br>";
    }
}

// Classe Admin avec encapsulation
class Admin  extends Utilisateur{
   
    private $role; 

    public function __construct($nom,$role, $email) {
         // Appel du constructeur parent
        parent::__construct($nom, $email);
        $this->role = $role; // Utilisation du setter
    }

    // Getter 
    public function getrole() {
        return $this->role;
    }


    public function afficherRole() {
        echo "Nom: $this->nom, role: " . $this->getrole() . "<br>";
    }
}


$utilisateur = new Utilisateur("Jean Dupont", "jean@example.com");
$utilisateur->afficherInfos();

$admin = new Admin("Alice Martin", "alice@example.com", "Super Admin");
$admin->afficherRole();

