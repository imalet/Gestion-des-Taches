-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 oct. 2023 à 21:53
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiontache`
--

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `nom`, `email`, `pwd`) VALUES
(1, 'IMALET', 'imaletbenji@gmail.com', '4837f372feeeb7f8d8c5c6cc8c0b47632300533e2944b5e777cb05b8f0fb09b1'),
(2, 'BENJO', 'benjo@gmail.com', '57ddd0b4dcd053a709b5bd95a4ff5653f87fcd3179916fa0e681b25920f8a2c8'),
(3, 'ARELI', 'areli@gmail.com', '3933da686336c0a94ef3946ef8812c7bc34cbc53f02ad1010e5b22da5a78d8c2'),
(4, 'mireille', 'mireille@gmail.com', '7021924252586b3aab4edf0d248ab6d8943a30a5042167fbc829bd1c9e8917f8'),
(5, 'BABA', 'baba@gmail.com', 'bf0c97708b849de696e7373508b13c5ea92bafa972fc941d694443e494a4b84d'),
(6, 'test', 'test@gmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `priorite` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_employe` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `titre`, `priorite`, `statut`, `description`, `id_employe`, `date`) VALUES
(4, 'Inscription de Benjo', 'Haute', 'Termine', 'aller a l&#039;ecole', 4, '2023-10-22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employe` (`id_employe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_employe`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
