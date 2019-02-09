-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 08:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostnfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(45) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `example` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(45) NOT NULL,
  `modified_by` int(45) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `missing_items`
--

CREATE TABLE `missing_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `place` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `product_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `product_code`, `user_id`, `product_picture`) VALUES
(10, 'Bag', 'this a colorful bag ', '5b7e52031af87', 15, NULL),
(11, 'laptop', 'Blue color laptop', '5b8ff85251cb9', 17, NULL),
(12, 'Bag', 'this my koliger bag', '5b9015a305de7', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `password`, `mobile_number`, `address`, `zip_code`, `city`, `district`, `status`, `created`, `created_by`, `modified`, `modified_by`, `deleted_at`, `profile_picture`) VALUES
(12, 14, 'atikur ', 'rhaman', '81dc9bdb52d04dc20036dbd8313ed0', '01648804468', 'hello', '1212', 'Dhaka', 'Dhaka', 0, '0000-00-00 00:00:00', 0, '2018-08-23 08:16:01', 0, '2018-08-23 06:16:07', ''),
(13, 15, 'Khirul ', 'Islam', 'd93591bdf7860e1e4ee2fca7999112', '01648804468', 'Hello', '1212', 'Dhaka', 'Dhaka', 0, '0000-00-00 00:00:00', 0, '2018-08-23 08:13:33', 0, '2018-08-23 06:14:39', ''),
(15, 17, 'Atikur', 'Rhaman', '81dc9bdb52d04dc20036dbd8313ed0', '01684404468', 'Dhaka, Bangladesh', '1212', 'Dhaka', 'Dhaka', 0, '0000-00-00 00:00:00', 0, '2018-09-05 17:43:36', 0, '2018-09-05 15:44:43', ''),
(16, 18, 'trishna', 'mondol', '81dc9bdb52d04dc20036dbd8313ed0', '01684404469', 'N.gong', '1203', 'Dhaka', 'Dhaka', 0, '0000-00-00 00:00:00', 0, '2018-09-05 19:41:21', 0, '2018-09-05 17:41:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) UNSIGNED NOT NULL,
  `username` varchar(63) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_block` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created`, `created_by`, `modified`, `modified_by`, `is_block`) VALUES
(14, 'anikcsejnu', 'anikcsejnu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2018-08-22 19:42:26', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'Badol', 'badoljnu@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 0, '2018-08-22 19:44:16', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'mahadi', 'mahadijnu@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', 0, '2018-08-22 19:44:58', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'anik', 'anikraju110@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2018-09-05 17:36:49', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'trishna', 'trishna@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2018-09-05 19:40:41', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_suggestions`
--

CREATE TABLE `user_suggestions` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_suggestions`
--

INSERT INTO `user_suggestions` (`id`, `msg`) VALUES
(4, ' adadadfa'),
(5, ' fadadada'),
(7, ' gsgfvsafdfaaaaaaaaaaaaaaaaaaaaaa'),
(8, ' sgfsgvfsgggggggggggggggggggggggg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_items`
--
ALTER TABLE `missing_items`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_suggestions`
--
ALTER TABLE `user_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missing_items`
--
ALTER TABLE `missing_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_suggestions`
--
ALTER TABLE `user_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
