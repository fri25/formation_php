# **Projet : Envoi d’E-mails avec PHPMailer**

## **Description**
Ce projet a pour objectif de mettre en pratique l’envoi d’e-mails en PHP en utilisant PHPMailer, tout en respectant les bonnes pratiques de sécurité et de structuration des projets. Chaque exercice aborde un aspect spécifique de l’envoi d’e-mails, comme l’envoi simple, les formulaires de contact, l’ajout de pièces jointes, la confirmation d’inscription et les automatismes via CRON.

---

## **Pré-requis**
Avant de commencer, assurez-vous d’avoir les éléments suivants installés et configurés sur votre machine :
- **PHP** (version 7.4 ou supérieure).
- **Composer** (pour gérer les dépendances).
- **PHPMailer** (installé via Composer).
- Un serveur SMTP pour tester l’envoi d’e-mails (exemples : Gmail, Mailtrap).
- Une base de données (MySQL ou autre, selon votre configuration).
- Le module **cURL** activé pour PHP.

### Installation de PHPMailer :
Exécutez la commande suivante dans votre terminal pour installer PHPMailer :
```bash
composer require phpmailer/phpmailer
```


## **Fonctionnalités**
### **Exercice 1 : Envoi d’un E-mail Simple**
- Envoie un e-mail simple avec un expéditeur personnalisé, un destinataire, un sujet et un message.
- Gère les erreurs d’envoi et affiche des messages appropriés.

### **Exercice 2 : Formulaire de Contact**
- Permet aux utilisateurs de soumettre des messages via un formulaire.
- Valide les champs et envoie les messages aux administrateurs par e-mail.
- Bonus : Captcha et enregistrement des messages en base de données.

### **Exercice 3 : Envoi d’un E-mail avec Pièce Jointe**
- Ajoute la possibilité de joindre des fichiers à un e-mail.
- Vérifie la taille et le type des fichiers avant l’envoi.
- Bonus : Gestion sécurisée des fichiers uploadés.

### **Exercice 4 : Confirmation d’Inscription**
- Implémente un système de validation des inscriptions via e-mail.
- Active les comptes après confirmation par lien unique.

### **Exercice 5 : Réinitialisation de Mot de Passe**
- Permet aux utilisateurs de réinitialiser leurs mots de passe via un e-mail sécurisé.
- Gère les expirations des tokens pour renforcer la sécurité.

### **Exercice 6 : Envoi Automatisé (CRON Job)**
- Automatisation de l’envoi d’e-mails via un script planifié.
- Bonus : Rapports automatiques et désabonnement.

---

## **Exécution des Scripts**
- **Étape 1 :** Clonez ce repository :
  ```bash
  git clone https://github.com/fri25/formation_php.git
  ```
- **Étape 2 :** Installez les dépendances avec Composer :
  ```bash
  composer install
  ```
- **Étape 3 :** Lancez un serveur local :
  ```bash
  php -S localhost:8000 -t src
  ```
- **Étape 4 :** Testez chaque script directement dans votre navigateur.

---

## **Bonnes Pratiques**
- Protégez les identifiants sensibles dans `.env`.
- Utilisez HTTPS pour sécuriser les communications.
- Validez et nettoyez toutes les entrées utilisateur pour éviter les attaques (SQL Injection, XSS, etc.).
- Enregistrez les erreurs dans des fichiers de logs pour faciliter le débogage.

---

## **Ressources**
- [Documentation PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [Composer](https://getcomposer.org/)
- [PHP dotenv](https://github.com/vlucas/phpdotenv)

---

## **Auteur**
- Nom : Elfrida YEMADJE
- Contact : [elfridayemadje5@example.com](mailto:elfridayemadje5@example.com)

---

## **Liens Utiles**
- **Lien GitHub :** [Repository](https://github.com/fri25/formation_php.git)

---
