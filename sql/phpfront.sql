-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 jan. 2023 à 22:35
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpfront`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(25) DEFAULT 'patient',
  `salaire` int(11) DEFAULT 15000,
  `height` int(11) DEFAULT 175,
  `poids` int(11) DEFAULT 75,
  `CIN` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `nom`, `prenom`, `mdp`, `role`, `salaire`, `height`, `poids`, `CIN`) VALUES
(1, 'hello@nacer.ma', 'ELBASRI', 'ABDENNACER', '1234', 'patient', 0, 176, 75, 'BA74956'),
(2, 'hello@ABOUBAKER.ma', 'ABOUELKACIM', 'ABOUBAKER', '1234', 'patient', 0, 168, 78, 'BA71956'),
(15, 'hello@zakaria.ma', 'bouasbia', 'zakaria', '1234', 'docteur', 15000, 175, 75, 'BA78356'),
(17, 'ttesr@gmail.com', 'readonly', 'readonly', '1234', 'docteur', 15000, 182, 75, 'BA68956'),
(18, 'ABOUBAKER@gmail.com', 'test', 'ABOUBaker', '1234', 'admin', 30000, 170, 75, 'BA78956');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
