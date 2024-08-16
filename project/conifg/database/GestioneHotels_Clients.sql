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
-- Struttura della tabella `GestioneHotels_Clients`
--

CREATE TABLE `GestioneHotels_Clients` (
  `Id` int NOT NULL,
  `Email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `GestioneHotels_Clients`
--

INSERT INTO `GestioneHotels_Clients` (`Id`, `Email`, `Password`) VALUES
(2, 'antoniorossitascio@gmail.com', '0f8a724bed6ad43bfc3953ffd8b7988d2567d763f89cda835c6e587191b52b78'),
(6, 'ectorina2000@gmail.com', '769b81efe68ed7dfec00c1901cbd5e84a6303bb1a14f2455c617ccff58ebe968'),
(7, 'riccardo.cimorosi@gmail.com', 'a03ab19b866fc585b5cb1812a2f63ca861e7e7643ee5d43fd7106b623725fd67'),
(9, 'client666@gmail.com', 'b5a85380214449b8927541f7d23c3f055a477ff2549e65044f721e6c4509e3d8'),
(10, 'admin666@gmail.com', '483c789e43683f6712795f05c0b324a710be9f32de1843f8db9c152bd1b53e0f'),
(11, 'admin777@gmail.com', '78cfdd5b5d6bebcb6170b663a42b7b64d18f9f407f764c744b90025a98052b35'),
(12, 'client555@gmail.com', '08e28c1d5af8fb067151470f2817c9619002ab7a7dd9c4d3b7fc1a26712d5ccd'),
(13, 'cliente999@gmail.com', 'b8307f2f03a013397047d51ac73b57b235608a62c282ad3a830c1c4085e0928d'),
(14, 'Massimo@gmail.com', 'aee4bea4b0faf23862aaa69df5cdf5f98e5cea13023994d7382b03a788864a13'),
(15, 'giammariomarini@gmail.com', 'a03ab19b866fc585b5cb1812a2f63ca861e7e7643ee5d43fd7106b623725fd67'),
(38, 'Mario@gmail.com', 'a8167248bc6a60b8eed8d5e8e89fe6d356ec857a1645b6bb722ea6b6b2b0de8f'),
(39, 'Ciaone@gmail.com', '94b5e7729b84def4d1fd68f78acbc425d564a2cb8828098113910a2cf559d2f8'),
(40, 'Max@gmail.com', '8356d24d12bad41da1e12b9d42e8efb5ac4b9ca048909a12a9d3a8818651312e'),
(41, 'Jsj', 'cb7191807160e03369bf20d13318cfbd164632776f8592bb4875445a56e0d4c2'),
(43, 'Massim@gmail.com', '027526a694df868b9079bcc6b7d9385ac61e3297528eca6b44600bcb4f6c7d46'),
(45, 'Giulio@gmail.com', '45255a1ee12362be81c8fec9619e74608612fdeb873a08856a93ab7807169344'),
(46, 'Letale@gmail.com', 'fee9e496101dfc4fbc902f855592639cfb719b269b5bcb43d145d71260bb666c'),
(47, 'Mazz@gmail.com', '61790580cdec4657ac78db778067ab26444430dcbcbec35f2d4c3dbd8d2a57da'),
(48, 'Mio@gmail.com', 'eeedfc69678fa1a79f83188a2ceca213606da50f0d2c683178e868caaccf9c11'),
(49, 'Lol@gmail.com', 'a0e570324e6ffdbc6b9c813dec968d9bad134bc0dbb061530934f4e59c2700b9'),
(50, 'Mia@gmail.com', '74593e9470a139c13b2de3178310de9fda507067c318e183825b4f05fb021633'),
(51, 'Miao@gmail.com', 'afbeccff0c8f3e479c86fb1d9886473cabe573446b3ed09ed83cdd8ceabf9c31'),
(52, 'miaone@gmail.com', 'cc8b4357a0a038d30cd6b06f6719ca7b411d3f3146223da163f45f5c955638b7'),
(53, 'Bau@gmail.com', '8f293ae0c6b75f2c48dfa7f2e8cc0221e91c554d09431679a47fbe6548bb466a'),
(54, 'cashier@cashier.com', '02da9e4bfdbef3d545767d455b05ce83afccc26d189e6a549711e3d4437e53f6'),
(55, 'ciao@gmail.com', '6f83a90e58a43520a3f7214328091be808ab9177a4dfad9dcc3107ea81db607d'),
(56, 'prince@gmail.com', '97e45ce3523868c87b82c344ec130f42a5fa93465d157316aa30d6d0ebf68db2'),
(58, 'Luigi@gmail.com', 'abee3f6f08dcffaa6661ad9944e9447b57f72c7d4418f3fa625a642bd47b6ad9'),
(59, 'CIAOLETALE@GMAIL.COM', 'f50f87dd31c6a9bca27159663b23e8afd5e22a50cafd5f3cef42a6a67d844760'),
(60, 'Nonmi@gail.com', 'e94871353aacc91fa444f48c23d2f679257a792f198a785f95ef6ddcf1e0475e'),
(61, 'fsdfds@gmail.com', 'cd58056e67a61cc8acfc447669aba50b9078c09a3e897dfc4b30826c83ff3f6f');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `GestioneHotels_Clients`
--
ALTER TABLE `GestioneHotels_Clients`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `GestioneHotels_Clients`
--
ALTER TABLE `GestioneHotels_Clients`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
