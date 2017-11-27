-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 05:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_code` varchar(20) NOT NULL,
  `account_shead` int(11) NOT NULL,
  `account_mhead` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_code`, `account_shead`, `account_mhead`, `account_name`, `account_balance`, `is_delete`, `is_active`) VALUES
(1, '', 1, 0, 'Mezan Bank', '', 1, 0),
(2, '', 1, 0, 'Mezan Bank', '', 1, 0),
(3, '', 1, 0, 'Mezan Bank', '', 1, 0),
(4, '1-1-4', 1, 1, 'Mezan Bank', '', 1, 0),
(5, '001-001-005', 1, 1, 'Mezan Bank', '', 0, 1),
(6, '001-001-006', 1, 1, 'Mezan Bank', '', 0, 1),
(7, '001-003-007', 3, 1, 'PAK Limited & Co. Changed', '', 0, 1),
(8, '002-009-008', 9, 2, 'FR Trader', '', 0, 1),
(9, '001-002-009', 2, 1, 'JJT', '', 0, 1),
(10, '001-002-010', 2, 1, 'GM/ FR Cables', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_mhead`
--

CREATE TABLE `account_mhead` (
  `mhead_id` int(11) NOT NULL,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_mhead`
--

INSERT INTO `account_mhead` (`mhead_id`, `mhead_name`, `is_delete`, `is_active`) VALUES
(1, 'Assets', 0, 1),
(2, 'Liability', 0, 1),
(3, 'Income', 0, 1),
(4, 'Expense', 0, 1),
(5, 'Capital', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_shead`
--

CREATE TABLE `account_shead` (
  `shead_id` int(11) NOT NULL,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_shead`
--

INSERT INTO `account_shead` (`shead_id`, `mhead_id`, `shead_name`, `is_delete`, `is_active`) VALUES
(1, 1, 'Bank', 0, 1),
(2, 1, 'Account Receivable', 0, 1),
(3, 1, 'Other Current Asset', 0, 1),
(4, 1, 'Fixed Asset', 0, 1),
(5, 1, 'Other Asset', 0, 1),
(6, 2, 'Account Payable', 0, 1),
(7, 2, 'Credit Card', 0, 1),
(8, 2, 'Other Current Liability', 0, 1),
(9, 2, 'Long Tern Liability', 0, 1),
(10, 5, 'Euity', 0, 1),
(11, 3, 'Income', 0, 1),
(12, 4, 'Cost of Good Sold', 0, 1),
(13, 4, 'Expense', 0, 1),
(14, 3, 'Other Income', 0, 1),
(15, 4, 'Other Expense', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_shead` int(11) NOT NULL,
  `product_mhead` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `product_size_id` int(11) DEFAULT NULL,
  `product_cprice` varchar(20) NOT NULL,
  `product_wprice` varchar(20) NOT NULL,
  `product_rprice` varchar(11) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_shead`, `product_mhead`, `product_color_id`, `product_size_id`, `product_cprice`, `product_wprice`, `product_rprice`, `product_image`, `product_name`, `product_balance`, `is_delete`, `is_active`) VALUES
(1, '001-001-001', 1, 1, 1, 1, '500', '1000', '1500', '483960103.jpg', 'H & M Causal Shirt T002', '', 0, 1),
(2, '001-001-002', 1, 1, NULL, NULL, '', '', '', '', 'Armani D4454', '', 0, 1),
(3, '002-003-003', 3, 2, 9, 3, '300', '500', '1100', '', 'D & G Armani', '', 0, 1),
(4, '001-002-004', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(5, '001-002-005', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(6, '001-002-006', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(7, '001-002-007', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(8, '001-002-008', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(9, '001-002-009', 2, 1, 2, 1, '343', '343', '343', '', 'FG', '', 0, 1),
(10, '001-001-010', 1, 1, 1, 1, '76', '878', '787', '', 'sdfasd7f', '', 0, 1),
(11, '001-002-011', 2, 1, 1, 4, '300', '232', '2323', '', 'sdfsdf', '', 0, 1),
(12, '001-001-012', 1, 1, 1, 5, '300', '21312', '12321', '', 'SDFSAD', '', 0, 1),
(13, '001-002-013', 2, 1, 1, 2, '343', '343', '343', '', 'SDFSDF', '', 0, 1),
(14, '001-002-014', 2, 1, 1, 5, '32', '323', '3w33', '', 'sdfsadf', '', 0, 1),
(15, '001-001-015', 1, 1, 2, 3, '32', '232', '232', '', 'FFF', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(45) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`color_id`, `color_name`, `is_delete`, `is_active`) VALUES
(1, 'White', 0, 1),
(2, 'Black', 0, 1),
(3, 'Red ', 0, 1),
(4, 'Orange', 0, 1),
(5, 'Yellow', 0, 1),
(6, 'Green', 0, 1),
(7, 'Blue', 0, 1),
(8, 'Violet', 0, 1),
(9, 'Grey', 0, 1),
(10, 'Pink', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_mhead`
--

CREATE TABLE `product_mhead` (
  `mhead_id` int(11) NOT NULL,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_mhead`
--

INSERT INTO `product_mhead` (`mhead_id`, `mhead_name`, `is_delete`, `is_active`) VALUES
(1, 'SHIRT', 0, 1),
(2, 'PANT', 0, 1),
(3, 'JACKET', 0, 1),
(4, 'SWEATER', 0, 1),
(5, 'T-SHIRT', 0, 1),
(6, 'SUIT', 0, 1),
(7, 'COAT', 0, 1),
(8, 'TIE', 0, 1),
(11, 'TOP', 0, 1),
(10, 'BELT', 0, 1),
(12, 'SKIRT', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `price_id` int(11) NOT NULL,
  `price_name` varchar(45) DEFAULT NULL,
  `price_value` varchar(45) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`price_id`, `price_name`, `price_value`, `is_delete`, `is_active`) VALUES
(1, 'Warehouse', '1200', 0, 1),
(2, 'Retail', '2200', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_shead`
--

CREATE TABLE `product_shead` (
  `shead_id` int(11) NOT NULL,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_shead`
--

INSERT INTO `product_shead` (`shead_id`, `mhead_id`, `shead_name`, `is_delete`, `is_active`) VALUES
(1, 1, 'Causal Shirt', 0, 1),
(2, 1, 'Dress Shirt', 0, 1),
(3, 2, 'Jeans Pant', 0, 1),
(4, 2, 'Dress Pant', 0, 1),
(5, 3, 'Ladies Jacket', 0, 1),
(6, 3, 'Mens Jacket', 0, 1),
(7, 3, 'Baby Jacket', 0, 1),
(8, 4, 'Mens Sweater', 0, 1),
(9, 4, 'Ladies Sweater', 0, 1),
(10, 4, 'Baby Sweater', 0, 1),
(11, 5, 'Mens T-Shirt', 0, 1),
(12, 5, 'Ladies T-Shirt', 0, 1),
(13, 5, 'Baby T-Shirt', 0, 1),
(14, 8, 'Tie', 0, 1),
(15, 10, 'Belt', 0, 1),
(16, 6, 'Suit', 0, 1),
(17, 7, 'Coat', 0, 1),
(18, 12, 'Skirt', 0, 1),
(19, 11, 'Ladies Top', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(45) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `size_name`, `is_delete`, `is_active`) VALUES
(1, 'Small', 0, 1),
(2, 'Large', 0, 1),
(3, 'Medium', 0, 1),
(4, 'XLarge', 0, 1),
(5, 'XXLarge', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `store_code` varchar(20) NOT NULL,
  `store_shead` int(11) NOT NULL,
  `store_mhead` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `store_code`, `store_shead`, `store_mhead`, `store_name`, `store_balance`, `is_delete`, `is_active`) VALUES
(1, '003-001-001', 1, 3, 'YK Trading ( Warehouse )', '', 0, 1),
(2, '001-002-002', 2, 1, 'Karim Block Gohar Plaza', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_mhead`
--

CREATE TABLE `store_mhead` (
  `mhead_id` int(11) NOT NULL,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_mhead`
--

INSERT INTO `store_mhead` (`mhead_id`, `mhead_name`, `is_delete`, `is_active`) VALUES
(1, 'Franchisor', 0, 1),
(2, 'Franchisee', 0, 1),
(3, 'Warehouse', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_shead`
--

CREATE TABLE `store_shead` (
  `shead_id` int(11) NOT NULL,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_shead`
--

INSERT INTO `store_shead` (`shead_id`, `mhead_id`, `shead_name`, `is_delete`, `is_active`) VALUES
(1, 3, 'Warehouse', 0, 1),
(2, 1, 'Franchisor', 0, 1),
(3, 2, 'Franchisee', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `user_type`, `user_role`, `user_name`, `user_pass`, `user_email`, `is_delete`, `is_active`) VALUES
(1, '', 2, 1, 'fhdfhd', 'fhd123456', '', 1, 0),
(4, '', 1, 1, 'update user2', 'Example Pass', 'Example email', 1, 0),
(5, '', 3, 4, 'Fahad', 'Arsahd', '', 1, 1),
(6, '', 2, 3, 'Fahad', 'Arsahd', '', 1, 1),
(7, '', 2, 3, 'Fahad', 'Arsahd', '', 1, 1),
(8, '', 1, 2, 'Fahad', 'Arsahd', '', 1, 1),
(9, '', 1, 1, 'TestUSer', 'test', '', 1, 1),
(10, '', 2, 2, 'umer Kana', 'khan', '', 1, 0),
(11, '', 1, 2, 'Imran ALi', '123', '', 1, 0),
(12, '', 1, 2, 'Imran ALi', '123', '', 1, 0),
(13, '', 1, 2, 'Imran ALi', '123', '', 1, 0),
(14, '', 1, 2, 'Imran ALi', '123', '', 1, 0),
(15, '1-2-15', 1, 2, 'Imran ALi', '123', '', 1, 0),
(16, '1-2-16', 1, 2, 'Imran ALi', '123', '', 1, 0),
(17, '1-2-17', 1, 2, 'Imran ALi khan', '123123', '', 1, 0),
(18, '1', 1, 3, 'Amir', 'khan', '', 1, 0),
(19, '001-004-019', 1, 4, 'Jamal', 'asdfasdfsd', '', 0, 1),
(20, '003-001-020', 3, 1, 'fahad', 'fahad123', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `is_delete`, `is_active`) VALUES
(5, 'Admin', 0, 1),
(6, 'Data Entry', 0, 1),
(7, 'Accountant', 0, 1),
(8, 'Auditor', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`, `is_delete`, `is_active`) VALUES
(1, 'Warehouse', 0, 1),
(2, 'Store', 0, 1),
(3, 'Manager', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`) USING HASH;

--
-- Indexes for table `account_mhead`
--
ALTER TABLE `account_mhead`
  ADD PRIMARY KEY (`mhead_id`);

--
-- Indexes for table `account_shead`
--
ALTER TABLE `account_shead`
  ADD PRIMARY KEY (`shead_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`) USING HASH;

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`color_id`),
  ADD UNIQUE KEY `color_id_UNIQUE` (`color_id`);

--
-- Indexes for table `product_mhead`
--
ALTER TABLE `product_mhead`
  ADD PRIMARY KEY (`mhead_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`price_id`),
  ADD UNIQUE KEY `price_id_UNIQUE` (`price_id`);

--
-- Indexes for table `product_shead`
--
ALTER TABLE `product_shead`
  ADD PRIMARY KEY (`shead_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`),
  ADD UNIQUE KEY `size_id_UNIQUE` (`size_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`) USING HASH;

--
-- Indexes for table `store_mhead`
--
ALTER TABLE `store_mhead`
  ADD PRIMARY KEY (`mhead_id`);

--
-- Indexes for table `store_shead`
--
ALTER TABLE `store_shead`
  ADD PRIMARY KEY (`shead_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING HASH;

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `account_mhead`
--
ALTER TABLE `account_mhead`
  MODIFY `mhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_shead`
--
ALTER TABLE `account_shead`
  MODIFY `shead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_mhead`
--
ALTER TABLE `product_mhead`
  MODIFY `mhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_shead`
--
ALTER TABLE `product_shead`
  MODIFY `shead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store_mhead`
--
ALTER TABLE `store_mhead`
  MODIFY `mhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `store_shead`
--
ALTER TABLE `store_shead`
  MODIFY `shead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
