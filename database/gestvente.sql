-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 avr. 2024 à 16:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestvente`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID-Client` int(50) NOT NULL,
  `Nom-Client` varchar(50) NOT NULL,
  `Prénom-Client` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Télephone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID-Client`, `Nom-Client`, `Prénom-Client`, `Email`, `Télephone`) VALUES
(1, 'NGODJOU ', 'HUGUES', 'HUGUES@gmail.com', 77083236),
(2, 'ESSONO ', 'ROBY', 'ROBY@gmail.com', 74755509),
(3, 'DJEMBA ', 'SAMUEL', 'SAMUEL@gmail.com', 66554433),
(4, 'MADJINOU ', 'MBINA', 'MBINA@gmail.com', 66889944),
(5, 'NGODJOU ', 'NATHANAEL', 'NATHANAEL@gmail.com', 62558864),
(6, 'JOSEPH ', 'ALLOGO', 'ALLOGO@gmail.com', 62550411),
(7, 'TCHAGODOMOU ', 'SHAKIRA', 'SHAKIRA@gmail.com', 73547785),
(8, 'MOUKETOU', 'ARTHEMAS', 'ARTHEMAS@gmail.com', 65225015),
(9, 'EWENO BENJE', 'CARLOS', 'CARLOS@gmail.com', 65205337),
(10, 'KIENE', 'RUFFIN ', 'RUFFIN @gmail.com ', 65334455);

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `Matricule-emp` int(50) NOT NULL,
  `Nom-emp` varchar(50) NOT NULL,
  `Prénom-emp` varchar(50) NOT NULL,
  `Date-naiss` date NOT NULL,
  `Date-emb` date NOT NULL,
  `Service` varchar(50) NOT NULL,
  `Tel` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`Matricule-emp`, `Nom-emp`, `Prénom-emp`, `Date-naiss`, `Date-emb`, `Service`, `Tel`, `Email`) VALUES
(1, 'ASSITA', 'SEONE', '2005-04-08', '2022-04-08', 'Directeur du marketing', 74874911, 'SEONE@gmail.com'),
(2, 'NYENGUE WOMDO ', 'LEOTARD', '1972-04-07', '2015-04-16', 'Directeur financier', 62445520, 'WOMDO@gmail.com '),
(3, 'MANDOUKOU', 'JORDY', '1997-04-03', '2014-04-01', 'Directeur des ventes', 74164874, 'MANDOUKOU@gmail.com'),
(4, 'EVOUNG BITOME MOUDZIEGOU', 'BRUNEL DONOVAN BERTRAND', '1990-04-03', '2012-10-27', 'Directeur général', 60347229, 'evoung2723@gmail.com'),
(5, 'ETOURA ', 'SARA', '2001-04-09', '2012-10-27', 'Manutentionnaire d\'inventaire ', 65882255, 'SARA@gmail.com'),
(6, 'NZE BILOGHE ', 'EMMANUEL SAVIOLA', '2000-04-08', '2022-04-08', 'Représentant des ventes', 77336655, 'SAVIOLA@gmail.com'),
(7, 'MADIBA ', 'CRICHELLA', '2003-04-09', '2015-04-16', 'Agent de service client', 62889966, 'CRICHELLA@gmail.com '),
(8, 'AWAGUISSA ', 'URMILA', '1995-04-03', '2014-04-01', 'Agent de centre d\'appels', 77554420, 'URMILA@gmail.com'),
(9, 'MINTSA ', 'KARIM DAREL', '2000-04-18', '2020-04-16', 'Technicien de maintenance automobile', 62558844, 'DAREL@gmail.com'),
(10, 'MADJILEM ALREMADJI ', 'ALICE', '2001-04-10', '2017-04-13', 'Agent de réception', 65221155, 'ALICE@gmail.com'),
(11, 'MBIMBI ', 'LARRY', '1972-04-03', '2012-10-27', 'Agent de sécurité', 65882255, 'LARRY@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `stockage`
--

CREATE TABLE `stockage` (
  `ID-stock` int(50) NOT NULL,
  `nombre-Voiture` int(50) NOT NULL,
  `modèle-Voiture` varchar(50) NOT NULL,
  `Statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stockage`
--

INSERT INTO `stockage` (`ID-stock`, `nombre-Voiture`, `modèle-Voiture`, `Statut`) VALUES
(1, 4, 'BMW', 'Réserver '),
(2, 4, 'Bugatti', 'Disponible'),
(3, 2, 'Chevrolet', 'Réserver '),
(4, 3, 'Citroën', 'Disponible'),
(5, 5, 'Corvette', 'Réserver '),
(6, 6, 'Fiat', 'Réserver '),
(7, 1, 'Ford', 'Disponible'),
(8, 8, 'Hummer', 'Réserver '),
(9, 5, 'Hyundai', 'Réserver '),
(10, 6, 'Jeep', 'Disponible');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `ID-vente` int(30) NOT NULL,
  `Date-vente` date NOT NULL,
  `Modale-pay` varchar(50) NOT NULL,
  `Montant-vente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`ID-vente`, `Date-vente`, `Modale-pay`, `Montant-vente`) VALUES
(1, '2024-04-10', 'Carte', 8000000),
(2, '2016-03-09', 'Cash', 5000000),
(3, '2015-04-22', 'Cheque ', 15000000),
(4, '2017-04-12', 'Carte ', 4000000),
(5, '2018-04-19', 'Cash', 20000000),
(6, '2010-04-23', 'Cheque', 6000000),
(7, '2020-04-15', 'Cash', 4000000),
(8, '2024-04-03', 'Carte', 10000000),
(9, '2019-04-17', 'Cheque ', 6000000),
(10, '2018-04-12', 'Cash', 9000000);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `ID-Voiture` int(30) NOT NULL,
  `Marque-Voiture` varchar(50) NOT NULL,
  `Modèle-Voiture` varchar(50) NOT NULL,
  `Année-fabrication` date NOT NULL,
  `Kilométrage` int(50) NOT NULL,
  `Prix` int(10) NOT NULL,
  `Couleur` varchar(30) NOT NULL,
  `Etat` varchar(20) NOT NULL,
  `Type-carburant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`ID-Voiture`, `Marque-Voiture`, `Modèle-Voiture`, `Année-fabrication`, `Kilométrage`, `Prix`, `Couleur`, `Etat`, `Type-carburant`) VALUES
(1, 'Toyota', 'Camry', '2019-04-03', 25000, 5000000, 'Rouge, Noir ', ' Neuve ', 'Essence'),
(2, 'Toyota', 'Corolla', '2018-04-01', 30000, 7000000, 'Rouge, Noir ', 'Occasion ', 'Essence'),
(3, 'BMW', '5séries', '2020-04-01', 15000, 6000000, 'Rouge, Noir , Bleu , Blanc', 'Occasion ', 'Essence'),
(4, 'Honda', 'CR-V', '2019-04-03', 20000, 9000000, 'Rouge, Noir ', ' Neuve ', 'Essence'),
(5, 'Mercedes', 'GLC', '2018-04-01', 30000, 7000000, 'Bleu , Blanc', 'Occasion ', 'Essence'),
(6, 'Hyundai  ', 'Accent', '2016-04-03', 80000, 9000000, 'Rouge, Noir ', ' Neuve ', 'Essence'),
(7, 'Hyundai', 'Elantra', '2021-04-18', 15000, 9000000, 'Bleu , Blanc', ' Neuve ', ' Gasoil'),
(8, 'Hyundai', 'Sonata', '2014-05-16', 60000, 10000000, 'Blanc', 'Neuve ', 'Essence'),
(9, 'Bentley  ', 'Continental', '2003-04-01', 30000, 7000000, 'Rouge', 'Occasion ', 'Gasoil'),
(10, 'Bentley  ', 'GT', '2004-04-03', 20000, 5000000, ' Noir ', ' Neuve ', 'Essence');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID-Client`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`Matricule-emp`);

--
-- Index pour la table `stockage`
--
ALTER TABLE `stockage`
  ADD PRIMARY KEY (`ID-stock`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`ID-vente`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`ID-Voiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID-Client` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `Matricule-emp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `stockage`
--
ALTER TABLE `stockage`
  MODIFY `ID-stock` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `ID-vente` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `ID-Voiture` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
