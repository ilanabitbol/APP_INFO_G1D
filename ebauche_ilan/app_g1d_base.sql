--
-- Database: `APP_G1D_BASE`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionneurs_capteurs`
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
-- Table structure for table `assistance`
--

CREATE TABLE `assistance` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `demande` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assistance`
--

INSERT INTO `assistance` (`ID`, `email`, `demande`) VALUES
(1, 'luca.cohen@hotmail.fr', 'Bla bla bla\r\n				'),
(2, 'jstaline@gmail.com', 'Joseph (Iossif) Vissarionovitch Djougachvili (en géorgien : იოსებ ბესარიონის ძე ჯუღაშვილი, Iosseb Bessarionis dze Djoughachvili; en russe : Иосиф Виссарионович Джугашвилиprononciation), connu sous le nom de Joseph Staline (Иосиф Сталин), également surnommé par sa propre propagande le Vojd ("Guide") ou Le père des peuples, né à Gori le 18 décembre 1878 — officiellement le 21 décembre 18791 — et mort à Moscou le 5 mars 1953, est un révolutionnaire communiste et homme d\'État soviétique d\'origine géorgienne.\r\n\r\nSecrétaire général du Parti communiste soviétique à partir de 1922, il dirige l\'Union des républiques socialistes soviétiques (URSS) à partir de la fin des années 1920 jusqu\'à sa mort. Il établit un régime de dictature personnelle2 : les historiens lui attribuent, à des degrés divers, la responsabilité de la mort de trois à plus de vingt millions de personnes3.\r\n				');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
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
-- Table structure for table `donnees`
--

CREATE TABLE `donnees` (
  `ID_donnees` int(11) NOT NULL,
  `valeur` double NOT NULL,
  `date_donnees` date NOT NULL,
  `ID_ac_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `ID_piece` int(11) NOT NULL,
  `nom_piece` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece_type`
--

CREATE TABLE `piece_type` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_fonction`
--

CREATE TABLE `type_fonction` (
  `ID_fonction` int(11) NOT NULL,
  `nom_fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `prenom`, `email`, `password`, `numero`, `pays`, `ville`, `code_postal`, `adresse`) VALUES
(9, 'joseph', 'staline', 'jstaline@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'Russie', 'Moscou', 93000, 'rue de stalingrad'),
(14, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 2, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(15, 'Luca', 'Cohen', 'luca.cohen@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Paris', 75008, '3 rue Charcot'),
(16, 'Luca', 'Cohen', 'luca.cohen@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Paris', 75008, '3 rue Charcot'),
(17, 'Luca', 'Cohen', 'luca.cohen@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Paris', 75008, '3 rue Charcot'),
(18, '', 'Cohen', 'luca.cohen@hotmail.fr', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 3, 'France', 'Paris', 75008, '3 rue Charcot'),
(19, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(20, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  ADD PRIMARY KEY (`ID_ac_cap`),
  ADD KEY `ID_type` (`ID_fonction`),
  ADD KEY `ID_piece` (`ID_piece`),
  ADD KEY `ID_commande` (`ID_commande`);

--
-- Indexes for table `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_commande`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `donnees`
--
ALTER TABLE `donnees`
  ADD PRIMARY KEY (`ID_donnees`),
  ADD KEY `ID_ac_cap` (`ID_ac_cap`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`ID_piece`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `piece_type`
--
ALTER TABLE `piece_type`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_piece` (`ID_piece`),
  ADD KEY `ID_type` (`ID_type`);

--
-- Indexes for table `type_fonction`
--
ALTER TABLE `type_fonction`
  ADD PRIMARY KEY (`ID_fonction`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  MODIFY `ID_ac_cap` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assistance`
--
ALTER TABLE `assistance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `ID_donnees` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `ID_piece` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piece_type`
--
ALTER TABLE `piece_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_fonction`
--
ALTER TABLE `type_fonction`
  MODIFY `ID_fonction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actionneurs_capteurs`
--
ALTER TABLE `actionneurs_capteurs`
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_1` FOREIGN KEY (`ID_commande`) REFERENCES `commande` (`ID_commande`),
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_2` FOREIGN KEY (`ID_piece`) REFERENCES `piece` (`ID_piece`),
  ADD CONSTRAINT `actionneurs_capteurs_ibfk_3` FOREIGN KEY (`ID_fonction`) REFERENCES `type_fonction` (`ID_fonction`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);

--
-- Constraints for table `donnees`
--
ALTER TABLE `donnees`
  ADD CONSTRAINT `donnees_ibfk_1` FOREIGN KEY (`ID_ac_cap`) REFERENCES `actionneurs_capteurs` (`ID_ac_cap`);

--
-- Constraints for table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);

--
-- Constraints for table `piece_type`
--
ALTER TABLE `piece_type`
  ADD CONSTRAINT `piece_type_ibfk_1` FOREIGN KEY (`ID_piece`) REFERENCES `piece` (`ID_piece`),
  ADD CONSTRAINT `piece_type_ibfk_2` FOREIGN KEY (`ID_type`) REFERENCES `type_fonction` (`ID_fonction`);
