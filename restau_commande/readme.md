
# Gestion des Stocks - Supermarché

![HTML](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

Ce projet permet aux clients d’un restaurant de passer leurs commandes en ligne et de suivre leur statuten utilisant une base de données MySQL. Il implémente les opérations CRUD (Create, Read, Update, Delete) pour ajouter, afficher, modifier et supprimer des commandes. Un système de validation des status est également disponible.

---

## Table des matières

- [Présentation](#présentation)
- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Contribuer](#contribuer)
- [Licence](#licence)

---

## Présentation

Cette application web développé permet aux clients d’un restaurant de passer leurs commandes en ligne et de suivre leur statut.stocké dans une base de données MySQL, et toutes les requêtes sont sécurisées grâce à l'utilisation de PDO avec des requêtes préparées (`prepare()`).

---

## Fonctionnalités

- **CRUD complet** : Ajout, lecture, modification et suppression des commandes.
- **suivi du status** : Recherche rapide par nom de produit.
- **Validation des données** : Vérifie que tous les champs obligatoires sont remplis avant d'exécuter les opérations.
- **Sécurité** : Utilise PDO pour protéger contre les injections SQL.
- **Design responsive** : Interface utilisateur stylisée avec Bootstrap pour une expérience utilisateur agréable sur tous les appareils.

---

## Technologies utilisées

- **Backend** : PHP 7.x ou supérieur
- **Base de données** : MySQL
- **Frontend** : HTML, CSS (avec tailwind), JavaScript
- **ORM/Liaison BDD** : PDO (PHP Data Objects)

---

## Installation

Suivez ces étapes pour installer et configurer le projet localement :

### 1. Cloner le dépôt

```bash
git clone https://github.com/digitaleflex/elfrida-formation.git
cd projet-restau_commande/
```

### 2. Créer la base de données

Créez une base de données MySQL nommée `gestion-restau` et exécutez le script SQL suivant pour créer les table `clients` et `commandes` :

```sql
CREATE DATABASE gestion-restau;

USE gestion-restau;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR NOT NULL
);

CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clients_id int NOT NULL,
    produit VARCHAR(100) NOT NULL,
    statut ENUM `en attente, validée, livrée` NULL
);
```

### 3. Configurer la connexion à la base de données

Ouvrez le fichier `db.php` et modifiez les paramètres de connexion selon votre configuration MySQL :

```php
$host = 'localhost'; // Hôte MySQL
$dbname = 'gestion_restau'; // Nom de la base de données
$username = 'root'; // Utilisateur MySQL
$password = ''; // Mot de passe MySQL
```

### 4. Démarrer un serveur local

Placez les fichiers du projet dans le répertoire de votre serveur web local (par exemple, `htdocs` pour XAMPP). Accédez ensuite à l'application via votre navigateur :

```
http://localhost/restau_commande/index.php
```


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

## Auteur

- **Elfrida** - [@fri25](https://github.com/fri25)

Si vous avez des questions ou besoin d'aide, n'hésitez pas à ouvrir une issue sur ce dépôt !
```
