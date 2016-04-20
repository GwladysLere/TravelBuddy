-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Avril 2016 à 14:53
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `motdepasse` text NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `avatar` text NOT NULL,
  `description` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `nom`, `prenom`, `motdepasse`, `age`, `sexe`, `telephone`, `email`, `avatar`, `description`) VALUES
(14, 'melinda', 'patxa', 'melinda', '8fa14cdd754f91cc6554c9e71929cce7', 32, 'femme', '0445675466', 'melinda@yahoo.fr', 'melinda.jpg', 'Je suis tolérante et respectieuse'),
(13, 'sunder', 'ducroix', 'pierre', '874a9f457cc6743acc69b2a0cea62542', 56, 'homme', '0556764566', 'ducroix@yahoo.fr', 'sunder.jpg', '`J\'aime les ordinateurs et les paysages'),
(16, 'scoubi', 'chien', 'scoubidou', '1ea31d12c145f5b54332e6ae2bb04ab7', 21, 'homme', '0556768798', 'scoubidou@gmail.com', 'scoubi.jpg', 'j\' aime les enquêtes, résoudre les mystères et manger. J\'aime aussi mes amis');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
