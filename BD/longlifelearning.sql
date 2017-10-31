-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 12:10 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `longlifelearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Santé et sécurité'),
(2, 'Environnement'),
(3, 'Qualité'),
(4, 'Ressources humaines'),
(5, 'Santé et bien-être'),
(6, 'Approvisionnement');

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
(3, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `debut_rappels`
--

CREATE TABLE `debut_rappels` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debut_rappels`
--

INSERT INTO `debut_rappels` (`id`, `nom`) VALUES
(1, 'Une seule fois'),
(2, '1 semaine'),
(3, '1 mois'),
(4, '3 mois'),
(5, '6 mois'),
(6, '18 mois'),
(7, '1 an'),
(8, '2 ans'),
(9, '3 ans'),
(10, '4 ans'),
(11, '5 ans');

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
(16, 'Sergio', 'sdafadsf', 'sdfasdfas', 1, '', 'sergio.b.arevalo@gmail.com', 1, 1, 17, 1, 1, '2017-10-31', ''),
(17, '123456879', 'nicholas', 'chartier', 1, '', 'cooolnico@hotmail.com', 1, 1, 16, 1, 1, '2017-10-31', ''),
(20, 'Tessssssss', 'Nonthing', 'Aucun', 2, '1236361234', 'sergio.b.arevalo@gmail.com', 1, 1, 16, 1, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `employes_formations`
--

CREATE TABLE `employes_formations` (
  `id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `done` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `employes_formations`
--

INSERT INTO `employes_formations` (`id`, `employe_id`, `formation_id`, `done`) VALUES
(16, 16, 21, '2012-11-11 10:10:00'),
(17, 16, 22, '2012-11-11 10:10:00'),
(18, 17, 21, '2018-09-09 11:11:00'),
(19, 17, 22, '2013-11-12 10:10:00'),
(20, 20, 21, NULL),
(21, 16, 24, '2017-09-25 08:09:00'),
(22, 17, 24, NULL),
(23, 20, 24, NULL),
(24, 16, 25, NULL),
(25, 17, 25, NULL),
(26, 20, 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `frequence_id` int(11) NOT NULL,
  `Debut_rappel_id` int(11) NOT NULL,
  `modalite_id` int(11) NOT NULL,
  `Duree` decimal(10,2) NOT NULL,
  `Remarques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `satus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `numero`, `Titre`, `categorie_id`, `frequence_id`, `Debut_rappel_id`, `modalite_id`, `Duree`, `Remarques`, `satus_id`) VALUES
(21, '123456789', 'Windows', 4, 1, 1, 1, '5.00', '', 1),
(22, '123456788', 'Linux', 1, 1, 1, 3, '10.00', '', 1),
(24, 'dawdwa123', 'Sécurité au bureau', 1, 7, 1, 1, '5.00', '', 1),
(25, 'dwaawjdw312', 'Équipement de la proteciton', 3, 10, 4, 1, '6.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `frequences`
--

CREATE TABLE `frequences` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequences`
--

INSERT INTO `frequences` (`id`, `nom`) VALUES
(1, 'Une seule fois'),
(2, '1 semaine'),
(3, '1 mois'),
(4, '3 mois'),
(5, '6 mois'),
(6, '18 mois'),
(7, '1 an'),
(8, '2 ans'),
(9, '3 ans'),
(10, '4 ans'),
(11, '5 ans');

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
(1, '752 Douglas St, Victoria BC V8W 3M6'),
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
-- Table structure for table `modalites`
--

CREATE TABLE `modalites` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modalites`
--

INSERT INTO `modalites` (`id`, `nom`) VALUES
(1, 'En ligne'),
(2, 'Externe'),
(3, 'Interne');

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
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `id` int(11) NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuss`
--

INSERT INTO `statuss` (`id`, `status`) VALUES
(1, 'Obligatoire'),
(2, 'Recommandé');

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
(4, 'gogocharter', '$2y$10$8r3lPSKD5.41cDZwsV8oYeKsJvFRKLj9TdCJAMB3fTjzh5PvPUZNu', 'Nicholas Chartier', 'Cooolnico@hotmail.com', 1, '2017-09-06 20:46:35', '2017-10-18 17:01:45'),
(6, 'test', '$2y$10$AwYTijM1EXczbE83MA9SpuUSOXd2WULbQVzWmyCEXxN8Fxng0TEb2', 'nicholas', 'lel@hotmail.com', 1, '2017-09-20 18:19:12', '2017-09-20 18:19:12'),
(7, 'coor', '$2y$10$/OLTv7LDGBlaMMueWxg91Ofc0ns7TotL3eCIobV7VC4bgbiD9D0Ii', 'coordonateur', 'coord@hotmail.com', 2, '2017-09-20 18:33:04', '2017-09-20 18:33:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `civilites`
--
ALTER TABLE `civilites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debut_rappels`
--
ALTER TABLE `debut_rappels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes_formations`
--
ALTER TABLE `employes_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employes_formations_ibfk_1` (`employe_id`),
  ADD KEY `employes_formations_ibfk_2` (`formation_id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satus_id` (`satus_id`);

--
-- Indexes for table `frequences`
--
ALTER TABLE `frequences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

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
-- Indexes for table `modalites`
--
ALTER TABLE `modalites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

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
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `civilites`
--
ALTER TABLE `civilites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employes_formations`
--
ALTER TABLE `employes_formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `frequences`
--
ALTER TABLE `frequences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- AUTO_INCREMENT for table `modalites`
--
ALTER TABLE `modalites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employes_formations`
--
ALTER TABLE `employes_formations`
  ADD CONSTRAINT `employes_formations_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employes_formations_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`satus_id`) REFERENCES `statuss` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
