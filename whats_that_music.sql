-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 jan. 2020 à 08:40
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `whats_that_music`
--

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`ID`, `NAME`) VALUES
(1, 'Michael Jackson'),
(2, 'Bob Marley'),
(3, 'Kanye West'),
(4, 'Orel San');

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SAMPLES_ID` int(11) NOT NULL,
  `CATEGORIES_ID` int(11) NOT NULL,
  `SUBCATEGORIES_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_SAMPLES_has_CATEGORIES_SAMPLES1` (`SAMPLES_ID`),
  KEY `fk_SAMPLES_has_CATEGORIES_CATEGORIES1` (`CATEGORIES_ID`),
  KEY `fk_SAMPLES_has_CATEGORIES_SUBCATEGORIES1` (`SUBCATEGORIES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`ID`, `SAMPLES_ID`, `CATEGORIES_ID`, `SUBCATEGORIES_ID`) VALUES
(1, 1, 1, 5),
(2, 1, 1, 33),
(3, 2, 2, 2),
(4, 2, 2, 7),
(5, 3, 3, 1),
(6, 4, 5, 9),
(7, 4, 5, 18),
(8, 5, 6, 26),
(9, 6, 1, 5),
(10, 6, 1, 33),
(11, 7, 6, 27),
(12, 8, 4, 10),
(13, 9, 4, 10),
(14, 10, 5, 28),
(15, 11, 7, 22),
(16, 12, 7, 29),
(17, 13, 8, 30),
(18, 14, 8, 30),
(19, 15, 1, 8),
(20, 16, 1, 13),
(21, 16, 1, 33),
(22, 17, 2, 11),
(23, 17, 2, 32),
(24, 18, 6, 31),
(25, 19, 5, 13),
(26, 19, 5, 16),
(27, 20, 1, 2),
(28, 21, 8, 34),
(29, 22, 2, 5),
(30, 22, 2, 2),
(31, 23, 5, 35),
(32, 24, 5, 9),
(33, 25, 1, 7),
(34, 26, 2, 11),
(35, 27, 1, 10),
(36, 28, 1, 36),
(37, 29, 4, 9),
(38, 30, 3, 2),
(39, 31, 2, 5),
(40, 32, 5, 37),
(41, 33, 1, 36),
(42, 34, 4, 1),
(43, 35, 7, 24),
(44, 36, 3, 2),
(45, 37, 5, 35),
(46, 38, 1, 13),
(47, 39, 6, 38),
(48, 40, 6, 26),
(49, 41, 6, 26),
(50, 42, 3, 9),
(51, 43, 3, 1),
(52, 44, 1, 12),
(53, 45, 1, 9),
(54, 46, 4, 9),
(55, 47, 7, 22),
(56, 48, 1, 8),
(57, 48, 1, 33);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID`, `NAME`) VALUES
(1, 'Films'),
(2, 'Séries'),
(3, 'Dessins Animé/Films d&Animation'),
(4, 'Anime'),
(5, 'Jeu Vidéo'),
(6, 'Musique'),
(7, 'Publicité'),
(8, 'Emission TV');

-- --------------------------------------------------------

--
-- Structure de la table `samples`
--

DROP TABLE IF EXISTS `samples`;
CREATE TABLE IF NOT EXISTS `samples` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) NOT NULL,
  `DIFFICULTY` int(11) NOT NULL,
  `IMG` varchar(255) DEFAULT 'default link',
  `MP3` varchar(255) DEFAULT 'default link',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `samples`
--

INSERT INTO `samples` (`ID`, `NAME`, `DIFFICULTY`, `IMG`, `MP3`) VALUES
(1, 'Spider Man : Far From Home', 3, 'Spider_Man_Far_From_Home', 'Spiderman_Far_From_Home_I_love_Led_Zeppelin_Scene_(ACDC)'),
(2, 'Kaamelott', 2, 'Kaamelott', 'Kaamelott'),
(3, 'Les Cités d&Or', 1, 'Cites_or', 'Les_mysterieuses_cites_or'),
(4, 'The Elder Scrolls V : Skyrim', 1, 'Skyrim', 'Skyrim'),
(5, 'La terre est ronde', 1, 'Orelsan_Le_Chant_des_Sirenes', 'Orelsan_La_terre_est_ronde'),
(6, 'Avengers Main Theme', 1, 'Avengers', 'Avengers'),
(7, 'Avicii - I Could Be The One', 1, 'Avicii_I_Could_Be_The_One', 'Avicii_I_could_be_the_one'),
(8, 'Death Note - L Theme', 2, 'Death_Note_L_Theme', 'Death_Note_L'),
(9, 'Death Note - Opening', 1, 'Death_Note', 'Death_Note_Opening'),
(10, 'Dota 2 - Main Menu', 3, 'Dota2', 'Dota2_Main_Menu'),
(11, 'La petite robe noire, Guerlain', 1, 'La_petite_robe_noire', 'Guerlain_La_petite_robe_noire'),
(12, 'Ikea', 1, 'IKEA', 'Ikea'),
(13, 'Intervilles', 2, 'Intervilles', 'Intervilles'),
(14, 'Qui veut gagner des millions', 1, 'Qui_veut_gagner_des_millions', 'Qui_veut_gagner_des_millions'),
(15, 'Le bon la brute et le truand', 1, 'lblblt', 'Le_bon_la_brute_et_le_truand'),
(16, 'Rogue One', 3, 'Rogue_One', 'Rogue_One'),
(17, 'Lucifer', 2, 'Lucifer', 'Lucifer'),
(18, 'Michael Jackson - Billie Jean', 1, 'Michael_Jackson_Billie_Jean', 'Michael_Jackson_Billie_Jean'),
(19, 'Star Wars Battlefront 2', 3, 'Star_Wars_Battlefront_2', 'Star_Wars_BF2'),
(20, 'Projet X - Heads will roll', 1, 'Projet_X', 'Projet_X_Heads_will_roll'),
(21, 'Cest Pas Sorcier', 1, 'Cest_Pas_Sorcier', 'Cest_Pas_Sorcier'),
(22, 'Chuck Action Theme', 3, 'Chuck_Action_Theme', 'Chuck_Action_Theme'),
(23, 'Dragon Ball Z Budokaï Tenkaïshi 3', 2, 'DBZ_Budokai_3', 'DBZ_Budokai_3'),
(24, 'Dragon Quest Monster Joker', 3, 'DQMJ', 'DQMJ'),
(25, 'Gladiator', 2, 'Gladiator', 'Gladiator'),
(26, 'Hawaii 5-0', 2, 'Hawaii_5-0', 'Hawaii_5-0'),
(27, 'Inception', 2, 'Inception', 'Inception'),
(28, 'Les Choristes', 1, 'Les_Choristes', 'Les_Choristes'),
(29, 'Le Chateau Dans Le Ciel', 2, 'Le_Chateau_Dans_Le_Ciel', 'Le_Chateau_Dans_Le_Ciel'),
(30, 'Astérix et Cléopâtre', 2, 'Le_Pudding_A_LArsenic', 'Le_Pudding_A_LArsenic'),
(31, 'Magnum', 2, 'Magnum', 'Magnum'),
(32, 'Mario Kart Double Dash', 2, 'MKDD', 'MKDD'),
(33, 'Mozart Opera Rock LAssasymphonie', 2, 'Mozart_Opera_Rock', 'Mozart_Opera_Rock_LAssasymphonie'),
(34, 'Neon Genesis Evangelion', 1, 'Neon_Genesis_Evangelion', 'Neon_Genesis_Evangelion'),
(35, 'Nutella', 2, 'Nutella', 'Nutella'),
(36, 'South Park', 1, 'South_Park', 'South_Park'),
(37, 'Super Smash Bros Ultimate', 1, 'SSBU', 'SSBU'),
(38, 'Star Wars Throne Room Music', 2, 'Star_Wars_4', 'Star_Wars_Throne_Room_Music'),
(39, 'The Rolling Stones Paint It Black', 1, 'The_Rolling_Stones_Paint_It_Black', 'The_Rolling_Stones_Paint_It_Black'),
(40, 'Travis Scott Goosebumps', 2, 'Travis_Scott_Goosebumps', 'Travis_Scott_Goosebumps'),
(41, 'Vald Dragon', 2, 'Vald_Dragon', 'Vald_Dragon'),
(42, 'Wakfu', 1, 'Wakfu', 'Wakfu'),
(43, 'Kangoo Juniors', 2, 'Kangoo_Juniors', 'Kangoo_Juniors'),
(44, 'Harry Potter et les Reliques de la Mort Parti', 3, 'HP7_P2', 'Harry_Potter_Deathly_Hallows'),
(45, 'Pirates Des Caraïbes Hissons Nos Couleurs', 1, 'Pirates_Des_Caraïbes_3', 'Pirates_Des_Caraïbes_Hissons_Nos_Couleurs'),
(46, 'DBZ', 1, 'DBZ', 'DBZ'),
(47, 'Dior', 1, 'Dior', 'Dior'),
(48, 'Lone Ranger', 3, 'Lone_Ranger', 'Lone_Ranger');

-- --------------------------------------------------------

--
-- Structure de la table `samples_artists`
--

DROP TABLE IF EXISTS `samples_artists`;
CREATE TABLE IF NOT EXISTS `samples_artists` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SAMPLES_ID` int(11) NOT NULL,
  `ARTISTS_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_SAMPLES_ARTISTS_SAMPLES1` (`SAMPLES_ID`),
  KEY `fk_SAMPLES_ARTISTS_ARTISTS1` (`ARTISTS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `samples_artists`
--

INSERT INTO `samples_artists` (`ID`, `SAMPLES_ID`, `ARTISTS_ID`) VALUES
(1, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`ID`, `NAME`) VALUES
(1, 'NONE'),
(2, 'Comédie'),
(3, 'Drame'),
(4, 'Romance'),
(5, 'Action'),
(6, 'Historique'),
(7, 'Péplum/Cape et d&épée'),
(8, 'Western'),
(9, 'Aventure'),
(10, 'Thriller'),
(11, 'Policier'),
(12, 'Fantastique/Fantasy'),
(13, 'Science Fiction'),
(14, 'Horreur'),
(15, 'Biopic'),
(16, 'FPS'),
(17, 'Retro'),
(18, 'RPG'),
(19, 'Reflexion'),
(20, 'Gestion/Stratégie'),
(21, 'Simulation Sport'),
(22, 'Parfumerie'),
(23, 'Automobile'),
(24, 'Alimentation'),
(25, 'Télé Réalité'),
(26, 'Rap'),
(27, 'Electro/House'),
(28, 'MOBA'),
(29, 'Magasin'),
(30, 'Jeu TV'),
(31, 'Pop'),
(32, 'Netflix'),
(33, 'Disney'),
(34, 'Educatif'),
(35, 'Combat'),
(36, 'Musical'),
(37, 'Course'),
(38, 'Rock');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `fk_SAMPLES_has_CATEGORIES_CATEGORIES1` FOREIGN KEY (`CATEGORIES_ID`) REFERENCES `categories` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SAMPLES_has_CATEGORIES_SAMPLES1` FOREIGN KEY (`SAMPLES_ID`) REFERENCES `samples` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SAMPLES_has_CATEGORIES_SUBCATEGORIES1` FOREIGN KEY (`SUBCATEGORIES_ID`) REFERENCES `subcategories` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `samples_artists`
--
ALTER TABLE `samples_artists`
  ADD CONSTRAINT `fk_SAMPLES_ARTISTS_ARTISTS1` FOREIGN KEY (`ARTISTS_ID`) REFERENCES `artists` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SAMPLES_ARTISTS_SAMPLES1` FOREIGN KEY (`SAMPLES_ID`) REFERENCES `samples` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
