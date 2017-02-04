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
  `etat` int(11) DEFAULT NULL,
  `batterie` int(11) DEFAULT NULL,
  `ID_commande` int(11) DEFAULT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actionneurs_capteurs`
--

INSERT INTO `actionneurs_capteurs` (`ID_ac_cap`, `adresse_mac`, `etat`, `batterie`, `ID_commande`, `ID_piece`, `ID_fonction`) VALUES
(5, '3A:4F:45:5T', NULL, NULL, NULL, 1, 1),
(11, 'AHAHHA', NULL, NULL, NULL, 1, 2),
(12, 'bobobobo', NULL, NULL, NULL, 2, 3),
(13, '44:66:99', NULL, NULL, NULL, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `ID` int(11) NOT NULL,
  `nom_produit` varchar(111) NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varbinary(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`ID`, `nom_produit`, `prix`, `stock`, `image`) VALUES
(4, 'Anemometre', 30, 33, ''),
(5, 'Station_meteo', 22, 32, ''),
(6, 'Thermostat', 35, 66, ''),
(7, 'Pluviometre', 56, 11, ''),
(8, 'Camera', 100, 4, '');

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
  `date_donnees` datetime NOT NULL,
  `ID_ac_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donnees`
--

INSERT INTO `donnees` (`ID_donnees`, `valeur`, `date_donnees`, `ID_ac_cap`) VALUES
(1, 16, '2017-01-20 00:00:00', 5),
(2, 8, '2017-01-20 00:00:00', 11),
(7, 24, '2017-01-20 06:12:00', 11),
(8, 21, '2017-01-23 00:00:00', 11),
(9, 57, '2017-01-22 08:00:18', 12);

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `ID_piece` int(11) NOT NULL,
  `nom_piece` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`ID_piece`, `nom_piece`, `ID`) VALUES
(1, 'chambre', 13),
(2, 'salon', 13),
(7, 'Toilette', 15);

-- --------------------------------------------------------

--
-- Table structure for table `type_fonction`
--

CREATE TABLE `type_fonction` (
  `ID_fonction` int(11) NOT NULL,
  `nom_fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_fonction`
--

INSERT INTO `type_fonction` (`ID_fonction`, `nom_fonction`) VALUES
(1, 'Température'),
(2, 'Humidité'),
(3, 'Luminosité');

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
(13, 'POILLEUX', 'Corentin', 'c.poilleux@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 9876, 'France', 'Les Pavillons-sous-Bois', 93320, '25 Allée Jean Baptiste Clément'),
(15, 'Abitbol', 'Ilan', 'fosfor12345@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 99, 'France', 'Neuilly-sur-seine', 92200, '28 boulevard du général Leclerc'),
(37, 'Luca', 'Cohen', 'luca.cohen@hotmail.fr', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 3, 'France', 'Paris', 75008, '3 rue Charcot'),
(39, 'joseph', 'staline', 'jstaline@gmail.com', '2ace62c1befa19e3ea37dd52be9f6d508c5163e6', 3, 'France', 'Moscou', 93000, 'rue de stalingrad');

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
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
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
  MODIFY `ID_ac_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `ID_donnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `ID_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `type_fonction`
--
ALTER TABLE `type_fonction`
  MODIFY `ID_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
