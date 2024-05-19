-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2024 at 10:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_gestion_vente_voitures`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `tel`) VALUES
(1, 'NGODJOU ', 'HUGUES', 'HUGUES@gmail.com', '77083236'),
(2, 'ESSONO ', 'ROBY', 'ROBY@gmail.com', '74755509'),
(3, 'DJEMBA ', 'SAMUEL', 'SAMUEL@gmail.com', '66554433'),
(4, 'MADJINOU ', 'MBINA', 'MBINA@gmail.com', '66889944'),
(5, 'NGODJOU ', 'NATHANAEL', 'NATHANAEL@gmail.com', '62558864'),
(6, 'JOSEPH ', 'ALLOGO', 'ALLOGO@gmail.com', '62550411'),
(7, 'TCHAGODOMOU ', 'SHAKIRA', 'SHAKIRA@gmail.com', '73547785'),
(8, 'MOUKETOU', 'ARTHEMAS', 'ARTHEMAS@gmail.com', '65225015'),
(15, 'MADU', 'Ezekiel', 'ewe@wew.com', '00000000');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `matricule` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL,
  `date_emb` date NOT NULL,
  `service` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`matricule`, `nom`, `prenom`, `date_naiss`, `date_emb`, `service`, `tel`, `email`) VALUES
(1, 'ASSITA', 'SEONE', '2005-04-08', '2022-04-08', 'Directeur du marketing', '74874911', 'SEONE@gmail.com'),
(2, 'NYENGUE WOMDO ', 'LEOTARD', '1972-04-07', '2015-04-16', 'Directeur financier', '62445520', 'WOMDO@gmail.com '),
(3, 'MANDOUKOU', 'JORDY', '1997-04-03', '2014-04-01', 'Directeur des ventes', '74164874', 'MANDOUKOU@gmail.com'),
(4, 'EVOUNG BITOME MOUDZIEGOU', 'BRUNEL DONOVAN BERTRAND', '1990-04-03', '2012-10-27', 'Directeur général', '60347229', 'evoung2723@gmail.com'),
(5, 'ETOURA ', 'SARA', '2001-04-09', '2012-10-27', 'Manutentionnaire d\'inventaire ', '65882255', 'SARA@gmail.com'),
(6, 'NZE BILOGHE ', 'EMMANUEL SAVIOLA', '2000-04-08', '2022-04-08', 'Représentant des ventes', '77336655', 'SAVIOLA@gmail.com'),
(7, 'MADIBA ', 'CRICHELLA', '2003-04-09', '2015-04-16', 'Agent de service client', '62889966', 'CRICHELLA@gmail.com '),
(8, 'AWAGUISSA ', 'URMILA', '1995-04-03', '2014-04-01', 'Agent de centre d\'appels', '77554420', 'URMILA@gmail.com'),
(9, 'MINTSA ', 'KARIM DAREL', '2000-04-18', '2020-04-16', 'Technicien de maintenance automobile', '62558844', 'DAREL@gmail.com'),
(10, 'MADJILEM ALREMADJI ', 'ALICE', '2001-04-10', '2017-04-13', 'Agent de réception', '65221155', 'ALICE@gmail.com'),
(11, 'MBIMBI ', 'LARRY', '1972-04-03', '2012-10-27', 'Agent de sécurité', '65882255', 'LARRY@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `id` int(30) NOT NULL,
  `date` date NOT NULL,
  `modale_pay` varchar(50) NOT NULL,
  `montant` int(10) NOT NULL,
  `voiture` varchar(100) DEFAULT 'N/A',
  `client` varchar(100) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id`, `date`, `modale_pay`, `montant`, `voiture`, `client`) VALUES
(1, '2024-04-10', 'Carte', 8000000, 'Toyota Camry', 'NGODJOU Hugues'),
(2, '2016-03-09', 'Cash', 5000000, 'Toyota Corolla', 'ESSONO Roby'),
(3, '2015-04-22', 'Carte', 15000000, 'Honda CR-V', 'DJEMBA SAMUEL'),
(4, '2017-04-12', 'Carte', 4000000, 'Mercedes GLC', 'MADJINOU MBINA'),
(5, '2018-04-19', 'Cash', 20000000, 'Hyundai Accent', 'NGODJOU NATHANAEL'),
(6, '2010-04-23', 'Carte', 6000000, 'Hyundai Elantra', 'JOSEPH ALLOGO'),
(7, '2020-04-15', 'Cash', 4000000, 'BMW 5séries', 'ESSONO ROBY'),
(12, '2024-05-03', 'Cash', 2500000, 'Bentley GT', 'MADJINOU MBINA'),
(13, '2024-05-11', 'Chèque', 4000000, 'Bentley Continental', 'NGODJOU HUGUES'),
(14, '2024-06-08', 'Cash', 567890, 'Hyundai Sonata', 'MOUKETOU ARTHEMAS');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(30) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `annee_fabrication` date NOT NULL,
  `kilometrage` int(50) NOT NULL,
  `prix` int(10) NOT NULL,
  `couleur` varchar(30) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `type_carburant` varchar(50) NOT NULL,
  `quantite` int(5) NOT NULL DEFAULT 1,
  `statut` varchar(50) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `modele`, `annee_fabrication`, `kilometrage`, `prix`, `couleur`, `etat`, `type_carburant`, `quantite`, `statut`) VALUES
(1, 'Toyota', 'Camry', '2019-04-03', 25000, 5000000, 'Rouge, Noir ', 'Neuve', 'Essence', 1, 'Disponible'),
(4, 'Honda', 'CR-V', '2019-04-03', 20000, 9000000, 'Rouge, Noir ', ' Neuve ', 'Essence', 1, 'Disponible'),
(5, 'Mercedes', 'GLC', '2018-04-01', 30000, 7000000, 'Bleu , Blanc', 'Occasion ', 'Essence', 1, 'Disponible'),
(6, 'Hyundai  ', 'Accent', '2016-04-03', 80000, 9000000, 'Rouge, Noir ', ' Neuve ', 'Essence', 1, 'Disponible'),
(7, 'Hyundai', 'Elantra', '2021-04-18', 15000, 9000000, 'Bleu , Blanc', ' Neuve ', ' Gasoil', 1, 'Disponible'),
(8, 'Hyundai', 'Sonata', '2014-05-16', 60000, 10000000, 'Blanc', 'Neuve ', 'Essence', 1, 'Disponible'),
(9, 'Bentley  ', 'Continental', '2003-04-01', 30000, 7000000, 'Rouge', 'Occasion ', 'Gasoil', 1, 'Disponible'),
(10, 'Bentley  ', 'GT', '2004-04-03', 20000, 5000000, ' Noir ', ' Neuve ', 'Essence', 1, 'Disponible'),
(16, 'Ford', 'T20 Truck', '2024-05-01', 9, 8238923, 'Noire', 'Neuve', 'Gasoil', 1, 'Disponible'),
(17, 'klf', 'ifsd', '2024-05-15', 893, 93, 'Rouge', 'Neuve', 'Diesel', 2, 'Disponible'),
(18, 'adsf', 'fads', '2024-01-04', 0, 832, 'Verte', 'Neuve', 'Diesel', 2, 'Disponible');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `matricule` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
