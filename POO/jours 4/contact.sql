-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 mars 2025 à 18:01
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact`
--

-- --------------------------------------------------------

--
-- Structure de la table `form_contact`
--

DROP TABLE IF EXISTS `form_contact`;
CREATE TABLE IF NOT EXISTS `form_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `form_contact`
--

INSERT INTO `form_contact` (`id`, `nom`, `email`, `message`) VALUES
(1, 'Elfrida', 'elfridayemadje5@gmail.com', 'lorem'),
(2, 'Elfrida', 'melvineyemadje@gmail.com', 'lorem'),
(3, 'FAFA', 'elfridayemadje5@gmail.com', '<script>alert(\'XSS\');</script>');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `confirm_password` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `email`, `password`, `confirm_password`) VALUES
(1, 'Elfrida', 'elfida@gmail.com', '$2y$10$tzTL88/SnTkaguGBpsE3nOPl2Y0nni8Zf2SmVPDEWK2Jw97Wp9zua', ''),
(2, 'Elfrida', 'elfrifda@gmail.com', '$2y$10$aDB8xewXSfrQNUuXGeK.SOSwz5RCjLrLQ.5/qij59xGowwpehIB0W', ''),
(3, '\' OR 1=1 --', 'elfrida@josdkl', '$2y$10$ANkLsgVt5eyGgmca0iAE6OKIV/gATNqIHfChMmmTdp0/CVt4xKUyu', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
