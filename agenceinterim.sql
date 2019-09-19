-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 22 Janvier 2019 à 09:58
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agenceinterim`
--

-- --------------------------------------------------------

--
-- Structure de la table `interimaires`
--

CREATE TABLE `interimaires` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `niveautudes` varchar(20) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `interimaires`
--

INSERT INTO `interimaires` (`nom`, `prenom`, `age`, `email`, `mdp`, `niveautudes`, `tel`, `profesion`, `ville`) VALUES
('Calvo', 'Herve', 30, 'aaa@gmail.com', '', NULL, NULL, NULL, NULL),
('Dupuis', 'Jean', 25, 'bbb@gmail.com', 'bbb', NULL, NULL, NULL, NULL),
('Dupont', 'Pierre', 52, 'ccc@gmail.com', 'ccc', NULL, NULL, NULL, NULL),
('Ducobu', 'Patrick', 23, 'ddd@gmail.com', 'eee', NULL, NULL, NULL, NULL),
('Bond', 'James', 63, 'jjj@gmail.com', 'jjj', NULL, NULL, NULL, NULL),
('Calvo', 'Paul', 25, 'ppp@gmail.com', 'ppp', NULL, NULL, NULL, NULL),
('zzz', 'zzz', 36, 'zzz@gmail.com', 'zzz', NULL, NULL, NULL, NULL),
('xxx', 'xxx', 44, 'xxx@gmail.com', 'xxx', NULL, NULL, NULL, NULL),
('yyy', 'yyy', 44, 'yyy@gmail.com', 'yyy', NULL, NULL, NULL, NULL),
('ttt', 'ttt', 11, 'ttt@gmail.com', 'ttt', NULL, NULL, NULL, NULL),
('uuu', 'aa', 44, 'uuu@gmail.fr', 'uuu', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `offresemploi`
--

CREATE TABLE `offresemploi` (
  `poste` varchar(30) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `descriptif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offresemploi`
--

INSERT INTO `offresemploi` (`poste`, `ville`, `descriptif`) VALUES
('Ingenieur informatique', 'Paris', 'Recherche poste ingenieur informatique connaissant Java, C++, Python'),
('Mecanicien', 'Nantes', 'Recherche mecanicien pour voitures FORD, Ferrari'),
('Electronicien', 'Nice', 'Les connaissances pour ce poste sont correspondent aux circuits numeriques et analogiques'),
('Ingenieur informatique', 'Paris', 'poste tres interessant financierement parlant..\r\n3000 Euros nets'),
('Ingenieur infomatique', 'Rennes', 'Pour ce poste le candidat devra connaitre imperativement les langages PHP/MySql et Java \r\n5 ans d\'experience demandes'),
('Ingenieur informatique', 'Paris', 'Pour ce poste nous recherchons une personne qui ne soit pas dans le petrin...\r\nNon je plaisante...\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
