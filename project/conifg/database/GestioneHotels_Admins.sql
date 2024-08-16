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
-- Struttura della tabella `GestioneHotels_Admins`
--

CREATE TABLE `GestioneHotels_Admins` (
  `Id` int NOT NULL,
  `Email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `GestioneHotels_Admins`
--

INSERT INTO `GestioneHotels_Admins` (`Id`, `Email`, `Password`) VALUES
(1, 'admin@gmail.com', 'fb001dfcffd1c899f3297871406242f097aecf1a5342ccf3ebcd116146188e4b'),
(3, 'admin666@gmail.com', '483c789e43683f6712795f05c0b324a710be9f32de1843f8db9c152bd1b53e0f'),
(4, 'ciaone@gmail.com', '94b5e7729b84def4d1fd68f78acbc425d564a2cb8828098113910a2cf559d2f8'),
(5, 'prince@gmail.com', '97e45ce3523868c87b82c344ec130f42a5fa93465d157316aa30d6d0ebf68db2'),
(6, 'zinobooth@gmail.com', '97e45ce3523868c87b82c344ec130f42a5fa93465d157316aa30d6d0ebf68db2');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `GestioneHotels_Admins`
--
ALTER TABLE `GestioneHotels_Admins`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `GestioneHotels_Admins`
--
ALTER TABLE `GestioneHotels_Admins`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
