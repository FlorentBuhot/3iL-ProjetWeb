-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : lun. 19 fév. 2024 à 15:49
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `equipe_id` int NOT NULL,
  `nom` varchar(15) NOT NULL,
  `alias` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`equipe_id`, `nom`, `alias`) VALUES
(1, 'Les lions', 'LL'),
(2, 'Tanquille', 'TQL');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `joueur_id` int NOT NULL,
  `user_id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nb_match` int NOT NULL DEFAULT '0',
  `nb_but` int NOT NULL DEFAULT '0',
  `nb_arret` int NOT NULL DEFAULT '0',
  `nb_passe_de` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`joueur_id`, `user_id`, `nom`, `prenom`, `nb_match`, `nb_but`, `nb_arret`, `nb_passe_de`) VALUES
(1, 1, 'admin', 'admin', 1, 0, 0, 0),
(2, 2, 'deni', 'dance', 0, 0, 0, 0),
(3, 6, 'test', 'test', 0, 0, 0, 0),
(4, 7, 'Hugo', 'BARTE', 0, 0, 0, 0),
(5, 8, 'Thomas', 'ADUGARD', 0, 0, 0, 0),
(8, 9, 'Maxime', 'BOISSOUT', 0, 0, 0, 0),
(9, 14, 'Nicolas', 'coppa', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `joueur_equipe`
--

CREATE TABLE `joueur_equipe` (
  `joueur_equipe_id` int NOT NULL,
  `joueur_id` int NOT NULL,
  `equipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `joueur_equipe`
--

INSERT INTO `joueur_equipe` (`joueur_equipe_id`, `joueur_id`, `equipe_id`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 5, 1),
(4, 8, 1),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id_match` int NOT NULL,
  `nom_match` varchar(255) DEFAULT NULL,
  `date_match` date DEFAULT NULL,
  `heure_match` time DEFAULT NULL,
  `description_match` text,
  `id_equipe_1` int DEFAULT NULL,
  `id_equipe_2` int DEFAULT NULL,
  `score_equipe_1` int DEFAULT NULL,
  `score_equipe_2` int DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id_match`, `nom_match`, `date_match`, `heure_match`, `description_match`, `id_equipe_1`, `id_equipe_2`, `score_equipe_1`, `score_equipe_2`, `login`) VALUES
(1, 'finale 3iL', '2024-02-21', '16:30:00', 'c\'est la finle', 1, 2, 0, 0, 'admin@3il.fr'),
(2, '1er tour coupe de vienne', '2024-02-24', '15:30:00', 'c\'est coupe', 2, 1, 0, 0, 'deni@3il.fr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `role`) VALUES
(1, 'admin@3il.fr', '$2y$10$Lm3e8UWdNAYVkMx02Y62.e1OABC3Hd2VOww7UC9WiiAhf2MaM.iKa', 'admin'),
(2, 'deni@3il.fr', '$2y$10$RRntyQu5S75.Ho2o0py3J.DEGt25BA2DxfiWDYYcSvp5/daR01XZK', 'organisateur'),
(5, 'buhotf@3il.fr', '$2y$10$zzGid./GAGzGpN/6WlnLue/fu26fBZUvD3BEU5cIRJY4GV6vGtcJW', 'organisateur'),
(6, 'test', '$2y$10$B/Yc7uJe727oX4HDr3br1ebNXYN.21coIf4b6l8VGQZ8IFzGmYEW.', 'joueur'),
(7, 'hugo@3il.fr', '$2y$10$gWW9wxnKqX1GkCvA7flEK.lKWCKLsBLZi1sV4THkiRdYcKp9Wp1QC', 'joueur'),
(8, 'toto@3il.fr', '$2y$10$dCmRrgS6zfObpG6OHsAXWOAdNlTmdDkBazfnQ2EkB7m/KWoxHu73q', 'joueur'),
(9, 'max@3il.fr', '$2y$10$uUlaw0Kpxw4dbHc05IKZXOda1fG6QZL4hfhGxxD6wkyDTLs9mt.Cm', 'joueur'),
(14, 'nico@3il.fr', '$2y$10$sb5Ehks7U4IwyW6P7P7mHe5LI6igpxnaH4TIL6/7r5wBPvTmRlxjO', 'joueur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`equipe_id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`joueur_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Index pour la table `joueur_equipe`
--
ALTER TABLE `joueur_equipe`
  ADD PRIMARY KEY (`joueur_equipe_id`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_equipe_1` (`id_equipe_1`),
  ADD KEY `id_equipe_2` (`id_equipe_2`),
  ADD KEY `login` (`login`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equipe_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `joueur_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `joueur_equipe`
--
ALTER TABLE `joueur_equipe`
  MODIFY `joueur_equipe_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id_match` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`id_equipe_1`) REFERENCES `equipe` (`equipe_id`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`id_equipe_2`) REFERENCES `equipe` (`equipe_id`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`login`) REFERENCES `user` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
