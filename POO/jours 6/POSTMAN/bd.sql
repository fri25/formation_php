CREATE DATABASE contacts_api;

USE contacts_api;

CREATE TABLE `contacts` (
 `id` int NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `email` varchar(100) NOT NULL,
 `phone` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

