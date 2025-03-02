# Exercice 1 : Création d'une classe Utilisateur

## Objectif
Comprendre la création d'une classe et l'instanciation d'objets en PHP.

## Instructions
1. Créez une classe `Utilisateur` avec les propriétés suivantes :
   - `nom` (public)
   - `email` (privé)
2. Ajoutez un constructeur pour initialiser ces propriétés.
3. Ajoutez une méthode `afficherInfos()` qui affiche les informations de l’utilisateur.
4. Créez deux objets `Utilisateur` et affichez leurs informations.

## Comment exécuter le code
1. Téléchargez le fichier `instanciation.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php instanciation.php




# Exercice 2 : Encapsulation et Getters/Setters

## Objectif
Appliquer l'encapsulation pour protéger les données.

## Instructions
1. Modifiez la classe `Utilisateur` pour rendre la propriété `email` privée.
2. Ajoutez des méthodes `getEmail()` et `setEmail()` pour accéder/modifier l’email.
3. Testez l'encapsulation en tentant d'accéder directement à `email` depuis un objet (ce qui doit générer une erreur).

## Comment exécuter le code
1. Téléchargez le fichier `encapsulation.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php encapsulation.php



   
# Exercice 3 : Héritage - Création d’un Admin

## Objectif
Comprendre et utiliser l’héritage en PHP.

## Instructions
1. Créez une classe `Admin` qui hérite de `Utilisateur`.
2. Ajoutez une propriété `role` (privée) avec un getter et un setter.
3. Ajoutez une méthode `afficherRole()` qui affiche le rôle de l'admin.
4. Instanciez un `Admin` avec un rôle "Super Admin" et affichez ses informations.

## Comment exécuter le code
1. Téléchargez le fichier `heritage.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php heritage.php



# Exercice 4 : Interface Authentifiable

## Objectif
Comprendre l’utilité des interfaces en PHP.

## Instructions
1. Créez une interface `Authentifiable` avec la méthode `seConnecter()`.
2. Implémentez cette interface dans `Utilisateur` et `Admin`.
3. Chaque classe doit avoir sa propre version de `seConnecter()` :
   - `Utilisateur` affiche "Connexion en tant qu'utilisateur"
   - `Admin` affiche "Connexion en tant qu'admin"
4. Testez en instanciant `Utilisateur` et `Admin` et en appelant `seConnecter()`.

## Comment exécuter le code
1. Téléchargez les fichiers `interface.php`, `instanciation.php`, et `heritage.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php interface.php






   

# Exercice 5 : Gestionnaire de Tâches en POO

## Objectif
Appliquer la Programmation Orientée Objet dans un projet plus structuré.

## Instructions
1. Créez une classe `Tache` avec une propriété `titre` (privée).
2. Ajoutez un constructeur pour initialiser le titre.
3. Ajoutez un getter `getTitre()` pour récupérer le titre.
4. Créez une classe `GestionnaireTaches` avec une propriété privée `$taches` (tableau).
5. Ajoutez une méthode `ajouterTache(Tache $tache)`.
6. Ajoutez une méthode `afficherTaches()` listant toutes les tâches.
7. Testez l'ajout et l'affichage de plusieurs tâches.

## Comment exécuter le code
1. Téléchargez les fichiers `gestion_tache.php` .
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php gestion_tache.php



   
### README.md pour l'exercice 6 : Utilisation des Traits

```markdown
# Exercice 6 : Utilisation des Traits

## Objectif
Découvrir un concept avancé de la Programmation Orientée Objet en PHP.

## Instructions
1. Créez un trait `Horodatage` avec une méthode `afficherHorodatage()` qui affiche la date et l’heure actuelles.
2. Utilisez ce trait dans `Tache` pour afficher la date de création de chaque tâche.
3. Testez le fonctionnement en affichant l’horodatage d’une tâche créée.

## Comment exécuter le code
1. Téléchargez le fichier `trait.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php trait.php






# Exercice 7 : Création d’une Classe Abstraite Personne

## Objectif
Apprendre à structurer son code avec des classes abstraites en PHP.

## Instructions
1. Créez une classe abstraite `Personne` avec une propriété `$nom` protégée.
2. Ajoutez un constructeur qui initialise `$nom`.
3. Ajoutez une méthode abstraite `afficherInfos()`.
4. Modifiez `Utilisateur` et `Admin` pour hériter de `Personne` et implémenter `afficherInfos()`.
5. Instanciez des objets `Utilisateur` et `Admin`, puis appelez `afficherInfos()`.

## Comment exécuter le code
1. Téléchargez le ficher `abstraite.php`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php abstraite.php





# Exercice Bonus : Gestion des utilisateurs avec JSON

## Objectif
Ajouter de la persistance en stockant des données en JSON.

## Instructions
1. Modifiez la classe `Utilisateur` pour qu’elle puisse sauvegarder ses données dans un fichier JSON (`utilisateurs.json`).
2. Ajoutez une méthode `sauvegarderUtilisateur()` qui écrit les informations dans un fichier JSON.
3. Ajoutez une méthode `chargerUtilisateurs()` qui lit et affiche les utilisateurs depuis le fichier JSON.
4. Testez en créant plusieurs utilisateurs et en vérifiant que les données sont bien enregistrées.

## Comment exécuter le code
1. Téléchargez les fichiers `stockage.php` et `utilisateurs.json`.
2. Exécutez le fichier à l'aide de la commande suivante :
   ```sh
   php stockage.php


