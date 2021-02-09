-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 fév. 2021 à 19:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `magasins`
--

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `multi_store` enum('true','false') NOT NULL,
  `category` enum('electro-menager','jeux-video','alimentation','pret-a-porter') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id`, `name`, `size`, `city`, `multi_store`, `category`) VALUES
(13, 'MICROMANIA', 37, 'CHAMPS SUR MARNE', 'true', 'jeux-video'),
(15, 'Carrefour', 57, 'Paris', 'false', 'alimentation'),
(17, 'MICROMANIA', 7, 'Paris', 'true', 'jeux-video'),
(18, 'Monoprix', 5, 'Suisse', 'false', 'alimentation'),
(19, 'Darty', 7, 'Mulhouse', 'false', 'electro-menager'),
(20, 'GAMESHOP', 14, 'Paris', 'false', 'jeux-video'),
(21, 'VIDEOGAMESHOP', 9, 'Suisse', 'false', 'jeux-video'),
(22, 'Zara', 10, 'Reims', 'false', 'pret-a-porter'),
(23, 'Uniqlo', 9, 'Paris', 'false', 'pret-a-porter'),
(25, 'Leclerc', 6, 'Paris', 'false', 'alimentation'),
(26, 'Biocoop', 30, 'Nantes', 'false', 'alimentation'),
(27, 'Picard', 16, 'Lyon', 'false', 'alimentation'),
(32, 'CELIO', 130, 'Reims', 'false', 'pret-a-porter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
