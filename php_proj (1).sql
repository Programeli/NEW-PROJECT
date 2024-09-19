-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2023 at 08:24 AM
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
-- Database: `php_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`email`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`fname`, `lname`, `email`, `username`, `password`) VALUES
('Elias', 'Tuma', 'elias@admin.com', 'adminelias', '1234'),
('Hamza', 'Halabi', 'hamza@admin.com', 'adminhamza', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `item_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `sold` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `name`, `price`, `quantity`, `image`, `sold`) VALUES
('1', 'Vitamin C', 60, 50, '1.jpg', 35),
('2', 'Zinc', 80, 1, '2.jpg', 15),
('3', 'Vitamin D3', 60, 12, 'd3.jpg', 20),
('4', 'Multivitamin', 70, 2, 'multi.jpg', 16),
('5', 'Calcium-Mag', 80, 12, 'mag.jpg', 19),
('6', 'Omega 3+', 60, 12, 'omega3.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(18) NOT NULL,
  `Password` varchar(16) NOT NULL,
  PRIMARY KEY (`Email`,`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FName`, `LName`, `Email`, `Username`, `Password`) VALUES
('Elais', 'Tuma', 'elias@tuma', 'eliast', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
