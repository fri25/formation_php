<?php
// Définition du Trait Horodatage
trait Horodatage {
    public function afficherHorodatage() {
        echo "Date de création : " . date("d/m/Y H:i:s") . "<br>";
    }
}

// Classe Tache utilisant le Trait Horodatage
class Tache {
    use Horodatage; // Inclusion du trait

    private $titre;

    public function __construct($titre) {
        $this->titre = $titre;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function afficherInfos() {
        echo "Tâche : " . $this->getTitre() . "<br>";
        $this->afficherHorodatage(); // Appel du trait
    }
}

// Test du Trait avec une tâche
$tache1 = new Tache("Apprendre les Traits en PHP");
$tache1->afficherInfos();
?>
