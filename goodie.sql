-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2020 at 12:04 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` tinyint(4) NOT NULL,
  `product_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`) VALUES
(24, 3),
(26, 10),
(27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `categories`) VALUES
(1, 'Alex tote', 'images.jpeg', 320, ''),
(2, 'Polly tote', 'images (1).jpeg', 950, ''),
(3, 'Blake clutch', 'images (2).jpeg', 800, ''),
(4, 'Vintage clutch', 'images (3).jpeg', 400, ''),
(5, 'Asymmetric sling', 'images (4).jpeg', 350, ''),
(6, 'Hollywood clutch', 'images (5).jpeg', 600, ''),
(7, 'Fringe clutch', 'images (6).jpeg', 350, ''),
(8, 'Alexa backpack', 'images (7).jpeg', 390, ''),
(9, 'Miami tote', 'images (8).jpeg', 500, ''),
(10, 'Paris backpack', 'images (9).jpeg', 640, ''),
(11, 'Bali duffle', 'images (10).jpeg', 680, ''),
(12, 'McKenzie clutch', 'images (11).jpeg', 590, ''),
(13, 'Future sling', 'images (12).jpeg', 710, ''),
(14, 'Royale clutch', 'images (13).jpeg', 650, ''),
(15, 'Bills cllutch', 'images (14).jpeg', 680, ''),
(16, 'Rich tote', 'images (15).jpeg', 680, ''),
(17, 'Formal laptop bag', 'images (16).jpeg', 900, ''),
(18, 'CEO laptop bag', 'images (17).jpeg', 890, ''),
(19, 'Nana tote', 'images (18).jpeg', 800, ''),
(20, 'Senorita laptop bag', 'images (19).jpeg', 680, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
