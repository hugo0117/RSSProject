-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 22 déc. 2018 à 10:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbenmora`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `LOGIN` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `PASSWORD` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`LOGIN`, `PASSWORD`) VALUES
('enzomora', '$2y$10$1xX4XqZb/g9WM1nMegjXhuNXkhFO1M8HqmbKuDtvWoFC5vUwNCLpK'),
('hugosoeur', '$2y$10$zPhoZaco56DbybjZm/5iv.0wkkjJki5iEV5buuDeirGTxYZ7FFWs.');

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `URL` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`URL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `URL` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `TITLE` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `DESCRIPTION` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`URL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
