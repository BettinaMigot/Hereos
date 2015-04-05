-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Avril 2015 à 14:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `heroes`
--

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
  `kills` int(11) DEFAULT '0',
  `farm` int(11) DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `name`, `xp`, `lvl`, `kills`, `farm`, `description`, `resist_Air`, `resist_Feu`, `resist_Terre`, `resist_Eau`, `resist_Foudre`, `status`, `quete_id_quete`, `user_id_user`, `event_id_event`, `beggining_quest`) VALUES
(15, 'yoloyohan', 45, 0, 4, 0, 'AGHGHGHGH', '1', '1', '0', '0', '1', 'Gentil', NULL, 197, NULL, NULL),
(16, 'EL MIGUEL', 0, 0, 0, 0, 'Hola chiquito', '0', '3', '0', '0', '0', 'Gentil', NULL, 198, NULL, NULL),
(17, 'George', 20, 0, 2, 0, 'lalala lalala la la.', '3', '0', '0', '0', '0', 'Gentil', NULL, 199, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `pouvoir`
--

INSERT INTO `pouvoir` (`id_pouvoir`, `nom_pouvoir`, `air`, `feu`, `terre`, `foudre`, `eau`, `personnage_id_personnage`) VALUES
(7, 'pouvoir 1', 15, 0, 0, 0, 0, 15),
(8, 'pouvoir 2', 0, 15, 0, 0, 0, 15),
(9, 'pouvoir 3', 0, 0, 15, 0, 0, 15),
(10, 'pouvoir 1', 0, 15, 0, 0, 0, 16),
(11, 'pouvoir 2', 0, 0, 15, 0, 0, 16),
(12, 'pouvoir 3', 0, 0, 0, 15, 0, 16),
(13, 'pouvoir 1', 15, 0, 0, 0, 0, 17),
(14, 'pouvoir 2', 15, 0, 0, 0, 0, 17),
(15, 'pouvoir 3', 15, 0, 0, 0, 0, 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `userName`, `password`, `level`) VALUES
(197, 'yohan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '0'),
(198, 'Miguel', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '0'),
(199, 'George', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '0');

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
