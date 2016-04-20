-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Avril 2016 à 18:10
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conceptionweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `ville_depart` text NOT NULL,
  `ville_arrivee` text NOT NULL,
  `pays_depart` text NOT NULL,
  `pays_arrivee` text NOT NULL,
  `date_depart` date NOT NULL,
  `duree` text NOT NULL,
  `description` longtext NOT NULL,
  `nb_base` int(11) NOT NULL,
  `nb_participants` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`id`, `id_utilisateur`, `ville_depart`, `ville_arrivee`, `pays_depart`, `pays_arrivee`, `date_depart`, `duree`, `description`, `nb_base`, `nb_participants`) VALUES
(1, 13, 'bordeaux', 'berlin', 'france', 'allemagne', '2016-04-29', '2 semaines', 'Nous sommes gentils et voulons aller voir Rammstein en concert.', 0, 2),
(3, 13, 'berlin', 'Andalousie', 'allemagne', 'espagne', '2016-04-16', '4 jours', 'Nous sommes généreux, respectueux et aimons la tolérance.', 2, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
