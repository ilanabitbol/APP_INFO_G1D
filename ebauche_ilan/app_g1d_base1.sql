

--
-- Base de données :  `APP_G1D_BASE`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneurs_capteurs`
--

CREATE TABLE `actionneurs_capteurs` (
  `ID_ac_cap` int(11) NOT NULL,
  `adresse_mac` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL,
  `batterie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `ID_commande` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(10, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 5, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(11, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 5, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(12, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 5, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc');

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
  MODIFY `ID_ac_cap` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID_piece` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece_type`
--
ALTER TABLE `piece_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_fonction`
--
ALTER TABLE `type_fonction`
  MODIFY `ID_fonction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
