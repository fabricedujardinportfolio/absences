-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 mai 2021 à 03:30
-- Version du serveur :  8.0.25
-- Version de PHP : 8.0.5
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
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Déchargement des données de la table `absences_absences`
--
INSERT INTO `absences_absences` (`id`, `agents_id`, `motifs_id`, `date_start`, `date_end`) VALUES
(726, 4, 1, '2021-05-12', '2021-05-15'),
(728, 3, 1, '2021-05-12', '2021-05-14'),
(729, 3, 1, '2021-05-12', '2021-05-14'),
(730, 3, 1, '2021-05-12', '2021-05-14'),
(731, 3, 1, '2021-05-12', '2021-05-14'),
(732, 3, 1, '2021-05-12', '2021-05-14'),
(733, 3, 1, '2021-05-12', '2021-05-14'),
(734, 3, 1, '2021-05-12', '2021-05-14'),
(735, 3, 1, '2021-05-12', '2021-05-14'),
(736, 3, 1, '2021-05-12', '2021-05-14'),
(737, 4, 1, '2021-05-12', '2021-05-21'),
(738, 4, 1, '2021-05-12', '2021-05-21'),
(741, 3, 1, '2021-05-18', '2021-05-19'),
(746, 5, 1, '2021-05-17', '2021-05-20'),
(747, 5, 1, '2021-05-17', '2021-05-18'),
(750, 6, 1, '2021-05-12', '2021-05-18'),
(751, 3, 1, '0000-00-00', '0000-00-00'),
(752, 3, 1, '2021-05-12', '2021-05-15'),
(753, 3, 1, '2021-05-12', '2021-05-24'),
(755, 4, 1, '2021-05-19', '0000-00-00'),
(756, 3, 1, '2021-05-12', '2021-05-20'),
(758, 3, 1, '2021-05-24', '0000-00-00'),
(759, 3, 1, '0000-00-00', '0000-00-00'),
(762, 3, 1, '0000-00-00', '0000-00-00'),
(763, 3, 1, '2021-05-13', '0000-00-00'),
(764, 3, 1, '0000-00-00', '0000-00-00'),
(765, 3, 1, '2021-05-25', '0000-00-00'),
(766, 3, 1, '0000-00-00', '0000-00-00'),
(767, 3, 1, '0000-00-00', '0000-00-00'),
(768, 3, 1, '0000-00-00', '0000-00-00'),
(769, 3, 1, '0000-00-00', '0000-00-00'),
(770, 3, 1, '0000-00-00', '0000-00-00'),
(771, 3, 1, '0000-00-00', '0000-00-00'),
(772, 4, 1, '0000-00-00', '0000-00-00'),
(773, 4, 1, '0000-00-00', '0000-00-00'),
(774, 4, 1, '0000-00-00', '0000-00-00'),
(775, 4, 1, '0000-00-00', '0000-00-00'),
(776, 4, 1, '0000-00-00', '0000-00-00'),
(778, 3, 2, '2021-05-25', '0000-00-00'),
(779, 3, 2, '0000-00-00', '0000-00-00'),
(780, 3, 3, '0000-00-00', '0000-00-00'),
(781, 3, 1, '0000-00-00', '0000-00-00'),
(782, 3, 1, '0000-00-00', '0000-00-00'),
(783, 5, 1, '0000-00-00', '0000-00-00'),
(784, 3, 1, '2021-05-25', '2021-05-29'),
(786, 6, 3, '2021-05-25', '2021-05-25'),
(787, 4, 1, '2021-05-25', '2021-05-28'),
(788, 5, 2, '2021-05-25', '2021-05-25'),
(789, 3, 2, '2021-05-25', '0000-00-00'),
(790, 3, 2, '2021-05-25', '0000-00-00'),
(791, 3, 1, '2021-05-25', '2021-05-26');
-- --------------------------------------------------------
--
-- Structure de la table `absences_arguments`
--
DROP TABLE IF EXISTS `absences_arguments`;
CREATE TABLE IF NOT EXISTS `absences_arguments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `motif` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Déchargement des données de la table `absences_arguments`
--
INSERT INTO `absences_arguments` (`id`, `motif`) VALUES
(1, 'Journée'),
(2, 'Matin'),
(3, 'Après-midi');
-- --------------------------------------------------------
--
-- Structure de la table `agents`
--
DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pole_service` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwords` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `email` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connexion_absences` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Déchargement des données de la table `agents`
--
INSERT INTO `agents` (`id`, `name`, `first_name`, `pole_service`, `function`, `passwords`, `active`, `email`, `connexion_absences`) VALUES
(3, 'DUJARDIN', 'Fabrice', 'COM', 'DEV', '123456', 1, 'fabrice.dujardin@giep.nc', 1),
(4, 'RIGAUD', 'Florian', 'IOEPA', 'Agent d\'accueil	', '123456', 0, 'florian.rigaud@giep.nc', 0),
(5, 'Hne', 'Saiqe', 'COM', 'DEV', '123456', 1, 'saiqe.hne@giep.nc', 1),
(6, 'pelage', 'ronny', 'COM', 'Chef du service communication / documentation', '123456', 1, 'ronny.pelage@giep.nc', 1);
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