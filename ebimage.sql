-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Février 2017 à 13:43
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ebimage`
--

-- --------------------------------------------------------

--
-- Structure de la table `img_generee`
--

CREATE TABLE IF NOT EXISTS `img_generee` (
  `id_gen` int(11) NOT NULL AUTO_INCREMENT,
  `chemin_gen` int(11) NOT NULL,
  `text` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_gen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `img_originale`
--

CREATE TABLE IF NOT EXISTS `img_originale` (
  `id_orig` int(11) NOT NULL AUTO_INCREMENT,
  `chemin_orig` varchar(255) NOT NULL,
  `nom_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_orig`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `img_originale`
--

INSERT INTO `img_originale` (`id_orig`, `chemin_orig`, `nom_img`) VALUES
(1, 'img/img1.jpg', 'img1.jpg'),
(2, 'img/img2.jpg', 'img2.jpg'),
(5, 'img/img3.jpg', 'img3.jpg'),
(6, 'img/img4.jpg', 'img4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
