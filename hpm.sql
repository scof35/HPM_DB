-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 06:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id_maison` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `etat_reel` tinyint(1) NOT NULL,
  `etat_demande` tinyint(1) NOT NULL,
  `demande_traitee` tinyint(1) NOT NULL,
  `puissance_cumulee` float NOT NULL,
  `puissance_actuelle` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id_maison`, `id_capteur`, `description`, `etat_reel`, `etat_demande`, `demande_traitee`, `puissance_cumulee`, `puissance_actuelle`) VALUES
(1, 100, 'Salle a manger', 0, 0, 0, 5.3, 2.5),
(1, 101, 'Cuisine', 1, 1, 0, 5.3, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `maisons`
--

CREATE TABLE IF NOT EXISTS `maisons` (
  `id_maison` int(11) NOT NULL,
  `login` varchar(6) CHARACTER SET utf8 NOT NULL,
  `password` varchar(6) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maisons`
--

INSERT INTO `maisons` (`id_maison`, `login`, `password`) VALUES
(1, 'hpm1', 'pwd1'),
(2, 'hpm2', 'pwd2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
