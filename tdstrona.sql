-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 08:54 PM
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
(1, 100856),
(21, 100),
(22, 100),
(23, 100),
(24, 100),
(25, 100),
(26, 0),
(27, 100),
(28, 100);

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
(42, 1, 21, 'Miecz'),
(43, 1, 24, 'Miecz'),
(44, 1, 25, 'Miecz'),
(45, 1, 26, 'Miecz');

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
  `PLAYER_ID` int(10) UNSIGNED NOT NULL,
  `Komunikat` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `Kom_Typ_ID` int(10) NOT NULL,
  `Data_Kom` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `komunikaty`
--

INSERT INTO `komunikaty` (`ID`, `PLAYER_ID`, `Komunikat`, `Kom_Typ_ID`, `Data_Kom`) VALUES
(7, 1, 'Twoja przygoda na Las się zakończyła. Zysk: Haisy-0, Doświadczenie-0.', 0, '2015-11-30 18:28:45'),
(8, 1, 'Twoja przygoda na Las się zakończyła. Zysk: Haisy-1, Doświadczenie-1.', 0, '2015-11-30 18:35:10'),
(9, 1, 'Twoja przygoda na Las się zakończyła. Zysk: Haisy-21, Doświadczenie-27.', 0, '2015-11-30 19:22:11'),
(10, 25, 'Twoja przygoda na Polana się zakończyła. Zysk: Haisy-0, Doświadczenie-0.', 0, '2015-11-30 19:30:29'),
(11, 24, 'Twoja przygoda na Polana się zakończyła. Zysk: Haisy-1, Doświadczenie-3.', 0, '2015-11-30 19:33:20'),
(12, 25, 'Twoja przygoda na Polana się zakończyła. Zysk: Haisy-0, Doświadczenie-1.', 0, '2015-11-30 19:34:30'),
(13, 26, 'Twoja przygoda na Polana się zakończyła. Zysk: Haisy-0, Doświadczenie-0.', 0, '2015-11-30 19:44:13'),
(14, 25, 'Twoja przygoda na Polana się zakończyła. Zysk: Haisy-8, Doświadczenie-16.', 0, '2015-11-30 20:04:40'),
(15, 1, 'Wygrałeś kontra VIP. Zysk: Haisy-10, Doświadczenie-8.', 0, '2015-11-30 20:50:58'),
(16, 1, 'Wygrałeś kontra VIP. Zysk: Haisy-36, Doświadczenie-28.', 0, '2015-11-30 20:51:27'),
(17, 1, 'Wygrałeś kontra VIP. Zysk: Haisy-21, Doświadczenie-16.', 0, '2015-11-30 20:52:35'),
(18, 22, 'Zostałeś zaatakowany przez Niszczyciel. Straty: Haisy-21', 1, '2015-11-30 20:52:35'),
(19, 22, 'Wygrałeś kontra Ja pierdole podawałem juz login i nick na chuj mi jakas nazwa?!. Zysk: Haisy-40, Doświadczenie-32.', 0, '2015-11-30 20:53:19'),
(20, 23, 'Zostałeś zaatakowany przez VIP. Straty: Haisy-40', 1, '2015-11-30 20:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `komunikaty_types`
--

CREATE TABLE `komunikaty_types` (
  `ID_Kom_Typ` int(10) NOT NULL,
  `Name_Kom` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `komunikaty_types`
--

INSERT INTO `komunikaty_types` (`ID_Kom_Typ`, `Name_Kom`) VALUES
(0, 'INFO'),
(1, 'WARNING'),
(2, 'ERROR');

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
(1, 1, 'Niszczyciel', 'monkey.png', 2, 2024, 100, 0, 10, 8, 25, 41, NULL),
(21, 21, 'User', 'monkey.png', 1, 0, 100, 0, 2, 2, 42, NULL, NULL),
(22, 22, 'VIP', 'avatars/2015-11-29_18-58-07_Przechwytywanie.png', 1, 32, 100, 73, 2, 2, NULL, NULL, NULL),
(23, 23, 'Ja pierdole podawałem juz login i nick na chuj mi jakas nazwa?!', 'avatars/2015-11-30_19-19-19_10407921_871101069566806_1911016596083472897_n.jpg', 1, 0, 100, 60, 2, 2, NULL, NULL, NULL),
(24, 24, 'AnonimowyChlipaczBiałkaOcznego', 'avatars/2015-11-30_19-28-11_images.jpg', 1, 3, 100, 1, 2, 2, NULL, NULL, 26),
(25, 25, 'sdsdsdsdsdsd', 'avatars/2015-11-30_19-28-51_Moje zdjęcie 71.png', 1, 17, 100, 8, 2, 2, 44, NULL, NULL),
(26, 26, 'Pieseł', 'avatars/2015-11-30_19-42-40_piesel.jpg', 1, 0, 100, 100, 2, 2, NULL, NULL, 29),
(27, 27, 'Tomek', 'monkey.png', 1, 0, 100, 100, 2, 2, NULL, NULL, NULL),
(28, 28, 'Ahraim', 'avatars/2015-11-30_20-03-06_450px-Rose.png', 1, 0, 100, 100, 2, 2, NULL, NULL, 30);

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
(26, 2, '2015-11-30 19:35:31', 30),
(29, 2, '2015-11-30 19:47:03', 60),
(30, 2, '2015-11-30 20:20:56', 10);

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
(1, 1, 0, 'admin', 'bcd10a8fdedc9669236c0626fb798799', 'admin', 'admin', 'admin@admin.com', '2015-11-30 20:54:23'),
(38, 21, 2, 'user', '78622dc73dbe10c274e6171444346546', 'user', 'user', 'user@user', '2015-11-30 20:01:10'),
(39, 22, 1, 'vip', 'cd17c3fbc4f654ad103d1360afc02267', 'vip', 'vip', 'vip@vip', '2015-11-30 20:53:31'),
(40, 23, 2, 'Łysy Wonsz', 'bbd1254ca73a173dbfa1bab424240488', 'Czym się różni login od nickname''a?', 'Maciej Fornal of course', 'tominator@buziaczek.pl', '2015-11-30 19:23:56'),
(41, NULL, 2, 'a', '0daa96ec2644908658aea0527196965f', 'a', 'a', 'a@a.pl', '2015-11-30 19:24:29'),
(42, 24, 2, 'Funnypenetrator', '59cc9c0bd2c8a1f46bbe6a096d028a59', 'Funnypenetrator', 'Grzegorz', 'brzezik1i@gmail.com', '2015-11-30 19:38:14'),
(43, 25, 2, 'asdasd', 'a98ec9ac18f4d8be7c4baf87484456a3', 'asdasd', 'asdasd', 'asdasd@aasd.com', '2015-11-30 20:05:28'),
(44, 26, 2, 'sosul', 'f853d94906a1793ca014b31708e9138c', 'sosul', 'a', 'a@b.c', '2015-11-30 19:47:03'),
(45, NULL, 2, 'kutasyznieba', '5a855e15ad1d8498e2a67870a3af0d8e', 'kutasyznieba', 'Lidia Borowska', 'lborowskaaa@ezn.edu.pl', '2015-11-30 19:55:46'),
(46, 27, 2, 'bekazemoznawejscnatwojastronexd', '21200b64301b4408edb0e1cd14c98643', 'bananek', 'Andrzej Duda', 'ddddd@dddd.ddd', '2015-11-30 19:58:23'),
(47, NULL, 2, 'HHUJJJ', '5d3a4d16b9c066d3ae4380f9f3adbc48', 'CHUJECZEK', '!!!1!!111ONEONEOENOE', 'hggf@hujnio', '2015-11-30 19:59:29'),
(48, 28, 2, 'Martynanieek', '00af3d47b4ea498336927c6e357331ee', 'Ahraim', 'Martyna Śnieżek', 'lili30@vp.pl', '2015-11-30 20:21:09');

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PLAYER_ID` (`PLAYER_ID`),
  ADD KEY `Kom_Typ_ID` (`Kom_Typ_ID`);

--
-- Indexes for table `komunikaty_types`
--
ALTER TABLE `komunikaty_types`
  ADD PRIMARY KEY (`ID_Kom_Typ`);

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
  MODIFY `ID_Bank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `difficult`
--
ALTER TABLE `difficult`
  MODIFY `ID_Dif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID_Inv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `komunikaty_types`
--
ALTER TABLE `komunikaty_types`
  MODIFY `ID_Kom_Typ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID_Perm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `ID_Player` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `przygody`
--
ALTER TABLE `przygody`
  MODIFY `ID_Przy` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
-- Constraints for table `komunikaty`
--
ALTER TABLE `komunikaty`
  ADD CONSTRAINT `komunikaty_ibfk_1` FOREIGN KEY (`PLAYER_ID`) REFERENCES `players` (`ID_Player`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `komunikaty_ibfk_2` FOREIGN KEY (`Kom_Typ_ID`) REFERENCES `komunikaty_types` (`ID_Kom_Typ`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
