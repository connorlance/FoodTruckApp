-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2024 at 04:26 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hci`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `cost` int NOT NULL,
  PRIMARY KEY (`iid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `name`, `description`, `qty`, `cost`) VALUES
(57, NULL, 'Sandwich', 3, 3),
(54, NULL, 'Chicken Wing', 4, 1),
(53, NULL, 'Nachos', 26, 5),
(52, NULL, 'Hashbrowns', 1, 2),
(51, NULL, 'Taco', 25, 2),
(50, NULL, 'Cookie', 1, 1),
(49, NULL, 'Fries', 5, 3),
(48, NULL, 'Burger', 39, 5),
(47, NULL, 'Hotdog', 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `arrival` varchar(40) NOT NULL,
  PRIMARY KEY (`lid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lid`, `name`, `arrival`) VALUES
(1, 'CSU East', '10:00 AM'),
(2, 'CSU South', '11:00 AM'),
(3, 'CSU West', '12:00 PM'),
(4, 'CSU North', '1:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `status` varchar(16) DEFAULT NULL,
  `lid` int NOT NULL,
  `cname` varchar(20) DEFAULT NULL,
  `odate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalCost` int DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `lid` (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `status`, `lid`, `cname`, `odate`, `totalCost`) VALUES
(187, 'ready', 2, 'Ava Davis', '2024-05-06 00:24:46', 82),
(186, 'ready', 3, 'Paisley Murph', '2024-05-06 00:24:23', 54),
(185, 'completed', 1, 'Carter Turner', '2024-05-06 00:24:06', 30),
(184, 'open', 4, 'David Sanchez', '2024-05-06 00:23:22', 140),
(183, 'open', 4, 'Julian Lewis', '2024-05-06 00:22:49', 38),
(181, 'completed', 3, 'Christian Diaz', '2024-05-06 00:22:11', 30),
(182, 'completed', 2, 'William Johnson', '2024-05-06 00:22:28', 14),
(180, 'completed', 1, 'Joshua Young', '2024-05-06 00:21:56', 7),
(179, 'open', 1, 'John Taylor', '2024-05-06 00:21:41', 8),
(178, 'completed', 4, 'Bella Nelson', '2024-05-06 00:21:25', 17),
(176, 'ready', 3, 'Riley Russell', '2024-05-06 00:20:55', 32),
(177, 'open', 1, 'Samuel White', '2024-05-06 00:21:10', 25),
(175, 'completed', 2, 'David Parker', '2024-05-06 00:20:18', 11),
(171, 'completed', 3, 'Lucas Fisher', '2024-05-06 00:19:14', 14),
(172, 'open', 1, 'Oliver Hernandez', '2024-05-06 00:19:33', 18),
(173, 'open', 1, 'Sebastian Lewis', '2024-05-06 00:19:50', 10),
(174, 'completed', 4, 'Zoey Murphy', '2024-05-06 00:20:03', 25),
(168, 'completed', 4, 'Alexander Taylor', '2024-05-06 00:18:29', 14),
(166, 'completed', 3, 'Amelia Parker', '2024-05-06 00:17:20', 12),
(169, 'open', 1, 'Emily Allen', '2024-05-06 00:18:43', 16),
(170, 'ready', 4, 'Elizabeth Edwards', '2024-05-06 00:18:59', 20),
(162, 'ready', 1, 'Sophia Hayes', '2024-05-06 00:12:13', 16),
(163, 'completed', 4, 'Logan Kelly', '2024-05-06 00:12:40', 14),
(164, 'open', 2, 'James Martinez', '2024-05-06 00:12:59', 31),
(161, 'completed', 3, 'Mason Garcia', '2024-05-06 00:11:21', 14),
(157, 'ready', 1, 'Ethan Adams', '2024-05-06 00:09:52', 9),
(158, 'ready', 1, 'Olivia Bennett', '2024-05-06 00:10:11', 6),
(159, 'completed', 2, 'Liam Carter', '2024-05-06 00:10:41', 17),
(160, 'open', 1, 'Noah Evans', '2024-05-06 00:11:01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `oid` int NOT NULL,
  `iid` int NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `cost` double NOT NULL,
  KEY `iid` (`iid`),
  KEY `oid` (`oid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`oid`, `iid`, `qty`, `cost`) VALUES
(17, 3, 2, 0),
(17, 6, 3, 0),
(17, 6, 3, 0),
(18, 3, 10, 0),
(18, 6, 1, 0),
(18, 9, 2, 0),
(20, 3, 2, 0),
(20, 4, 5, 0),
(20, 5, 7, 0),
(20, 6, 7, 0),
(20, 9, 1, 0),
(22, 4, 4, 0),
(22, 6, 4, 0),
(22, 6, 0, 0),
(22, 6, 3, 0),
(22, 3, 1, 0),
(22, 9, 6, 0),
(18, 3, 3, 0),
(18, 4, 1, 0),
(18, 5, 1, 0),
(18, 9, 1, 0),
(18, 6, 1, 0),
(18, 6, 2, 0),
(18, 6, 1, 0),
(18, 6, 2, 0),
(18, 4, 3, 0),
(19, 3, 2, 0),
(19, 6, 2, 0),
(19, 9, 3, 0),
(34, 6, 3, 0),
(34, 4, 1, 0),
(34, 9, 3, 0),
(35, 3, 1, 0),
(35, 3, 2, 0),
(35, 4, 5, 0),
(35, 5, 8, 0),
(35, 6, 1, 0),
(35, 9, 5, 0),
(36, 3, 4, 0),
(36, 4, 3, 0),
(36, 6, 0, 0),
(36, 9, 1, 0),
(36, 6, 1, 0),
(37, 3, 1, 0),
(37, 5, 2, 0),
(37, 9, 1, 0),
(38, 3, 1, 0),
(38, 6, 4, 0),
(39, 3, 4, 1),
(39, 4, 1, 3),
(39, 5, 1, 5),
(39, 6, 1, 3),
(39, 9, 5, 6),
(40, 3, 2, 1),
(40, 5, 2, 5),
(41, 4, 5, 3),
(41, 9, 2, 6),
(41, 6, 1, 3),
(42, 3, 5, 1),
(43, 6, 7, 3),
(43, 4, 4, 3),
(43, 3, 1, 1),
(43, 9, 1, 6),
(44, 4, 20, 3),
(45, 3, 1, 1),
(46, 9, 0, 6),
(46, 9, 1, 6),
(47, 4, 1, 3),
(48, 4, 1, 3),
(49, 5, 1, 5),
(51, 5, 1, 5),
(52, 9, 1, 6),
(53, 4, 7, 3),
(53, 3, 3, 1),
(45, 5, 3, 5),
(45, 6, 1, 3),
(45, 9, 1, 6),
(55, 3, 4, 1),
(55, 4, 1, 3),
(56, 9, 1, 6),
(57, 3, 5, 1),
(57, 9, 2, 6),
(57, 5, 1, 5),
(58, 3, 22, 1),
(61, 6, 6, 3),
(62, 4, 1, 3),
(63, 6, 4, 3),
(64, 3, 3, 1),
(64, 4, 9, 3),
(64, 5, 1, 5),
(64, 9, 4, 6),
(64, 6, 2, 3),
(65, 4, 4, 3),
(65, 5, 1, 5),
(65, 6, 4, 3),
(65, 9, 1, 6),
(66, 4, 1, 3),
(67, 3, 1, 1),
(67, 5, 10, 5),
(68, 3, 7, 1),
(69, 3, 4, 1),
(69, 5, 5, 5),
(70, 9, 3, 6),
(70, 6, 1, 3),
(71, 3, 1, 1),
(72, 6, 6, 3),
(72, 5, 3, 5),
(72, 4, 4, 3),
(73, 3, 3, 1),
(73, 5, 17, 5),
(73, 9, 7, 6),
(74, 4, 8, 3),
(75, 9, 17, 6),
(75, 6, 18, 3),
(76, 5, 7, 5),
(76, 4, 10, 3),
(77, 5, 1, 5),
(77, 3, 1, 1),
(82, 3, 1, 1),
(82, 3, 1, 1),
(82, 3, 1, 1),
(82, 3, 2, 1),
(82, 4, 9, 3),
(82, 6, 1, 3),
(82, 6, 1, 3),
(82, 3, 6, 1),
(88, 4, 1, 3),
(88, 9, 1, 6),
(88, 5, 12, 5),
(69, 5, 1, 5),
(92, 4, 1, 3),
(0, 5, 1, 5),
(0, 3, 1, 1),
(74, 5, 1, 5),
(0, 5, 1, 5),
(104, 3, 1, 1),
(104, 5, 1, 5),
(105, 4, 11, 3),
(106, 3, 10, 1),
(107, 5, 1, 5),
(107, 4, 1, 3),
(107, 6, 1, 3),
(108, 9, 4, 6),
(109, 6, 1, 3),
(109, 5, 5, 5),
(110, 5, 1, 5),
(110, 9, 3, 6),
(111, 3, 7, 1),
(112, 4, 6, 3),
(112, 6, 0, 3),
(112, 6, 1, 3),
(113, 3, 26, 1),
(114, 5, 5, 5),
(115, 5, 4, 5),
(116, 4, 1, 3),
(135, 3, 4, 1),
(135, 4, 1, 3),
(136, 4, 3, 3),
(136, 5, 1, 4),
(136, 6, 1, 3),
(137, 4, 4, 3),
(137, 5, 1, 4),
(137, 3, 1, 1),
(138, 6, 10, 3),
(139, 3, 9, 1),
(140, 9, 1, 6),
(140, 3, 0, 1),
(140, 3, 1, 1),
(141, 6, 1, 3),
(141, 9, 5, 6),
(141, 4, 1, 3),
(142, 3, 1, 1),
(142, 5, 1, 4),
(142, 6, 1, 3),
(142, 9, 2, 6),
(143, 5, 3, 4),
(144, 22, 23, 1),
(145, 3, 4, 1),
(145, 6, 5, 3),
(145, 21, 1, 3),
(145, 5, 1, 4),
(146, 3, 1, 1),
(146, 9, 1, 6),
(146, 21, 1, 3),
(146, 40, 1, 1),
(146, 5, 1, 4),
(146, 20, 1, 3),
(146, 22, 1, 1),
(147, 5, 1, 4),
(148, 9, 7, 6),
(148, 21, 1, 3),
(0, 22, 1, 1),
(152, 3, 1, 1),
(152, 4, 1, 3),
(152, 5, 1, 4),
(152, 42, 1, 3),
(152, 3, 1, 1),
(153, 3, 5, 1),
(153, 18, 8, 1),
(155, 3, 1, 1),
(155, 4, 1, 3),
(155, 6, 1, 3),
(155, 21, 1, 3),
(155, 22, 6, 1),
(156, 3, 3, 1),
(156, 40, 1, 1),
(157, 57, 3, 3),
(158, 52, 3, 2),
(159, 51, 5, 2),
(159, 48, 1, 5),
(159, 47, 1, 2),
(160, 54, 8, 1),
(160, 50, 1, 1),
(160, 49, 1, 3),
(161, 53, 2, 5),
(161, 51, 2, 2),
(162, 48, 2, 5),
(162, 49, 2, 3),
(163, 54, 10, 1),
(163, 57, 1, 3),
(163, 50, 1, 1),
(164, 51, 10, 2),
(164, 57, 3, 3),
(164, 51, 1, 2),
(166, 52, 6, 2),
(167, 54, 4, 1),
(167, 57, 1, 3),
(167, 49, 0, 3),
(168, 53, 2, 5),
(168, 50, 4, 1),
(169, 49, 3, 3),
(169, 48, 1, 5),
(169, 47, 1, 2),
(170, 47, 7, 2),
(170, 49, 2, 3),
(171, 52, 5, 2),
(171, 51, 2, 2),
(172, 57, 1, 3),
(172, 54, 10, 1),
(172, 53, 1, 5),
(173, 50, 10, 1),
(174, 48, 5, 5),
(175, 53, 1, 5),
(175, 52, 3, 2),
(176, 47, 16, 2),
(177, 57, 5, 3),
(177, 52, 5, 2),
(178, 51, 7, 2),
(178, 50, 3, 1),
(179, 48, 1, 5),
(179, 49, 1, 3),
(180, 47, 2, 2),
(180, 49, 1, 3),
(181, 53, 4, 5),
(181, 51, 4, 2),
(181, 50, 2, 1),
(182, 54, 8, 1),
(182, 50, 3, 1),
(182, 49, 1, 3),
(183, 57, 5, 3),
(183, 49, 5, 3),
(183, 47, 4, 2),
(184, 47, 30, 2),
(184, 49, 20, 3),
(184, 50, 20, 1),
(185, 51, 10, 2),
(185, 50, 10, 1),
(186, 48, 7, 5),
(186, 47, 5, 2),
(186, 49, 3, 3),
(187, 52, 21, 2),
(187, 53, 8, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
