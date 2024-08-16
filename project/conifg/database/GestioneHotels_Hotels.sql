-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 16, 2024 alle 12:39
-- Versione del server: 8.0.32
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_vittoriopiotti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `GestioneHotels_Hotels`
--

CREATE TABLE `GestioneHotels_Hotels` (
  `Id` int NOT NULL,
  `Name` varchar(24) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `IdAdmin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `GestioneHotels_Hotels`
--

INSERT INTO `GestioneHotels_Hotels` (`Id`, `Name`, `Image`, `Description`, `IdAdmin`) VALUES
(4, 'Hotel D\'Amasco', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel1.png?raw=true', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(5, 'Hotel Bacardi', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel2.jpg?raw=true', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(6, 'Hotel Alberta', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel3.jpg?raw=true', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(7, 'Hotel D\'Ambrosio', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel1.png?raw=true', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(8, 'Hotel Bocconi', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel2.jpg?raw=true', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(9, 'Hotel Arizona', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel3.jpg?raw=true', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(10, 'Hotel D\'Adige', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel1.png?raw=true', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(11, 'Hotel Bayer', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel2.jpg?raw=true', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(12, 'Hotel Asimov', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel3.jpg?raw=true', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(34, 'Nome Giallo', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel1.png?raw=true', 'Descrizione', 1),
(35, 'Hotel Verde', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel1.png?raw=true', 'Descrizione', 1),
(36, 'Hotel Luiggino', 'https://github.com/vittorioPiotti/Gestione-Hotel-PHP/blob/main/project/Client/assets/images/hotel3.jpg?raw=true', 'Descrizione Hotel', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `GestioneHotels_Hotels`
--
ALTER TABLE `GestioneHotels_Hotels`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_IdAdmin` (`IdAdmin`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `GestioneHotels_Hotels`
--
ALTER TABLE `GestioneHotels_Hotels`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `GestioneHotels_Hotels`
--
ALTER TABLE `GestioneHotels_Hotels`
  ADD CONSTRAINT `FK_IdAdmin` FOREIGN KEY (`IdAdmin`) REFERENCES `GestioneHotels_Admins` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
