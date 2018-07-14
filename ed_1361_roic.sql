-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 01:23 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ed_1361_roic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(32) DEFAULT NULL,
  `time_created` datetime DEFAULT NULL,
  `coupon_code` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `time_created`, `coupon_code`) VALUES
(1, '1', '2018-06-05 13:34:28', ''),
(2, '2', '2018-06-22 02:14:41', NULL),
(3, 'T2', '2018-06-22 02:20:43', NULL),
(4, '14', '2018-06-22 04:42:33', NULL),
(5, '14', '2018-06-22 04:44:04', NULL),
(6, 'T2', '2018-06-22 04:44:29', NULL),
(7, 'T2', '2018-06-22 04:44:33', NULL),
(8, 'T2', '2018-06-22 04:44:35', NULL),
(9, 'T2', '2018-06-22 04:44:38', NULL),
(10, 'T2', '2018-06-22 04:44:38', NULL),
(11, 'T2', '2018-06-22 04:44:41', NULL),
(12, 'T2', '2018-06-22 04:44:43', NULL),
(13, 'T2', '2018-06-22 04:44:43', NULL),
(14, 'T2', '2018-06-22 04:44:46', NULL),
(15, 'T2', '2018-06-22 04:44:46', NULL),
(16, 'T2', '2018-06-22 04:46:30', NULL),
(17, 'T2', '2018-06-22 04:46:32', NULL),
(18, 'T2', '2018-06-22 04:46:43', NULL),
(19, 'T2', '2018-06-22 04:46:43', NULL),
(20, 'T2', '2018-06-22 04:46:44', NULL),
(21, 'T2', '2018-06-22 04:47:15', NULL),
(22, 'T2', '2018-06-22 04:48:28', NULL),
(23, '16', '2018-06-22 04:48:32', NULL),
(24, 'T3', '2018-06-22 04:49:16', NULL),
(25, '17', '2018-06-22 04:50:50', NULL),
(26, 'T4', '2018-06-22 05:11:55', NULL),
(27, 'T5', '2018-06-22 05:56:29', NULL),
(28, '21', '2018-06-22 07:53:05', NULL),
(29, '21', '2018-06-24 10:45:58', NULL),
(30, '21', '2018-06-24 10:51:16', NULL),
(31, '21', '2018-06-24 10:52:50', NULL),
(32, '21', '2018-06-24 11:00:31', NULL),
(33, '21', '2018-06-24 11:13:51', NULL),
(34, '21', '2018-06-24 11:14:33', NULL),
(35, '21', '2018-06-24 11:27:22', NULL),
(36, '21', '2018-06-25 04:40:18', NULL),
(37, '21', '2018-06-25 04:51:29', NULL),
(38, '21', '2018-06-25 04:53:57', NULL),
(39, '21', '2018-06-25 04:54:23', NULL),
(40, '21', '2018-06-25 04:55:11', 'RC9838481'),
(41, 'T6', '2018-06-25 05:20:26', 'RC9838481'),
(42, '22', '2018-06-25 06:38:19', NULL),
(43, '22', '2018-07-03 00:01:48', NULL),
(44, 'T7', '2018-07-09 18:24:38', NULL),
(45, '1', '2018-07-09 19:45:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_lines`
--

CREATE TABLE `cart_lines` (
  `id` int(11) UNSIGNED NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `time_added` datetime DEFAULT NULL,
  `item_type` varchar(128) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `single_price` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `display_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_lines`
--

INSERT INTO `cart_lines` (`id`, `cart_id`, `item_id`, `time_added`, `item_type`, `quantity`, `single_price`, `amount`, `display_name`) VALUES
(154, 41, 1, NULL, 'roic_coins', 4, '300.00', '1200.00', NULL),
(155, 41, 2, NULL, 'information', 1, '4.90', '4.90', NULL),
(161, 41, 1, NULL, 'coupon', 1, '-500.00', '-500.00', 'RC9838481'),
(162, 41, 3, NULL, 'roic_coins', 1, '60.30', '60.30', NULL),
(163, 42, 2, NULL, 'information', 2, '4.90', '9.80', NULL),
(164, 42, 1, NULL, 'roic_coins', 1, '300.00', '300.00', NULL),
(165, 43, 1, NULL, 'roic_coins', 1, '300.00', '300.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_session`
--

CREATE TABLE `cart_session` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(32) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_session`
--

INSERT INTO `cart_session` (`id`, `user_id`, `cart_id`, `status`) VALUES
(26, 'T4', 26, 0),
(27, 'T5', 27, 1),
(28, '21', 28, 1),
(29, '21', 29, 1),
(30, '21', 30, 1),
(31, '21', 31, 1),
(32, '21', 32, 1),
(33, '21', 33, 1),
(34, '21', 34, 1),
(35, '21', 35, 1),
(36, '21', 36, 1),
(37, '21', 37, 1),
(38, '21', 38, 1),
(39, '21', 39, 1),
(40, '21', 40, 0),
(41, 'T6', 41, 1),
(42, '22', 42, 1),
(43, '22', 43, 1),
(44, 'T7', 44, 0),
(45, '1', 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) UNSIGNED NOT NULL,
  `coupon_code` varchar(64) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `status`, `value`, `name`) VALUES
(1, 'RC9838481', 1, '-500.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `info_id` int(11) NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info_title` varchar(128) DEFAULT NULL,
  `info_description` text,
  `est_course_time` time DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `info_type` varchar(16) DEFAULT NULL,
  `system_status` int(11) NOT NULL DEFAULT '1',
  `is_free` int(11) NOT NULL DEFAULT '1',
  `rating_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `description` text,
  `type` varchar(32) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_old` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `main_thumbnail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `display_name`, `description`, `type`, `price`, `price_old`, `category_id`, `main_thumbnail`) VALUES
(1, 'roic_coins_1000', '1.000 ROIC Coins', NULL, 'roic_coins', '300.00', '120.00', 1, NULL),
(2, 'information_1', 'The Blockchain', NULL, 'information', '4.90', NULL, 1, 'https://cdn-images-1.medium.com/max/1400/1*KU9JHAVTeqI4lnc4qb69gA.jpeg'),
(3, 'roic_coins_2500', '2.500 ROIC Coins', NULL, 'roic_coins', '60.30', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` varchar(128) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `order_type` varchar(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `payment_mehtod` varchar(32) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_created` timestamp NULL DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `user_firstname` varchar(128) DEFAULT NULL,
  `user_lastname` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `user_address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `cart_id`, `order_type`, `status`, `payment_mehtod`, `user_id`, `time_created`, `amount`, `order_date`, `user_firstname`, `user_lastname`, `user_email`, `user_address`) VALUES
(16, '201806249FC021', 34, NULL, 'payed', NULL, 21, NULL, '73.50', '2018-06-24', NULL, NULL, NULL, NULL),
(18, '20180625258C21', 35, NULL, 'payed', NULL, 21, NULL, '10.50', '2018-06-25', 'Muster', 'Mann', 'info@jonasattiah.de', 'Muster ,11111 '),
(19, '2018062586A421', 36, NULL, 'payed', NULL, 21, NULL, '101.60', '2018-06-25', 'Muster', 'Mann', 'info@jonasattiah.de', 'Muster ,11111 '),
(20, '201806254DBB21', 37, NULL, 'payed', NULL, 21, NULL, '75.70', '2018-06-25', 'Muster', 'Mann', 'info@jonasattiah.de', 'Muster ,11111 '),
(21, '20180625BFE721', 38, NULL, 'payed', NULL, 21, NULL, '75.70', '2018-06-25', 'Muster', 'Mann', 'info@jonasattiah.de', 'Muster ,11111 '),
(22, '2018062590F221', 39, NULL, 'payed', NULL, 21, NULL, '75.70', '2018-06-25', 'Muster', 'Mann', 'info@jonasattiah.de', 'Muster ,11111 '),
(23, '201806256ECF22', 41, NULL, 'payed', NULL, 22, NULL, '765.20', '2018-06-25', 'Muster', 'Muster', 'Muster@Muster.Muster', 'Muster ,11111 '),
(24, '201807029C8222', 42, NULL, 'payed', NULL, 22, NULL, '309.80', '2018-07-02', 'Muster', 'Muster', 'Muster@Muster.Muster', 'Muster ,11111 '),
(25, '2018070645AA22', 43, NULL, 'payed', NULL, 22, NULL, '300.00', '2018-07-06', 'Muster', 'Muster', 'Muster@Muster.Muster', 'Muster ,11111 City');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `new_member_id` int(11) NOT NULL,
  `link_type` int(11) NOT NULL,
  `time_of_action` datetime NOT NULL,
  `type_of_action` varchar(64) NOT NULL,
  `referral_link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `partner_id`, `new_member_id`, `link_type`, `time_of_action`, `type_of_action`, `referral_link_id`) VALUES
(1, 1, 123, 13, '0000-00-00 00:00:00', '0', 1),
(2, 2, 123, 3, '2018-07-03 00:00:00', 'credit', 2),
(3, 23, 21, 65, '2018-07-02 00:00:00', 'credit', 2),
(4, 12, 31, 3, '2018-07-09 00:00:00', 'debit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referral_links`
--

CREATE TABLE `referral_links` (
  `id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `referral_link_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_links`
--

INSERT INTO `referral_links` (`id`, `partner_id`, `referral_link_uid`) VALUES
(1, 11, 10),
(2, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `time_created` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `address_2` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `zip` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_users`
--

INSERT INTO `temp_users` (`id`, `time_created`, `status`, `firstname`, `lastname`, `username`, `email`, `address`, `address_2`, `city`, `country`, `state`, `zip`) VALUES
(5, NULL, 2, 'Muster', 'Mann', 'jonasatia', 'info@jonasattiah.de', 'Muster', '', NULL, 'DE', 'california', '11111'),
(6, NULL, 2, 'Muster', 'Muster', 'perdia_de', 'Muster@Muster.Muster', 'Muster', '', NULL, 'AX', 'california', '11111'),
(7, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(64) NOT NULL,
  `transacted_on` datetime NOT NULL,
  `transaction_type` varchar(32) NOT NULL,
  `action_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `charge` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_number`, `transacted_on`, `transaction_type`, `action_id`, `description`, `amount`, `charge`) VALUES
(1, '65656ADAFDGDefad', '2018-07-04 00:00:00', 'credit', 11, 'first transaction successful.', '10.00', '2.00'),
(2, '1adRDC6446a', '2018-07-04 00:00:00', 'debit', 2, 'second transaction successful.', '55.00', '0.00'),
(3, 'SS88787SE2', '2018-07-03 07:00:00', 'credit', 3, 'third transaction successful.', '30.00', '5.00'),
(4, 'TX545advE54', '2018-07-01 06:12:13', 'debit', 4, 'fourth transaction successful.', '20.00', '3.00'),
(5, '22X8fjGJT', '2018-07-04 07:18:00', 'debit', 22, 'amount withdrawn from account', '34.00', '6.00'),
(6, 'PT009100E', '2018-07-04 15:18:00', 'credit', 6, 'transaction encountered issues', '0.00', '0.00'),
(7, 'G6522sslE3', '2018-07-05 17:22:12', 'debit', 4, 'transaction was successful.', '562.00', '35.80');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roic_coins` int(11) DEFAULT NULL,
  `is_partner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `firstname`, `lastname`, `address`, `address_2`, `city`, `country_code`, `country`, `state`, `zip`, `roic_coins`, `is_partner`) VALUES
(1, 'info@edia-web.de', 'info@edia-web.de', '$2y$10$vqtnuF5wEIvN/nXjVSMB2.wZnV.hcdbE82iq6hnCW0COvbYfG6BDW', '7k5dG1RL7KLdWJxAH8AvWMYfJ60rlNAJpnJGIKKwxVPAY2tdmlKjfUHNr03Y', '2018-05-24 15:30:23', '2018-06-21 16:32:02', '01234 5678 91012', 'Max', 'Mustermann', 'Straße 1', NULL, 'Stadt', 'DE', NULL, 'nrw', '12345', 8374, 1),
(18, 'jonasatia', 'info@jonasattiah.de', '$2y$10$IMf4ML/nO9oQ401PHrASEusBpj.exS2oeQkAwu2O96UL7R0JGAENy', NULL, NULL, NULL, NULL, 'Muster', 'Mann', 'Muster', '', NULL, NULL, 'DE', 'california', '11111', NULL, NULL),
(19, 'jonasatia', 'info@jonasattiah.de', '$2y$10$I3WK1S2bjGAz5tsAbwWNXeq93qFdXywIQF1dSPWPm1ITws5xPRURi', NULL, NULL, NULL, NULL, 'Muster', 'Mann', 'Muster', '', NULL, NULL, 'DE', 'california', '11111', NULL, NULL),
(20, 'jonasatia', 'info@jonasattiah.de', '$2y$10$8kjAzkFYAp308kHR57o3uu/JgSCLYrLR3hkjwKYIR4Dxnm4i1A5Ai', NULL, NULL, NULL, NULL, 'Muster', 'Mann', 'Muster', '', NULL, NULL, 'DE', 'california', '11111', NULL, NULL),
(21, 'jonasatia', 'info@jonasattiah.de', '$2y$10$eNIUadnqWyvZV6nGScEfzuBn2../ThfXCevJH7mbZo0TOcFmGQV4q', 'TmspyAlmGZpRaDzOeX0m06lnmwP4lucTdGrOTPUydy0XPy6Wprnp47xlIaxH', NULL, '2018-06-25 02:20:25', NULL, 'Muster', 'Mann', 'Muster', '', NULL, NULL, 'DE', 'california', '11111', NULL, NULL),
(22, 'perdia_de', 'Muster@Muster.Muster', '$2y$10$Dk6gyIsZIHoM.W6RJiFCBen2FU9q1fM6YUHNYG7auzn7mzqyTp7Lq', 'OnMTvOcWUOZB5YsLzTOieqIN6HSH7Gh4i88NbqedRGQ5W2IT1wQiVZDoNYLJ', NULL, '2018-06-25 03:38:00', NULL, 'Muster', 'Muster', 'Muster', '', 'City', NULL, 'AX', 'california', '11111', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_lines`
--
ALTER TABLE `cart_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_session`
--
ALTER TABLE `cart_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_links`
--
ALTER TABLE `referral_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `cart_lines`
--
ALTER TABLE `cart_lines`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `cart_session`
--
ALTER TABLE `cart_session`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `referral_links`
--
ALTER TABLE `referral_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
