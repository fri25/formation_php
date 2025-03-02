# Projet de Sécurisation des Formulaires Web

Ce projet rassemble plusieurs exercices visant à renforcer la sécurité des applications web. Il couvre diverses vulnérabilités classiques telles que les attaques XSS, CSRF, l'injection SQL, ainsi que la sécurisation des mots de passe et la mise en place d'une politique CSP.

---

## Objectifs de Chaque Exercice

- **Exercice 1 : Protection Contre les Attaques XSS**  
  Empêcher l'exécution de code malveillant dans un formulaire de contact en utilisant `htmlspecialchars()` pour échapper les entrées utilisateur.

- **Exercice 2 : Protection Contre les Attaques CSRF**  
  Mettre en place un token CSRF pour sécuriser un formulaire de modification des informations utilisateur. Ce token, généré via `bin2hex(random_bytes(32))`, est stocké en session et vérifié lors de la soumission du formulaire.

- **Exercice 3 : Sécurisation des Mots de Passe par Hashage**  
  Garantir la sécurité des mots de passe en utilisant `password_hash()` lors de l'inscription et `password_verify()` lors de la connexion, afin de stocker et vérifier des mots de passe de manière sécurisée.

- **Exercice 4 : Prévention de l'Injection SQL avec PDO**  
  Sécuriser les requêtes SQL en utilisant PDO et des requêtes préparées pour l'authentification, empêchant ainsi les attaques par injection SQL.

- **Exercice 5 : Formulaire de Contact Ultra-Sécurisé**  
  Combiner plusieurs techniques de sécurité (XSS, CSRF, Injection SQL) dans un seul formulaire de contact pour assurer la protection complète des données utilisateur.

- **Exercice Bonus : Mise en Place d'une Politique CSP (Content Security Policy)**  
  Renforcer la sécurité contre les attaques XSS en configurant une Content Security Policy qui limite les sources autorisées pour les scripts, images et autres ressources.

---

## Étapes d'Installation et d'Exécution

### Prérequis

- **Environnement Serveur :**  
  PHP 7.x ou supérieur  
  Serveur web (Apache, Nginx, etc.)

- **Base de Données :**  
  MySQL ou toute autre base compatible avec PDO (pour les exercices impliquant une base de données)

- **Navigateur Web :**  
  Pour tester et visualiser les pages de formulaires

### Installation

1. **Cloner ou Télécharger le Projet :**  
   Clonez le dépôt dans votre répertoire de travail :
   ```bash
   git clone <URL_DU_PROJET>
