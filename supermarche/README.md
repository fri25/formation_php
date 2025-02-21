# supermarche_db


![HTML](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)


# Project Title

A brief description of what this project does and who it's for

Ce projet est une application web PHP qui permet d'ajouter les produits en utilisant une base de données MySQL. Il implémente les opérations CRUD (Create, Read, Update, Delete) pour ajouter, afficher, modifier et supprimer les produits disponibles, les prix ainsi que le stock. L'interface utilisateur est stylisée avec Bootstrap pour un design moderne et responsive.

# Table des matière

- [Présentation](#présentation)
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Contribuer](#contribuer)
- [Licence](#licence)

# Présentation

Cette application a été développée pour aider les gestionnaire à organiser les produits dans un supermarché. Les produits sont stockées dans une base de données MySQL, et toutes les requêtes sont sécurisées grâce à l'utilisation de PDO avec des requêtes préparées (prepare()).

L'application inclut les pages suivantes :

Liste des produits (index.php) : Affiche tous les produits sous forme de tableau.
Ajout d'un produit (ajouter_produit.php) : Permet d'ajouter un nouveaux produit via un formulaire.
recherche des produits (rechercher.php) : Permet de rechercher le produit en se basant sur le nom.
Modification d'un produit (modifier_produits.php) : Mettre à jour les informations du produit existant.
Suppression d'un produit (supprimer_produits.php) : Supprimer un produit de la base de données.

# Fonctionnalités

CRUD complet : Ajout, lecture, modification et suppression des produits.
Validation des données : Vérifie que tous les champs obligatoires sont remplis avant d'exécuter les opérations.
Recherches des produits: possibilité de faire une recherche des produit selon le nom de l'article.
Sécurité : Utilise PDO pour protéger contre les injections SQL.
Design responsive : Interface utilisateur stylisée avec Bootstrap pour une expérience utilisateur agréable sur tous les appareils.

# Technologies utilisées

Backend : PHP 7.x ou supérieur
Base de données : MySQL
Frontend : HTML, CSS (avec Bootstrap), JavaScript
ORM/Liaison BDD : PDO (PHP Data Objects)

# Installation

### 1. cloner le dépot

```bash
git clone https://github.com/fri25/supermarche_db.git
cd supermarche_db
```

### 2. Créer la base de données
CREATE DATABASE supermarche_db;

USE supermarche_db;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prix DECIMAL(10,2),
    stock INT
); 

### 3. Configurer la connexion à la base de données

Ouvrez le fichier `config.php` et modifiez les paramètres de connexion selon votre configuration MySQL :

```php
$host = 'localhost'; // Hôte MySQL
$dbname = 'supermarche_db'; // Nom de la base de données
$username = 'root'; // Utilisateur MySQL
$password = ''; // Mot de passe MySQL
```
### 4. Démarrer un serveur local

Placez les fichiers du projet dans le répertoire de votre serveur web local (par exemple, `www` pour WAMP). Accédez ensuite à l'application via votre navigateur :

```
http://localhost/supermarche_db/index.php
```

---

## Utilisation

1. **Afficher les produit** : Accédez à `index.php` pour voir la liste des employés.
2. **Ajouter un employé** : Cliquez sur "Ajouter un Employé" pour accéder au formulaire d'ajout.
3. **Rechercher un produit** : Taper le nom de l'article rechercher dans la barre de recherche pour retrouver sur une autre page et cliquer sur "retour" pour revenir sur la page d'acceuil
4. **Modifier un employé** : Cliquez sur "Modifier" à côté de l'employé souhaité pour mettre à jour ses informations.
5. **Supprimer un employé** : Cliquez sur "Supprimer" à côté de l'employé souhaité (une confirmation sera demandée).

---

## Contribuer

Les contributions sont les bienvenues ! Voici comment contribuer à ce projet :

1. Fork le dépôt.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalité`).
3. Commitez vos changements (`git commit -m "Ajoute nouvelle fonctionnalité"`).
4. Poussez votre branche (`git push origin feature/nouvelle-fonctionnalité`).
5. Ouvrez une Pull Request.

---

## Licence

Ce projet est sous licence **MIT**. Consultez le fichier [LICENSE](LICENSE) pour plus de détails.

---
## Authors


- **Elfrida** - [@fri25](https://github.com/fri25)

---

Si vous avez des questions ou besoin d'aide, n'hésitez pas à ouvrir une issue sur ce dépôt !

---

### Remarque
