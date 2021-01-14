-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2021 at 06:26 PM
-- Server version: 8.0.18
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
-- Database: `ourstore_data`
--
CREATE DATABASE IF NOT EXISTS `ourstore_data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ourstore_data`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Azulejo'),
(2, 'Pottery'),
(3, 'Cameo'),
(4, 'Pewter'),
(5, 'Clothes'),
(7, 'Blogs');

-- --------------------------------------------------------

--
-- Table structure for table `categories_categories`
--

DROP TABLE IF EXISTS `categories_categories`;
CREATE TABLE IF NOT EXISTS `categories_categories` (
  `category_id` int(11) NOT NULL,
  `category_in_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`category_in_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_categories`
--

INSERT INTO `categories_categories` (`category_id`, `category_in_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 15),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories_in_categories`
--

DROP TABLE IF EXISTS `categories_in_categories`;
CREATE TABLE IF NOT EXISTS `categories_in_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_in_categories`
--

INSERT INTO `categories_in_categories` (`id`, `category_name`) VALUES
(1, 'Petuntse'),
(2, 'Bone China'),
(3, 'Cenosphere'),
(4, 'Fritware'),
(5, 'Lumicera'),
(6, 'Pitchers'),
(7, 'Vinogel'),
(8, 'Fruits'),
(9, 'Geopolymer'),
(10, 'Grog'),
(11, 'Nile silt'),
(12, 'Petuntse'),
(13, 'Jesmonite'),
(14, 'Pitchers'),
(15, 'Vegtables'),
(16, 'Jacket');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_telephone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_telephone`) VALUES
(1, 'Bao', 'Ngoc', '23@gmail.comd', '$2y$10$7wcvJRTql5azEqu1R5syT.1G/K4T95OA8I5Tb74y7wIowNGr2hz7y', '0123456'),
(2, 'Ngoc', 'Ngoc', 't@g.cod', '$2y$10$L.S49KTyQnSqlbTYkqfnW.Burno8GsI/pBVOeLk6leGI5SIoBxut6', '0123456'),
(3, 'sdf', 'asd', 'natsumishuzuki@gmail.comm', '$2y$10$pED/m.qYeCLgpF4zEPP1ruoEhLhvbXSwG5N7cP0yoq1IHbSeVfnFy', '0933018608'),
(4, 'sdf', 'asd', 'natsumishuzuki@gmail.commf', '$2y$10$mMpi.mcTPZvns4Hb5203jOLOdErsWTRWhInetJpmNH17n7cLp2wxG', '0933018608'),
(5, 'sdf', 'sdf', 'phbaongoc2001@gmail.com', '$2y$10$mCk5NKR8kXFQiCAbHrKrSuSUjdCAGqBlGQmpf/Ap54T8JAjVSfLau', '0933018608'),
(6, 'sdf', 'sad', '23@gmail.comm', '$2y$10$45UuvpuUhoMYiCysjctVu.J4NGuOWs.P5xwEcmGMWA28uUZB9W1tu', '0123456'),
(7, 'kieu', 'oanh', 'oanh@gmail.com', 'oanh', '12345'),
(8, 'hihi', 'hihi', 'hihi@gmail.com', '$2y$10$OjNRPOujr/TGcXcPSQrmw.TCAHsRcgGDbLbiEbVuHT2DXTrjWSace', '12345'),
(9, 'aa', 'aa', 'aa@gmail.com', '$2y$10$ho/yDO8DBKitumM44zhFwOmCKI23MyTBJGAsbWd2XNAHoxDgjY822', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
