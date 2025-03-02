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

// Instanciation d'un objet
$user1 = new Utilisateur("Alice", "alice@example.com");

// Utilisation du getter pour afficher l'email (au lieu d'un accès direct)
echo "Email de l'utilisateur : " . $user1->getEmail() . "<br>"; 

// Modification de l'email via le setter
$user1->setEmail("nouvel_email@example.com");
echo "Nouvel email : " . $user1->getEmail() . "<br>"; 

// Test avec un email invalide
$user1->setEmail("email_non_valide"); //  Affichera une erreur mais ne modifiera pas l'email
?>
