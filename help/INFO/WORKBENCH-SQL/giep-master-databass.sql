-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 juin 2021 à 08:58
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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absences_absences`
--

INSERT INTO `absences_absences` (`id`, `date_start`, `date_end`, `motif_start_id`, `motif_end_id`, `agents_id`, `agents_poles_services_id`) VALUES
(74, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 122, 1),
(75, '2021-06-14 00:00:00', '2021-06-14 00:00:00', 2, 3, 122, 1),
(77, '2021-06-09 00:00:00', '2021-06-10 00:00:00', 2, 3, 130, 12),
(78, '2021-06-07 00:00:00', '2021-06-20 00:00:00', 2, 3, 132, 12),
(79, '2021-06-10 00:00:00', '2021-06-11 00:00:00', 2, 3, 126, 2),
(80, '2021-06-14 00:00:00', '2021-06-16 00:00:00', 2, 3, 124, 2),
(81, '2021-06-14 00:00:00', '2021-06-15 00:00:00', 2, 3, 125, 2),
(82, '2021-06-07 00:00:00', '2021-06-10 00:00:00', 2, 3, 129, 2),
(84, '2021-06-21 00:00:00', '2021-06-22 00:00:00', 2, 3, 158, 3),
(85, '2021-06-11 00:00:00', '2021-06-15 00:00:00', 2, 3, 163, 3),
(86, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 162, 3),
(87, '2021-06-21 00:00:00', '2021-06-21 00:00:00', 2, 3, 162, 3),
(88, '2021-06-04 00:00:00', '2021-06-04 00:00:00', 2, 2, 160, 3),
(89, '2021-06-14 00:00:00', '2021-06-17 00:00:00', 2, 3, 140, 9),
(90, '2021-06-18 00:00:00', '2021-06-20 00:00:00', 3, 3, 140, 9),
(91, '2021-06-09 00:00:00', '2021-06-13 00:00:00', 2, 3, 137, 9),
(92, '2021-06-14 00:00:00', '2021-06-16 00:00:00', 2, 3, 168, 7),
(93, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 170, 7),
(94, '2021-06-07 00:00:00', '2021-06-09 00:00:00', 2, 3, 167, 7),
(95, '2021-06-07 00:00:00', '2021-06-10 00:00:00', 2, 3, 172, 7),
(96, '2021-06-29 00:00:00', '2021-06-29 00:00:00', 2, 3, 172, 7),
(97, '2021-06-07 00:00:00', '2021-06-20 00:00:00', 2, 3, 173, 7),
(98, '2021-06-07 00:00:00', '2021-06-13 00:00:00', 2, 3, 174, 7),
(99, '2021-06-14 00:00:00', '2021-06-20 00:00:00', 2, 3, 176, 7),
(100, '2021-06-23 00:00:00', '2021-06-23 00:00:00', 2, 3, 176, 7),
(101, '2021-06-14 00:00:00', '2021-06-20 00:00:00', 2, 3, 177, 7),
(102, '2021-06-04 00:00:00', '2021-06-04 00:00:00', 2, 2, 178, 7),
(103, '2021-06-07 00:00:00', '2021-06-30 00:00:00', 2, 3, 178, 7),
(104, '2021-06-18 00:00:00', '2021-06-20 00:00:00', 3, 3, 164, 6),
(105, '2021-06-07 00:00:00', '2021-06-13 00:00:00', 2, 3, 204, 4),
(106, '2021-06-01 00:00:00', '2021-06-13 00:00:00', 2, 3, 205, 4),
(107, '2021-06-01 00:00:00', '2021-06-04 00:00:00', 2, 3, 206, 4),
(108, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 209, 4),
(109, '2021-06-28 00:00:00', '2021-06-28 00:00:00', 2, 3, 209, 4),
(110, '2021-06-18 00:00:00', '2021-06-20 00:00:00', 3, 3, 147, 11),
(111, '2021-06-30 00:00:00', '2021-06-30 00:00:00', 2, 3, 147, 11),
(112, '2021-06-28 00:00:00', '2021-06-29 00:00:00', 2, 3, 148, 11),
(113, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 151, 11),
(114, '2021-06-01 00:00:00', '2021-06-04 00:00:00', 2, 3, 153, 11),
(115, '2021-06-10 00:00:00', '2021-06-10 00:00:00', 2, 3, 154, 11),
(116, '2021-06-03 00:00:00', '2021-06-03 00:00:00', 2, 3, 154, 11),
(117, '2021-06-07 00:00:00', '2021-06-07 00:00:00', 2, 3, 190, 5),
(118, '2021-06-14 00:00:00', '2021-06-20 00:00:00', 2, 3, 190, 5),
(119, '2021-06-21 00:00:00', '2021-06-27 00:00:00', 2, 3, 192, 5),
(120, '2021-06-14 00:00:00', '2021-06-14 00:00:00', 2, 2, 193, 5),
(121, '2021-06-14 00:00:00', '2021-06-15 00:00:00', 2, 3, 199, 13),
(122, '2021-06-28 00:00:00', '2021-06-28 00:00:00', 2, 3, 135, 12),
(123, '2021-06-21 00:00:00', '2021-06-25 00:00:00', 2, 3, 213, 10),
(124, '2021-06-18 00:00:00', '2021-06-21 00:00:00', 2, 3, 166, 6),
(125, '2021-06-14 00:00:00', '2021-06-20 00:00:00', 2, 3, 208, 4),
(126, '2021-06-14 00:00:00', '2021-06-14 00:00:00', 2, 3, 209, 4),
(127, '2021-06-28 00:00:00', '2021-06-30 00:00:00', 2, 3, 145, 11),
(128, '2021-06-14 00:00:00', '2021-06-16 00:00:00', 2, 3, 156, 11),
(129, '2021-06-18 00:00:00', '2021-06-21 00:00:00', 3, 3, 157, 11);

-- --------------------------------------------------------

--
-- Structure de la table `absences_motif_end`
--

DROP TABLE IF EXISTS `absences_motif_end`;
CREATE TABLE IF NOT EXISTS `absences_motif_end` (
  `idmotif_end` int NOT NULL AUTO_INCREMENT,
  `motif_end` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idmotif_end`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absences_motif_end`
--

INSERT INTO `absences_motif_end` (`idmotif_end`, `motif_end`) VALUES
(1, 'Journée'),
(2, 'Matin'),
(3, 'Après-midi');

-- --------------------------------------------------------

--
-- Structure de la table `absences_motif_start`
--

DROP TABLE IF EXISTS `absences_motif_start`;
CREATE TABLE IF NOT EXISTS `absences_motif_start` (
  `idmotif_start` int NOT NULL AUTO_INCREMENT,
  `motif_start` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idmotif_start`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absences_motif_start`
--

INSERT INTO `absences_motif_start` (`idmotif_start`, `motif_start`) VALUES
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
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwords` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poles_services_id` int NOT NULL,
  PRIMARY KEY (`id`,`poles_services_id`),
  KEY `fk_agents_poles_services1_idx` (`poles_services_id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `name`, `first_name`, `function`, `passwords`, `active`, `email`, `poles_services_id`) VALUES
(116, 'DUJARDIN', 'Fabrice', 'Apprenti développeur web', '123', 1, 'fabrice.dujardin@giep.nc', 1),
(117, 'PELAGE', 'Ronny', 'Chef du service communication / documentation', '123456', 1, 'ronny.pelage@giep.nc', 1),
(121, 'DEVILLERS', 'Jérôme', 'Chargé de communication', '123456', 1, 'jerome.devillers@giep.nc', 1),
(122, 'POIROT', 'Céline', 'Gestionnaire de l\'information et de la docume', '123456', 1, 'celine.poirot@giep.nc', 1),
(123, 'MUAVAKA', 'Gabriel', 'Directeur', '123456', 1, 'gabriel.muavaka@giep.nc', 2),
(124, 'N’GUYEN VAN SOC', 'Guillaume', 'Directeur adjoint en charge des finances', '123456', 1, 'guillaume.nguyen-van-soc@giep.nc', 2),
(125, 'VELASCO', 'Pascal', 'Directeur adjoint en charge de la formation', '123456', 1, 'pascal.velasco@giep.nc', 2),
(126, 'GIROLD', 'Laurence', 'Assistante de direction', '123456', 1, 'laurence.girold@giep.nc', 2),
(127, 'LICHA', 'Franck', 'Agent comptable', '123456', 1, 'franck.licha@giep.nc', 2),
(128, 'WAIMO', 'Henriette', 'Gestionnaire comptable', '123456', 1, 'henriette.waimo@giep.nc', 3),
(129, 'WAKA-AWA', 'Corine', 'Assistante de formation et administrative', '123456', 1, 'corine.waka-awa@giep.nc', 2),
(130, 'CACELLI', 'Alexandra', 'Chef du service coordination et Péri-formation', '123456', 1, 'alexandra.cacelli@giep.nc', 12),
(131, 'BODEOUAROU', 'Myra-Flore', 'Surveillante / Animatrice', '123456', 1, 'myra-flore.bodeouarou@giep.nc', 12),
(132, 'MOINO', 'Pascal', 'Surveillant / Animateur', '123456', 1, 'pascal.moino@giep.nc', 12),
(133, 'MOUEAOUMA', 'Gladys', 'Agent polyvalent de restauration', '123456', 1, 'gladys.moueaouma@giep.nc', 12),
(134, 'POARAIRIWA', 'Warren', 'Surveillant / Animateur', '123456', 1, 'warren.poarairiwa@giep.nc', 12),
(135, 'TEUET', 'Fabienne', 'Agent polyvalent de restauration et d’entretien', '123456', 1, 'fabienne.teuet@giep.nc', 12),
(136, 'DEBELS', 'Nathalie', 'Agent d\'entretien péri-formation', '123456', 1, 'nathalie.debels@giep.nc', 12),
(137, 'FEDRONIE', 'Marianne', 'Responsable des pôles de formation I.T.L.M.', '123456', 1, 'marianne.fedronie@giep.nc', 9),
(138, 'AVILA', 'Patrick', 'Assistant technico-pédagogique (Bourail)', '123456', 1, 'patrick.avila@giep.nc', 9),
(139, 'BOIVENT', 'Xavier', 'Formateur en soudure (Bourail)', '123456', 1, 'xavier.boivent@giep.nc', 9),
(140, 'DRISS', 'Stéphanie', 'Référente stagiaires ITL (Bourail)', '123456', 1, 'stephanie.driss@giep.nc', 9),
(141, 'PEBOU-HAMENE', 'Jean-Pierre', 'Formateur en maintenance industrielle (Bourail)', '123456', 1, 'jean-pierre.pebou-hamene@giep.nc', 9),
(142, 'PIRAS', 'Emmanuel', 'Formateur en métallerie et transformation des métaux (Bourail)', '123456', 1, 'emmanuel.piras@giep.nc', 9),
(143, 'RICHARD', 'Carina', 'Gestionnaire comptable ITL (Bourail)', '123456', 1, 'carina.richard@giep.nc', 9),
(144, 'ULM', 'Patrick', 'Chef du service des moyens généraux', '123456', 1, 'patrick.ulm@giep.nc', 11),
(145, 'ADJILIMA', 'Pauline', 'Agent d\'entretien Nouville', '123456', 1, 'pauline.adjilima@giep.nc', 11),
(146, 'AKAPO', 'Emmanuel', 'Agent d’entretien Nouville', '123456', 1, 'emmanuel.akapo@giep.nc', 11),
(147, 'BOUGENOT', 'Charlotte', 'Assistante administrative', '123456', 1, 'charlotte.bougenot@giep.nc', 11),
(148, 'BOURRELLY', 'Stella', 'Agent d\'accueil Bourail', '123456', 1, 'stella.bourrelly@giep.nc', 11),
(149, 'DECOURT', 'Frédéric', 'Chef de projet informatique', '123456', 1, 'frederic.decourt@giep.nc', 11),
(150, 'DIEM', 'Yves', 'Assistant moyens généraux', '123456', 1, 'yves.diem@giep.nc', 11),
(151, 'GOLA', 'Jean-Pierre', 'Responsable des achats', '123456', 1, 'jean-pierre.gola@giep.nc', 11),
(152, 'HNAGEJE', 'Jean', 'Agent d\'accueil Nouville', '123456', 1, 'jean.hnageje@giep.nc', 11),
(153, 'MEDARD', 'Jean-Jacques', 'Agent d\'entretien Bourail', '123456', 1, 'jean-jacques.medard@giep.nc', 11),
(154, 'PARMAN', 'Gilbert', 'Assistant moyens généraux', '123456', 1, 'gilbert.parman@giep.nc', 11),
(155, 'TONG', 'Philippe', 'Agent d\'entretien Bourail	', '123456', 1, 'philippe.tong@giep.nc', 11),
(156, 'TRABE', 'Jean-Christophe', 'Agent d\'entretien Nouville', '123456', 1, 'jean-christophe.trabe@giep.nc\r\n', 11),
(157, 'WACAPO', 'Albert', 'Vaguemestre', '123456', 1, 'albert.wacapo@giep.nc\r\n', 11),
(158, 'BURGUIERE', 'Sandra', 'Gestionnaire comptable', '123456', 1, 'sandra.burguiere@giep.nc', 3),
(159, 'DELRIEU', 'Mylène', 'Responsable des recettes', '123456', 1, 'mylene.delrieu@giep.nc', 3),
(160, 'TELAI', 'Anna', 'Gestionnaire comptable', '123456', 1, 'anna.telai@giep.nc', 3),
(161, 'UPINUE', 'Erika', 'Gestionnaire comptable', '123456', 1, 'erika.upinue@giep.nc', 3),
(162, 'KILAMA', 'Diane', 'Responsable ressources humaines', '123456', 1, 'diane.kilama@giep.nc', 3),
(163, 'FOUCADE', 'Lindsay', 'Assistante ressources humaines', '123456', 1, 'lindsay.foucade@giep.nc', 3),
(164, 'CLAIRET', 'Pierre-Olivier', 'Formateur en mécanique', '123456', 0, 'pierre-olivier.clairet@giep.nc', 6),
(165, 'DUBAIN', 'Sylvain', 'Formateur en mécanique engins', '123456', 1, 'sylvain.dubain@giep.nc', 6),
(166, 'TIAVOUANE', 'Floriane', 'Assistante de formation et administrative', '123456', 1, 'floriane.tiavouane@giep.nc', 6),
(167, 'EVAIN', 'Séverine', 'Responsable Pôle IOEPA', '123456', 1, 'severine.evain@giep.nc', 7),
(168, 'ARMAND', 'Corinne', 'Psychologue (SPOT)', '123456', 1, 'corinne.armand@giep.nc', 7),
(169, 'BOUSQUET', 'Anne', 'Conseillère en évolution professionnelle', '123456', 1, 'anne.bousquet@giep.nc', 7),
(170, 'ECHAPPE', 'Marie', 'Assistante administrative', '123456', 1, 'marie.echappe@giep.nc', 7),
(171, 'EHNYIMANE', 'Marjorie', 'Conseillère en évolution professionnelle', '123456', 1, 'marjorie.ehnyimane@giep.nc', 7),
(172, 'FELS', 'Robineda', 'Conseillère en évolution professionnelle', '123456', 1, 'robineda.fels@giep.nc', 7),
(173, 'JUSSAN', 'Valérie', 'Psychologue', '123456', 1, 'valerie.jussan@giep.nc', 7),
(174, 'MAILLARD', 'Gaëlle', 'Psychologue (Bourail)', '123456', 1, 'gaelle.maillard@giep.nc', 7),
(175, 'MIRAL', 'Jeanne', 'Conseillère en évolution professionnelle', '123456', 1, 'jeanne.miral@giep.nc', 7),
(176, 'RIGAUD', 'Florian', 'Agent d\'accueil', '123456', 1, 'florian.rigaud@giep.nc', 7),
(177, 'SAINTPIERRE', 'Anouck', 'Conseillère en évolution professionnelle', '123456', 1, 'anouck.saintpierre@giep.nc', 7),
(178, 'TAUZIN', 'Marie', 'Psychologue (SPOT)', '123456', 1, 'marie.tauzin@giep.nc', 7),
(179, 'TROUILLOT', 'Marie-Laurence', 'Psychologue (SPOT)	', '123456', 1, 'marie-laurence.trouillot@giep.nc', 7),
(188, 'BARRE', 'Yoann', 'Formateur espace technique industrie', '123456', 1, 'yoann.barre@giep.nc', 5),
(189, 'CAILLET', 'Antony', 'Formateur en éco-recyclage', '123456', 1, 'antony.caillet@giep.nc', 5),
(190, 'CHANTREUX', 'Ennrika', 'Assistante de formation et administrative', '123456', 1, 'ennrika.chantreux@giep.nc\r\n', 5),
(191, 'CHAUVEL', 'Philippe', 'Formateur en accompagnement individualisé', '123456', 1, 'philippe.chauvel@giep.nc', 5),
(192, 'JUSTIN', 'Roselyne', 'Référente stagiaires', '123456', 1, 'roselyne.justin@giep.nc', 5),
(193, 'MERCIER', 'Frédéric', 'Formateur en cuisine', '123456', 1, 'frederic.mercier@giep.nc', 5),
(194, 'VAIMUA SELUI', 'Sylvaine', 'Référente stagiaires', '123456', 1, 'sylvaine.vaimua@giep.nc\r\n', 5),
(195, 'WEBER', 'Marion', 'Formatrice hygiène des locaux et aide à la personne', '123456', 1, 'marion.weber@giep.nc', 5),
(196, 'CORMIER', 'Christophe', 'Formateur serveur en restauration', '123456', 1, 'christophe.cormier@giep.nc', 10),
(197, 'MUCHUITTI', 'Fabien', 'Formateur en cuisine', '123456', 1, 'fabien.muchuitti@giep.nc', 10),
(199, 'PEROTTO - RAMBEAU', 'Aline', 'Formattrice métiers du transport et de la logistique (Bourail)', '123456', 1, 'aline.perotto-rambeau@giep.nc', 13),
(200, 'DELAVEUVE', 'Laurent', 'Responsable Pôle Métiers de la mer', '123456', 1, 'laurent.delaveuve@giep.nc', 4),
(201, 'AUDABRAM', 'Nicolas', 'Formateur polyvalent pont, machine et sécurit', '123456', 1, 'nicolas.audabram@giep.nc', 4),
(202, 'BRAUD', 'Laurent', 'Formateur polyvalent', '123456', 1, 'laurent.braud@giep.nc', 4),
(203, 'GUEGAN', 'Thibaut', 'Formateur polyvalent pont et sécurité', '123456', 1, 'thibaut.guegan@giep.nc', 4),
(204, 'MAPONE', 'Maria', 'Référente stagiaires', '123456', 1, 'maria.mapone@giep.nc', 4),
(205, 'NYIKEINE', 'Pascal', 'Assistant technico-pédagogique', '123456', 1, 'pascal.nyikeine@giep.nc', 4),
(206, 'OLONDE', 'Patrick', 'Formateur polyvalent', '123456', 1, 'patrick.olonde@giep.nc', 4),
(207, 'ROSSI', 'Eric', 'Référent agrément	', '123456', 1, 'eric.rossi@giep.nc', 4),
(208, 'SAO', 'Sapolina', 'Assistante de formation et administrative', '123456', 1, 'sapolina.sao@giep.nc', 4),
(209, 'VO VAN HIEN', 'Anthony', 'Formateur polyvalent', '123456', 1, 'anthony.vo-van-hien@giep.nc', 4),
(212, 'PRADEL', 'Laure', 'Psychologue', '123456', 1, 'laure.pradel@giep.nc', 7),
(213, 'SANCHEZ', 'Emilie', 'Formatrice en hôtellerie back office', '123456', 1, 'emilie.sanchez@giep.nc', 10);

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

--
-- Déchargement des données de la table `agents_has_applications`
--

INSERT INTO `agents_has_applications` (`agents_id`, `applications_id`, `droit`) VALUES
(116, 1, 'A'),
(117, 1, 'A'),
(124, 1, 'U'),
(162, 1, 'U'),
(163, 1, 'U');

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `applications`
--

INSERT INTO `applications` (`id`, `name`) VALUES
(1, 'connexion_absences'),
(2, 'connexion_ressources');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poles_services`
--

INSERT INTO `poles_services` (`id`, `name_pole_service`, `email`, `phone`) VALUES
(1, 'COMMUNICATION / DOCUMENTATION​', 'communication@giep.nc', NULL),
(2, 'DIRECTION', 'direction@giep.nc', '26 57 30'),
(3, 'FINANCE ET RESSOURCE HUMAINE', 'compta@giep.nc​', NULL),
(4, 'METIERS DE LA MER', 'mer@giep.nc', '28 78 63'),
(5, 'SPOT', 'spot@giep.nc', '28 95 10'),
(6, 'MAINTENANCE AUMOBILE / ENGIN', 'auto@giep.nc', '24 02 08'),
(7, 'INFORMATION ORIENTATION', 'orientation@giep.nc', '28 10 82'),
(8, 'NUMÉRO VERT​', NULL, '05 07 09'),
(9, 'INDUSTRIE', 'industrie@giep.nc', '44 12 46'),
(10, 'HÔTELLERIE RESTAURATION', 'hotelrest@giep.nc', '27 78 41'),
(11, 'MOYENS GÉNÉRAUX​', 'smg@giep.nc', NULL),
(12, 'COORDINATION ET PÉRI-FORMATION BOURAIL​', NULL, NULL),
(13, 'TRANSPORT LOGISTIQUE', 'translog@giep.nc', '44 12 46');

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
