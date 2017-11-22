-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2017 at 02:16 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_code` varchar(20) NOT NULL,
  `account_shead` int(11) NOT NULL,
  `account_mhead` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`account_id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `account_mhead`;
CREATE TABLE IF NOT EXISTS `account_mhead` (
  `mhead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`mhead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `account_shead`;
CREATE TABLE IF NOT EXISTS `account_shead` (
  `shead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`shead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(20) NOT NULL,
  `product_shead` int(11) NOT NULL,
  `product_mhead` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`product_id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_shead`, `product_mhead`, `product_name`, `product_balance`, `is_delete`, `is_active`) VALUES
(1, '001-001-001', 1, 1, 'H & M Causal Shirt T002', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_mhead`
--

DROP TABLE IF EXISTS `product_mhead`;
CREATE TABLE IF NOT EXISTS `product_mhead` (
  `mhead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`mhead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
-- Table structure for table `product_shead`
--

DROP TABLE IF EXISTS `product_shead`;
CREATE TABLE IF NOT EXISTS `product_shead` (
  `shead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`shead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_code` varchar(20) NOT NULL,
  `store_shead` int(11) NOT NULL,
  `store_mhead` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_balance` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`store_id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `store_mhead`;
CREATE TABLE IF NOT EXISTS `store_mhead` (
  `mhead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`mhead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `store_shead`;
CREATE TABLE IF NOT EXISTS `store_shead` (
  `shead_id` int(11) NOT NULL AUTO_INCREMENT,
  `mhead_id` int(11) NOT NULL,
  `shead_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`shead_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(20) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `is_delete`, `is_active`) VALUES
(1, 'Admin', 0, 1),
(2, 'Data Entry', 0, 1),
(3, 'Accountant', 0, 1),
(4, 'Auditor', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`, `is_delete`, `is_active`) VALUES
(1, 'Warehouse', 0, 1),
(2, 'Store', 0, 1),
(3, 'Manager', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
