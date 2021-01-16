-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 16, 2021 lúc 09:46 AM
-- Phiên bản máy phục vụ: 8.0.18
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ourstore_data`
--
CREATE DATABASE IF NOT EXISTS `ourstore_data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ourstore_data`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
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
-- Cấu trúc bảng cho bảng `categories_categories`
--

DROP TABLE IF EXISTS `categories_categories`;
CREATE TABLE IF NOT EXISTS `categories_categories` (
  `category_id` int(11) NOT NULL,
  `category_in_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`category_in_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories_categories`
--

INSERT INTO `categories_categories` (`category_id`, `category_in_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 15),
(3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_in_categories`
--

DROP TABLE IF EXISTS `categories_in_categories`;
CREATE TABLE IF NOT EXISTS `categories_in_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories_in_categories`
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
-- Cấu trúc bảng cho bảng `favourite_product`
--

DROP TABLE IF EXISTS `favourite_product`;
CREATE TABLE IF NOT EXISTS `favourite_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite_product`
--

INSERT INTO `favourite_product` (`user_id`, `product_id`) VALUES
(10, 2),
(10, 5),
(10, 9),
(12, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_count`
--

DROP TABLE IF EXISTS `order_count`;
CREATE TABLE IF NOT EXISTS `order_count` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_count`
--

INSERT INTO `order_count` (`order_id`, `product_id`, `number`) VALUES
(1, 1, 3),
(2, 2, 5),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `product_favourite` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_picture`, `product_qty`, `create_at`, `product_favourite`) VALUES
(1, 'Suscipit Laboriosam Nisi\r\n', 241.99, 'Samsung Galaxy Tab 10.1, is the world’s thinnest tablet, measuring 8.6 mm thickness, running with Android 3.0 Honeycomb OS on a 1GHz dual-core Tegra 2 processor, similar to its younger brother Samsung Galaxy Tab 8.9.\r\n\r\nSamsung Galaxy Tab 10.1 gives pure Android 3.0 experience, adding its new TouchWiz UX or TouchWiz 4.0 – includes a live panel, which lets you to customize with different content, such as your pictures, bookmarks, and social feeds, sporting a 10.1 inches WXGA capacitive touch screen with 1280 x 800 pixels of resolution, equipped with 3 megapixel rear camera with LED flash and a 2 megapixel front camera, HSPA+ connectivity up to 21Mbps, 720p HD video recording capability, 1080p HD playback, DLNA support, Bluetooth 2.1, USB 2.0, gyroscope, Wi-Fi 802.11 a/b/g/n, micro-SD slot, 3.5mm headphone jack, and SIM slot, including the Samsung Stick – a Bluetooth microphone that can be carried in a pocket like a pen and sound dock with powered subwoofer.\r\n\r\nSamsung Galaxy Tab 10.1 will come in 16GB / 32GB / 64GB verities and pre-loaded with Social Hub, Reader’s Hub, Music Hub and Samsung Mini Apps Tray – which gives you access to more commonly used apps to help ease multitasking and it is capable of Adobe Flash Player 10.2, powered by 6860mAh battery that gives you 10hours of video-playback time. äö', '20-354x460.jpg', 0, '2021-01-13 00:00:00', 4),
(2, 'Aliquam Quat Voluptatem', 122, 'Stop your co-workers in their tracks with the stunning new 30-inch diagonal HP LP3065 Flat Panel Monitor. This flagship monitor features best-in-class performance and presentation features on a huge wide-aspect screen while letting you work as comfortably as possible - you might even forget you\'re at the office', '03-354x460.jpg', 0, '2021-01-14 00:00:00', 3),
(3, 'Quis Autem Veleuminium', 2000, 'Latest Intel mobile architecture\r\n\r\nPowered by the most advanced mobile processors from Intel, the new Core 2 Duo MacBook Pro is over 50% faster than the original Core Duo MacBook Pro and now supports up to 4GB of RAM.\r\n\r\nLeading-edge graphics\r\n\r\nThe NVIDIA GeForce 8600M GT delivers exceptional graphics processing power. For the ultimate creative canvas, you can even configure the 17-inch model with a 1920-by-1200 resolution display.\r\n\r\nDesigned for life on the road\r\n\r\nInnovations such as a magnetic power connection and an illuminated keyboard with ambient light sensor put the MacBook Pro in a class by itself.\r\n\r\nConnect. Create. Communicate.\r\n\r\nQuickly set up a video conference with the built-in iSight camera. Control presentations and media from up to 30 feet away with the included Apple Remote. Connect to high-bandwidth peripherals with FireWire 800 and DVI.\r\n\r\nNext-generation wireless\r\n\r\nFeaturing 802.11n wireless technology, the MacBook Pro delivers up to five times the performance and up to twice the range of previous-generation technologies.', '11-354x460.jpg', 0, '2021-01-15 00:00:00', 0),
(4, 'Perspiciatis Unde Omnis', 14, 'Intel Core 2 Duo processor\r\n\r\nPowered by an Intel Core 2 Duo processor at speeds up to 2.16GHz, the new MacBook is the fastest ever.\r\n\r\n1GB memory, larger hard drives\r\n\r\nThe new MacBook now comes with 1GB of memory standard and larger hard drives for the entire line perfect for running more of your favorite applications and storing growing media collections.\r\n\r\nSleek, 1.08-inch-thin design\r\n\r\nMacBook makes it easy to hit the road thanks to its tough polycarbonate case, built-in wireless technologies, and innovative MagSafe Power Adapter that releases automatically if someone accidentally trips on the cord.\r\n\r\nBuilt-in iSight camera\r\n\r\nRight out of the box, you can have a video chat with friends or family,2 record a video at your desk, or take fun pictures with Photo Booth', '09-354x460.jpg', 0, '0000-00-00 00:00:00', 0),
(5, 'Magni Dolores Eosquies', 122, 'Just when you thought iMac had everything, now there´s even more. More powerful Intel Core 2 Duo processors. And more memory standard. Combine this with Mac OS X Leopard and iLife ´08, and it´s more all-in-one than ever. iMac packs amazing performance into a stunningly slim space.', '161066625405-354x460.jpg,161066625405--354x460.jpg,161066625405-800x1040.jpg', 0, '2021-01-15 06:17:34', 3),
(6, 'Voluptate Velit Esse', 123, 'iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name or number in your address book, a favorites list, or a call log. It also automatically syncs all your contacts from a PC, Mac, or Internet service. And it lets you select and listen to voicemail messages in whatever order you want just like email.', '161078052019-354x460.jpg,161078052019--354x460.jpg', 10, '2021-01-16 09:14:50', 0),
(7, 'Voluptas Nulla Pariatur', 15, 'Unprecedented power. The next generation of processing technology has arrived. Built into the newest VAIO notebooks lies Intel\'s latest, most powerful innovation yet: Intel® Centrino® 2 processor technology. Boasting incredible speed, expanded wireless connectivity, enhanced multimedia support and greater energy efficiency, all the high-performance essentials are seamlessly combined into a single chip.', '161078057118-354x460.jpg,161078057118--354x460.jpg,161078057118-800x1040.jpg', 20, '2021-01-16 09:17:12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 3),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_telephone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_telephone`, `user_role`) VALUES
(1, 'Bao', 'Ngoc', '23@gmail.comd', '$2y$10$7wcvJRTql5azEqu1R5syT.1G/K4T95OA8I5Tb74y7wIowNGr2hz7y', '0123456', ''),
(12, 'ngoc', 'ngoc', 'ngoc@gmail.com', '$2y$10$RzMKmHmrbRhNqhLE9n8zDezgFJkYYStWSAZgmplr6Tyyxn.CB5bbK', '12345', 'customer'),
(10, 'the', 'pig', 'pig@gmail.com', '$2y$10$oKSEQADbkHa91mSN4iW81eXpMRwGjsmXCMjKslr0xqrqIph1F5yAa', '12345', ''),
(11, 'Kieu', 'Oanh', 'ngokieuoanh199@gmail.com', '12345', '0948275576', 'admin'),
(13, 'Ngoc', 'cute', 'ngoccute@gmail.com', '$2y$10$Wppr7egZckSBUEFzbB4GvO/tA/tlx5Ckkf1fTR5V60AwGL6uoQMb2', '0933018608', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
