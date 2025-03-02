# Exercice 1 : Lecture et Écriture dans un Fichier

## Objectif
Pratiquer la lecture et l'écriture dans un fichier texte en PHP.

## Description
- **journal.txt** : Fichier qui contiendra les entrées du journal.
- **ecrire.php** : Script PHP qui ajoute une nouvelle ligne dans `journal.txt`. Chaque ligne contient la date actuelle et un message personnalisé.
- **lire.php** : Script PHP qui lit et affiche le contenu de `journal.txt` sur une page web en respectant les sauts de ligne (`<br>`).

## Instructions
1. Créez un fichier `journal.txt` dans le même répertoire que vos scripts.
2. Exécutez `ecrire.php` pour ajouter une nouvelle entrée dans le journal.
3. Ouvrez `lire.php` dans votre navigateur pour afficher le contenu du fichier.
4. Assurez-vous que le fichier est correctement fermé après chaque opération de lecture et écriture.

## Résultat Attendu
- Chaque exécution de `ecrire.php` ajoute une ligne contenant la date et le message dans `journal.txt`.
- `lire.php` affiche l'intégralité du contenu du fichier en respectant les sauts de ligne.

## Prérequis
- Serveur web avec PHP (ex : XAMPP, WAMP, MAMP).
- Permissions d'écriture et de lecture sur le fichier `journal.txt`.


# Exercice 2 : Manipulation des Fichiers CSV

## Objectif
Manipuler un fichier CSV en PHP pour ajouter, lire et exporter des données utilisateurs.

## Description
- **users.csv** : Fichier CSV contenant 3 colonnes : `Nom`, `Email`, `Téléphone`.
- **ajouter_utilisateur.php** : Script PHP qui affiche un formulaire HTML permettant d’ajouter un nouvel utilisateur dans `users.csv`.
- **afficher_utilisateurs.php** : Script PHP qui lit `users.csv` et affiche les utilisateurs sous forme de tableau HTML.
- **export_json.php** : Script qui permet d’exporter les données des utilisateurs en format JSON.

## Instructions
1. Créez le fichier `users.csv` et ajoutez la première ligne avec les en-têtes : `Nom,Email,Téléphone`.
2. Utilisez `ajouter_utilisateur.php` pour ajouter de nouveaux utilisateurs via le formulaire.
3. Ouvrez `afficher_utilisateurs.php` dans votre navigateur pour visualiser la liste des utilisateurs.
4. Cliquez sur le bouton d’export pour générer un fichier JSON contenant la liste des utilisateurs.

## Résultat Attendu
- Un formulaire fonctionnel pour ajouter des utilisateurs.
- Une liste d’utilisateurs affichée sous forme de tableau HTML.
- Un fichier JSON généré contenant l’ensemble des utilisateurs.

## Prérequis
- Serveur web avec PHP.
- Permissions d’écriture sur le fichier `users.csv`.


# Exercice 3 : Upload de Fichiers Sécurisé

## Objectif
Gérer l’upload d’images en PHP avec validation de sécurité.

## Description
- **upload.html** : Formulaire HTML permettant d’uploader une image.
- **upload.php** : Script PHP qui gère l’upload d’image en :
  - Limitant les formats acceptés aux formats JPG, PNG et GIF.
  - Limitant la taille du fichier à 2 Mo.
  - Renommant le fichier pour éviter les conflits.
  - Stockant le fichier dans le dossier sécurisé `uploads/`.
- **galerie.php** : Script qui affiche toutes les images uploadées sous forme de galerie.
- **supprimer.php** : Script permettant de supprimer une image via un bouton.

## Instructions
1. Créez un dossier `uploads/` dans le répertoire du projet et assurez-vous que ce dossier possède les permissions d’écriture nécessaires.
2. Accédez au formulaire `upload.html` pour uploader une image.
3. Le script `upload.php` validera le fichier et l’enregistrera dans le dossier `uploads/`.
4. Ouvrez `galerie.php` dans votre navigateur pour visualiser la galerie des images uploadées.
5. Utilisez le bouton de suppression pour retirer une image via `supprimer.php`.

## Résultat Attendu
- Un message de confirmation ou d’erreur s’affiche après l’upload.
- Les images uploadées sont affichées sous forme de galerie.
- Le bouton de suppression permet de retirer une image de la galerie.

## Prérequis
- Serveur web avec PHP.
- Dossier `uploads/` accessible en écriture.


# Exercice 4 (Avancé) : Système de Gestion de Fichiers

## Objectif
Créer une interface web complète pour la gestion de fichiers en PHP.

## Description
- **Interface Web** : Permet d’uploader plusieurs fichiers à la fois, d’afficher la liste des fichiers avec leur date d’upload, de télécharger un fichier en cliquant dessus, et de supprimer un fichier avec confirmation.
- **Sécurité** :
  - Vérification des types MIME et extensions autorisées.
  - Limitation de la taille à 5 Mo par fichier.
  - Hashage du nom de fichier pour éviter les conflits.
  
## Instructions
1. Accédez à l’interface web pour uploader plusieurs fichiers simultanément.
2. Une liste des fichiers uploadés, avec leur date d’upload, est affichée.
3. Cliquez sur un fichier pour le télécharger.
4. Utilisez le bouton de suppression pour retirer un fichier (une confirmation sera demandée avant la suppression).

## Résultat Attendu
- Une interface intuitive permettant l’upload, l’affichage, le téléchargement et la suppression des fichiers.
- Une gestion sécurisée des fichiers avec contrôle des types, limitation de taille et renommage.

## Prérequis
- Serveur web avec PHP.
- Dossier(s) de stockage configuré(s) avec les permissions nécessaires.


# Bonus (Optionnel) : Stockage Avancé avec Base de Données

## Objectif
Modifier l’Exercice 3 pour enregistrer les fichiers uploadés dans une base de données et afficher leurs détails.

## Description
- **Modification de l’upload** : Lors de l’upload via `upload.php`, enregistrez les informations suivantes dans une base de données :
  - Nom du fichier (après renommage).
  - Taille du fichier.
  - Date d’upload.
- **Affichage** : Créez une interface qui affiche la liste des fichiers avec leurs détails en interrogeant la base de données.

## Instructions
1. Configurez la connexion à la base de données (par exemple via un fichier `config.php`).
2. Modifiez le script `upload.php` pour enregistrer les informations du fichier uploadé dans une table dédiée.
3. Créez une page qui affiche la liste des fichiers et leurs détails (nom, taille, date d’upload).
4. Vérifiez que la base de données et la table requise existent et que les permissions sont correctes.

## Résultat Attendu
- Les informations des fichiers uploadés sont enregistrées dans la base de données.
- Une interface affiche une liste détaillée des fichiers depuis la base de données.

## Prérequis
- Serveur web avec PHP.
- Base de données (MySQL, MariaDB, etc.) avec la table appropriée pour stocker les informations des fichiers.
- Permissions de connexion et d’écriture dans la base de données.
