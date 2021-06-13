-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 juin 2021 à 08:57
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
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `motif_start_id` int NOT NULL,
  `motif_end_id` int NOT NULL,
  `agents_id` int NOT NULL,
  `agents_poles_services_id` int NOT NULL,
  PRIMARY KEY (`id`,`motif_start_id`,`motif_end_id`,`agents_id`,`agents_poles_services_id`),
  KEY `fk_absences_absences_absences_motif_start1_idx` (`motif_start_id`),
  KEY `fk_absences_absences_absences_motif_end1_idx` (`motif_end_id`),
  KEY `fk_absences_absences_agents1_idx` (`agents_id`,`agents_poles_services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `absences_motif_end`
--

DROP TABLE IF EXISTS `absences_motif_end`;
CREATE TABLE IF NOT EXISTS `absences_motif_end` (
  `idmotif_end` int NOT NULL AUTO_INCREMENT,
  `motif_end` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idmotif_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `absences_motif_start`
--

DROP TABLE IF EXISTS `absences_motif_start`;
CREATE TABLE IF NOT EXISTS `absences_motif_start` (
  `idmotif_start` int NOT NULL AUTO_INCREMENT,
  `motif_start` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idmotif_start`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwords` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poles_services_id` int NOT NULL,
  PRIMARY KEY (`id`,`poles_services_id`),
  KEY `fk_agents_poles_services1_idx` (`poles_services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agents_has_applications`
--

DROP TABLE IF EXISTS `agents_has_applications`;
CREATE TABLE IF NOT EXISTS `agents_has_applications` (
  `agents_id` int NOT NULL,
  `applications_id` int NOT NULL,
  `droit` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`agents_id`,`applications_id`),
  KEY `fk_agents_has_applications_applications1_idx` (`applications_id`),
  KEY `fk_agents_has_applications_agents1_idx` (`agents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `poles_services`
--

DROP TABLE IF EXISTS `poles_services`;
CREATE TABLE IF NOT EXISTS `poles_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_pole_service` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences_absences`
--
ALTER TABLE `absences_absences`
  ADD CONSTRAINT `fk_absences_absences_absences_motif_end1` FOREIGN KEY (`motif_end_id`) REFERENCES `absences_motif_end` (`idmotif_end`),
  ADD CONSTRAINT `fk_absences_absences_absences_motif_start1` FOREIGN KEY (`motif_start_id`) REFERENCES `absences_motif_start` (`idmotif_start`),
  ADD CONSTRAINT `fk_absences_absences_agents1` FOREIGN KEY (`agents_id`,`agents_poles_services_id`) REFERENCES `agents` (`id`, `poles_services_id`);

--
-- Contraintes pour la table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `fk_agents_poles_services1` FOREIGN KEY (`poles_services_id`) REFERENCES `poles_services` (`id`);

--
-- Contraintes pour la table `agents_has_applications`
--
ALTER TABLE `agents_has_applications`
  ADD CONSTRAINT `fk_agents_has_applications_agents1` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `fk_agents_has_applications_applications1` FOREIGN KEY (`applications_id`) REFERENCES `applications` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
