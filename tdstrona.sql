-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lis 2015, 09:18
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `tdstrona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`ID` int(10) unsigned NOT NULL,
  `Money` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `bank`
--

INSERT INTO `bank` (`ID`, `Money`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`ID` int(10) unsigned NOT NULL,
  `ITEMS_ID` int(10) unsigned NOT NULL,
  `PLAYERS_ID` int(10) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`ID` int(10) unsigned NOT NULL,
  `PHPObjectName` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komunikaty`
--

CREATE TABLE IF NOT EXISTS `komunikaty` (
`ID` int(10) unsigned NOT NULL,
  `Tytul` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Komunikat` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`ID` int(10) unsigned NOT NULL,
  `Permission` varchar(45) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `permissions`
--

INSERT INTO `permissions` (`ID`, `Permission`) VALUES
(0, 'Admin'),
(1, 'VIP'),
(2, 'User'),
(3, 'Niepotwierdzony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE IF NOT EXISTS `players` (
`ID` int(10) unsigned NOT NULL,
  `BANK_ID` int(10) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Level` int(10) unsigned DEFAULT NULL,
  `Experience` int(10) unsigned DEFAULT NULL,
  `Money` int(10) unsigned DEFAULT NULL,
  `Strength` int(10) unsigned DEFAULT NULL,
  `Defence` int(10) unsigned DEFAULT NULL,
  `Weapon` int(10) unsigned DEFAULT NULL,
  `Armor` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`ID`, `BANK_ID`, `Name`, `Level`, `Experience`, `Money`, `Strength`, `Defence`, `Weapon`, `Armor`) VALUES
(1, 1, 'Niszczyciel', 1, 0, 100, 10, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
`ID` int(10) unsigned NOT NULL,
  `ITEMS_ID` int(10) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Price` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(10) unsigned NOT NULL,
  `PLAYERS_ID` int(10) unsigned DEFAULT NULL,
  `PERMISSIONS_ID` int(10) unsigned NOT NULL,
  `Login` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pass` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nickname` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pelna` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `EMail` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `LastLogout` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `PLAYERS_ID`, `PERMISSIONS_ID`, `Login`, `Pass`, `Nickname`, `Pelna`, `EMail`, `LastLogout`) VALUES
(2, 1, 0, 'admin', 'bcd10a8fdedc9669236c0626fb798799', 'Admin', 'Admin', 'jakismail@mail.pl', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`ID`), ADD KEY `INVENTORY_FKIndex1` (`PLAYERS_ID`), ADD KEY `INVENTORY_FKIndex2` (`ITEMS_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `komunikaty`
--
ALTER TABLE `komunikaty`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
 ADD PRIMARY KEY (`ID`), ADD KEY `PLAYERS_FKIndex1` (`BANK_ID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
 ADD PRIMARY KEY (`ID`), ADD KEY `SHOP_FKIndex1` (`ITEMS_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`), ADD KEY `USERS_FKIndex1` (`PERMISSIONS_ID`), ADD KEY `USERS_FKIndex2` (`PLAYERS_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bank`
--
ALTER TABLE `bank`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `inventory`
--
ALTER TABLE `inventory`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `komunikaty`
--
ALTER TABLE `komunikaty`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `permissions`
--
ALTER TABLE `permissions`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `players`
--
ALTER TABLE `players`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `shop`
--
ALTER TABLE `shop`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`PLAYERS_ID`) REFERENCES `players` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`ITEMS_ID`) REFERENCES `items` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `players`
--
ALTER TABLE `players`
ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`BANK_ID`) REFERENCES `bank` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `shop`
--
ALTER TABLE `shop`
ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`ITEMS_ID`) REFERENCES `items` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`PERMISSIONS_ID`) REFERENCES `permissions` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`PLAYERS_ID`) REFERENCES `players` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
