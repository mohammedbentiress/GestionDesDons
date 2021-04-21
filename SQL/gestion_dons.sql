-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 mars 2021 à 08:45
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_dons`
--

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `don_ID` int(11) NOT NULL,
  `don_name` varchar(250) NOT NULL,
  `don_type` enum('somme_argent','vetement','produit_alimentaire','') NOT NULL,
  `donneur_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`don_ID`, `don_name`, `don_type`, `donneur_ID`) VALUES
(1, 'Don 1', 'vetement', 1),
(2, 'Don 2', 'somme_argent', 2),
(3, 'Don 3', 'somme_argent', 1),
(5, 'Don 4', 'vetement', 2),
(6, 'Don 5', 'vetement', 3);

-- --------------------------------------------------------

--
-- Structure de la table `donneur`
--

CREATE TABLE `donneur` (
  `donneur_ID` int(11) NOT NULL,
  `donneur_name` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `donneur`
--

INSERT INTO `donneur` (`donneur_ID`, `donneur_name`, `telephone`) VALUES
(1, 'Amine Jamla', '+212 625600205 '),
(2, 'Manal Ammari', '+212 765025402'),
(3, 'Mohammed Bentiress', '+212 75826934');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`don_ID`),
  ADD KEY `donneur_ID` (`donneur_ID`);

--
-- Index pour la table `donneur`
--
ALTER TABLE `donneur`
  ADD PRIMARY KEY (`donneur_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `don_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `donneur`
--
ALTER TABLE `donneur`
  MODIFY `donneur_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`donneur_ID`) REFERENCES `donneur` (`donneur_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
