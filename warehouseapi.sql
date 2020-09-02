-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 07:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouseapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(20) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_secret` varchar(200) NOT NULL,
  `redirect_url` varchar(2000) NOT NULL,
  `grant_types` varchar(255) NOT NULL,
  `scopes` varchar(2000) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`cat_id`, `cat_name`, `cat_time`) VALUES
(1, 'Electronics', '2020-08-25 15:53:49'),
(2, 'Kitchen', '2020-08-25 15:54:05'),
(3, 'Garden', '2020-08-25 15:55:01'),
(4, 'Hardware', '2020-08-25 15:55:01'),
(12, 'Postman', '2020-08-30 17:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(12) NOT NULL,
  `quantity` int(12) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `updatedon` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `cat_id`, `description`, `price`, `quantity`, `stock`, `updatedon`, `date`) VALUES
(1, 'test', 1, 'testing', '14', 2, '2', '2020-08-27 20:23:48', '0000-00-00'),
(2, 'test', 4, 'testing for issue', '14', 21, '21', '2020-08-30 12:21:48', '0000-00-00'),
(3, 'test', 3, 'testing', '14', 2, '2', '2020-08-30 12:21:04', '0000-00-00'),
(9, 'shomu', 4, 'sadasdsaddsfsdfdsf dsfssssssssssssssssssssssssssssssssssss dsfffffffffffffffffffffffffffffffffffffffffffffffff sdfffffffffffffffffffffffffffffffffffff', '2', 3, '3', '2020-08-30 13:17:11', '0000-00-00'),
(11, 'pooja', 2, 'asdsadsadwqqbbbbbbbbbbbbbbbbb', '21', 5, '5', '2020-08-30 15:56:38', '0000-00-00'),
(12, 'testing', 1, 'absbsbs', '4', 4, '4', '2020-08-30 15:54:16', '0000-00-00'),
(14, 'testing14', 1, 'sdss', '3', 3, '', '2020-09-02 18:41:46', '0000-00-00'),
(17, 'kaushal', 1, '1234567890', '4', 2, '3', '2020-09-01 18:19:38', '0000-00-00'),
(18, 'Pooja1', 1, 'postman', '5', 2, '32', '2020-09-02 18:10:13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `last_login`, `created_at`, `updated_at`) VALUES
(2, 'pooja', 'd34391f458e3b213066cd0a99eb2e1dd', 'Pooja', '2020-09-02 16:49:36', '2020-09-01 18:27:39', '2020-09-01 18:27:39'),
(3, 'Tejsee', '0d472aca56c20255c37e0aac0b3a1d2b', 'Tejsee', '2020-09-02 16:11:50', '2020-09-02 16:11:50', '2020-09-02 16:11:50'),
(4, 'Tejsee', '0d472aca56c20255c37e0aac0b3a1d2b', 'Tejsee', '2020-09-02 16:12:03', '2020-09-02 16:12:03', '2020-09-02 16:12:03'),
(6, 'Kaushal', '3abd02d45a9cc80414d1c2a7a9b664da', 'pooja1', '2020-09-02 16:21:34', '2020-09-02 16:21:34', '2020-09-02 17:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_authentication`
--

CREATE TABLE `users_authentication` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `token` varchar(150) NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_authentication`
--

INSERT INTO `users_authentication` (`id`, `users_id`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, '38bc6ff', '2020-09-02 05:48:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'cde7367', '2020-09-02 05:48:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'f7d8e65', '2020-09-02 05:59:26', '2020-09-01 15:59:26', '0000-00-00 00:00:00'),
(4, 1, '79e5b61', '2020-09-02 06:23:27', '2020-09-01 16:23:27', '0000-00-00 00:00:00'),
(5, 1, 'd378ac6', '2020-09-02 06:29:01', '2020-09-01 16:29:01', '0000-00-00 00:00:00'),
(6, 2, '5c2eddc', '2020-09-02 06:29:36', '2020-09-01 16:29:37', '0000-00-00 00:00:00'),
(7, 2, '198f821', '2020-09-02 06:34:34', '2020-09-01 16:34:35', '0000-00-00 00:00:00'),
(8, 2, '33a0a40', '2020-09-03 02:18:29', '2020-09-02 12:18:29', '0000-00-00 00:00:00'),
(10, 2, 'a462acb', '2020-09-03 06:33:38', '2020-09-02 16:33:38', '2020-09-02 18:33:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_authentication`
--
ALTER TABLE `users_authentication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_authentication`
--
ALTER TABLE `users_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `productcategory` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
