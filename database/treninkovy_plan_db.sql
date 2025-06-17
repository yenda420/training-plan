-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 08. kvě 2023, 20:42
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `treninkovy_plan`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `cviky`
--

CREATE TABLE `cviky` (
  `vaha` varchar(7) NOT NULL,
  `opakovani` varchar(8) NOT NULL,
  `serie` char(1) NOT NULL,
  `pauzy` varchar(15) NOT NULL,
  `ID_C` int(11) NOT NULL,
  `nazev_c` varchar(40) NOT NULL,
  `ID_S` int(11) NOT NULL,
  `poradi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `cviky`
--

INSERT INTO `cviky` (`vaha`, `opakovani`, `serie`, `pauzy`, `ID_C`, `nazev_c`, `ID_S`, `poradi`) VALUES
('80 kg', '8-12', '4', '3 min', 4, 'Squats', 2, 1),
('40 kg', '8-12', '3', '90 sek', 5, 'Leg curls', 3, 3),
('25 kg', '8-12', '3', '2 min', 6, 'Incline dumbbell press', 9, 2),
('10 kg', '12-15', '2', '90 sek', 7, 'Lateral raises', 10, 4),
('50 kg', '10-15', '3', '2 min', 8, 'Lat pulldowns', 7, 2),
('10 kg', '12-15', '3', '90 sek', 9, 'Bicep curls', 11, 8),
('15 kg', '12-15', '3', '90 sek', 10, 'Triceps pushdowns', 12, 7),
('70 kg', '8-12', '3', '2-3 min', 11, 'V-bar rows', 7, 1),
('40 kg', '10-15', '2', '2 min', 12, 'Pullover', 7, 3),
('40 kg', '12-15', '2', '2 min', 13, 'Pec-deck', 9, 2),
('100 kg', '8-12', '4', '3 min', 14, 'Leg press', 2, 2),
('20 kg', '12-15', '2', '2 min', 15, 'High to low cable flyes', 9, 4),
('50 kg', '15-20', '3', '2 min', 16, 'Leg extentions', 2, 4),
('80 kg', '12-15', '4', '90 sek', 17, 'Standing calve raises', 1, 10),
('60 kg', '8-12', '4', '3 min', 18, 'Bench press', 7, 1),
('20 kg', '8-12', '3', '2-3 min', 19, 'Dumbbell shoulder press', 10, 3),
('10 kg', '12-15', '3', '90 sek', 20, 'Rear delt raises', 10, 5),
('20 kg', '12-15', '3', '90 sek', 21, 'Overhead triceps extentions', 12, 6),
('100 kg', '6-10', '4', '3 min', 22, 'Deadlifts', 3, 1),
('15 kg', '10-12', '3', '2 min', 23, 'Chest supported rows', 8, 4),
('80 kg', '8-12', '3', '2 min', 24, 'Shrugs', 8, 3),
('10 kg', '12-15', '3', '2 min', 25, 'Incline curls', 11, 8),
('10 kg', '12-15', '3', '2 min', 26, 'Preacher curl', 11, 9),
('40 kg', '12-15', '4', '90 sek', 27, 'Seated calve raises', 1, 11),
('100 kg', '8-12', '3', '2-3 min', 28, 'Hip thrust', 4, 2),
('20 kg', '6-12', '3', '2 min', 29, 'Bulgarian split squat', 4, 3),
('40 kg', '10-12', '3', '90 sek', 30, 'Cable ab crunches', 5, 10),
('10 kg', '10-12', '3', '90 sek', 31, 'Leg raises', 5, 11),
('60 kg', '6-12', '3', '2-3 min', 32, 'Good mornings', 6, 2),
('10 kg', '12-15', '3', '90 sek', 33, 'Superman', 6, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `plan`
--

CREATE TABLE `plan` (
  `ID_C` int(11) NOT NULL,
  `ID_T` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `plan`
--

INSERT INTO `plan` (`ID_C`, `ID_T`) VALUES
(4, 3),
(4, 5),
(5, 3),
(5, 5),
(6, 3),
(7, 3),
(7, 4),
(7, 6),
(8, 3),
(8, 7),
(9, 3),
(9, 4),
(10, 3),
(10, 4),
(10, 6),
(11, 4),
(12, 4),
(12, 7),
(13, 4),
(13, 6),
(14, 5),
(15, 4),
(16, 5),
(17, 5),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `svalove_partie`
--

CREATE TABLE `svalove_partie` (
  `ID_S` int(11) NOT NULL,
  `nazev_s` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `svalove_partie`
--

INSERT INTO `svalove_partie` (`ID_S`, `nazev_s`) VALUES
(1, 'Lýtka'),
(2, 'Kvadricepsy'),
(3, 'Hamstringy'),
(4, 'Hýždě'),
(5, 'Břicho'),
(6, 'Spodky zad'),
(7, 'Latisimy'),
(8, 'Vršek zad'),
(9, 'Prsa'),
(10, 'Ramena'),
(11, 'Biceps'),
(12, 'Triceps');

-- --------------------------------------------------------

--
-- Struktura tabulky `treninky`
--

CREATE TABLE `treninky` (
  `ID_T` int(11) NOT NULL,
  `nazev_t` varchar(50) NOT NULL,
  `zamereni_t` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `treninky`
--

INSERT INTO `treninky` (`ID_T`, `nazev_t`, `zamereni_t`) VALUES
(3, 'Fullbody', 'Celé tělo'),
(4, 'Upper body', 'Vršek těla'),
(5, 'Leg day', 'Spodek těla'),
(6, 'Push day', 'Prsa, ramena, triceps'),
(7, 'Pull day', 'Záda, biceps');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `ID_U` int(11) NOT NULL,
  `heslo` char(40) NOT NULL,
  `uzivJmeno` varchar(50) NOT NULL,
  `pocTreninku` int(11) NOT NULL,
  `nazevObrazku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele_treninky`
--

CREATE TABLE `uzivatele_treninky` (
  `ID_U` int(11) NOT NULL,
  `ID_T` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `cviky`
--
ALTER TABLE `cviky`
  ADD PRIMARY KEY (`ID_C`),
  ADD KEY `ID_S` (`ID_S`);

--
-- Indexy pro tabulku `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`ID_C`,`ID_T`),
  ADD KEY `ID_T` (`ID_T`),
  ADD KEY `ID_C` (`ID_C`) USING BTREE;

--
-- Indexy pro tabulku `svalove_partie`
--
ALTER TABLE `svalove_partie`
  ADD PRIMARY KEY (`ID_S`);

--
-- Indexy pro tabulku `treninky`
--
ALTER TABLE `treninky`
  ADD PRIMARY KEY (`ID_T`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`ID_U`);

--
-- Indexy pro tabulku `uzivatele_treninky`
--
ALTER TABLE `uzivatele_treninky`
  ADD PRIMARY KEY (`ID_U`,`ID_T`),
  ADD KEY `ID_T` (`ID_T`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `cviky`
--
ALTER TABLE `cviky`
  MODIFY `ID_C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pro tabulku `svalove_partie`
--
ALTER TABLE `svalove_partie`
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `treninky`
--
ALTER TABLE `treninky`
  MODIFY `ID_T` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `cviky`
--
ALTER TABLE `cviky`
  ADD CONSTRAINT `cviky_ibfk_1` FOREIGN KEY (`ID_S`) REFERENCES `svalove_partie` (`ID_S`);

--
-- Omezení pro tabulku `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`ID_T`) REFERENCES `treninky` (`ID_T`),
  ADD CONSTRAINT `plan_ibfk_3` FOREIGN KEY (`ID_C`) REFERENCES `cviky` (`ID_C`),
  ADD CONSTRAINT `plan_ibfk_4` FOREIGN KEY (`ID_C`) REFERENCES `cviky` (`ID_C`);

--
-- Omezení pro tabulku `uzivatele_treninky`
--
ALTER TABLE `uzivatele_treninky`
  ADD CONSTRAINT `uzivatele_treninky_ibfk_1` FOREIGN KEY (`ID_U`) REFERENCES `uzivatele` (`ID_U`),
  ADD CONSTRAINT `uzivatele_treninky_ibfk_2` FOREIGN KEY (`ID_T`) REFERENCES `treninky` (`ID_T`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
