-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 10:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodonclickdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Starter'),
(2, 'Snacks'),
(3, 'Mains'),
(4, 'Drinks'),
(5, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_items`
--

CREATE TABLE `delivery_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `spc_instr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_items`
--

INSERT INTO `delivery_items` (`order_id`, `item_id`, `qty`, `price`, `spc_instr`) VALUES
(13, 2, 1, 10, NULL),
(13, 1, 1, 13, NULL),
(14, 3, 1, 15, NULL),
(14, 2, 1, 10, NULL),
(15, 2, 1, 10, NULL),
(15, 1, 1, 13, NULL),
(16, 1, 1, 13, NULL),
(16, 2, 1, 10, NULL),
(17, 2, 1, 10, NULL),
(17, 1, 1, 13, NULL),
(18, 1, 1, 13, NULL),
(18, 2, 1, 10, NULL),
(19, 2, 1, 10, NULL),
(19, 3, 1, 15, NULL),
(20, 1, 2, 26, NULL),
(20, 3, 2, 30, NULL),
(20, 2, 3, 30, NULL),
(21, 1, 1, 13, NULL),
(21, 2, 2, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `loc` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`id`, `fname`, `lname`, `contact`, `email`, `loc`, `total_price`, `created_at`) VALUES
(13, 'Jack', 'Neo', '85371827', 'brandonlzj96@gmail.com', '510444', 25, '2022-05-17 19:06:05'),
(14, 'Jack', 'Tan', '97467425', 'brandonlzj96@gmail.com', '510444', 27, '2022-05-17 19:11:58'),
(15, 'Jack', 'Tan', '97467425', 'brandonlzj96@gmail.com', '510444', 25, '2022-05-17 19:44:12'),
(16, 'Jack', 'Long', '85371827', 'brandonlzj96@gmail.com', '510446', 25, '2022-05-17 19:48:34'),
(17, 'Tom', 'Long', '83756175', 'brandonlzj96@gmail.com', '519267', 25, '2022-05-17 19:51:57'),
(18, 'Jack', 'Long', '97467425', 'brandonlzj96@gmail.com', '519267', 25, '2022-05-17 20:17:07'),
(19, 'Jack', 'Long', '97467425', 'brandonlzj96@gmail.com', '510444', 27, '2022-05-17 20:35:28'),
(20, 'baba', 'jakob', '83756175', 'brandonlzj96@gmail.com', '510446', 88, '2022-05-17 21:09:11'),
(21, 'Tom', 'Tan', '97467425', 'brandonlzj96@gmail.com', '510444', 35, '2022-05-18 08:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `cat_id`, `name`, `img`, `price`) VALUES
(1, 1, 'Cranberry & Brie Prosciutto Crostini', 'STARTER/Item 1.jpg', 13),
(2, 1, 'Stuffed Portabello Mushrooms', 'STARTER/Item 2.jpg', 10),
(3, 1, 'Salmon Cream Cheese', 'STARTER/Item 3.jpg', 15),
(4, 1, 'Red Beet Carpaccio', 'STARTER/Item 4.jpg', 13),
(5, 1, 'Cranberry Brie Bites', 'STARTER/Item 5.jpg', 11),
(7, 2, 'Figs with Cheese and Granola', 'SNACKS/Item 1.jpg', 9),
(8, 2, 'Red Wine Caramelized', 'SNACKS/Item 2.jpg', 13),
(9, 2, 'Spicy Cucumber Tuna Tartare', 'SNACKS/Item 3.jpg', 11),
(10, 2, 'Broccoli Cheese Balls', 'SNACKS/Item 4.jpg', 10),
(11, 2, 'Jalapeño Pepper Wonton Cups', 'SNACKS/Item 5.jpg', 9),
(12, 2, 'Crispy Onion Rings', 'SNACKS/Item 6.jpg', 9),
(13, 3, 'Braised Lamb Shanks', 'MAINS/Item 1.jpg', 30),
(14, 3, 'Spicy Coconut Butter Chicken', 'MAINS/Item 2.jpg', 19),
(15, 3, 'Blackened Miso Salmon', 'MAINS/Item 3.jpg', 20),
(16, 3, 'Linguine mit Auberginen', 'MAINS/Item 4.jpg', 22),
(17, 3, 'Vegan Cauliflower Gyros', 'MAINS/Item 5.jpg', 21),
(18, 3, 'Classic French Style Potato', 'MAINS/Item 6.jpg', 16),
(19, 4, 'Iced Coffee (with sugar)', 'DRINKS/Item 1.jpg', 9),
(20, 4, 'Pandan Ginger Tea', 'DRINKS/Item 2.jpg', 6),
(21, 4, 'Iced Lemon Tea', 'DRINKS/Item 3.jpg', 5),
(22, 4, 'Fresh Fig & Lavender Spritz', 'DRINKS/Item 4.jpg', 8),
(23, 4, 'Juniper & Tangerine Gin Fizz', 'DRINKS/Item 5.jpg', 10),
(25, 5, 'Black Forest Slice', 'DESSERTS/Item 1.jpg', 12),
(26, 5, 'Cheesecake with Honeyed Figs', 'DESSERTS/Item 2.jpg', 14),
(27, 5, 'Mini Cranberry, Orange & Chocolate Pavlovas', 'DESSERTS/Item 3.jpg', 9),
(28, 5, 'Banoffee Meringue Roulade', 'DESSERTS/Item 4.jpg', 10),
(29, 5, 'Blood Orange Panna Cotta', 'DESSERTS/Item 5.jpg', 9),
(30, 5, 'Croissant Custard Slice', 'DESSERTS/Item 6.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `fname`, `lname`, `contact`, `email`, `date_time`, `pax`) VALUES
(26, 'Tom', 'Neo', '97467425', 'brandonlzj96@gmail.com', '2022-05-16 00:16', 3),
(27, 'Dick', 'Tan', '97467425', 'brandonlzj96@gmail.com', '2022-05-17 00:16', 1),
(28, 'Tom', 'Neo', '85371827', 'brandonlzj96@gmail.com', '2022-05-11 04:52', 3),
(29, 'Tom', 'Tan', '97467425', 'focAdmin002@gmail.com', '2022-05-11 04:59', 3),
(30, 'Tom', 'Neo', '85371827', 'brandonlzj96@gmail.com', '2022-05-19 05:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reserv_order`
--

CREATE TABLE `reserv_order` (
  `reservation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserv_order`
--

INSERT INTO `reserv_order` (`reservation_id`, `item_id`, `qty`, `price`) VALUES
(28, 2, 1, 10),
(28, 1, 1, 13),
(30, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` smallint(5) UNSIGNED NOT NULL,
  `userID` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `userID`, `password`, `fName`, `lName`, `phone`, `email`, `type`) VALUES
(1, 'admin1', 'password', 'lek', 'brandon', 97819959, 'focAdmin001@gmail.com', 'Admin'),
(2, 'chef1', 'password', 'lek', 'brandon', 97819929, 'focChef001@gmail.com', 'Chef'),
(3, 'Manager1', 'password', 'lek', 'brandon', 97819979, 'focManager001@gmail.com', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_cat` (`cat_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `food_cat` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
