-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2020 at 09:37 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12852215_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `name`, `pass`, `role`) VALUES
(2, 'rana', '202cb962ac59075b964b07152d234b70', 1),
(4, 'dsp', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

DROP TABLE IF EXISTS `cate`;
CREATE TABLE IF NOT EXISTS `cate` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`cid`, `cate`) VALUES
(1, 'mobile'),
(2, 'laptop'),
(3, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_pass`, `cus_city`, `cus_address`) VALUES
(1, 'rana', 'rana167326@gmail.com', '8198033994', '202cb962ac59075b964b07152d234b70', 'moga', 'cp'),
(2, 'balkar', 'balkar48812@gmail.com', '8528248812', '202cb962ac59075b964b07152d234b70', 'moga', 'cn');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

DROP TABLE IF EXISTS `shopping`;
CREATE TABLE IF NOT EXISTS `shopping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `rating` float NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id`, `name`, `price`, `discount`, `rating`, `img`, `cate`) VALUES
(1, 'Redmi', 10000, 10, 5, '2.jpeg', 1),
(2, 'samsung', 6000, 20, 5.5, '4.jpeg', 2),
(3, 'Vivo', 5000, 60, 3, 'Chrysanthemum.jpg', 1),
(4, 'oppo', 4000.5, 10, 4, '4.jpeg', 1),
(5, 'Realme', 9000, 30, 4.3, '3.jpeg', 1),
(6, 'HP', 55000, 10, 5, 'Jellyfish.jpg', 2),
(8, 'Tshirt', 250, 6, 5.1, 'IMG_20190703_185952.jpg', 3),
(9, 'cap', 40, 2, 3.3, 'Lighthouse.jpg', 3),
(10, 'Redmi note 7 pro', 2000000, 20, 6.1, 'Tulips.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
