-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 29 Mars 2015 à 18:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `heroes`
--
CREATE DATABASE IF NOT EXISTS `heroes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `heroes`;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `xp` int(11) NOT NULL,
  `renommé` int(11) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `xp` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `resist_Air` varchar(45) NOT NULL,
  `resist_Feu` varchar(45) NOT NULL,
  `resist_Terre` varchar(45) NOT NULL,
  `resist_Eau` varchar(45) NOT NULL,
  `resist_Foudre` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `quete_id_quete` int(11) DEFAULT NULL,
  `user_id_user` int(11) NOT NULL,
  `event_id_event` int(11) DEFAULT NULL,
  `beggining_quest` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_personnage`),
  KEY `fk_personnage_quete1_idx` (`quete_id_quete`),
  KEY `fk_personnage_user1_idx` (`user_id_user`),
  KEY `fk_personnage_event1_idx` (`event_id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `name`, `xp`, `lvl`, `description`, `resist_Air`, `resist_Feu`, `resist_Terre`, `resist_Eau`, `resist_Foudre`, `status`, `quete_id_quete`, `user_id_user`, `event_id_event`, `beggining_quest`) VALUES
(4, 'Chouche', 5, 1, 'Mouton à poil raz', '0', '0', '1', '0', '1', 'Gentil', NULL, 2, NULL, NULL),
(6, 'BOB', 5, 0, NULL, '3', '0', '0', '0', '0', 'Gentil', NULL, 193, NULL, NULL),
(7, 'Jean Herbert de la Motte', 5, 0, NULL, '0', '1', '1', '0', '1', 'Gentil', NULL, 194, NULL, NULL),
(9, 'dazdazddazdzad', 5, 0, '', '3', '0', '0', '0', '0', 'Gentil', NULL, 1, NULL, NULL),
(11, 'jejejejejejejeje', 5, 0, 'jejejejeje', '3', '0', '0', '0', '0', 'Gentil', NULL, 192, NULL, NULL),
(12, 'jejejejejejejeje', 5, 0, 'jejejejeje', '3', '0', '0', '0', '0', 'Gentil', NULL, 192, NULL, NULL),
(13, 'bambi', 5, 0, 'bambi', '3', '0', '0', '0', '0', 'Gentil', NULL, 195, NULL, NULL),
(14, 'polochon', 20, 0, 'petit poisson', '0', '3', '0', '0', '0', 'Gentil', NULL, 196, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pouvoir`
--

CREATE TABLE IF NOT EXISTS `pouvoir` (
  `id_pouvoir` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pouvoir` varchar(45) NOT NULL,
  `air` int(11) NOT NULL,
  `feu` int(11) NOT NULL,
  `terre` int(11) NOT NULL,
  `foudre` int(11) NOT NULL,
  `eau` int(11) NOT NULL,
  `personnage_id_personnage` int(11) NOT NULL,
  PRIMARY KEY (`id_pouvoir`),
  KEY `fk_pouvoir_personnage1_idx` (`personnage_id_personnage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `pouvoir`
--

INSERT INTO `pouvoir` (`id_pouvoir`, `nom_pouvoir`, `air`, `feu`, `terre`, `foudre`, `eau`, `personnage_id_personnage`) VALUES
(1, 'vol', 15, 0, 0, 0, 0, 13),
(2, 'feu', 0, 15, 0, 0, 0, 13),
(3, 'lol', 0, 0, 0, 0, 15, 13),
(4, 'coup de nageoire', 0, 0, 0, 0, 15, 14),
(5, 'nager comme un poisson', 0, 0, 0, 0, 15, 14),
(6, 'bulle', 0, 0, 0, 0, 15, 14);

-- --------------------------------------------------------

--
-- Structure de la table `quete`
--

CREATE TABLE IF NOT EXISTS `quete` (
  `id_quete` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `temps` float DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `renommé` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_quete`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `quete`
--

INSERT INTO `quete` (`id_quete`, `nom`, `temps`, `xp`, `renommé`, `description`) VALUES
(1, 'Sauver le monde', 60, 100, 10, 'Il faut sauver le monde'),
(2, 'Empêcher la déforestation de l''Amazonie', 30, 50, 5, 'Pensez aux petits outitis trop mignons !'),
(3, 'Tuer le grand méchant', 60, 100, 10, 'Il est méchant et pas beau'),
(4, 'Sauver Noël', 60, 100, 10, 'Il faut sauver Noël'),
(5, 'Sauver Willy', 30, 50, 5, 'Il faut sauver Willy'),
(6, 'Sauver le soldat Ryan', 30, 50, 5, 'Il faut sauver le soldat Ryan'),
(7, 'Tuer René la Taupe', 1, 5, 1, 'Et le monde sera meilleur'),
(8, 'Manger des sushis', 0.1, 5, 1, 'Parce que c''est bon'),
(9, 'Faire un jogging', 0.1, 5, 1, 'Pour ne pas prendre trop de poids quand même');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `userName`, `password`, `level`) VALUES
(1, 'nom', 'mdp', 'admin'),
(2, 'jerome', '1010', '0'),
(68, 'Yauhanne', 'pass', '1'),
(70, 'Jayrom', 'pass', '1'),
(81, 'Bettina', 'nanana', '1'),
(175, 'Nancyyyyy', 'blah', '0'),
(183, 'bettina', 'coucou', '0'),
(185, 'jeremi', 'jeremi', '0'),
(186, 'olivier', 'wallibi', '0'),
(187, 'Alice', 'lala', '0'),
(188, 'petitCaillou', 'root', '0'),
(192, 'test', 'bob', '0'),
(193, 'missImac', 'babebibobu', '0'),
(194, 'GrosKikiDu41', 'patatedouce', '0'),
(195, 'bambi', 'b91f82cfd4e5a2201290f6de6c4b73322d03abdb', '0'),
(196, 'polochon', 'cb1613fa573351659392c3c634db135ac084c6ce', '0');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `fk_personnage_event1` FOREIGN KEY (`event_id_event`) REFERENCES `event` (`id_event`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_quete1` FOREIGN KEY (`quete_id_quete`) REFERENCES `quete` (`id_quete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personnage_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pouvoir`
--
ALTER TABLE `pouvoir`
  ADD CONSTRAINT `fk_pouvoir_personnage1` FOREIGN KEY (`personnage_id_personnage`) REFERENCES `personnage` (`id_personnage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
