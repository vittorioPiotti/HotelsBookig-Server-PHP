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
-- Struttura della tabella `GestioneHotels_Bookings`
--

CREATE TABLE `GestioneHotels_Bookings` (
  `Id` int NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `IdClient` int DEFAULT NULL,
  `IdRoom` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `GestioneHotels_Bookings`
--

INSERT INTO `GestioneHotels_Bookings` (`Id`, `StartDate`, `EndDate`, `IdClient`, `IdRoom`) VALUES
(1, '2024-03-23', '2024-03-25', NULL, 135),
(2, '2024-03-24', '2024-03-26', NULL, 1),
(3, '2024-03-25', '2024-03-27', NULL, 2),
(4, '2024-03-26', '2024-03-28', NULL, 3),
(5, '2024-03-27', '2024-03-29', NULL, 4),
(6, '2024-03-23', '2024-03-25', NULL, 5),
(7, '2024-03-24', '2024-03-26', NULL, 6),
(8, '2024-03-25', '2024-03-27', NULL, 7),
(9, '2024-03-26', '2024-03-28', NULL, 8),
(10, '2024-03-27', '2024-03-29', NULL, 9),
(11, '2024-03-23', '2024-03-25', NULL, 10),
(12, '2024-03-24', '2024-03-26', NULL, 11),
(13, '2024-03-25', '2024-03-27', NULL, 12),
(14, '2024-03-26', '2024-03-28', NULL, 13),
(15, '2024-03-27', '2024-03-29', NULL, 14),
(19, '2024-04-12', '2024-04-30', 2, 2),
(27, '2024-04-12', '2024-04-13', 7, 62),
(28, '2024-04-13', '2024-04-14', 9, 15),
(30, '2024-04-14', '2024-04-15', 11, 18),
(32, '2024-04-14', '2024-04-15', 15, 60),
(45, '2024-05-20', '2024-05-21', 39, 16),
(46, '2024-05-20', '2024-05-21', 39, 15),
(47, '2024-05-20', '2024-05-21', 39, 15),
(48, '2024-05-20', '2024-05-21', 39, 15),
(49, '2024-05-20', '2024-05-21', 39, 15),
(50, '2024-05-20', '2024-05-21', 39, 1),
(51, '2024-05-20', '2024-05-21', 39, 15),
(52, '2024-08-10', '2024-08-11', 38, 16),
(53, '2024-07-18', '2024-08-02', 43, 60),
(54, '2024-07-06', '2024-07-07', 45, 61),
(55, '2024-06-13', '2024-07-06', 50, 76),
(56, '2024-06-01', '2024-06-09', 53, 15),
(57, '2024-06-11', '2024-06-12', 55, 15),
(58, '2024-06-12', '2024-06-13', 55, 15),
(59, '2024-06-28', '2024-07-05', 55, 17),
(60, '2024-07-18', '2024-08-03', 55, 47);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `GestioneHotels_Bookings`
--
ALTER TABLE `GestioneHotels_Bookings`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_IdClient` (`IdClient`),
  ADD KEY `FK_IdRoom` (`IdRoom`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `GestioneHotels_Bookings`
--
ALTER TABLE `GestioneHotels_Bookings`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `GestioneHotels_Bookings`
--
ALTER TABLE `GestioneHotels_Bookings`
  ADD CONSTRAINT `FK_IdClient` FOREIGN KEY (`IdClient`) REFERENCES `GestioneHotels_Clients` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_IdRoom` FOREIGN KEY (`IdRoom`) REFERENCES `GestioneHotels_Rooms` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
