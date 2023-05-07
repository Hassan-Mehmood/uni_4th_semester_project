-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 11:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `full_name`, `email`, `phone_number`, `password`) VALUES
(9, 'hassan', 'hassan@gmail.com', 'hassan', '03150507009', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(19, 'hamza', 'hamza@gmail.com', 'hamza', '03150507009', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(20, 'hassanafridi', 'hassan@gmail.com', 'hassan', '03150507009', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(21, 'test', 'testuser@gmail.com', 'test user', '0315050700', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(22, 'salma', 'salma', 'testing@gmail.com', '01234567891', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(23, 'ali', 'ali', 'hassanafridi1913@gmail.com', '1234567890', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`, `category`, `image`) VALUES
(21, 'Big Mac', 'Two all-beef patties, special sauce, lettuce, cheese, pickles, onions on a sesame seed bun.', 4, 'Hamburger', 'big mac.jpg'),
(22, 'Whopper', 'Flame-grilled beef patty, sesame seed bun, lettuce, tomato, onion, pickle, and mayo.', 5, 'Hamburger', 'whopper.jpg'),
(23, 'McChicken', ' Crispy chicken patty, lettuce, mayo, and a sesame seed bun.\r\n\r\nQuarter Pounder with Cheese - $4.79 - 100% beef patty, cheese, onion, pickle, ketchup, mustard, and sesame seed bun.', 2, 'Chicken Sandwich', 'mcchicken.jpg'),
(24, 'Chicken McNuggets', 'White meat chicken, coated in a crispy breading, served with your choice of dipping sauce.', 4, 'Chicken Nuggets', 'chicken nuggets.jpg'),
(25, 'Crunchwrap Supreme', 'A warm, grilled flour tortilla filled with seasoned beef, nacho cheese sauce, lettuce, tomato, and sour cream.', 3, 'Mexican-Inspired Food', 'chicken crunchwrap.jpg'),
(26, 'Baconator', 'A half-pound beef patty, six pieces of crispy bacon, American cheese, ketchup, and mayo on a premium bun', 6, 'Hamburger', 'Baconator.jpg'),
(27, 'Taco', 'A crispy corn tortilla filled with seasoned beef, lettuce, and shredded cheese.', 1, 'Mexican', 'taco.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `table_number` int(11) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `num_of_attendees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `reservation_name`, `phone`, `table_number`, `reservation_date`, `num_of_attendees`) VALUES
(12, 9, 'Reservation', '12345678910', 1, '2023-05-08 14:48:00', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
