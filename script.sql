-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemwkwp.mysql.db
-- Généré le :  Lun 12 Janvier 2015 à 08:09
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemwkwp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftp_compte`
--

CREATE TABLE IF NOT EXISTS `ftp_compte` (
  `loginCpt` varchar(20) NOT NULL,
  `mdpCpt` varchar(45) NOT NULL,
  `mailCpt` varchar(45) NOT NULL,
  `idCarb` int(11) DEFAULT NULL,
  PRIMARY KEY (`loginCpt`),
  KEY `idCarb` (`idCarb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ftp_compte`
--

INSERT INTO `ftp_compte` (`loginCpt`, `mdpCpt`, `mailCpt`, `idCarb`) VALUES
('test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 1),
('test2', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ftp_compte`
--
ALTER TABLE `ftp_compte`
  ADD CONSTRAINT `ftp_compte_ibfk_1` FOREIGN KEY (`idCarb`) REFERENCES `ftp_carburant` (`idCar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemwkwp.mysql.db
-- Généré le :  Lun 12 Janvier 2015 à 08:09
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemwkwp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftp_ville`
--

CREATE TABLE IF NOT EXISTS `ftp_ville` (
  `idVil` int(11) NOT NULL AUTO_INCREMENT,
  `nomVil` varchar(45) NOT NULL,
  `latVil` varchar(25) NOT NULL,
  `longVil` varchar(25) NOT NULL,
  `cpVil` varchar(5) NOT NULL,
  PRIMARY KEY (`idVil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `ftp_ville`
--

INSERT INTO `ftp_ville` (`idVil`, `nomVil`, `latVil`, `longVil`, `cpVil`) VALUES
(1, 'GAP', '44.559638', '6.07975799999997', '05000'),
(2, 'TALLARD', '44.459122073', ' 6.04485602868', '05130'),
(4, 'CHABOTTES', '44.6475783169', ' 6.16791978587', '05260'),
(5, 'BRIANCON', '44.8997800', '6.6420100', '05100'),
(6, 'TOULON', '43.124228', '5.927999999999997', '83000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemwkwp.mysql.db
-- Généré le :  Lun 12 Janvier 2015 à 08:09
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemwkwp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftp_carburant`
--

CREATE TABLE IF NOT EXISTS `ftp_carburant` (
  `idCar` int(11) NOT NULL,
  `nomCar` varchar(45) NOT NULL,
  PRIMARY KEY (`idCar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ftp_carburant`
--

INSERT INTO `ftp_carburant` (`idCar`, `nomCar`) VALUES
(1, 'Gazole'),
(2, 'SP95'),
(3, 'E85'),
(4, 'GPLc'),
(5, 'E10'),
(6, 'SP98');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemwkwp.mysql.db
-- Généré le :  Lun 12 Janvier 2015 à 08:09
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemwkwp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftp_station`
--

CREATE TABLE IF NOT EXISTS `ftp_station` (
  `idSta` int(11) NOT NULL AUTO_INCREMENT,
  `adresseSta` varchar(45) CHARACTER SET latin1 NOT NULL,
  `latSta` varchar(45) CHARACTER SET latin1 NOT NULL,
  `longiSta` varchar(45) CHARACTER SET latin1 NOT NULL,
  `id_ville` int(11) NOT NULL,
  `non_stop` tinyint(1) NOT NULL,
  `h_ouvert` varchar(5) CHARACTER SET latin1 NOT NULL,
  `h_ferme` varchar(5) CHARACTER SET latin1 NOT NULL,
  `saufjour` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `stationGonflage` tinyint(1) NOT NULL,
  `cpSta` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `automateCb` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSta`),
  KEY `fk_station_ville1_idx` (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `ftp_station`
--

INSERT INTO `ftp_station` (`idSta`, `adresseSta`, `latSta`, `longiSta`, `id_ville`, `non_stop`, `h_ouvert`, `h_ferme`, `saufjour`, `stationGonflage`, `cpSta`, `automateCb`) VALUES
(1, '14 Boulevard d''Orient', '44.5672054', '6.102392900000041', 1, 1, '8', '19', 'non', 1, '05000', 0),
(2, '46 Avenue de Provence', '44.5412892', '6.0577058999999736', 1, 0, '9', '20', 'dimanche', 0, '05000', 0),
(3, '7 Chemin de Châteauvieux', '44.5447599', '6.066259700000046', 1, 0, '8', '19', 'dimanche', 0, '05000', 1),
(4, '8 Route des Fauvins', '44.563532', '6.094913799999972', 1, 0, '8', '20', 'dimanche', 0, '05000', 0),
(5, '14 N85', '44.55884700000001', '6.080690499999946', 1, 1, '10', '20', 'non', 1, '05000', 1),
(9, '253 Avenue Édouard le Bellegou', '43.1177114581', '5.94101238436', 6, 1, '8', '20', 'dimanche', 1, '83000', 0),
(10, '244 Avenue de l''Infanterie de Marine', '43.1151845', '5.934617099999969', 6, 1, '9', '19', 'non', 0, '83000', 1),
(11, '411 Rue Henri Sainte-Claire Deville', '43.1279558', '5.9777434000000085', 6, 1, '7', '19', 'dimanche', 0, '83000', 1),
(12, '94 Avenue Georges Clemenceau', '43.12336490000001', '5.937191200000029', 6, 1, '8', '20', 'dimanche', 1, '83000', 1),
(13, 'Avenue Maréchal de Lattre de Tassigny', '43.1179139', '5.93698889999996', 6, 1, '8', '20', 'non', 0, '83000', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ftp_station`
--
ALTER TABLE `ftp_station`
  ADD CONSTRAINT `fk_station_ville1` FOREIGN KEY (`id_ville`) REFERENCES `ftp_ville` (`idVil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  antoinemwkwp.mysql.db
-- Généré le :  Lun 12 Janvier 2015 à 08:09
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antoinemwkwp`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftp_prixcarburant`
--

CREATE TABLE IF NOT EXISTS `ftp_prixcarburant` (
  `idCar` int(11) NOT NULL,
  `idSta` int(11) NOT NULL,
  `prixCar` varchar(45) NOT NULL,
  `dateDerniereMaj` datetime NOT NULL,
  PRIMARY KEY (`idCar`,`idSta`),
  KEY `fk_prixCarburant_carburant_idx` (`idCar`),
  KEY `fk_prixCarburant_station1_idx` (`idSta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ftp_prixcarburant`
--

INSERT INTO `ftp_prixcarburant` (`idCar`, `idSta`, `prixCar`, `dateDerniereMaj`) VALUES
(1, 1, '1.27', '0000-00-00 00:00:00'),
(1, 2, '1.27', '0000-00-00 00:00:00'),
(1, 3, '1.27', '0000-00-00 00:00:00'),
(1, 4, '1.27', '0000-00-00 00:00:00'),
(1, 5, '1.27', '0000-00-00 00:00:00'),
(1, 13, '1.27', '0000-00-00 00:00:00'),
(2, 1, '1.76', '0000-00-00 00:00:00'),
(2, 2, '1.76', '0000-00-00 00:00:00'),
(2, 3, '1.76', '0000-00-00 00:00:00'),
(3, 1, '1.56', '0000-00-00 00:00:00'),
(3, 2, '1.56', '0000-00-00 00:00:00'),
(3, 4, '1.56', '0000-00-00 00:00:00'),
(4, 1, '1.17', '0000-00-00 00:00:00'),
(4, 2, '1.17', '0000-00-00 00:00:00'),
(4, 5, '1.17', '0000-00-00 00:00:00'),
(4, 10, '1.17', '0000-00-00 00:00:00'),
(5, 1, '1.43', '0000-00-00 00:00:00'),
(5, 2, '1.43', '0000-00-00 00:00:00'),
(5, 12, '1.43', '0000-00-00 00:00:00'),
(5, 13, '1.43', '0000-00-00 00:00:00'),
(6, 1, '1.65', '0000-00-00 00:00:00'),
(6, 2, '1.65', '0000-00-00 00:00:00'),
(6, 9, '1.65', '0000-00-00 00:00:00'),
(6, 10, '1.65', '0000-00-00 00:00:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ftp_prixcarburant`
--
ALTER TABLE `ftp_prixcarburant`
  ADD CONSTRAINT `fk_prixCarburant_carburant` FOREIGN KEY (`idCar`) REFERENCES `ftp_carburant` (`idCar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prixCarburant_station1` FOREIGN KEY (`idSta`) REFERENCES `ftp_station` (`idSta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
