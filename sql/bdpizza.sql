-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 mai 2022 à 15:32
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id` smallint(3)  NOT NULL AUTO_INCREMENT,
  `avatar` varchar(20) NOT NULL,
  `Nom_client` varchar(30) NOT NULL,
  `Prenom_client` varchar(30) NOT NULL,
  `Tel_client` varchar(30) NOT NULL,
  `Adresse_client` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Note_client` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '1',
  `role` varchar(8) NOT NULL DEFAULT 'client',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Tel_client` (`Tel_client`),
  KEY `username` (`username`)
  );

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id`, `avatar`, `Nom_client`, `Prenom_client`, `Tel_client`, `Adresse_client`, `username`, `Note_client`, `password`, `statut`, `role`) VALUES
(1, 'icon.png', 'Gassi', 'ruphin', '678999999', 'logpom', 'ruphin237', 'ok', 'e10adc3949ba59abbe56e057f20f883e', 1, 'client'),
(2, '', 'Kouamo', 'didi', '697814134', 'pk12', 'dilane23', 'cool', '670b14728ad9902aecba32e22fa4f6bd', 1, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `Id` smallint(3)  NOT NULL AUTO_INCREMENT,
  `Id_client` int(11) NOT NULL,
  `Libelle_commande` varchar(30) NOT NULL,
  `Nom_client` varchar(30) NOT NULL,
  `Date_commande` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PU` varchar(200) NOT NULL,
  `PT` varchar(200) NOT NULL,
  `Qte` int(10) NOT NULL,
  `Date_livraison` varchar(30) NOT NULL,
  `Heure_livraison` varchar(5) NOT NULL,
  `Lieu_livraison` varchar(70) NOT NULL,
  `Numero_client` varchar(20) NOT NULL,
  `Note` varchar(200) NOT NULL DEFAULT 'Aucune',
  `statut` varchar(30) NOT NULL DEFAULT 'Non livre',
  PRIMARY KEY (`Id`)
);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `Id` smallint(3)  NOT NULL AUTO_INCREMENT,
  `Nom_ingredient` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ;

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
);

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
);

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`Id`, `Nom_pizza`, `Prix_pizza`, `taille_pizza`) VALUES
(1, 'Basquez', 8000, 12),
(2, 'Maguaritha', 12000, 7),
(3, 'Sebastinos', 4000, 5);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
