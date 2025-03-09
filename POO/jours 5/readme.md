# Gestion des Sessions et JWT en PHP

Ce projet met en pratique la gestion des sessions, l'utilisation sécurisée des cookies et l'implémentation d'un système d'authentification basé sur les JSON Web Tokens (JWT). Vous allez apprendre à sécuriser une application PHP en utilisant ces technologies.

## Objectifs des Exercices

1. **Exercice 1** : Initiation aux Sessions PHP
   - Manipuler les sessions avec `session_start()`, stocker et récupérer des informations dans `$_SESSION`, sécuriser et détruire la session.
   
2. **Exercice 2** : Création et Sécurisation des Cookies
   - Créer et récupérer des cookies sécurisés, utiliser les options `HttpOnly` et `Secure`.

3. **Exercice 3** : Authentification Basée sur les Sessions
   - Implémenter un système d'authentification simple avec sessions, incluant la vérification des identifiants et la gestion de la session.

4. **Exercice 4** : Génération d'un JWT
   - Générer un JSON Web Token en utilisant la bibliothèque `firebase/php-jwt`.

5. **Exercice 5** : Validation d'un JWT et Accès Protégé
   - Décoder et valider un JWT pour sécuriser l'accès à une ressource protégée.

6. **Exercice 6** : Système d'Authentification Complet avec Sessions et JWT
   - Combiner l'authentification par session et JWT pour un système d'authentification robuste.

7. **Exercice Bonus** : Création d'une API Sécurisée avec JWT
   - Créer une API sécurisée nécessitant un JWT pour accéder aux ressources.

## Étapes d'Installation et d'Exécution

1. **Clonez le dépôt** :

   ```bash
   git clone https://github.com/fri25/formation-php.git
