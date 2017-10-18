-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 oct. 2017 à 23:09
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `longlifelearning`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
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
-- Structure de la table `civilites`
--

CREATE TABLE `civilites` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `civilites`
--

INSERT INTO `civilites` (`id`, `nom`) VALUES
(1, 'Monsieur'),
(2, 'Madame'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `debut_rappels`
--

CREATE TABLE `debut_rappels` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `debut_rappels`
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
-- Structure de la table `employes`
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
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `numero`, `nom`, `prenom`, `civilite_id`, `cellulaire`, `courriel`, `langue_id`, `immeuble_id`, `employe_id`, `poste_id`, `actif`, `date_envoi_plan_formation`, `informations_supplementaires`) VALUES
(3, 'SSS123SSSA', 'Nom', 'Prenom', 2, '5142221111', 'sergio@gmail.com', 2, 2, NULL, 2, 0, NULL, 'no info'),
(7, 'ASDDFGHJKL', 'Test', 'Teeest', 1, '4152122112', 'tesst@gmail.com', 1, 1, 3, 1, 0, '2013-12-14', ''),
(9, 'KACHOW', 'Sergio', 'Amaya', 2, '2123122222', 'tessst@gmail.com', 2, 2, 7, 7, 0, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
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
  `Remarques` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `numero`, `Titre`, `categorie_id`, `frequence_id`, `Debut_rappel_id`, `modalite_id`, `Duree`, `Remarques`) VALUES
(18, '45', '54', 4, 0, 0, 0, '0.01', '45'),
(20, 'AWOOGA', 'Kachow', 3, 8, 6, 3, '456.00', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `formations_completees`
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
-- Structure de la table `frequences`
--

CREATE TABLE `frequences` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `frequences`
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
-- Structure de la table `immeubles`
--

CREATE TABLE `immeubles` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `immeubles`
--

INSERT INTO `immeubles` (`id`, `address`) VALUES
(1, '752 Douglas St, Victoria BC V8W 3M6'),
(2, '1234, boulevard René-Levesque Est, Montréal H2C 4T6\r\n'),
(3, '141, Louis-Pasteur, Ottawa (Ontario) K1N 6N5 Canada\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `nom`) VALUES
(1, 'Français'),
(2, 'English');

-- --------------------------------------------------------

--
-- Structure de la table `modalites`
--

CREATE TABLE `modalites` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modalites`
--

INSERT INTO `modalites` (`id`, `nom`) VALUES
(1, 'En ligne'),
(2, 'Externe'),
(3, 'Interne');

-- --------------------------------------------------------

--
-- Structure de la table `piece_jointe`
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
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postes`
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
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Coordonateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nom`, `email`, `role_id`, `created`, `modified`) VALUES
(4, 'gogocharter', '$2y$10$8r3lPSKD5.41cDZwsV8oYeKsJvFRKLj9TdCJAMB3fTjzh5PvPUZNu', 'Nicholas Chartier', 'Cooolnico@hotmail.com', 1, '2017-09-06 20:46:35', '2017-10-18 17:01:45'),
(6, 'test', '$2y$10$AwYTijM1EXczbE83MA9SpuUSOXd2WULbQVzWmyCEXxN8Fxng0TEb2', 'nicholas', 'lel@hotmail.com', 1, '2017-09-20 18:19:12', '2017-09-20 18:19:12'),
(7, 'coor', '$2y$10$/OLTv7LDGBlaMMueWxg91Ofc0ns7TotL3eCIobV7VC4bgbiD9D0Ii', 'coordonateur', 'coord@hotmail.com', 2, '2017-09-20 18:33:04', '2017-09-20 18:33:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `civilites`
--
ALTER TABLE `civilites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `debut_rappels`
--
ALTER TABLE `debut_rappels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations_completees`
--
ALTER TABLE `formations_completees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frequences`
--
ALTER TABLE `frequences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `immeubles`
--
ALTER TABLE `immeubles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalites`
--
ALTER TABLE `modalites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `civilites`
--
ALTER TABLE `civilites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `formations_completees`
--
ALTER TABLE `formations_completees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `frequences`
--
ALTER TABLE `frequences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `immeubles`
--
ALTER TABLE `immeubles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `modalites`
--
ALTER TABLE `modalites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
