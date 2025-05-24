-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Sob 24. kvě 2025, 14:13
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
(7, 2.1, 'SIGMA', 'Filip Turek', '2025-05-03', 'S3', '2028', 'B', 3);

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
(2, 'ahoj', '$2y$10$YdlqqTGifqEd1bFDmsiWHeeeXogmLiy1bh5iXd45ArzDx5QEBVoGS', 'ahoj@helloskola.cz', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `files`
--
ALTER TABLE `files`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
