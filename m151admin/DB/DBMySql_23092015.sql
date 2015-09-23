-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Septembre 2015 à 16:05
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m151admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `dateNaissance`, `description`, `email`, `pseudo`, `mdp`) VALUES
(13, 'Muraro', 'Jeff', '1997-03-01', 'Jeff', 'jeff.muraro@gmail.com', 'jeff.muraro', '5b00a9f538aca4dcc4ed3b5904970ddbf39d4952'),
(14, 'Chauche', 'Benoit', '1997-01-04', 'fdsasfdffds', 'chauche.benoit@gmail.com', 'chauchebnt', '403926033d001b5279df37cbbe5287b7c7c267fa'),
(15, 'Favre', 'Alan', '1995-10-07', 'Alan plex master', 'alan.favre@gmail.com', 'alan.fvr', 'f6889fc97e14b42dec11a8c183ea791c5465b658');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
