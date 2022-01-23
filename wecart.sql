-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2021 at 03:24 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17820533_wecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `username` varchar(366) COLLATE utf8mb4_bin NOT NULL,
  `product_name` varchar(366) COLLATE utf8mb4_bin NOT NULL,
  `product_price` int(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `seller` varchar(366) COLLATE utf8mb4_bin NOT NULL,
  `store_name` varchar(366) COLLATE utf8mb4_bin NOT NULL,
  `total` int(60) DEFAULT NULL,
  `user_address` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `agent` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `quantity` int(60) DEFAULT NULL,
  `iscart` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `random_string` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `mode_of_payment` varchar(55) COLLATE utf8mb4_bin DEFAULT NULL,
  `isdelivered` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `delivery_status` varchar(65) COLLATE utf8mb4_bin DEFAULT NULL,
  `seller_list_count` bigint(20) DEFAULT NULL,
  `full_name` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `contact_num` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `date` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `final_quantity` bigint(20) DEFAULT NULL,
  `qr_` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `seller_stall` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `id` int(11) NOT NULL,
  `identifier` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `total2` int(11) DEFAULT NULL,
  `mop` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `product_name` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `username` varchar(55) COLLATE utf8mb4_bin DEFAULT NULL,
  `product_image` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_bin DEFAULT NULL,
  `product_price` int(255) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `identifier` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `full_name` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `username` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `brgy` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `sitio` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `street` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `contact_num` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `contact_email` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `acc_type` varchar(366) COLLATE utf8mb4_bin NOT NULL,
  `store_name` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `isactive` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `user_profile_image` mediumtext COLLATE utf8mb4_bin DEFAULT NULL,
  `store_type` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `id` varchar(366) COLLATE utf8mb4_bin DEFAULT NULL,
  `isverify` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `daily_visitors` int(11) DEFAULT NULL,
  `isaway` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `assigner_id` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`full_name`, `username`, `password`, `brgy`, `sitio`, `street`, `contact_num`, `contact_email`, `acc_type`, `store_name`, `isactive`, `user_profile_image`, `store_type`, `id`, `isverify`, `daily_visitors`, `isaway`, `timestamp`, `assigner_id`) VALUES
('John Doe', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'admin', NULL, 'yes', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, 'N/A', 'yes', NULL, NULL, NULL, 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
