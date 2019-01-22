SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  'M306'
--
DROP DATABASE IF EXISTS M306;
CREATE DATABASE IF NOT EXISTS M306 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE M306;

-- --------------------------------------------------------

--
-- Structure de la table 'USERS'
--
-- Création :  Mar 22 Janvier 2019 à 13:40
--

DROP TABLE IF EXISTS USERS;
CREATE TABLE IF NOT EXISTS USERS (
  IdUser int(11) NOT NULL AUTO_INCREMENT,
  Pseudo varchar(50) NOT NULL,
  Email varchar(255),
  Passowrd varchar(41) NOT NULL,
  PRIMARY KEY (IdUser)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table 'USERS'
--

INSERT INTO USERS (IdUser, Pseudo, Email, Passowrd) VALUES
(1, 'root', 'admin@gmail.com', 'f6889fc97e14b42dec11a8c183ea791c5465b658'),
(2, 'Bryan', 'bryan.vllfr@eduge.ch', 'f6889fc97e14b42dec11a8c183ea791c5465b658'),
(3, 'Kaichitv', 'kaichitv@gmail.com', 'f6889fc97e14b42dec11a8c183ea791c5465b658');

-- --------------------------------------------------------

--
-- Structure de la table 'TYPES'
--
-- Création :  Mar 22 Janvier 2019 à 13:40
--

DROP TABLE IF EXISTS TYPES;
CREATE TABLE IF NOT EXISTS TYPES (
  IdType int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(50) NOT NULL,
  PRIMARY KEY (IdType)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table 'TYPES'
--

INSERT INTO TYPES (IdType, Name) VALUES
(1, 'Default'),
(2, 'Sport'),
(3, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table 'ANNONCES'
--
-- Création :  Mar 22 Janvier 2019 à 13:40
--

DROP TABLE IF EXISTS ANNONCES;
CREATE TABLE IF NOT EXISTS ANNONCES (
	IdAnnonce int(11) NOT NULL AUTO_INCREMENT,
	Name varchar(255) NOT NULL,
	Description text,
	Prix double,
	IdUser int(11) NOT NULL,
	IdType int(11) NOT NULL,
	PRIMARY KEY (IdAnnonce),
	FOREIGN KEY (IdUser) REFERENCES USERS(IdUser),
	FOREIGN KEY (IdType) REFERENCES TYPES(IdType)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table 'ANNONCES'
--

INSERT INTO ANNONCES (IdAnnonce, Name, Description, IdUser, IdType) VALUES
(1, 'Nouvelle annonce', 'Test desc', 1, 1),
(2, 'Vente voiture', 'Annonces pour vendre une voiture, sans le prix afficher et par l\'utilisateur Bryan', 2, 3),
(3, 'Vente chaussures de foot', 'De nouveau sans le prix', 3, 2),
(4, 'Last Test annonce', 'Test desc2', 2, 1);