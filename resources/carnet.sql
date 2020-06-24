-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 juin 2020 à 10:33
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresse` tinytext DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `tel`, `email`) VALUES
(1, 'Dupont', 'Thierry', '5 rue du cheval blanc', '63000', 'Clermont-Ferrand', '07.73.12.23.34', 'thierry.dupont@gmail.com'),
(2, 'Martin', 'Jérôme', '6 rue de l\'arbre', '63000', 'Clermont-Ferrand', '07.73.12.23.35', 'pierre@gmail.com'),
(3, 'Gallet', 'Elise', '12 allée des coquelicots', '43000', 'Aurillac', '07.73.45.23.35', 'gallet@gmail.com'),
(4, 'Augranpier', 'Berthe', '34 avenue du Rousillon', '63100', 'Clermont-Ferrand', '07.73.45.23.35', 'berthe.a@orange.com'),
(5, 'Parigot', 'Laure', '34 avenue du shrtoumpf', '75017', 'PARIS', '01.43.45.23.35', 'l.parigot@orange.com'),
(6, 'Dupain', 'Emile', '34 avenue du gratin', '03200', 'Vichy', '04.70.45.23.35', 'emile@orange.fr'),
(7, 'Dupont', 'Julie', '5 rue du cheval blanc', '63000', 'Clermont-Ferrand', '07.73.14.23.34', 'julie.dupont@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`),
  ADD KEY `prenom` (`prenom`),
  ADD KEY `cp` (`cp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
