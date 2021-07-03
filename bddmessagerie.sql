-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 03 mars 2020 à 08:59
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddmessagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `filtre`
--

DROP TABLE IF EXISTS `filtre`;
CREATE TABLE IF NOT EXISTS `filtre` (
  `idMot` int(11) NOT NULL AUTO_INCREMENT,
  `mot` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idMot`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `filtre`
--

INSERT INTO `filtre` (`idMot`, `mot`) VALUES
(1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `numMessage` int(128) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `heureDateCreation` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `loginRedacteur` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `numMessage` int(128) NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `heureDateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loginRedacteur` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `loginDestinataire` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagepublique`
--

DROP TABLE IF EXISTS `messagepublique`;
CREATE TABLE IF NOT EXISTS `messagepublique` (
  `numMessage` int(128) NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `heureDateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loginRedacteur` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `messagepublique`
--

INSERT INTO `messagepublique` (`numMessage`, `message`, `heureDateCreation`, `loginRedacteur`) VALUES
(2, 'fgfg', '2020-03-02 22:38:54', 'Nicolas'),
(3, 'fgfgfg', '2020-03-02 22:39:01', 'Nicolas'),
(4, 'je dis oui', '2020-03-03 09:47:29', 'test'),
(5, 'je dis $mI[\"mot\"]', '2020-03-03 09:47:59', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `numTheme` int(128) NOT NULL AUTO_INCREMENT,
  `theme` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`numTheme`, `theme`) VALUES
(1, 'Coronavirus'),
(5, 'Spasfon'),
(4, 'Aspirine'),
(6, 'Anti-bactérien');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `heureDateConnexion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topAdmin` tinyint(1) DEFAULT NULL,
  `urlImage` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `password`, `heureDateConnexion`, `topAdmin`, `urlImage`) VALUES
('eleve01', 'eleve01', '2020-03-03 08:38:05', NULL, ''),
('Nicolas', 'Nicolas', '2020-03-02 12:08:25', NULL, ''),
('Vincent', 'Vincent', '2020-03-02 12:08:40', NULL, ''),
('Mathis', 'Mathis', '2020-03-02 12:08:54', NULL, ''),
('test', 'test', '2020-03-03 09:41:12', NULL, 'Imagespp.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
