-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2021 at 11:44 AM
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
  `total` double(10,0) DEFAULT NULL,
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
  `total2` double(10,0) DEFAULT NULL,
  `mop` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `add_fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`username`, `product_name`, `product_price`, `stock`, `seller`, `store_name`, `total`, `user_address`, `agent`, `quantity`, `iscart`, `random_string`, `mode_of_payment`, `isdelivered`, `delivery_status`, `seller_list_count`, `full_name`, `contact_num`, `date`, `final_quantity`, `qr_`, `seller_stall`, `id`, `identifier`, `total2`, `mop`, `delivery_fee`, `add_fee`) VALUES
('nj', 'Cute Doggo Meme', 12345, 22, 'bl', 'Blacklist International', 12345, 'Poblacion, Purok Tres, N/A', 'oikawa', 1, 'no', '6199c495a19d047745935', 'null', 'yes', 'item received ✅', 202111210431006906, 'Noel Justine Mendoza', '09121231234', 'Nov 21st, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112104310069062114448619b26e9873b4.png', 'null', 1, '619f213e02d84', 12405, NULL, 0, 0),
('nj', 'Cute Doggo Meme', 12345, 21, 'bl', 'Blacklist International', 12345, 'Poblacion, Purok Tres, N/A', 'oikawa', 1, 'no', '6199c495a19d047745935', 'null', 'yes', 'item received ✅', 202111210457448301, 'Noel Justine Mendoza', '09121231234', 'Nov 21st, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112104574483018423629619b26ceef45b.png', 'null', 2, '619f213e02d84', 12405, NULL, 0, 0),
('aries', 'Cute Doggo Meme', 12345, 13, 'bl', 'Blacklist International', 98760, 'Banalo, barangay hall, maligaya 2', 'oikawa', 8, 'no', '619b27d50e6ce', 'null', 'yes', 'Package has been delivered.✅\n', 202111210612456095, 'aries reniel gaya', '09636932847', 'Nov 21st, 2021', 8, 'https://wecart.gq/wecart-api/img/qr/20211121061245609593212146199e36aba95f.png', 'null', 3, '619de52479666', 98820, NULL, 0, 0),
('aries', 'Cute Doggo Meme', 12345, 7, 'bl', 'Blacklist International', 74070, 'Banalo, barangay hall, maligaya 2', 'oikawa', 6, 'no', '619b27cfc392f', 'null', 'yes', 'Package has been delivered.✅\n', 202111210622254483, 'aries reniel gaya', '09636932847', 'Nov 21st, 2021', 6, 'https://wecart.gq/wecart-api/img/qr/20211121062225448313083256199e6d5ba21b.png', 'null', 4, '619de52479666', 74130, NULL, 0, 0),
('aries', 'Cute Doggo Meme', 12345, 6, 'bl', 'Blacklist International', 12345, 'Banalo, barangay hall, maligaya 2', 'oikawa', 1, 'no', '619b27ca170ed', 'null', 'yes', 'Package has been delivered.✅\n', 202111210633173726, 'aries reniel gaya', '09636932847', 'Nov 21st, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/20211121063317372632896876199e85df0ba6.png', 'null', 5, '619de52479666', 12405, NULL, 0, 0),
('aries', 'Cute Doggo Meme', 12345, 4, 'bl', 'Blacklist International', 24690, 'Banalo, barangay hall, maligaya 2', 'oikawa', 2, 'no', '619b27c26081d', 'null', 'yes', 'Package has been delivered.✅\n', 202111210635363876, 'aries reniel gaya', '09636932847', 'Nov 21st, 2021', 2, 'https://wecart.gq/wecart-api/img/qr/20211121063536387626791386199e8db5c57b.png', 'null', 6, '619de52479666', 24750, NULL, 0, 0),
('ARIES', 'Cute Doggo Meme', 12345, 4, 'bl', 'Blacklist International', 12345, ', , ', NULL, 1, 'yes', '6199c495a19d047745935', NULL, 'no', NULL, NULL, '', '', NULL, 1, NULL, 'null', 7, 'current_stock', 12405, NULL, 0, 0),
('aries', 'Cute Doggo Meme', 12345, 0, 'bl', 'Blacklist International', 49380, 'Banalo, barangay hall, maligaya 2', 'oikawa', 4, 'no', '619b27b9ce507', 'null', 'yes', 'Package has been delivered.✅\n', 202111210638566512, 'aries reniel gaya', '09636932847', 'Nov 21st, 2021', 4, 'https://wecart.gq/wecart-api/img/qr/20211121063856651250721436199e9c88855c.png', 'null', 8, '619de52479666', 49440, NULL, 0, 0),
('nj', 'Cute Doggo Meme', 12345, 499, 'bl', 'Blacklist International', 12345, 'Poblacion, Purok Tres, N/A', 'Agent not available on Pick up.', 1, 'no', '6199c495a19d047745935', 'pickup', 'yes', 'item received ✅', 202111220510361420, 'Noel Justine Mendoza', '09121231234', 'Nov 22nd, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112205103614206692687619b26b04d111.png', 'null', 9, '619f213e02d84', 12405, NULL, 0, 0),
('aries', 'Bangus', 130, 24, 'new1', 'Fresh Seafoods', 130, 'Banalo, barangay hall, maligaya 2', 'Agent not available on Pick up.', 1, 'no', '619b62ecba4f1972102139', 'pickup', 'no', 'Ready for Pick Up ⏰', 202111230052539376, 'aries reniel gaya', '09636932847', 'Nov 23rd, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112300525393761954608619c3bc7505fb.png', 'null', 10, '619de52479666', 190, NULL, 0, 0),
('aries', 'Pork Pata', 350, 49, 'new2', 'Marites meat shop', 350, 'Banalo, barangay hall, maligaya 2', 'Agent not available on Pick up.', 1, 'no', '619b639173b3050184074', 'pickup', 'no', 'Ready for Pick Up ⏰', 20211123020429196, 'aries reniel gaya', '09636932847', 'Nov 23rd, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/202111230204291962860245619ee575dd0c9.png', '. . . . . .', 11, '619de52479666', 410, NULL, 0, 0),
('aries', 'Pork Pata', 350, 48, 'new2', 'Marites meat shop', 350, 'Banalo, barangay hall, maligaya 2', 'Agent not available on Pick up.', 1, 'no', '619b639173b3050184074', 'pickup', 'no', 'Seller is preparing package 📦\r\n', 202111240709219115, 'aries reniel gaya', '09636932847', 'Nov 24th, 2021', 1, NULL, '. . . . . .', 12, '619de52479666', 410, NULL, 0, 0),
('aries', 'Pork Chop', 250, 44, 'new2', 'Marites meat shop', 250, 'Banalo, barangay hall, maligaya 2', 'Agent not available on Pick up.', 1, 'no', '619b639173b3050184074', 'pickup', 'no', 'Seller is preparing package 📦\r\n', 202111240709219115, 'aries reniel gaya', '09636932847', 'Nov 24th, 2021', 1, NULL, '. . . . . .', 13, '619de52479666', 310, NULL, 0, 0),
('reunca', 'Tuna', 200, 29, 'new1', 'Fresh Seafoods', 200, 'Soloc, tuklong, Ibaba', 'rich', 1, 'no', '619b62ecba4f1972102139', 'null', 'no', 'Out For Delivery 🚚', 202111240755199326, 'Regie Untalan Caguicla', '09162198272', 'Nov 24th, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112407551993261941782619df0468e9f2.png', 'null', 14, '619ef8b6027c7', 260, NULL, 0, 0),
('reunca', 'Shrimp', 450, 9, 'new1', 'Fresh Seafoods', 450, 'Soloc, tuklong, Ibaba', 'rich', 1, 'no', '619b62ecba4f1972102139', 'null', 'no', 'Out For Delivery 🚚', 202111240755199326, 'Regie Untalan Caguicla', '09162198272', 'Nov 24th, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112407551993261941782619df0468e9f2.png', 'null', 15, '619ef8b6027c7', 510, NULL, 0, 0),
('reunca', 'Pork Chop', 250, 43, 'new2', 'Marites meat shop', 250, 'Soloc, tuklong, Ibaba', 'rich', 1, 'no', '619b639173b3050184074', 'null', 'no', 'Ready for deliver ⚠️', 202111250144475574, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112501444755745806985619eec44e4835.png', '. . . . . .', 16, '619ef8b6027c7', 310, NULL, 0, 0),
('reunca', 'Pork Chop', 250, 43, 'new2', 'Marites meat shop', 250, 'Soloc, tuklong, Ibaba', 'rich', 1, 'no', '619b639173b3050184074', 'null', 'no', 'Ready for deliver ⚠️', 202111250144475574, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/2021112501444755745806985619eec44e4835.png', '. . . . . .', 17, '619ef8b6027c7', 310, NULL, 0, 0),
('reunca', 'Pork Ground', 200, 29, 'new2', 'Marites meat shop', 200, 'Soloc, tuklong, Ibaba', 'rich', 1, 'no', '619b639173b3050184074', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111250245101795, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 1, NULL, '. . . . . .', 18, '619ef8b6027c7', 260, NULL, 0, 0),
('reunca', 'Tuna', 200, 27, 'new1', 'Fresh Seafoods', 400, 'Soloc, tuklong, Ibaba', 'rich', 2, 'no', '619b62ecba4f1972102139', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111250245101795, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 2, NULL, 'null', 19, '619ef8b6027c7', 460, NULL, 0, 0),
('reunca', 'Tuna', 200, 26, 'new1', 'Fresh Seafoods', 600, 'Soloc, tuklong, Ibaba', 'rich', 3, 'no', '619b62ecba4f1972102139', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111250245101795, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 3, NULL, 'null', 20, '619ef8b6027c7', 660, NULL, 0, 0),
('reunca', 'Crabs', 150, 8, 'new1', 'Fresh Seafoods', 300, 'Soloc, tuklong, Ibaba', 'rich', 2, 'no', '619b62ecba4f1972102139', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111250245101795, 'Regie Untalan Caguicla', '09162198272', 'Nov 25th, 2021', 2, NULL, 'null', 21, '619ef8b6027c7', 360, NULL, 0, 0),
('nj', 'Blacklist International Jersey (Monochrome)', 1000, 0, 'bl', 'BLCK Box', 5000, 'Poblacion, Purok Tres, N/A', 'Agent not available on Pick up.', 5, 'no', '619f1d335da2d498140611', 'pickup', 'yes', 'item received ✅', 202111250538028107, 'Noel Justine Mendoza', '09121231234', 'Nov 25th, 2021', 5, 'https://wecart.gq/wecart-api/img/qr/2021112505380281077215916619f2194adede.png', 'Stall #23', 24, '619f213e02d84', 5060, NULL, 0, 0),
('aries', 'Ground Pork', 130, 36, 'marie', 'marites', 130, 'Banalo, barangay hall, maligaya 2', 'Agent not available on Pick up.', 1, 'yes', '61a0142b5f14b287755106', 'pickup', 'no', NULL, NULL, 'aries reniel gaya', '09636932847', NULL, 1, NULL, 'null', 25, 'current_stock', 190, NULL, 0, 0),
('dan', 'Ground Pork', 102, 35, 'marie', 'marites', 102, 'Balatbat, kk, N/A', 'Agent not available on Pick up.', 1, 'no', '61a0142b5f14b287755106', 'pickup', 'no', 'Ready for Pick Up ⏰', 202111260349477071, 'dan', '09386670544', 'Nov 26th, 2021', 1, 'https://wecart.gq/wecart-api/img/qr/202111260349477071545667261a05994acf00.png', 'null', 27, '61a08e185f948', 3759, NULL, 50, 483.75),
('dan', 'Blacklist International Hoodie', 3000, 2, 'bl', 'BLCK Box', 3000, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '619f1d335da2d498140611', 'cod', 'no', 'Seller is preparing package 📦\r\n', 20211126053517549, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 33, '61a08e185f948', 3949, NULL, 50, 508.5),
('nj', 'Blacklist International Hoodie', 3000, 3, 'bl', 'BLCK Box', 3000, 'Poblacion, Purok Tres, N/A', 'Agent not available on Pick up.', 1, 'yes', '619f1d335da2d498140611', 'cod', 'no', NULL, NULL, 'Noel Justine Mendoza', '09121231234', NULL, 1, NULL, 'Stall #23', 34, 'current_stock', 3460, NULL, 10, 450),
('dan', 'Ground Pork', 130, 33, 'marie', 'marites', 390, 'Balatbat, kk, N/A', 'oikawa', 3, 'no', '61a0142b5f14b287755106', 'cod', 'no', 'Seller is preparing package 📦\r\n', 20211126053517549, 'dan', '09386670544', 'Nov 26th, 2021', 3, NULL, 'null', 35, '61a08e185f948', 3949, NULL, 50, 508.5),
('dan', 'test', 108, 21, 'bl', 'BLCK Box', 108, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '619f1d335da2d498140611', 'cod', 'no', 'Seller is preparing package 📦\r\n', 202111260604299741, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 37, '61a08e185f948', 3624, NULL, 50, 466.2),
('dan', 'Blacklist International Hoodie', 3000, 2, 'bl', 'BLCK Box', 3000, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '619f1d335da2d498140611', 'cod', 'no', 'Seller is preparing package 📦\r\n', 202111260604299741, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 38, '61a08e185f948', 3624, NULL, 50, 466.2),
('nj23', 'Blacklist International Hoodie', 3000, 1, 'bl', 'BLCK Box', 3000, 'Poblacion, Tabi ng simbahan, N/A', 'oikawa', 1, 'no', '619f1d335da2d498140611', 'cod', 'no', 'Seller is preparing package 📦\r\n', 202111260612157468, 'Noelino', '09121231234', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 39, '61a0911b64dfe', 3460, NULL, 10, 450),
('dan', 'Ground Pork', 130, 35, 'marie', 'marites', 130, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '61a0142b5f14b287755106', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111260727065761, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'null', 40, '61a08e185f948', 130, NULL, NULL, NULL),
('dan', 'Ground Pork', 130, 34, 'marie', 'marites', 130, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '61a0142b5f14b287755106', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111260727427622, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'null', 41, '61a08e185f948', 130, NULL, NULL, NULL),
('dan', 'Blacklist International Hoodie', 3000, 2, 'bl', 'BLCK Box', 3000, 'Balatbat, kk, N/A', 'oikawa', 1, 'no', '619f1d335da2d498140611', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111260734488044, 'dan', '09386670544', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 42, '61a08e185f948', 3500, NULL, 50, 450),
('nj23', 'Blacklist International Hoodie', 3000, 1, 'bl', 'BLCK Box', 3000, 'Poblacion, Tabi ng simbahan, N/A', NULL, 1, 'no', '619f1d335da2d498140611', 'null', 'no', 'Seller is preparing package 📦\r\n', 202111260747391706, 'Noelino', '09121231234', 'Nov 26th, 2021', 1, NULL, 'Stall #23', 43, '61a0911b64dfe', 3000, NULL, NULL, NULL);

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

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_name`, `username`, `product_image`, `description`, `product_price`, `stock`, `product_id`, `product_type`, `identifier`) VALUES
('Blacklist International Jersey (Monochrome)', 'bl', 'https://wecart.gq/wecart-api/img/products/wecart_q1pa8496_0.20374813123626756619f1d9af4002.png', 'Your favorite esports jersey, now in our signature Stealth Black color scheme. Break The Code with the officially licensed Blacklist International Monochrome Jersey.', 1000, 0, 23, 'Others', 'current_stock'),
('Blacklist International Hoodie', 'bl', 'https://wecart.gq/wecart-api/img/products/wecart_v9qnldtv_0.3318997691722242619f1dc7eeaa3.png', 'Welcome the New Era with the Blacklist International 2021 Hoodie. With the Blacklist branding in New Era colors against a classic black hoodie silhouette, you can\'t go wrong. View the sizing chart below and order now, so you too can #BreakTheCode.', 3000, 1, 24, 'Others', 'current_stock'),
('Ground Pork', 'marie', 'https://wecart.gq/wecart-api/img/products/wecart_9zh0s9bo_0.3214475621041491561a014ab8a7ea.png', 'Fresh\n130 per kilo', 130, 36, 25, 'Pork Meat', 'current_stock'),
('test', 'bl', 'https://wecart.gq/wecart-api/img/products/default_product.jpg', 'test product', 108, 21, 26, 'Others', 'current_stock');

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
('John Doe', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'admin', NULL, 'yes', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, 'N/A', 'yes', NULL, NULL, NULL, 'N/A'),
('Noel Justine Mendoza', 'nj', '202cb962ac59075b964b07152d234b70', 'Poblacion', 'Purok Tres', 'N/A', '09121231234', 'noeljustine.mendoza@gmail.com', 'buyer', NULL, 'no', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '61999204e8491862890215', 'yes', NULL, NULL, NULL, '619991dc8974e1557337'),
('[FULL_NAME_HERE]', '[USERNAME]', '91b01ecfae9b3bcc39c8a94c4d094912', '[BARANGAY]', '[SITIO]', '[STREET]', '[CONTACT_NUMBER]', '[CONTACT_EMAIL]', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '619992275fac5411596688', 'no', NULL, NULL, NULL, '619992275fac5411596688'),
('[FULL_NAME_HERE]', 'nj2', '91b01ecfae9b3bcc39c8a94c4d094912', '[BARANGAY]', '[SITIO]', '[STREET]', '[CONTACT_NUMBER]', 'noeljustine.mendoza test2@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199976ae8afd374136580', 'no', NULL, NULL, NULL, '6199976ae8afd374136580'),
('gagaga', 'nj3', '202cb962ac59075b964b07152d234b70', 'Apar', 'qqqqq', 'N/A', '12345678912', 'noeljustine.mendoza+test3@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '619998f5b503f559069602', 'no', NULL, NULL, NULL, '619998f5b503f559069602'),
('gagaga', 'nj4', '202cb962ac59075b964b07152d234b70', 'Apar', '33333', 'N/A', '12345678912', 'noeljustine.mendoza+test123@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '61999af6bb199683868202', 'yes', NULL, NULL, NULL, '61999adb20aa932336874'),
('0000', 'qwerty', '202cb962ac59075b964b07152d234b70', 'Apar', 'uuuu', 'N/A', '12345678912', 'noeljustine.mendoza+12345@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199a7c9adf7f332499456', 'no', NULL, NULL, NULL, '6199a7c9adf7f332499456'),
('bbbbb', '123333', '202cb962ac59075b964b07152d234b70', 'Apar', 'qwwww', 'N/A', '12345678912', 'noeljustine.mendoza+wwertt@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199a890bbeb6199980412', 'yes', NULL, NULL, NULL, '6199a87c6d72f366556866'),
('hhjjjj', '1234578', '202cb962ac59075b964b07152d234b70', 'Apar', '12344', 'N/A', '12345678912', 'noeljustine.mendoza+qwerty12345@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199a965bd395740744394', 'yes', NULL, NULL, NULL, '6199a948f320e330363948'),
('Oikawa Toru', 'oikawa', '202cb962ac59075b964b07152d234b70', 'N/A', 'N/A', 'N/A', '12345678912', 'noeljustine.mendoza+123oikawa@gmail.com', 'agent', NULL, 'no', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199c4c79052f888003021', 'yes', NULL, 'no', NULL, '6199c4c79052f888003021'),
('aries reniel gaya', 'aries', '7a37b0962dc8df4c9956f7fc1bb28539', 'Banalo', 'barangay hall', 'maligaya 2', '09636932847', 'argaya06@gmail.com', 'buyer', NULL, 'no', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '6199e55b25be5224011760', 'yes', NULL, NULL, 14, '6199e1cd6ac9b865198011'),
('Richard A. Gomez', 'rich', '202cb962ac59075b964b07152d234b70', 'N/A', 'N/A', 'N/A', '09352181997', 'hernandezzed64@gmail.com', 'agent', NULL, 'yes', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '619b64412c6d9948174180', 'yes', NULL, 'yes', NULL, '619b64412c6d9948174180'),
('Regie Untalan Caguicla', 'REUNCA', '2177e120141d029cf2729cc6a9e17e54', 'Soloc', 'Simbahan', 'Ibaba', '09162198272', 'reunca267@gmail.com', 'buyer', NULL, NULL, 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '619dea89bf4c4174545986', 'no', NULL, NULL, NULL, '619dea89bf4c4174545986'),
('Regie Untalan Caguicla', 'reunca', '2177e120141d029cf2729cc6a9e17e54', 'Soloc', 'tuklong', 'Ibaba', '09162198272', 'jimenezjeric13@gmail.com', 'buyer', NULL, 'yes', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '619decdba66ae40128271', 'yes', NULL, NULL, NULL, '619decbd841c292301110'),
('Blacklist International', 'bl', '202cb962ac59075b964b07152d234b70', 'null', 'Stall #23', 'null', '09121231234', 'noeljustine.mendoza+tierone@gmail.com', 'seller', 'BLCK Box', 'no', 'https://wecart.gq/wecart-api/img/user_profile/wecart_x225bwr70.2698828437495755619f1e5a4d2a5.png', 'Others', '619f1d335da2d498140611', 'yes', 33, NULL, NULL, '619f1d335da2d498140611'),
('null', 'marie', '202cb962ac59075b964b07152d234b70', 'null', 'null', 'null', 'null', 'hernandezzed63@gmail.com', 'seller', 'marites', 'no', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', 'Meat Shop', '61a0142b5f14b287755106', 'yes', 22, NULL, NULL, '61a0142b5f14b287755106'),
('dan', 'dan', '9180b4da3f0c7e80975fad685f7f134e', 'Balatbat', 'kk', 'N/A', '09386670544', 'danlyt74@gmail.com', 'buyer', 'null', 'no', 'https://wecart.gq/wecart-api/img/user_profile/wecart_jadgr7e50.539386105504777561a08e8a6196f.png', 'null', '61a02f8b59919549249223', 'yes', NULL, NULL, NULL, '61a02f766ff05933907928'),
('Noelino', 'nj23', '202cb962ac59075b964b07152d234b70', 'Poblacion', 'Tabi ng simbahan', 'N/A', '09121231234', 'noeljustine.mendoza+nj23@gmail.com', 'buyer', NULL, 'no', 'https://wecart.gq/wecart-api/img/user_profile/user_default.png', NULL, '61a07652e1b5c137443790', 'yes', NULL, NULL, NULL, '61a07644cb134139541661');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
