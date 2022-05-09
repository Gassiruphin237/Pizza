-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 31 déc. 2020 à 08:33
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom_client` varchar(30) NOT NULL,
  `Prenom_client` varchar(30) NOT NULL,
  `Tel_client` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Adresse_client` varchar(30) NOT NULL,
  `Note_client` varchar(30) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Tel_client` (`Tel_client`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id`, `Nom_client`, `Prenom_client`, `Tel_client`, `Adresse_client`, `Note_client`, `username`, `password`) VALUES
(1, 'gassi', 'ruphin', '697814134', 'logpom', 'ok', 'admin', '123456'),
(2, 'pouani', 'ulrich', '698745241', 'logbessous', 'ok', 'admin2', '123456'),
(3, 'tiako ', 'cedrick', '680245612', 'pk10', 'satisfait', NULL, ''),
(4, 'nounkimi', 'patrick', '698784514', 'logpom', 'good', NULL, ''),
(5, 'mbombouo', 'ibrahim', '677874512', 'logbessous', 'cool', NULL, ''),
(6, 'betsem', 'audrey', '698745124', 'cité palmier', 'cool', NULL, ''),
(7, 'bouagang', 'fortune', '687444444', 'pk10', 'ok', 'fortune25', '123877777');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id` smallint(3) UNSIGNED NOT NULL,
  `Nom_client` varchar(30) NOT NULL,
  `Nom_commande` varchar(30) NOT NULL,
  `Libéllé_commande` varchar(30) NOT NULL,
  `Qté` int(10) NOT NULL,
  `Date_commande` varchar(30) NOT NULL,
  `Prix_unitaire` int(10) NOT NULL,
  `Rémise` int(30) NOT NULL,
  `Prix_total` int(30) NOT NULL,
  `Date_livraison` varchar(30) NOT NULL,
  `Note` varchar(30) NOT NULL,
  `statut` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom_ingredient` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom_livreur` varchar(30) NOT NULL,
  `Tel_livreur` int(30) NOT NULL,
  `Date_embauche` varchar(30) NOT NULL,
  `Note` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `Id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom_pizza` varchar(30) NOT NULL,
  `Prix_pizza` int(30) NOT NULL,
  `taille_pizza` int(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
