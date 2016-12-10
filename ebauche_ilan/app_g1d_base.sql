
-- Database: `app_g1d_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionneurs_capteurs`
--

CREATE TABLE IF NOT EXISTS `actionneurs_capteurs` (
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
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
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

CREATE TABLE IF NOT EXISTS `donnees` (
  `ID_donnees` int(11) NOT NULL,
  `valeur` double NOT NULL,
  `date_donnees` date NOT NULL,
  `ID_ac_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `ID_piece` int(11) NOT NULL,
  `nom_piece` varchar(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece_type`
--

CREATE TABLE IF NOT EXISTS `piece_type` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `ID_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_fonction`
--

CREATE TABLE IF NOT EXISTS `type_fonction` (
  `ID_fonction` int(11) NOT NULL,
  `nom_fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
