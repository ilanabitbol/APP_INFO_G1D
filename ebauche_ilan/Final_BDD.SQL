-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 10 Février 2017 à 00:10
-- Version du serveur :  5.6.33
-- Version de PHP :  7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `app_g1d_base`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneurs_capteurs`
--

CREATE TABLE `actionneurs_capteurs` (
  `ID_ac_cap` int(11) NOT NULL,
  `adresse_mac` varchar(50) NOT NULL,
  `etat` int(11) DEFAULT NULL,
  `batterie` int(11) DEFAULT NULL,
  `ID_commande` int(11) DEFAULT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actionneurs_capteurs`
--

INSERT INTO `actionneurs_capteurs` (`ID_ac_cap`, `adresse_mac`, `etat`, `batterie`, `ID_commande`, `ID_piece`, `ID_fonction`) VALUES
(5, '3A:4F:45:5T', NULL, NULL, NULL, 1, 1),
(11, 'AHAHHA', NULL, NULL, NULL, 1, 2),
(13, 'aeffze', NULL, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE `catalogue` (
  `ID` int(11) NOT NULL,
  `nom_produit` varchar(111) NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varbinary(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`ID`, `nom_produit`, `prix`, `stock`, `image`) VALUES
(1, 'hydrometre', 40, 10, ''),
(2, 'thermometre', 100, 38, ''),
(3, 'pressiometre', 10, 380, '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_commande` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` int(11) NOT NULL,
  `date_livraison` date NOT NULL,
  `pays` varchar(20) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `adresse_livraison` varchar(100) NOT NULL,
  `num_commande` varchar(20) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`ID_commande`, `nom`, `prenom`, `tel`, `date_livraison`, `pays`, `code_postal`, `adresse_livraison`, `num_commande`, `prix`) VALUES
(4, 'POILLEUX', 'Corentin', 631010622, '2017-02-10', 'France', 93320, '25 Allée Jean Baptiste Clément', '589cf27382575', 0);

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `ID_donnees` int(11) NOT NULL,
  `valeur` double NOT NULL,
  `date_donnees` datetime NOT NULL,
  `ID_ac_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `donnees`
--

INSERT INTO `donnees` (`ID_donnees`, `valeur`, `date_donnees`, `ID_ac_cap`) VALUES
(1, 16, '2017-01-20 00:00:00', 5),
(2, 8, '2017-01-20 00:00:00', 11),
(7, 24, '2017-01-20 06:12:00', 11),
(8, 21, '2017-01-23 00:00:00', 11),
(10, 10, '2017-02-04 00:00:00', 11);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `ID_piece` int(11) NOT NULL,
  `nom_piece` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`ID_piece`, `nom_piece`, `ID`) VALUES
(1, 'chambre', 13),
(2, 'salon', 13),
(5, 'salle de bain', 13);

-- --------------------------------------------------------

--
-- Structure de la table `piece_type`
--

CREATE TABLE `piece_type` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_fonction`
--

CREATE TABLE `type_fonction` (
  `ID_fonction` int(11) NOT NULL,
  `nom_fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_fonction`
--

INSERT INTO `type_fonction` (`ID_fonction`, `nom_fonction`) VALUES
(1, 'Température'),
(2, 'Humidité'),
(3, 'Luminosité');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `prenom`, `email`, `password`, `numero`, `pays`, `ville`, `code_postal`, `adresse`) VALUES
(9, 'boulet', 'staline', 'jsp@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 20300303, 'FRANCE', 'Berlin', 8383, '90 allee du couvent'),
(12, 'dupont', 'Ilan', 'fosfor12345@hotmail.fr', 'da23614e02469a0d7c7bd1bdab5c9c474b1904dc', 7928384, 'France', 'Ivry', 78400, '33 allée de la tour rdv'),
(13, 'POILLEUX', 'Corentin', 'c.poilleux@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 9876, 'France', 'Les Pavillons-sous-Bois', 93320, '25 Allée Jean Baptiste Clément'),
(14, 'AIMSA', 'Maxime', 'rien@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 792838401, 'France', 'Lannion', 28400, '33 allée de la tour rdv');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  ADD PRIMARY KEY (`ID_ac_cap`),
  ADD KEY `ID_type` (`ID_fonction`),
  ADD KEY `ID_piece` (`ID_piece`),
  ADD KEY `ID_commande` (`ID_commande`);

--
-- Index pour la table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_commande`);

--
-- Index pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD PRIMARY KEY (`ID_donnees`),
  ADD KEY `ID_ac_cap` (`ID_ac_cap`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`ID_piece`),
  ADD KEY `ID` (`ID`);

--
-- Index pour la table `piece_type`
--
ALTER TABLE `piece_type`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_piece` (`ID_piece`),
  ADD KEY `ID_type` (`ID_type`);

--
-- Index pour la table `type_fonction`
--
ALTER TABLE `type_fonction`
  ADD PRIMARY KEY (`ID_fonction`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  MODIFY `ID_ac_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `ID_donnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `ID_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `piece_type`
--
ALTER TABLE `piece_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_fonction`
--
ALTER TABLE `type_fonction`
  MODIFY `ID_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_1` FOREIGN KEY (`ID_commande`) REFERENCES `commande` (`ID_commande`),
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_2` FOREIGN KEY (`ID_piece`) REFERENCES `piece` (`ID_piece`),
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_3` FOREIGN KEY (`ID_fonction`) REFERENCES `type_fonction` (`ID_fonction`);

--
-- Contraintes pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD CONSTRAINT `donnees_ibfk_1` FOREIGN KEY (`ID_ac_cap`) REFERENCES `actionneurs_capteurs` (`ID_ac_cap`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `piece_type`
--
ALTER TABLE `piece_type`
  ADD CONSTRAINT `piece_type_ibfk_1` FOREIGN KEY (`ID_piece`) REFERENCES `piece` (`ID_piece`),
  ADD CONSTRAINT `piece_type_ibfk_2` FOREIGN KEY (`ID_type`) REFERENCES `type_fonction` (`ID_fonction`);
