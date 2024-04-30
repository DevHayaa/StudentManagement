-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2024 at 03:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `postal_code`, `country_id`) VALUES
(4, 'Abu Dhabi\r\n', '67890', 8),
(5, 'Karachi', '74000', 7),
(6, 'London', 'SW1A 1AA', 4),
(7, 'Chicago, Illinois\r\n', '60601', 3),
(8, 'New York City, New York\r\n', '1000133', 3),
(9, 'Paris', '75001', 5),
(10, 'Toronto', 'M5B', 6),
(11, 'Vancouver', 'V6B', 6),
(12, 'Ottawa', ' K1P\r\n', 6),
(13, 'Islamabad', '44000', 7),
(14, 'Rawalpindi', '778990', 7);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contenant` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `contenant`) VALUES
(3, 'United States', 'North Americaa'),
(4, 'United Kingdom\r\n', 'Europe'),
(5, 'France', 'Europe'),
(6, 'Canada', ' North America\r\n'),
(7, 'Pakistan', 'Asia'),
(8, 'Dubai', 'Asiaa');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `country_id` int NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `age`, `roll_no`, `image`, `country_id`, `city_id`) VALUES
(46, 'Maham', '21', '122', '../assets/images1714376217student2.jpg', 5, 9),
(47, 'Esha', '24', '333', '../assets/images/1714376086student1.jpg', 3, 8),
(48, 'Saim', '20', '466', '../assets/images/1714376256student4.jpg', 4, 6),
(44, 'Hayaa', '18', '111', '../assets/images/1714375976student3.jpg', 7, 5),
(45, 'Ali', '25', '919', '../assets/images1714447411', 5, 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
