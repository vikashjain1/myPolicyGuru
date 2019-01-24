-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 01:28 PM
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
-- Table structure for table `agent_user_mapping`
--

CREATE TABLE `agent_user_mapping` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_user_mapping`
--

INSERT INTO `agent_user_mapping` (`id`, `agent_id`, `user_id`, `status`, `created`, `modified`) VALUES
(1, 1, 2, 1, '2019-01-16 12:59:26', NULL),
(2, 1, 3, 1, '2019-01-16 12:59:26', NULL),
(3, 1, 5, 1, '2019-01-16 12:59:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `claim_type` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `claim_number` int(11) NOT NULL,
  `loss_date` date NOT NULL,
  `policy_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `adjustor_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `adjustor_phone_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `adjustor_email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `claim_file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `user_id`, `claim_type`, `claim_number`, `loss_date`, `policy_number`, `adjustor_name`, `adjustor_phone_number`, `adjustor_email`, `claim_file`, `status`, `created`, `modified`) VALUES
(1, 1, '2', 0, '0000-00-00', '55555', '', '', '', NULL, 0, NULL, NULL),
(2, 1, '2,3', 123, '2019-01-16', '55555', 'asds', 'asd p', 'asd e', '', 0, NULL, '2019-01-16 08:13:14'),
(3, 1, '1', 1234, '1970-01-01', '55555111', 'asds', 'asd p', 'asd e', '1546692521.png', 0, NULL, NULL),
(4, 1, '1', 123, '1970-01-01', '55555', 'asds', 'asd p', 'asd e', '1546692776.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `claim_types`
--

CREATE TABLE `claim_types` (
  `id` int(11) NOT NULL,
  `claim_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_types`
--

INSERT INTO `claim_types` (`id`, `claim_name`) VALUES
(1, 'claim_name_1'),
(2, 'claim_name_2'),
(3, 'claim_name_3'),
(4, 'claim_name_4');

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `details` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`id`, `user_id`, `subject`, `details`, `status`, `created`, `modified`) VALUES
(1, 1, 'test subject', 'details 1', 0, NULL, NULL),
(2, 1, 'test subject', 'details 2', 0, NULL, NULL),
(3, 1, 'test subject', 'b            ', 0, NULL, NULL),
(4, 1, 'subject 1', 'details 4', 0, '2018-12-28 06:48:59', '2018-12-28 06:48:59'),
(5, 2, 'subject 2', 'details 5', 0, '2018-12-28 06:48:59', '2018-12-28 06:48:59'),
(6, 1, 'goo d by', 'goo d bygoo d bygoo d bygoo d by', 1, '2019-01-17 12:46:21', '2019-01-17 12:46:21'),
(7, 3, 'hua bhy raj', 'hua bhy raj', 1, '2019-01-19 09:08:28', '2019-01-19 09:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `communities_likes`
--

CREATE TABLE `communities_likes` (
  `id` int(11) NOT NULL,
  `community_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities_likes`
--

INSERT INTO `communities_likes` (`id`, `community_id`, `user_id`, `status`, `created`, `modified`) VALUES
(3, 1, 1, 1, '2019-01-18 14:50:43', '2019-01-18 15:42:11'),
(7, 6, 1, 1, '2019-01-19 09:02:33', '2019-01-19 09:02:33'),
(8, 6, 3, 1, '2019-01-19 09:04:46', '2019-01-19 09:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `communities_responses`
--

CREATE TABLE `communities_responses` (
  `id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities_responses`
--

INSERT INTO `communities_responses` (`id`, `community_id`, `user_id`, `response`, `status`, `created`, `modified`) VALUES
(1, 1, 1, 'good', 1, '2019-01-17 12:33:12', '2019-01-17 12:33:12'),
(2, 6, 3, 'good nahi very bad raj user', 1, '2019-01-19 09:07:27', '2019-01-19 09:07:27'),
(3, 1, 3, 'gabru raj', 1, '2019-01-19 09:07:54', '2019-01-19 09:07:54');

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
  `beneficiaries` varchar(255) DEFAULT NULL,
  `coverage_amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`user_id`, `policy_type`, `carrier`, `policy_number`, `expiration_date`, `effective_date`, `policy_premium`, `policy_path`, `beneficiaries`, `coverage_amount`, `status`, `created`, `modified`, `id`) VALUES
(1, '4,7', 'carrie22', '777882', '2018-12-30', '2018-12-31', 90907782, '', '', NULL, 0, '2018-12-28 06:48:59', '2019-01-13 12:34:59', 1),
(1, '4', 'carrier345', '55555', '2018-12-29', '2018-12-02', 33333, '', '', NULL, 0, '2018-12-28 06:49:24', '2019-01-16 08:13:26', 2),
(1, '1,4', 'jaidev carrier', '7676723', '2018-12-31', '2018-12-01', 6277272, '1546013018.jpg', NULL, NULL, 0, '2018-12-28 06:49:58', '2018-12-28 16:03:38', 3),
(1, '2,4,7', 'catrr77', '822929', '2018-12-10', '2018-12-19', 9292992, '', 'Test Beneficiary', NULL, 0, '2018-12-28 16:04:17', '2019-01-13 12:05:01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `policy_types`
--

CREATE TABLE `policy_types` (
  `id` int(11) NOT NULL,
  `policy_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy_types`
--

INSERT INTO `policy_types` (`id`, `policy_name`) VALUES
(1, 'Home Owner'),
(2, 'Auto'),
(3, 'Renter'),
(4, 'Life'),
(5, 'Boat'),
(6, 'Bike'),
(7, 'Liability/Umbrella'),
(8, 'Other');

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
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type_id` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `account_type`, `address`, `city`, `state`, `zip`, `how_many_homes`, `how_many_cars`, `boat_exists`, `how_many_children`, `small_business_exists`, `business_name`, `married`, `phone`, `password`, `status`, `request_date`, `created`, `modified`, `user_type_id`) VALUES
(1, 'Rishi Kapoor', 'rishi@test.com', 'business', 'sect4012', 'lko1', 'hary', '122001', 2, 2, 0, 2, 0, 'japu', 0, '', '$2y$10$xjzItDbKNjt4GnarNt/n5OD1lDiZXvIZJG9oJ/0zq6Oer.HZzhyf2', 0, NULL, '0000-00-00 00:00:00', '2018-12-28 06:32:38', 1),
(2, 'Vikash', 'vikajjjsh@test.com', 'individual', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu', 1, '', '$2y$10$JaVaMUnNRX60rejeVr4K1ON5ZyRhTq5uMBcLcYnkzHkYvdhH7SO8O', 0, NULL, '0000-00-00 00:00:00', '2019-01-01 10:09:16', 1),
(3, 'raj kumar', 'raj@test.com', 'business', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu new', 0, '', '$2y$10$TxR/S/4XOvTPuSglCaI72enw7ZWBVuhtGW9A3i8mv9cpDKZ6hNpsq', 0, NULL, '0000-00-00 00:00:00', '2019-01-22 12:59:47', 2),
(5, '', 'rish1i@test.com', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$UU44uaPsc7PG/QwSrfYdJO1uKomgtuNXkRK7BjiwpSsMgzTQiSmwq', 0, NULL, '0000-00-00 00:00:00', '2019-01-06 13:59:07', 1),
(6, '', 'vikash@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$vnSb7f6Ya59Kn4cYA.tjPOyqR9YlwNzAAXJ1vSS/skV6MYXlvJXHS', 0, NULL, '2019-01-24 11:36:10', '2019-01-24 11:36:10', 1),
(7, '', 'rishi@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$LFQhpXBvJ7FxvB4juISNJuaGdETvwBOmeCCkCiffvw3vckoQ0y7E.', 0, NULL, '2019-01-24 11:40:29', '2019-01-24 11:57:27', 2),
(10, '', 'rohit@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$HIyyaZcZNdhl1UC4kuRk1OKCf0pARBAOrWcGZnvyfw8zaf5dTaN9q', 0, NULL, '2019-01-24 11:59:50', '2019-01-24 11:59:50', 2),
(11, '', 'jaidev@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$Wp8vJ6SyB17hzxVKE/DYceozT0yQ8722Fa/cdcbqzc1SC5fjwqTD6', 0, NULL, '2019-01-24 12:01:31', '2019-01-24 12:01:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `code`) VALUES
(1, 'Normal', 'NORMAL'),
(2, 'Agent Type', 'AGENT'),
(3, 'Admin', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_user_mapping`
--
ALTER TABLE `agent_user_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim_types`
--
ALTER TABLE `claim_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communities_likes`
--
ALTER TABLE `communities_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communities_responses`
--
ALTER TABLE `communities_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_types`
--
ALTER TABLE `policy_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_user_mapping`
--
ALTER TABLE `agent_user_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `claim_types`
--
ALTER TABLE `claim_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `communities_likes`
--
ALTER TABLE `communities_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `communities_responses`
--
ALTER TABLE `communities_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `policy_types`
--
ALTER TABLE `policy_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
