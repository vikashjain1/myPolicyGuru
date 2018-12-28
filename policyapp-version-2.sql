-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 08:04 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `policyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy_type` varchar(255) NOT NULL,
  `carrier` varchar(255) NOT NULL,
  `policy_number` varchar(255) NOT NULL,
  `expiration_date` date NOT NULL,
  `effective_date` date NOT NULL,
  `policy_premium` int(11) NOT NULL,
  `policy_path` varchar(255) NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `policy_type`, `carrier`, `policy_number`, `expiration_date`, `effective_date`, `policy_premium`, `policy_path`, `published`, `created`, `modified`) VALUES
(13, 1, 'Auto,Home Owner,Renter', 'brave', '92992', '2018-12-10', '2018-12-29', 22244, '', 0, '2018-12-24 13:33:37', '2018-12-24 13:48:58'),
(14, 1, 'Home Owner', 'good', '92992', '2018-12-28', '2018-12-25', 2323323, '1545658448.jpg', 0, '2018-12-24 13:34:08', '2018-12-24 13:34:08'),
(15, 1, 'Home Owner', 'good', '92992', '2018-12-05', '2018-12-14', 434344, '', 0, '2018-12-24 13:36:38', '2018-12-24 13:36:38'),
(16, 1, 'Home Owner', 'good', '92992', '2018-12-12', '2018-12-15', 4343434, '1545658622.jpg', 0, '2018-12-24 13:37:02', '2018-12-24 13:37:02'),
(17, 3, 'Home Owner', 'fool', '5555588', '2018-12-04', '2018-12-08', 3333, '', 0, '2018-12-24 15:00:28', '2018-12-24 15:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE `articles_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `policy_id` int(255) NOT NULL,
  `carrier` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `policy_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `expiration_date` date NOT NULL,
  `effective_date` date NOT NULL,
  `policy_premium` int(11) NOT NULL,
  `policy_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `user_id`, `policy_id`, `carrier`, `policy_number`, `expiration_date`, `effective_date`, `policy_premium`, `policy_path`, `published`, `created`, `modified`) VALUES
(1, 1, 0, '', '', '0000-00-00', '0000-00-00', 0, '', 1, '2018-12-18 21:29:20', '2018-12-18 16:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `user_id` int(11) NOT NULL,
  `policy_type` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `carrier` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `policy_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `expiration_date` date NOT NULL,
  `effective_date` date NOT NULL,
  `policy_premium` int(11) NOT NULL,
  `policy_path` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`user_id`, `policy_type`, `carrier`, `policy_number`, `expiration_date`, `effective_date`, `policy_premium`, `policy_path`, `published`, `created`, `modified`, `id`) VALUES
(1, 'Home Owner,Renter', 'carrie22', '777882', '2018-12-30', '2018-12-31', 90907782, '', 0, '2018-12-28 06:48:59', '2018-12-28 06:52:52', 1),
(1, 'Home Owner,Renter', 'carrier3', '55555', '2018-12-29', '2018-12-02', 33333, '1545979764.jpg', 0, '2018-12-28 06:49:24', '2018-12-28 06:49:24', 2),
(1, 'Auto', 'jaidev carrier', '7676723', '2018-12-31', '2018-12-01', 6277272, '1545979798.jpg', 0, '2018-12-28 06:49:58', '2018-12-28 06:49:58', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(14) UNSIGNED NOT NULL,
  `user_id` int(14) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `title`, `content`, `tags`, `author`, `created`, `modified`) VALUES
(1, 0, 'My topic title', 'the content of my topic her .the content of my topic her .the content of my topic her .the content of my topic her .the content of my topic her .', 'topic,new', 'auther name her', '2016-08-15 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'first bite in cakephp', 'Learn how to make crud in cakephp .', 'cakephp,first', 'cakephp develpoer', '2016-08-15 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `how_many_homes` int(11) NOT NULL,
  `how_many_cars` int(11) NOT NULL,
  `boat_exists` tinyint(4) NOT NULL COMMENT '0 means no 1 means yes',
  `how_many_children` int(11) NOT NULL,
  `small_business_exists` int(11) NOT NULL COMMENT ' 0 means no 1 means yes ',
  `business_name` varchar(255) NOT NULL,
  `married` tinyint(4) NOT NULL COMMENT '0 means no 1 means yes',
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `request_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `account_type`, `address`, `city`, `state`, `zip`, `how_many_homes`, `how_many_cars`, `boat_exists`, `how_many_children`, `small_business_exists`, `business_name`, `married`, `phone`, `password`, `status`, `request_date`, `created_at`, `modified_at`) VALUES
(1, 'Rishi Kapoor', 'rishi@test.com', 'business', 'sect4012', 'lko1', 'hary', '122001', 2, 2, 0, 2, 0, 'japu', 0, '', '$2y$10$xjzItDbKNjt4GnarNt/n5OD1lDiZXvIZJG9oJ/0zq6Oer.HZzhyf2', 0, NULL, '0000-00-00 00:00:00', '2018-12-28 06:32:38'),
(2, 'Vikash', 'vikash@test.com', 'individual', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu', 1, '', '$2y$10$JaVaMUnNRX60rejeVr4K1ON5ZyRhTq5uMBcLcYnkzHkYvdhH7SO8O', 0, NULL, '0000-00-00 00:00:00', '2018-12-24 14:07:31'),
(3, 'raj kumar', 'raj@test.com', 'business', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu new', 0, '', '$2y$10$TxR/S/4XOvTPuSglCaI72enw7ZWBVuhtGW9A3i8mv9cpDKZ6hNpsq', 0, NULL, '0000-00-00 00:00:00', '2018-12-24 15:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `article_key` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `tag_key` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
