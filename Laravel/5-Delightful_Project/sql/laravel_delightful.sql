-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 01:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_delightful`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `price`) VALUES
(1, 'Rice', 1.5),
(2, 'Brown Rice', 1.5),
(3, 'Beans', 1.5),
(4, 'Pasta', 1.5),
(5, 'Soaked Pumpkin', 1.5),
(6, 'Seasoned rice', 1.5),
(7, 'Mayonnaise', 1.5),
(8, 'Pancake', 1.5),
(9, 'Mashed potatoes', 1.5),
(10, 'Fries', 1.5),
(11, 'Polenta Stick', 1.5),
(12, 'Aipim Croquette', 1.5),
(13, 'Gnocchi', 1.5),
(14, 'Grilled chicken', 3.5),
(15, 'Milanese thigh', 3.75),
(16, 'Roasted Thigh', 3.75),
(17, 'Milanese Fish Fillet', 4),
(18, 'Milanese Chicken Fillet', 3.5),
(19, 'Milanesa drumstick', 3.75),
(20, 'Roasted Drumstick', 3.75),
(21, 'Fried Sausage', 3),
(22, 'Grilled steak', 4),
(23, 'Stew', 3.75),
(24, 'Milanese steak', 4),
(25, 'Parmeggiana Fish Filet', 5),
(26, 'Chicken parmigiana', 4),
(27, 'Steak Parmegiana', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `status` enum('Awaiting Approval','Approved','Disapproved','In Production','Left For Delivery','Finalized') NOT NULL DEFAULT 'Awaiting Approval',
  `delivery` tinyint(1) NOT NULL,
  `delivery_pickup_time` time DEFAULT NULL,
  `fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `user_id`, `value`, `status`, `delivery`, `delivery_pickup_time`, `fee`) VALUES
(2, '2021-10-24', 3, 26, 'Awaiting Approval', 1, '08:00:00', 5),
(7, '2021-10-24', 3, 13.5, 'Awaiting Approval', 1, '08:00:00', 5),
(8, '2021-12-21', 3, 15, 'Awaiting Approval', 0, '08:00:00', 8),
(9, '2021-12-21', 3, 15, 'Awaiting Approval', 0, '08:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `address`, `item_id`, `quantity`) VALUES
(2, 'raa, 12, reem, Abu Dhabi', 1, 4),
(2, 'raa, 12, reem, Abu Dhabi', 27, 4),
(7, 'raa, 12, reem, Abu Dhabi', 1, 2),
(7, 'raa, 12, reem, Abu Dhabi', 4, 7),
(8, ', , , ', 1, 10),
(9, ', , , ', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_fee`
--

CREATE TABLE `order_fee` (
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_fee`
--

INSERT INTO `order_fee` (`fee`) VALUES
(8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `customer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`, `customer`) VALUES
(1, 'Employee', 'employee@delightful.com.br', NULL, '$2a$10$B7eY2M6Ch3qcfksqk76hPemWyJuNrgrGTjSMy5YqarDgM2waPubEi', 0),
(3, 'Salem Ebrahim', '100049815@ku.ac.ae', 509945380, '$2y$10$Sz0wgNsuXSwGQkmI7yW3t.V9mycVbI6qEw8ukNtAACE9/a02yBLYy', 1),
(4, 'ssss', '10205266@sharafdg.com', NULL, '$2y$10$x2upLTYK4YTn4ak6BeYxwuaGl1GNZRFPrc3Isr5UR47vZsgGMIbA6', 0),
(5, 'Bruno', 'Bruno@inovvation.park', NULL, '$2y$10$DMas2/dbzmy1YlhXU/EhoeVax8psIwU1TshAhcTZ6Yh8CSkL8Ad/S', 0),
(6, 'Bruno', 'Bruno@inovvation.park', NULL, '$2y$10$ZdglFFXaMePEMGqowju9seO18TpwDgTERm772hE0iXnvvwEvPPqzK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_order_fee_fee_fk` (`fee`),
  ADD KEY `orders_users_user_id_fk` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_detaills_items_item_id_fk` (`item_id`),
  ADD KEY `order_detaills_orders_order_id_fk` (`order_id`);

--
-- Indexes for table `order_fee`
--
ALTER TABLE `order_fee`
  ADD KEY `fee` (`fee`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_detaills_items_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `order_detaills_orders_order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
