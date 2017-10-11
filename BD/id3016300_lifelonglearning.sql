-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2017 at 06:04 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3016300_lifelonglearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `civilites`
--

CREATE TABLE `civilites` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `civilites`
--

INSERT INTO `civilites` (`id`, `nom`) VALUES
(1, 'Monsieur'),
(2, 'Madame'),
(3, 'Mixe');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `civilite_id` int(11) NOT NULL,
  `cellulaire` varchar(13) DEFAULT NULL,
  `courriel` varchar(255) DEFAULT NULL,
  `langue_id` int(11) NOT NULL,
  `immeuble_id` int(11) NOT NULL,
  `employe_id` int(11) DEFAULT NULL,
  `poste_id` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `date_envoi_plan_formation` date DEFAULT NULL,
  `informations_supplementaires` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `numero`, `nom`, `prenom`, `civilite_id`, `cellulaire`, `courriel`, `langue_id`, `immeuble_id`, `employe_id`, `poste_id`, `actif`, `date_envoi_plan_formation`, `informations_supplementaires`) VALUES
(3, 'SSS123SSSA', 'Nom', 'Prenom', 2, '5142221111', 'sergio@gmail.com', 2, 2, NULL, 2, 0, NULL, 'no info'),
(7, 'ASDDFGHJKL', 'Test', 'Teeest', 1, '4152122112', 'tesst@gmail.com', 1, 1, 3, 1, 0, '2013-12-14', ''),
(9, 'ASDDFGHJKL', 'Sergio', 'Amaya', 1, '2123122222', 'tessst@gmail.com', 1, 1, 7, 6, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Categorie` enum('Santé et sécurité','Environnement','Qualité','Ressources humaines','Santé et bien-être','Approvisionnement') COLLATE utf8_unicode_ci NOT NULL,
  `Frequence` enum('Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans') COLLATE utf8_unicode_ci NOT NULL,
  `Debut_rappel` enum('Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans') COLLATE utf8_unicode_ci NOT NULL,
  `Modalite` enum('En ligne','Externe','Interne') COLLATE utf8_unicode_ci NOT NULL,
  `Duree` decimal(10,2) NOT NULL,
  `Remarques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `numero`, `Titre`, `Categorie`, `Frequence`, `Debut_rappel`, `Modalite`, `Duree`, `Remarques`) VALUES
(1, '123456', 'test', 'Environnement', '1 semaine', '1 semaine', 'En ligne', 20.00, 'aucune');

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Categorie` enum('Santé et sécurité','Environnement','Qualité','Ressources humaines','Santé et bien-être','Approvisionnement') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Santé et sécurité',
  `Frequence` enum('Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Une seule fois',
  `Debut_rappel` enum('Une seule fois','1 semaine','1 mois','3 mois','6 mois','18 mois','1 an','2 ans','3 ans','4 ans','5 ans') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Une seule fois',
  `Modalite` enum('En ligne','Externe','Interne') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'En ligne',
  `Duree` decimal(10,2) NOT NULL,
  `Remarques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `numero`, `Titre`, `Categorie`, `Frequence`, `Debut_rappel`, `Modalite`, `Duree`, `Remarques`) VALUES
(18, '45', '54', 'Santé et sécurité', '1 semaine', '1 mois', 'En ligne', 0.01, '45');

-- --------------------------------------------------------

--
-- Table structure for table `formations_completees`
--

CREATE TABLE `formations_completees` (
  `id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `Remarque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immeubles`
--

CREATE TABLE `immeubles` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `immeubles`
--

INSERT INTO `immeubles` (`id`, `address`) VALUES
(1, '752 Douglas St, Victoria BC V8W 3M6\r\n'),
(2, '1234, boulevard René-Levesque Est, Montréal H2C 4T6\r\n'),
(3, '141, Louis-Pasteur, Ottawa (Ontario) K1N 6N5 Canada\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `langues`
--

CREATE TABLE `langues` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langues`
--

INSERT INTO `langues` (`id`, `nom`) VALUES
(1, 'Français'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `piece_jointe`
--

CREATE TABLE `piece_jointe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_formation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postes`
--

CREATE TABLE `postes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postes`
--

INSERT INTO `postes` (`id`, `titre`) VALUES
(1, 'Technicien en bâtiment\r\n'),
(2, 'Administrateur de projet\r\n'),
(3, 'Coodonnateur de projet\r\n'),
(4, 'Coordonnatrice contrôle des projets\r\n'),
(5, 'Gestionnaire support technique\r\n'),
(6, 'Etudiant / Stagiaire (Tech)\r\n'),
(7, 'Coordonateur service à l\'immeuble\r\n'),
(8, 'Coordonnateur santé sécurité\r\n'),
(9, 'Adjointe administrative\r\n'),
(10, 'Gestionnaire de projet\r\n'),
(11, 'Gestionnaire d\'équipe de projet\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Coordonateur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `email`, `role_id`, `created`, `modified`) VALUES
(4, 'gogocharter', '$2y$10$8r3lPSKD5.41cDZwsV8oYeKsJvFRKLj9TdCJAMB3fTjzh5PvPUZNu', 'Nicholas Chartier', 'Cooolnico@hotmail.com', 1, '2017-09-06 20:46:35', '2017-09-20 19:33:14'),
(6, 'test', '$2y$10$AwYTijM1EXczbE83MA9SpuUSOXd2WULbQVzWmyCEXxN8Fxng0TEb2', 'nicholas', 'lel@hotmail.com', 1, '2017-09-20 18:19:12', '2017-09-20 18:19:12'),
(7, 'coor', '$2y$10$/OLTv7LDGBlaMMueWxg91Ofc0ns7TotL3eCIobV7VC4bgbiD9D0Ii', 'coordonateur', 'coord@hotmail.com', 2, '2017-09-20 18:33:04', '2017-09-20 18:33:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civilites`
--
ALTER TABLE `civilites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formations_completees`
--
ALTER TABLE `formations_completees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immeubles`
--
ALTER TABLE `immeubles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Indexes for table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civilites`
--
ALTER TABLE `civilites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `formations_completees`
--
ALTER TABLE `formations_completees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `immeubles`
--
ALTER TABLE `immeubles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
