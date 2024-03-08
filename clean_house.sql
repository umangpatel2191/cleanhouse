-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 09:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'main admin', 'admin789', 'admin@gmail.com', '00ba7ceab606427071d5d755ea99e976');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`, `pincode`) VALUES
(1, 'ahmedabad', 380001),
(2, 'ambavadi vistar', 380015),
(3, 'amriwadi', 380026),
(4, 'bapunagar I.E.', 380024),
(5, 'behrampura', 380022),
(6, 'bodakdev', 380054),
(7, 'bopal', 380058),
(8, 'civil hospital', 380016),
(9, 'ellisbridge', 380006),
(10, 'gandhi ashram', 380027),
(11, 'ghatlodia', 380061),
(12, 'ghodasar', 380050),
(13, 'gujarat high court', 380060),
(14, 'isanpur', 382443),
(15, 'jivrajpark', 380051),
(16, 'juhapura', 380055),
(17, 'kathwada M.P.', 382430),
(18, 'maninagar', 380008),
(19, 'memnagar', 380052),
(20, 'naranpoura vistar', 380013),
(21, 'naroda I.E.', 382330),
(22, 'navjivan', 380014),
(23, 'navrangpura', 380009),
(24, 'odhav I.E.', 382415),
(25, 'paldi', 380007),
(26, 'railway colony', 380019),
(27, 'railwaypura', 380002),
(28, 'rajpur gomatipur', 380021),
(29, 'rakhial udyhog vistar', 380023),
(30, 'sabarmati', 380005),
(31, 'saijpur bogha', 382345),
(32, 'saraspur', 380018),
(33, 'sardar nagar', 382475),
(34, 'shah alam roja', 380028),
(35, 'shahibaug', 380004),
(36, 'sola hbc', 380063),
(37, 'thakkar bapa nagar', 382350),
(38, 'thaltej', 380059);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `Item_name`, `item_price`, `item_image`) VALUES
(5, 'root', 'Kurta-Plain dry cleaning', 100, '4_file.jpg'),
(13, '', 'Kurta-Plain dry cleaning', 100, '4_file.jpg'),
(15, '', 'Shirts wash and iron', 49, '3_file.jpg'),
(16, '', 'Jeans wash and iron', 59, '2_file.png'),
(17, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(18, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(19, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(20, '', 'Shirts wash and iron', 49, '3_file.jpg'),
(21, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(22, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(23, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(24, '5', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(31, 'umang2191', 'Jeans wash and iron', 59, '2_file.png'),
(32, 'umang2191', 'Kurta-Plain dry cleaning', 100, '4_file.jpg'),
(33, 'umang2191', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(34, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(35, '', 'Kurta-Fancy Dry cleaning', 250, '6_file.jpg'),
(46, '', 'Saree heavy dry cleaning', 400, '8_file.jpg'),
(47, '', 'Shirts wash and iron', 49, '3_file.jpg'),
(48, 'harshraj123', 'Shirts wash and iron', 49, '3_file.jpg'),
(49, 'harshraj123', 'Shirts wash and iron', 49, '3_file.jpg'),
(50, 'harshraj123', 'Shirts wash and iron', 49, '3_file.jpg'),
(53, '', 'Shirts', 39, '3_file.jpg'),
(54, 'urshit2118', 'Jeans', 49, '2_file.png');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price_per_kg` int(11) NOT NULL,
  `item_img` varchar(10) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `price_per_kg`, `item_img`, `added_date`) VALUES
(2, 'Jeans', 49, '2_file.png', '2023-03-12 21:01:37'),
(3, 'Shirts', 39, '3_file.jpg', '2023-03-12 23:19:00'),
(4, 'Kurta', 59, '4_file.jpg', '2023-03-12 23:22:15'),
(5, 'Suit', 99, '5_file.jpg', '2023-03-12 23:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `pdf` varchar(100) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `username`, `email`, `phone`, `address`, `total`, `status`, `pdf`, `datetime`) VALUES
(26, 'urshit21', 'urshit@gmail.com', '9998578474', '201, 2nd Floor, Dev Arc Mall, Sarkhej - Gandhinagar Hwy, near Iskcon Bridge,', 650, 'done', '861652553.pdf', '2023-04-13 23:26:42'),
(27, 'urshit21', 'urshit@gmail.com', '9998578474', '201, 2nd Floor, Dev Arc Mall, Sarkhej - Gandhinagar Hwy, near Iskcon Bridge,', 650, 'done', '34863886.pdf', '2023-04-13 23:26:42'),
(31, 'divy123', 'divybavishi001@gmail.com', '8401915476', 'nikol', 709, 'done', '238504067.pdf', '2023-04-13 23:26:42'),
(32, 'urshit21', 'urshit@gmail.com', '0760036330', 'ghatlodiya', 650, 'done', '798313516.pdf', '2023-04-14 17:41:29'),
(33, 'urshit21', 'urshit@gmail.com', '0760036330', 'ghatlodiya', 650, 'done', '1479470733.pdf', '2023-04-14 17:41:35'),
(35, 'divy123', 'divybavishi001@gmail.com', '8401915476', 'nikol', 59, 'done', '896927973.pdf', '2023-04-16 00:32:10'),
(36, 'divy123', 'divybavishi001@gmail.com', '8401915476', 'nikol', 49, 'done', '551103019.pdf', '2023-04-23 21:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(11) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_no`, `password`, `address`, `pincode`, `reg_time`) VALUES
(1, 'admin', 'admin', 'admin@info.com', '+919876543210', 'hello', 'no', 380001, '2023-03-12 02:42:37'),
(2, 'albino martin', 'mango', 'albinomartin3003@gmail.com', '+912177355125', 'b0baee9d279d34fa1dfd71aadb908c3f', '1000 N College St', 380001, '2023-03-12 02:47:05'),
(3, 'albino martin', 'mangus', 'albinomartin3003@gmail.com', '+912177355125', 'b0baee9d279d34fa1dfd71aadb908c3f', '1000 N College St', 380001, '2023-03-12 02:53:02'),
(4, 'albino martin', 'urshit', 'albomartin3003@gmail.com', '+912177355127', 'e10adc3949ba59abbe56e057f20f883e', '1000 N College St', 380001, '2023-03-12 03:00:01'),
(5, 'urshit', 'urshit21	', 'urshit@gmail.com	', '+919876543219', '5a37f6da7f16db08c95067d05b6ba4d9', 'nikol', 380005, '2023-03-12 03:36:27'),
(6, 'urshit patel', 'urshit211', 'urshit11@gmail.com', '+919876543211', '5a37f6da7f16db08c95067d05b6ba4d9', 'nikol', 380005, '2023-03-12 03:39:45'),
(7, 'albino martin', 'hello1', 'albinomart003@gmail.com', '+912177395125', 'e10adc3949ba59abbe56e057f20f883e', '1000 N College St', 380001, '2023-03-12 03:40:11'),
(8, 'umang', 'umang2191', 'umangp737@gmail.com', '+917600363306', '96e79218965eb72c92a549dd5a330112', 'nikol', 382350, '2023-03-25 23:44:32'),
(10, 'Harshraj Vaghela', 'harshraj111', 'vharshraj022@gmail.com	', '+917016555735', '37e334ef04ced217b6e787e847253f18', 'bapa sitaram chowk,memco', 380045, '2023-04-14 22:53:42'),
(12, 'urshit patel', 'urshit2118', 'urshitpatel09@gmail.com', '+917201069776', '7c99d0690de77c74b7ffda184ca52a46', 'a-11 dwarkesh row-house , gopalchowk  ahmedabad', 382350, '2023-04-23 23:57:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
