-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Úte 10. čen 2025, 14:50
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `archivemaster`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `poradCislo` float NOT NULL,
  `spisZnak` varchar(100) NOT NULL,
  `nazev` varchar(255) NOT NULL,
  `datumUlozeni` date NOT NULL,
  `skartZnak` varchar(4) NOT NULL,
  `rokSkartace` year(4) NOT NULL,
  `rada` varchar(2) NOT NULL,
  `cislo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `files`
--

INSERT INTO `files` (`ID`, `poradCislo`, `spisZnak`, `nazev`, `datumUlozeni`, `skartZnak`, `rokSkartace`, `rada`, `cislo`) VALUES
(8, 1.1, 'A1', 'Petr Pavel Petr Pavel Petr Pavel Petr Pavel Petr Pavel Petr Pavel Petr Pavel Petr Pavel Petr Pavel', '2025-06-01', 'S4', '2029', 'C', 4),
(9, 1.3, 'SIGMA', 'AHOJ', '2025-06-29', 'S1', '2026', 'AF', 5),
(10, 1, 'OPICE', 'Záznam práce 12. týden 2025', '2025-06-02', 'S5', '2030', 'AA', 4),
(11, 3, 'A3', 'SIGMA', '2025-06-08', 'S1', '2025', 'AC', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `storage`
--

CREATE TABLE `storage` (
  `ID` int(11) NOT NULL,
  `radaRacku` varchar(2) NOT NULL,
  `cisloRacku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `storage`
--

INSERT INTO `storage` (`ID`, `radaRacku`, `cisloRacku`) VALUES
(6, 'AC', 4),
(7, 'AA', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'neksiKeksik', '$2y$10$gWjq4Zlzg3kBC5Dx4B9/Aet/kaaxhbWTn5yu3Ln278FFMr5vJL54W', 'ahoj@helloskola.cz', 1),
(19, 'ahoj', '$2y$10$3xp0q2gS3oflQz1qNu.Ck.suu2rInKF4Pev6lBvCui5.W29856sRC', 'ahoj@helloskola.cz', NULL),
(20, 'Adam', '$2y$10$wdPMPHbLmhckvhODHXs.l.ytNNUEbJ5idPmvEXF6uDp26vt1f/b52', 'jo@sigma.com', 1);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pro tabulku `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `storage`
--
ALTER TABLE `storage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
