<?php
class Utilisateur {
    private $nom;
    private $email;
    private static $fichier = "utilisateurs.json"; // Fichier de stockage JSON

    public function __construct($nom, $email) {
        $this->nom = $nom;
        $this->email = $email;
    }

    // Convertir un utilisateur en tableau associatif
    public function toArray() {
        return [
            "nom" => $this->nom,
            "email" => $this->email
        ];
    }

    // Sauvegarder l'utilisateur dans le fichier JSON
    public function sauvegarderUtilisateur() {
        $utilisateurs = self::chargerUtilisateurs(); // Charger les utilisateurs existants
        $utilisateurs[] = $this->toArray(); // Ajouter le nouvel utilisateur

        // Écrire dans le fichier JSON
        file_put_contents(self::$fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
    }

    // Charger et afficher les utilisateurs depuis le fichier JSON
    public static function chargerUtilisateurs() {
        if (!file_exists(self::$fichier)) {
            return []; // Retourne un tableau vide si le fichier n'existe pas
        }

        $contenu = file_get_contents(self::$fichier);
        return json_decode($contenu, true) ?? []; // Décoder JSON en tableau associatif
    }

    // Afficher tous les utilisateurs enregistrés
    public static function afficherUtilisateurs() {
        $utilisateurs = self::chargerUtilisateurs();
        
        if (empty($utilisateurs)) {
            echo "📌 Aucun utilisateur enregistré.<br>";
            return;
        }

        echo "✅ Liste des utilisateurs enregistrés :<br>";
        foreach ($utilisateurs as $index => $utilisateur) {
            echo ($index + 1) . ". Nom : " . $utilisateur['nom'] . ", Email : " . $utilisateur['email'] . "<br>";
        }
    }
}

// Test du programme
$user1 = new Utilisateur("Alice", "alice@example.com");
$user2 = new Utilisateur("Bob", "bob@example.com");

$user1->sauvegarderUtilisateur();
$user2->sauvegarderUtilisateur();

// Afficher les utilisateurs enregistrés
Utilisateur::afficherUtilisateurs();
?>
