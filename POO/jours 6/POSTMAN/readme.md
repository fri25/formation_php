# API RESTful avec PHP et MySQL

## Objectifs

Ce projet consiste à créer une API RESTful en utilisant PHP et MySQL pour gérer des opérations CRUD (Create, Read, Update, Delete) sur une ressource, comme une liste de contacts. L'API sera construite en suivant une série d'exercices afin de maîtriser les bases de la création d'APIs en PHP.

## Objectifs de chaque exercice

### Exercice 1 : Mise en Place de la Base de Données et de la Table
- Créer une base de données `contacts_api` et une table `contacts` avec les colonnes `id`, `name`, `email`, et `phone`.

### Exercice 2 : Connexion à la Base de Données avec PHP
- Établir une connexion sécurisée à la base de données en utilisant PDO ou MySQLi et gérer les erreurs de connexion.

### Exercice 3 : Implémentation de la Méthode GET pour Récupérer les Contacts
- Créer un endpoint qui permet de récupérer la liste des contacts stockés dans la base de données au format JSON.

### Exercice 4 : Ajout d’un Contact via la Méthode POST
- Créer un endpoint qui permet d’ajouter un nouveau contact dans la base de données via une requête POST.

### Exercice 5 : Mise à Jour d’un Contact via la Méthode PUT
- Permettre la mise à jour des informations d’un contact existant via une requête PUT.

### Exercice 6 : Suppression d’un Contact via la Méthode DELETE
- Permettre la suppression d’un contact via une requête DELETE.

### Exercice Bonus : Gestion Dynamique des Routes et Amélioration de l’API
- Optimiser l'API en ajoutant des fonctionnalités telles que la gestion dynamique des routes, la validation des données, la gestion des erreurs, et la documentation de l'API.

## Outils Utilisés

- **PHP** : Langage de programmation utilisé pour créer l'API.
- **MySQL** : Base de données utilisée pour stocker les contacts.
- **Postman** : Outil utilisé pour tester les différents endpoints de l'API.
- **phpMyAdmin** : Outil pour gérer la base de données via une interface graphique (facultatif).

## Étapes d'Installation et d'Exécution

### Prérequis
Avant de commencer, assurez-vous que les outils suivants sont installés sur votre machine :

- PHP (version 7.4 ou supérieure)
- MySQL
- Postman

### 1. Cloner le dépôt
Clonez ce dépôt sur votre machine locale avec la commande suivante :

```bash
git clone https://github.com/fri25/formation-php.git
