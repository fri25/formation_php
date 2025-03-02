<?php
// Définition de la classe Tache
class Tache {
    private $titre; // Propriété privée

    public function __construct($titre) {
        $this->titre = $titre;
    }

    // Getter pour récupérer le titre de la tâche
    public function getTitre() {
        return $this->titre;
    }
}

// Définition de la classe GestionnaireTaches
class GestionnaireTaches {
    private $taches = []; // Tableau privé pour stocker les tâches

    // Méthode pour ajouter une tâche
    public function ajouterTache(Tache $tache) {
        $this->taches[] = $tache;
    }

    // Méthode pour afficher toutes les tâches
    public function afficherTaches() {
        if (empty($this->taches)) {
            echo "Aucune tâche enregistrée.<br>";
            return;
        }

        echo "Liste des tâches :<br>";
        foreach ($this->taches as $index => $tache) {
            echo ($index + 1) . ". " . $tache->getTitre() . "<br>";
        }
    }
}

// Création du gestionnaire de tâches
$gestionnaire = new GestionnaireTaches();

// Ajout de tâches
$tache1 = new Tache("PHP");
$tache2 = new Tache("Learn POO");

$gestionnaire->ajouterTache($tache1);
$gestionnaire->ajouterTache($tache2);

// Affichage des tâches
$gestionnaire->afficherTaches();
?>
