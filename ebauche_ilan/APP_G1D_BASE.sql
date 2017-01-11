--
-- Base de données :  `APP_G1D_BASE`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneurs_capteurs`
--

CREATE TABLE `actionneurs_capteurs` (
  `ID_ac_cap` int(11) NOT NULL,
  `nom_capteur` varchar(50) NOT NULL,
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

INSERT INTO `actionneurs_capteurs` (`ID_ac_cap`, `nom_capteur`, `adresse_mac`, `etat`, `batterie`, `ID_commande`, `ID_piece`, `ID_fonction`) VALUES
(6, '', '3A:4F:45:5T', NULL, NULL, NULL, 7, 3),
(7, '', '3A:4F:45:5T', NULL, NULL, NULL, 7, 3),
(8, '', '33', NULL, NULL, NULL, 6, 2),
(9, '', '33', NULL, NULL, NULL, 6, 3),
(10, 'thermometre', '33:44:44', NULL, NULL, NULL, 6, 2),
(11, 'hydrometre', '33:44:55', NULL, NULL, NULL, 6, 3),
(12, 'thermometre', '33334', NULL, NULL, NULL, 6, 1);

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
  `ID` int(11) NOT NULL,
  `date_livraison` date NOT NULL,
  `adresse_livraison` varchar(100) NOT NULL,
  `num_commande` int(11) NOT NULL,
  `nombre_article` int(11) NOT NULL,
  `prix` double NOT NULL,
  `mode_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `ID_donnees` int(11) NOT NULL,
  `valeur` double NOT NULL,
  `date_donnees` date NOT NULL,
  `ID_ac_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(5, 'cuisine', 8),
(6, 'salon', 8),
(7, 'toilette', 8),
(8, 'douche', 8);

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
(8, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 4, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(9, 'joseph', 'staline', 'jstaline@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'Russie', 'Moscou', 93000, 'rue de stalingrad'),
(13, 'POILLEUX', 'Corentin', 'c.poilleux@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 9876, 'France', 'Les Pavillons-sous-Bois', 93320, '25 Allée Jean Baptiste Clément');

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
  ADD PRIMARY KEY (`ID_commande`),
  ADD KEY `ID` (`ID`);

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
  MODIFY `ID_ac_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `ID_donnees` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `ID_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD CONSTRAINT `donnees_ibfk_1` FOREIGN KEY (`ID_ac_cap`) REFERENCES `actionneurs_capteurs` (`ID_ac_cap`);

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
