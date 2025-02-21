CREATE DATABASE gestion_restau;

CREATE TABLE `clients` (
 `client_id` int NOT NULL AUTO_INCREMENT,
 `nom` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `telephone` varchar(100) NOT NULL,
 PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci


CREATE TABLE `commandes` (
 `id` int NOT NULL AUTO_INCREMENT,
 `client_id` int NOT NULL,
 `produit` varchar(100) NOT NULL,
 `statut` enum('en attente','validée','livrée','') NOT NULL,
 PRIMARY KEY (`id`),
 KEY `client_id` (`client_id`),
 CONSTRAINT `commandes_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
