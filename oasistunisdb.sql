-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oasistunisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cultures`
--

CREATE TABLE `cultures` (
  `id_culture` int(11) NOT NULL,
  `nom_culture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rendement_moyen` decimal(10,2) NOT NULL,
  `periode_recolte` varchar(255) NOT NULL,
  `irrigation_utilisee` varchar(255) NOT NULL,
  `id_oasis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cultures`
--

INSERT INTO `cultures` (`id_culture`, `nom_culture`, `description`, `rendement_moyen`, `periode_recolte`, `irrigation_utilisee`, `id_oasis`) VALUES
(1, 'Culture 1', 'Description 1', 50.00, 'Spring', 'Sprinkler', 1),
(2, 'Culture 2', 'Description 2', 40.00, 'Summer', 'Drip', 2),
(3, 'Culture 3', 'Description 3', 60.00, 'Fall', 'Flood', 3),
(4, 'Culture 4', 'Description 4', 45.00, 'Winter', 'Sprinkler', 4),
(5, 'Culture 5', 'Description 5', 55.00, 'Spring', 'Drip', 5),
(8, 'Culture 6', 'Description de la culture 6', 550.00, 'Mars-Novembre', 'Goutte à goutte', 6),
(9, 'Culture 7', 'Description de la culture 7', 550.03, 'Mars-Novembre', 'Goutte à goutte', 7),
(10, 'Culture 8', 'Description de la culture 8	', 550.03, 'Mars-Novembre', 'Goutte à goutte', 8);

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `id_infra` int(11) NOT NULL,
  `nom_infra` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type_infra` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `date_construction` date DEFAULT NULL,
  `id_oasis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id_infra`, `nom_infra`, `description`, `type_infra`, `etat`, `capacite`, `date_construction`, `id_oasis`) VALUES
(1, 'Zone de culture', 'Zone dédiée à la culture de fruits et légumes', 'Agriculture', 'En développement', 500, '2023-05-10', 2),
(2, 'Salle communautaire', 'Salle pour les réunions et les événements communautaires', 'Bâtiment', 'Bon état', 50, '2018-11-30', 2),
(3, 'Serre automatisée', 'Serre équipée de systèmes automatisés pour la culture de plantes', 'Agriculture', 'Fonctionnelle', 150, '2023-03-12', 4),
(4, 'Aire de jeux pour enfants', 'Espace sécurisé avec des équipements de jeux pour les enfants', 'Espace de jeux', 'En bon état', 30, '2021-09-08', 4),
(5, 'Salle de gym', 'Salle équipée pour les activités sportives et de remise en forme', 'Bâtiment', 'Opérationnelle', 20, '2022-02-05', 5),
(6, 'Bibliothèque', 'Espace culturel pour la lecture et la recherche', 'Bâtiment', 'En bon état', 50, '2021-04-28', 6),
(7, 'Terrain de football', 'Espace aménagé pour la pratique du football', 'Terrain de sport', 'En bon état', 100, '2019-05-15', 7),
(8, 'Centre de recyclage', 'Installation pour trier et traiter les déchets recyclables', 'Traitement des déchets', 'Opérationnel', 50, '2010-02-23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id`, `full_name`, `username`, `email`, `phone_number`, `password`, `created_at`) VALUES
(1, 'mootaz', 'mansouri', 'mootazmansouri@gmail.com', '92021578', '$2y$10$uehHlRU9p3ja1LAPRTRlsOfdCuahsXpqzHiua8NQP3CEfq0fFfTGy', '2024-05-07 09:38:15'),
(2, 'mootaz', 'mansouri', 'mootazmansouri@gmail.com', '92021578', '$2y$10$ZmDgSisRiMGGZKulmJtpQOU15W2DkUdSznGwYpxiznw2TpYrIeCSW', '2024-05-07 09:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `meteo`
--

CREATE TABLE `meteo` (
  `id_meteo` int(11) NOT NULL,
  `temperature_moyenne` decimal(4,2) DEFAULT NULL,
  `humidite_relative` decimal(4,2) DEFAULT NULL,
  `pluviometrie` decimal(10,2) DEFAULT NULL,
  `vitesse_vent` decimal(5,2) DEFAULT NULL,
  `id_oasis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meteo`
--

INSERT INTO `meteo` (`id_meteo`, `temperature_moyenne`, `humidite_relative`, `pluviometrie`, `vitesse_vent`, `id_oasis`) VALUES
(1, 25.50, 70.30, 15.25, 10.20, 1),
(2, 28.00, 65.80, 12.75, 9.50, 2),
(3, 20.30, 80.10, 0.00, 5.50, 3),
(4, 23.70, 68.50, 8.75, 7.80, 4),
(5, 30.10, 62.20, 20.50, 12.30, 5),
(6, 18.90, 75.60, 3.25, 6.20, 6),
(7, 22.80, 71.20, 5.00, 9.10, 7),
(8, 27.40, 64.90, 18.30, 11.70, 8),
(9, 19.60, 77.30, 2.70, 6.80, 8);

-- --------------------------------------------------------

--
-- Table structure for table `oasis`
--

CREATE TABLE `oasis` (
  `id_oasis` int(11) NOT NULL,
  `nom_oasis` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `superficie` decimal(10,2) NOT NULL,
  `population` int(11) NOT NULL,
  `altitude` int(11) NOT NULL,
  `acces_eau` varchar(255) NOT NULL,
  `type_oasis` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oasis`
--

INSERT INTO `oasis` (`id_oasis`, `nom_oasis`, `latitude`, `longitude`, `superficie`, `population`, `altitude`, `acces_eau`, `type_oasis`, `id_ville`) VALUES
(1, 'Oasis 1', 12.34567800, -23.45678900, 1000.00, 500, 200, 'Puits', 'Arid', 1),
(2, 'Oasis 2', 9.87654300, -12.34567800, 800.00, 300, 150, 'Rivière', 'Lush', 2),
(3, 'Oasis 3', 0.98765400, -1.23456700, 1200.00, 700, 180, 'Puits', 'Arid', 3),
(4, 'Oasis 4', -3.45678900, 45.67890100, 1500.00, 800, 250, 'Puits', 'Arid', 4),
(5, 'Oasis 5', 23.45678900, -78.90123400, 2000.00, 1000, 300, 'Rivière', 'Lush', 5),
(6, 'Oasis 7', 35.45678901, -8.45678901, 1500.75, 8000, 300, 'Rivière', 'Montagneuse', 7),
(7, 'Oasis 8', 35.45678901, -8.45677601, 1600.75, 4000, 200, 'Rivière', 'Montagneuse', 8),
(8, 'Oasis 8Q', 35.45678901, -8.45677601, 1600.75, 4000, 200, 'Rivière', 'Montagneuse', 9);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `utilisation` varchar(255) DEFAULT NULL,
  `rendement_moyen` decimal(6,2) DEFAULT NULL,
  `periode_recolte` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `id_oasis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `description`, `utilisation`, `rendement_moyen`, `periode_recolte`, `prix`, `id_oasis`) VALUES
(1, 'Tomates', 'Tomates rouges et juteuses', 'Salades, sauces, conserves', 5.75, 'Été', 2.99, 1),
(2, 'Pommes', 'Pommes croquantes et sucrées', 'Fruits frais, jus de pomme', 4.25, 'Automne', 3.49, 2),
(3, 'Carottes', 'Carottes fraîches et croquantes', 'Salades, soupes, purées', 6.00, 'Printemps', 1.99, 1),
(4, 'Courgettes', 'Courgettes vertes et tendres', 'Sautées, grillées, ratatouille', 4.50, 'Été', 1.79, 2),
(5, 'Fraises', 'Fraises rouges et sucrées', 'Fruits frais, confitures', 3.25, 'Printemps', 4.99, 3),
(6, 'Aubergines', 'Aubergines violettes et fermes', 'Grillées, rôties, moussaka', 5.00, 'Été', 2.49, 1),
(7, 'Laitues', 'Laitues vertes et fraîches', 'Salades', 6.25, 'Printemps', 0.99, 1),
(8, 'Poivrons', 'Poivrons colorés et croquants', 'grillades', 4.75, 'Été', 1.99, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ressources_eau`
--

CREATE TABLE `ressources_eau` (
  `id_ressource_eau` int(11) NOT NULL,
  `source_eau` varchar(255) DEFAULT NULL,
  `qualite_eau` varchar(255) DEFAULT NULL,
  `quantite_eau` decimal(10,2) DEFAULT NULL,
  `utilisation_eau` varchar(255) DEFAULT NULL,
  `id_oasis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ressources_eau`
--

INSERT INTO `ressources_eau` (`id_ressource_eau`, `source_eau`, `qualite_eau`, `quantite_eau`, `utilisation_eau`, `id_oasis`) VALUES
(1, 'Spring', 'Potable', 1000.50, 'Drinking water', 1),
(2, 'River', 'Irrigation', 5000.75, 'Agricultural use', 2),
(3, 'Well', 'Non-potable', 300.25, 'Industrial use', 3),
(4, 'Lake', 'Potable', 7500.00, 'Domestic use', 4),
(5, 'Reservoir', 'Non-potable', 6000.30, 'Hydropower generation', 5),
(6, 'Rainwater harvesting', 'Potable', 1500.80, 'Household consumption', 6),
(10, 'Groundwater', 'Potable', 3000.00, 'Municipal supply', 7),
(11, 'Desalination plant', 'Potable', 2001.00, 'Urban consumption', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'dhiasaied733@gmail.com', '$2y$10$j.d3MKDWjqaC5cd7420NDOUdrMiaIBy8RSfCq./yVuZEBHg70CjiS'),
(2, 'mootaz@gmail.com', '$2y$10$eocNbpgAUfTf1DBX3Aad1.UdB3nUNyNq5NrLft2ZMmtE1W/UbRZdG'),
(3, 'mootaz@gmail.com', '$2y$10$akdZq7obyCRAwZtNPMIMEez5DO6n4zjsKhl8iu35yTsRvzz4cyYPy'),
(4, 'mootaz@gmail.com', '$2y$10$GY0oHWgyaNNJN/pcJJIBkOq12YNhmmptl0sRTWt4UklAlzkbPFQu2'),
(5, 'dhiasaied733@gmail.com', '$2y$10$lRM0RRX.6xNJM3kdpM5SruAPuRrLWyVHRigTHiMZkY9dtV9Q0Oh.q'),
(6, 'dhiasaied733@gmail.com', '$2y$10$N2rsw4.t2tWaFEkjapvnwe8PXeDUtVlO7HQ4FwDgCpjTmpls0SL3m'),
(7, 'akrimohamed@gmail.com', '$2y$10$XnzLLL7aVrfiVlOzg82Hveg0m9Sw8uFiLa0fe3f6maxB87dbMlJRC');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(255) NOT NULL,
  `code_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id_ville`, `nom_ville`, `code_postal`) VALUES
(1, 'Ville A', '12345'),
(2, 'Ville B', '67890'),
(3, 'Ville C', '23456'),
(4, 'Ville D', '78901'),
(5, 'Ville E', '34567'),
(6, 'NABEUL', '8060'),
(7, 'Ville F', '54321'),
(8, 'Ville G', '12345'),
(9, 'Ville S', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cultures`
--
ALTER TABLE `cultures`
  ADD PRIMARY KEY (`id_culture`),
  ADD KEY `id_oasis` (`id_oasis`);

--
-- Indexes for table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD PRIMARY KEY (`id_infra`),
  ADD KEY `id_oasis` (`id_oasis`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meteo`
--
ALTER TABLE `meteo`
  ADD PRIMARY KEY (`id_meteo`),
  ADD KEY `id_oasis` (`id_oasis`);

--
-- Indexes for table `oasis`
--
ALTER TABLE `oasis`
  ADD PRIMARY KEY (`id_oasis`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_oasis` (`id_oasis`);

--
-- Indexes for table `ressources_eau`
--
ALTER TABLE `ressources_eau`
  ADD PRIMARY KEY (`id_ressource_eau`),
  ADD KEY `id_oasis` (`id_oasis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cultures`
--
ALTER TABLE `cultures`
  MODIFY `id_culture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `infrastructure`
--
ALTER TABLE `infrastructure`
  MODIFY `id_infra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meteo`
--
ALTER TABLE `meteo`
  MODIFY `id_meteo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oasis`
--
ALTER TABLE `oasis`
  MODIFY `id_oasis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ressources_eau`
--
ALTER TABLE `ressources_eau`
  MODIFY `id_ressource_eau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cultures`
--
ALTER TABLE `cultures`
  ADD CONSTRAINT `cultures_ibfk_1` FOREIGN KEY (`id_oasis`) REFERENCES `oasis` (`id_oasis`);

--
-- Constraints for table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD CONSTRAINT `infrastructure_ibfk_1` FOREIGN KEY (`id_oasis`) REFERENCES `oasis` (`id_oasis`);

--
-- Constraints for table `meteo`
--
ALTER TABLE `meteo`
  ADD CONSTRAINT `meteo_ibfk_1` FOREIGN KEY (`id_oasis`) REFERENCES `oasis` (`id_oasis`);

--
-- Constraints for table `oasis`
--
ALTER TABLE `oasis`
  ADD CONSTRAINT `oasis_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_oasis`) REFERENCES `oasis` (`id_oasis`);

--
-- Constraints for table `ressources_eau`
--
ALTER TABLE `ressources_eau`
  ADD CONSTRAINT `ressources_eau_ibfk_1` FOREIGN KEY (`id_oasis`) REFERENCES `oasis` (`id_oasis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
