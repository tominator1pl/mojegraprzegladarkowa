-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 12:41 AM
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
(1, 100671),
(21, 100),
(22, 100);

-- --------------------------------------------------------

--
-- Table structure for table `difficult`
--

CREATE TABLE `difficult` (
  `ID_Dif` int(10) NOT NULL,
  `Name_Dif` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `difficult`
--

INSERT INTO `difficult` (`ID_Dif`, `Name_Dif`) VALUES
(0, 'Mierny'),
(1, 'Słaby'),
(2, 'Mały');

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
(25, 3, 1, 'Długi Miecz'),
(41, 4, 1, 'Skórzana Zbroja'),
(42, 1, 21, 'Miecz');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID_Item` int(10) UNSIGNED NOT NULL,
  `Price_Item` int(11) NOT NULL,
  `Name_Item` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `TYPE_ID` int(10) DEFAULT NULL,
  `Vars` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID_Item`, `Price_Item`, `Name_Item`, `TYPE_ID`, `Vars`) VALUES
(1, 100, 'Miecz', 1, 'attack=10;\r\nspeed=10;'),
(2, 150, 'Topór', 1, 'attack=20;\r\nspeed=5;'),
(3, 200, 'Długi Miecz', 1, 'attack=15;\r\nspeed=9;'),
(4, 100, 'Skórzana Zbroja', 2, 'defence=5;');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `ID_Type` int(10) NOT NULL,
  `Type_Type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`ID_Type`, `Type_Type`) VALUES
(1, 'weapon'),
(2, 'armor'),
(3, 'potion');

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
  `Avatar` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `Level` int(10) UNSIGNED DEFAULT NULL,
  `Experience` int(10) UNSIGNED DEFAULT NULL,
  `Health` int(10) NOT NULL,
  `Money_Player` int(10) UNSIGNED DEFAULT NULL,
  `Strength` int(10) UNSIGNED DEFAULT NULL,
  `Defence` int(10) UNSIGNED DEFAULT NULL,
  `Weapon` int(10) UNSIGNED DEFAULT NULL,
  `Armor` int(10) UNSIGNED DEFAULT NULL,
  `Przy_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`ID_Player`, `BANK_ID`, `Name_Player`, `Avatar`, `Level`, `Experience`, `Health`, `Money_Player`, `Strength`, `Defence`, `Weapon`, `Armor`, `Przy_ID`) VALUES
(1, 1, 'Niszczyciel', 'monkey.png', 2, 1754, 100, 0, 10, 8, 25, 41, 14),
(21, 21, 'User', 'monkey.png', 1, 0, 100, 0, 2, 2, 42, NULL, NULL),
(22, 22, 'VIP', 'avatars/2015-11-29_18-58-07_Przechwytywanie.png', 1, 0, 100, 100, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `przygody`
--

CREATE TABLE `przygody` (
  `ID_Przy` int(10) NOT NULL,
  `Przy_Type_ID` int(10) NOT NULL,
  `Started` datetime NOT NULL,
  `For_Time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `przygody`
--

INSERT INTO `przygody` (`ID_Przy`, `Przy_Type_ID`, `Started`, `For_Time`) VALUES
(14, 2, '2015-11-30 00:40:34', 930);

-- --------------------------------------------------------

--
-- Table structure for table `przygody_types`
--

CREATE TABLE `przygody_types` (
  `ID_Przy_Type` int(10) NOT NULL,
  `Name_Przy` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Difficulty` int(10) NOT NULL,
  `Min_Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `przygody_types`
--

INSERT INTO `przygody_types` (`ID_Przy_Type`, `Name_Przy`, `Difficulty`, `Min_Level`) VALUES
(1, 'Las', 1, 2),
(2, 'Polana', 0, 1),
(3, 'Jaskinia', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID_Shop` int(10) UNSIGNED NOT NULL,
  `ITEMS_ID` int(10) UNSIGNED NOT NULL,
  `Name_Shop` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Permission_Shop` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ID_Shop`, `ITEMS_ID`, `Name_Shop`, `Permission_Shop`) VALUES
(1, 1, 'Miecz', 2),
(2, 2, 'Topór', 2),
(3, 3, 'Długi Miecz', 1),
(4, 4, 'Skórzana Zbroja', 2);

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
(1, 1, 0, 'admin', 'bcd10a8fdedc9669236c0626fb798799', 'admin', 'admin', 'admin@admin.com', '2015-11-30 00:40:56'),
(38, 21, 2, 'user', '78622dc73dbe10c274e6171444346546', 'user', 'user', 'user@user', '2015-11-29 18:57:04'),
(39, 22, 1, 'vip', 'cd17c3fbc4f654ad103d1360afc02267', 'vip', 'vip', 'vip@vip', '2015-11-29 18:59:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_Bank`);

--
-- Indexes for table `difficult`
--
ALTER TABLE `difficult`
  ADD PRIMARY KEY (`ID_Dif`);

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
  ADD PRIMARY KEY (`ID_Item`),
  ADD KEY `TYPE_ID` (`TYPE_ID`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`ID_Type`);

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
  ADD KEY `PLAYERS_FKIndex1` (`BANK_ID`),
  ADD KEY `Weapon` (`Weapon`),
  ADD KEY `Armor` (`Armor`),
  ADD KEY `Przy_ID` (`Przy_ID`);

--
-- Indexes for table `przygody`
--
ALTER TABLE `przygody`
  ADD PRIMARY KEY (`ID_Przy`),
  ADD KEY `ID_Przy_Type` (`Przy_Type_ID`);

--
-- Indexes for table `przygody_types`
--
ALTER TABLE `przygody_types`
  ADD PRIMARY KEY (`ID_Przy_Type`),
  ADD KEY `Difficulty` (`Difficulty`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID_Shop`),
  ADD KEY `SHOP_FKIndex1` (`ITEMS_ID`),
  ADD KEY `Permission_Shop` (`Permission_Shop`),
  ADD KEY `Permission_Shop_2` (`Permission_Shop`);

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
  MODIFY `ID_Bank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `difficult`
--
ALTER TABLE `difficult`
  MODIFY `ID_Dif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID_Inv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID_Item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `ID_Type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `ID_Player` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `przygody`
--
ALTER TABLE `przygody`
  MODIFY `ID_Przy` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `przygody_types`
--
ALTER TABLE `przygody_types`
  MODIFY `ID_Przy_Type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID_Shop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`TYPE_ID`) REFERENCES `item_types` (`ID_Type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`BANK_ID`) REFERENCES `bank` (`ID_Bank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`Weapon`) REFERENCES `inventory` (`ID_Inv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_ibfk_3` FOREIGN KEY (`Armor`) REFERENCES `inventory` (`ID_Inv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_ibfk_4` FOREIGN KEY (`Przy_ID`) REFERENCES `przygody` (`ID_Przy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `przygody`
--
ALTER TABLE `przygody`
  ADD CONSTRAINT `przygody_ibfk_1` FOREIGN KEY (`Przy_Type_ID`) REFERENCES `przygody_types` (`ID_Przy_Type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `przygody_types`
--
ALTER TABLE `przygody_types`
  ADD CONSTRAINT `przygody_types_ibfk_1` FOREIGN KEY (`Difficulty`) REFERENCES `difficult` (`ID_Dif`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`ITEMS_ID`) REFERENCES `items` (`ID_Item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shop_ibfk_2` FOREIGN KEY (`Permission_Shop`) REFERENCES `permissions` (`ID_Perm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`PERMISSIONS_ID`) REFERENCES `permissions` (`ID_Perm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`PLAYERS_ID`) REFERENCES `players` (`ID_Player`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
