-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : Dim 16 mai 2021 à 22:46
-- Version du serveur :  8.0.20
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdgsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nom` char(30) NOT NULL,
  `prenom` char(30) NOT NULL,
  `login` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'merien', 'gaidig', 'admin', 'Iroise29');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` varchar(2) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('RB', 'remboursé'),
('CR', 'Créer'),
('CL', 'Clôturer');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `fichefrais` (
  `id` int NOT NULL,
  `idVisiteur` char(4) NOT NULL,
  `mois` int UNSIGNED NOT NULL,
  `annee` int UNSIGNED NOT NULL,
  `nbJustificatifs` int NOT NULL,
  `montantValide` decimal(10,2) NOT NULL,
  `dateModif` date NOT NULL,
  `idEtat` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichefrais`
--

INSERT INTO `fichefrais` (`id`, `idVisiteur`, `mois`, `annee`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
(1, '8', 5, 2021, 0, '1173.40', '2021-05-10', '2'),
(21, '1', 5, 2021, 0, '723.40', '2021-05-14', '2'),
(18, '1', 5, 2021, 0, '779.54', '2021-05-10', '2'),
(19, '1', 5, 2021, 0, '537.48', '2021-05-10', '2'),
(20, '1', 5, 2021, 0, '1140.48', '2021-05-12', '2');

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

CREATE TABLE `forfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) NOT NULL,
  `montant` decimal(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`id`, `libelle`, `montant`) VALUES
('REP', 'repas', '80.00'),
('NUI', 'nuit', '29.00'),
('ETA', 'etape', '15.00'),
('KM', 'kilometres', '34.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `lignefraisforfait` (
  `idFicheFrais` int NOT NULL,
  `idForfait` char(4) NOT NULL,
  `quantite` int NOT NULL,
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignefraisforfait`
--

INSERT INTO `lignefraisforfait` (`idFicheFrais`, `idForfait`, `quantite`, `id`) VALUES
(12, 'REP', 84, 1),
(1, 'REP', 10, 2),
(1, 'NUI', 10, 3),
(1, 'KM', 70, 4),
(1, 'ETA', 5, 5),
(18, 'REP', 2, 6),
(18, 'NUI', 5, 7),
(18, 'KM', 2, 8),
(18, 'ETA', 6, 9),
(19, 'REP', 3, 10),
(19, 'NUI', 5, 11),
(19, 'KM', 4, 12),
(19, 'ETA', 6, 13),
(20, 'REP', 10, 14),
(20, 'NUI', 19, 15),
(20, 'KM', 4, 16),
(20, 'ETA', 6, 17),
(21, 'REP', 3, 18),
(21, 'NUI', 5, 19),
(21, 'KM', 7, 20),
(21, 'ETA', 6, 21),
(22, 'REP', 1, 22),
(22, 'NUI', 1, 23),
(22, 'KM', 1, 24),
(22, 'ETA', 1, 25),
(21, 'REP', 3, 26),
(21, 'NUI', 10, 27),
(21, 'KM', 70, 28),
(21, 'ETA', 6, 29),
(21, 'REP', 3, 30),
(21, 'NUI', 7, 31),
(21, 'KM', 20, 32),
(21, 'ETA', 8, 33);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int NOT NULL,
  `nom` char(30) NOT NULL,
  `prenom` char(30) NOT NULL,
  `adresse` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ville` char(30) NOT NULL,
  `dte` date NOT NULL,
  `CP` int NOT NULL,
  `login` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `adresse`, `ville`, `dte`, `CP`, `login`, `password`) VALUES
(1, ' Merien', ' Gaidig', ' 230 lotissement du grand large', 'PLOUGUERNEAU', '2021-04-08', 29880, 'GMerien', 'P@ssword'),
(6, ' malgorn', ' margot', ' 13 rue du molin', 'LILIA', '2021-05-14', 29880, 'Mmalgorn', 'motdepasse'),
(3, ' dumonner', 'theo', ' 78 avenue crech', 'LANNILIS', '2021-04-08', 29256, 'Ldumonner', 'mdp'),
(4, ' maurice', ' paul', ' 54 rue paris', 'BREST', '2021-04-29', 29200, 'Pmarice', 'jfkhf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forfait`
--
ALTER TABLE `forfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fichefrais`
--
ALTER TABLE `fichefrais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `lignefraisforfait`
--
ALTER TABLE `lignefraisforfait`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
