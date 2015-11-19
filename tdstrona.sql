-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 10:43 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdstrona`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_Bank` int(10) UNSIGNED NOT NULL,
  `Money_Bank` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_Bank`, `Money_Bank`) VALUES
(1, 1033);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID_Inv` int(10) UNSIGNED NOT NULL,
  `ITEMS_ID` int(10) UNSIGNED NOT NULL,
  `PLAYERS_ID` int(10) UNSIGNED NOT NULL,
  `Name_Inv` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID_Inv`, `ITEMS_ID`, `PLAYERS_ID`, `Name_Inv`) VALUES
(1, 1, 1, 'Długi Miecz');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID_Item` int(10) UNSIGNED NOT NULL,
  `Price_Item` int(11) NOT NULL,
  `PHPObjectName` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID_Item`, `Price_Item`, `PHPObjectName`) VALUES
(1, 100, 'sword'),
(2, 200, 'axe');

-- --------------------------------------------------------

--
-- Table structure for table `komunikaty`
--

CREATE TABLE `komunikaty` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Tytul` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Komunikat` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `ID_Perm` int(10) UNSIGNED NOT NULL,
  `Permission` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`ID_Perm`, `Permission`) VALUES
(0, 'Admin'),
(1, 'Vip'),
(2, 'Użytkownik'),
(3, 'Nie Aktywowany');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `ID_Player` int(10) UNSIGNED NOT NULL,
  `BANK_ID` int(10) UNSIGNED NOT NULL,
  `Name_Player` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Level` int(10) UNSIGNED DEFAULT NULL,
  `Experience` int(10) UNSIGNED DEFAULT NULL,
  `Money_Player` int(10) UNSIGNED DEFAULT NULL,
  `Strength` int(10) UNSIGNED DEFAULT NULL,
  `Defence` int(10) UNSIGNED DEFAULT NULL,
  `Weapon` int(10) UNSIGNED DEFAULT NULL,
  `Armor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`ID_Player`, `BANK_ID`, `Name_Player`, `Level`, `Experience`, `Money_Player`, `Strength`, `Defence`, `Weapon`, `Armor`) VALUES
(1, 1, 'Niszczyciel', 1, 25, 803, 10, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID_Shop` int(10) UNSIGNED NOT NULL,
  `ITEMS_ID` int(10) UNSIGNED NOT NULL,
  `Name_Shop` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ID_Shop`, `ITEMS_ID`, `Name_Shop`) VALUES
(1, 1, 'Miecz'),
(2, 2, 'Topór');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(10) UNSIGNED NOT NULL,
  `PLAYERS_ID` int(10) UNSIGNED DEFAULT NULL,
  `PERMISSIONS_ID` int(10) UNSIGNED NOT NULL,
  `Login` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pass` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nickname` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pelna` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `EMail` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `LastLogout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `PLAYERS_ID`, `PERMISSIONS_ID`, `Login`, `Pass`, `Nickname`, `Pelna`, `EMail`, `LastLogout`) VALUES
(1, 1, 0, 'admin', 'bcd10a8fdedc9669236c0626fb798799', 'admin', 'admin', 'admin@admin.com', '2015-11-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_Bank`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID_Inv`),
  ADD KEY `INVENTORY_FKIndex1` (`PLAYERS_ID`),
  ADD KEY `INVENTORY_FKIndex2` (`ITEMS_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID_Item`);

--
-- Indexes for table `komunikaty`
--
ALTER TABLE `komunikaty`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`ID_Perm`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`ID_Player`),
  ADD KEY `PLAYERS_FKIndex1` (`BANK_ID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID_Shop`),
  ADD KEY `SHOP_FKIndex1` (`ITEMS_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `USERS_FKIndex1` (`PERMISSIONS_ID`),
  ADD KEY `USERS_FKIndex2` (`PLAYERS_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `ID_Bank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID_Inv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID_Item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komunikaty`
--
ALTER TABLE `komunikaty`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID_Perm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `ID_Player` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID_Shop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`PLAYERS_ID`) REFERENCES `players` (`ID_Player`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`ITEMS_ID`) REFERENCES `items` (`ID_Item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`BANK_ID`) REFERENCES `bank` (`ID_Bank`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`ITEMS_ID`) REFERENCES `items` (`ID_Item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`PERMISSIONS_ID`) REFERENCES `permissions` (`ID_Perm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`PLAYERS_ID`) REFERENCES `players` (`ID_Player`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
