-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 17 avr. 2022 à 21:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `id_archive` int(11) NOT NULL AUTO_INCREMENT,
  `nom_archive` varchar(55) NOT NULL,
  `chemin` text NOT NULL,
  `date_archivage` date NOT NULL,
  `date_creation` date NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_naturedoc` int(11) NOT NULL,
  PRIMARY KEY (`id_archive`),
  KEY `id_dossier` (`id_dossier`),
  KEY `id_service` (`id_service`),
  KEY `id_naturedoc` (`id_naturedoc`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`id_archive`, `nom_archive`, `chemin`, `date_archivage`, `date_creation`, `id_dossier`, `id_service`, `id_naturedoc`) VALUES
(26, 'a', 'archive/service de la recherche et des programmes/e.jpg', '2022-04-02', '2022-04-17', 8, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `connectes`
--

DROP TABLE IF EXISTS `connectes`;
CREATE TABLE IF NOT EXISTS `connectes` (
  `ip` varchar(225) NOT NULL,
  `timestamp` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connectes`
--

INSERT INTO `connectes` (`ip`, `timestamp`, `id_user`) VALUES
('::1', '1650217792', 2);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `id_dossier` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dossier` varchar(55) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  PRIMARY KEY (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`id_dossier`, `nom_dossier`, `date_creation`, `description`) VALUES
(5, 'service de la cooperation inter universitaire', '2021-03-25 06:41:15', ''),
(6, 'service des diplomes', '2021-03-25 06:41:29', 'sdsss'),
(8, 'service de la recherche et des programmes', '2022-04-14 10:26:41', 'essa');

-- --------------------------------------------------------

--
-- Structure de la table `naturedocument`
--

DROP TABLE IF EXISTS `naturedocument`;
CREATE TABLE IF NOT EXISTS `naturedocument` (
  `id_naturedoc` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_naturedoc` varchar(55) NOT NULL,
  PRIMARY KEY (`id_naturedoc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `naturedocument`
--

INSERT INTO `naturedocument` (`id_naturedoc`, `libelle_naturedoc`) VALUES
(2, 'rapport');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_service` varchar(55) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `libelle_service`, `description`) VALUES
(1, 'service de la recherche et des programmes', ''),
(2, 'service de la cooperation inter universitaire', ''),
(4, 'service des diplomes', ''),
(5, 'service de informatique', 'll');

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateur`
--

DROP TABLE IF EXISTS `typeutilisateur`;
CREATE TABLE IF NOT EXISTS `typeutilisateur` (
  `id_typeutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_typeutilisateur` varchar(55) NOT NULL,
  PRIMARY KEY (`id_typeutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`id_typeutilisateur`, `libelle_typeutilisateur`) VALUES
(1, 'personnel'),
(2, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(55) NOT NULL,
  `prenom_user` varchar(55) NOT NULL,
  `email` text NOT NULL,
  `tel_user` text NOT NULL,
  `poste_user` varchar(55) NOT NULL,
  `login_user` varchar(55) NOT NULL,
  `mot_de_passe` text NOT NULL,
  `id_typeutilisateur` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_typeutilisateur` (`id_typeutilisateur`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `prenom_user`, `email`, `tel_user`, `poste_user`, `login_user`, `mot_de_passe`, `id_typeutilisateur`, `id_service`) VALUES
(2, 'kuipou fozeu', 'adrien', 'adrien07@gmail.com', '656530867', 'responsable du service d\'archive', 'kuipou fozeu adrien', 'kuipou', 2, 1),
(10, 'ngono', 'rostand', 'ngono06@gmail.com', '677345678', 'chef service des oeuvres universitaires', 'ngonorostand', 'ngono', 2, 1),
(12, 'cessou', 'boris', 'boris07@gmail.com', '699565488', 'chef service des diplÃ´mes', 'cessouboris', 'boris', 1, 1),
(13, 'juimo', 'valentin', 'juimo34@gmail.com', '651234565', 'assistant service des affaires generales', 'juimovalentin', 'juimo', 1, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT ` 	id_dossier` FOREIGN KEY (`id_dossier`) REFERENCES `dossier` (`id_dossier`),
  ADD CONSTRAINT `id_naturedoc` FOREIGN KEY (`id_naturedoc`) REFERENCES `naturedocument` (`id_naturedoc`),
  ADD CONSTRAINT `id_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `connectes`
--
ALTER TABLE `connectes`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT ` 	id_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`),
  ADD CONSTRAINT ` 	id_typeutilisateur` FOREIGN KEY (`id_typeutilisateur`) REFERENCES `typeutilisateur` (`id_typeutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
