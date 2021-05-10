-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 mai 2021 à 10:43
-- Version du serveur :  8.0.21
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `giep-master-databass`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences_absences`
--

DROP TABLE IF EXISTS `absences_absences`;
CREATE TABLE IF NOT EXISTS `absences_absences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agents_id` int NOT NULL,
  `motifs_id` int NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absences_agents_idx` (`agents_id`),
  KEY `fk_rh_add_absences_motifs1_idx` (`motifs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=686 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absences_absences`
--

INSERT INTO `absences_absences` (`id`, `agents_id`, `motifs_id`, `date_start`, `date_end`) VALUES
(680, 5, 4, '2021-05-11', '2021-05-07'),
(682, 3, 2, '2021-05-11', '2021-05-21'),
(683, 4, 4, '2021-05-11', '2021-05-14'),
(685, 3, 4, '2021-05-11', '2021-05-14');

-- --------------------------------------------------------

--
-- Structure de la table `absences_arguments`
--

DROP TABLE IF EXISTS `absences_arguments`;
CREATE TABLE IF NOT EXISTS `absences_arguments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `motif` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absences_arguments`
--

INSERT INTO `absences_arguments` (`id`, `motif`) VALUES
(1, 'aucun motif'),
(2, 'AM'),
(3, 'AT'),
(4, 'CP');

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pole_service` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwords` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connexion_absences` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `name`, `first_name`, `pole_service`, `function`, `passwords`, `active`, `email`, `connexion_absences`) VALUES
(3, 'DUJARDIN', 'Fabrice', 'COM', 'DEV', '123456', 1, 'fabrice.dujardin@giep.nc', 1),
(4, 'RIGAUD', 'Florian', 'IOEPA', 'Agent d\'accueil	', '123456', 0, 'florian.rigaud@giep.nc', 0),
(5, 'Hne', 'Saiqe', 'COM', 'DEV', '123456', 1, 'saiqe.hne@giep.nc', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences_absences`
--
ALTER TABLE `absences_absences`
  ADD CONSTRAINT `fk_absences_agents` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `fk_rh_add_absences_motifs1` FOREIGN KEY (`motifs_id`) REFERENCES `absences_arguments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
