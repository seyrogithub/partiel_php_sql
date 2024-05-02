-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 02 mai 2024 à 11:09
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `partiel_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(10) NOT NULL,
  `duree` int(10) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_de_sortie` date NOT NULL,
  `id_genre` int(10) NOT NULL,
  `id_réalisateur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(10) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `naionalite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film_genre` (`id_genre`),
  ADD KEY `fk_iflm_realisateur` (`id_réalisateur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_iflm_realisateur` FOREIGN KEY (`id_réalisateur`) REFERENCES `realisateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
