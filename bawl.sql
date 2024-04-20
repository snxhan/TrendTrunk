CREATE DATABASE bawl;
USE bawl;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2022 at 03:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bawl`
--

-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `products`
--
CREATE TABLE `products` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`quantity` int(11) NOT NULL,
	`img` text NOT NULL,
	`category` varchar(200) NOT NULL ,
	`gender` varchar(200) NOT NULL ,
 	`size` varchar(5) NOT NULL,
	`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`description` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `product_id` int(20) NOT NULL,
  `sales` decimal(20,0) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `type`) VALUES
('admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Xin Han', 'admin'),
('f31ee@localhost', 'dbb342c8604b24b466a1920002a14858', 'John Lim', 'cust'),
('haha@gmail.com', 'dbb342c8604b24b466a1920002a14858', 'andy', 'cust'),
('jackie@gmail.com', 'dbb342c8604b24b466a1920002a14858', 'jackie chan', 'cust');

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `img`, `category`, `gender`, `size`, `date_added`, `description`) VALUES
(1, 'Charizard Tee', '129.00', '1', 'images/apparels.jpg', 'apparel', 'men', 'S', CURRENT_TIME,  'HYPEBEAST celebrates Pokémon Trading Card Game`s 25th anniversary with an exciting activation in Singapore at CHAMBER, Wisma Atria, Singapore. Tapping into the trading card game`s rich history, this celebratory pop-up harnesses the hobby`s ubiquitous global influence for a special release of collaborative apparel, lifestyle items. '),
(2, 'Adidas Totebag ', '49.00', '2', 'images/Adidas Totebag.webp', 'bags', 'neutral', 'S', CURRENT_TIME ,  'adidas plus Sean Wotherspoon plus Hot Wheels? That is called a trifecta. Three icons come together on this tote bag, bringing comfort and style to your daily moves. Made with a series of recycled materials, and at least 60% recycled content, this product represents just one of adidas solutions to help end plastic waste.'),
(3, 'Rhude Pendant', '29.00', '3', 'images/Rhude Pendant.webp', 'accessories', 'women', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(4, 'Empty Logo Tee', '79.00', '3', 'images/Empty Logo Tee.webp', 'apparel', 'neutral', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(5, 'Gold G-Shock', '209.00', '2', 'images/Gold G-Shock.jpg', 'accessories', 'neutral', 'L', CURRENT_TIME ,  'Gold G-Shock Watch, latest release of the year by G-Shock.'),
(6, 'Camo G-Shock', '209.00', '1', 'images/Camo G-Shock.webp', 'accessories', 'neutral', 'L', CURRENT_TIME ,  'Camo G-Shock Watch, second latest release of the year by G-Shock.'),
(7, 'Celestine Blue Beanie', '49.00', '3', 'images/Celestine Blue Beanie.webp', 'apparel', 'women', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(8, 'Titan 10 Years Tee', '69.00', '3', 'images/Titan 10 Years Tee.webp', 'apparel', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(9, 'Shrunken Vest', '139.00', '4', 'images/Shrunken Vest.webp', 'apparel', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(10, 'Rip N Dip Tee', '89.00', '6', 'images/Rip N Dip Tee.webp', 'apparel', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(11, 'Button Up Chinese Shirt', '99.00', '3', 'images/Button Up Chinese Shirt.webp', 'apparel', 'women', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(12, 'Air Jordan 3 Retro Desert', '239.00', '2', 'images/Air Jordan 3 Retro Desert.webp', 'shoes', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(13, 'Air Jordan 1 Mid Court Purple', '239.00', '2', 'images/Air Jordan 1 Mid Court Purple.webp', 'shoes', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(14, 'Zen Crewneck', '109.00', '3', 'images/Zen Crewneck.webp', 'apparel', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(15, 'Rhude Ring', '39.00', '7', 'images/Rhude Ring.webp', 'accessories', 'neutral', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.'),
(16, 'Boost 700', '229.00', '4', 'images/Boost 700.webp', 'shoes', 'men', 'L', CURRENT_TIME ,  'Rhude logo pendant. Gold plated with hypoallergenic finish.');


--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`product_id`, `sales`, `quantity`) VALUES
(1, '258', 2),
(4, '499', 2),
(5, '297', 3),
(6, '48', 4);