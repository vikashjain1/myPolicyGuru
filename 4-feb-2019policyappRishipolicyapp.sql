-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 11:56 AM
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
-- Table structure for table `agents_users`
--

CREATE TABLE `agents_users` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0 means  response not send 1 response send',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents_users`
--

INSERT INTO `agents_users` (`id`, `agent_id`, `user_id`, `status`, `created`, `modified`) VALUES
(4, 10, 13, 0, '2019-01-25 18:56:58', '2019-01-25 18:56:58'),
(5, 10, 14, 0, '2019-01-26 11:48:16', '2019-01-26 11:48:16'),
(6, 10, 15, 0, '2019-01-26 12:01:41', '2019-01-26 12:01:41'),
(7, 10, 16, 0, '2019-01-26 12:06:11', '2019-01-26 12:06:11'),
(8, 10, 17, 0, '2019-01-26 12:40:12', '2019-01-26 12:40:12'),
(9, 10, 18, 0, '2019-01-26 15:15:21', '2019-01-26 15:15:21');

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
(8, 1, 'Good', 'Good one', 1, '2019-01-25 07:49:11', '2019-01-25 07:49:11');

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
(9, 8, 1, 0, '2019-01-25 07:49:32', '2019-02-03 10:29:02'),
(10, 8, 20, 1, '2019-01-26 15:22:41', '2019-01-26 15:22:41');

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
(4, 8, 1, 'Post response', 1, '2019-01-25 07:49:22', '2019-01-25 07:49:22'),
(5, 8, 20, 'nice', 1, '2019-01-26 15:22:35', '2019-01-26 15:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
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
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `user_id`, `policy_type`, `carrier`, `policy_number`, `expiration_date`, `effective_date`, `policy_premium`, `policy_path`, `beneficiaries`, `coverage_amount`, `status`, `created`, `modified`) VALUES
(1, 1, '4,7', 'carrie22', '777882', '2018-12-30', '2018-12-31', 90907782, '', '', NULL, 0, '2018-12-28 06:48:59', '2019-01-13 12:34:59'),
(2, 1, '2', 'carrier345', '55555', '2018-12-29', '2018-12-02', 33333, '', '', NULL, 0, '2018-12-28 06:49:24', '2019-02-02 19:27:34'),
(3, 1, '2', 'jaidev carrier', '7676723', '2018-12-31', '2018-12-01', 6277272, '', NULL, NULL, 0, '2018-12-28 06:49:58', '2019-02-04 10:36:50'),
(4, 1, '2,4,7', 'catrr77', '822929', '2018-12-10', '2018-12-19', 9292992, '', 'Test Beneficiary', NULL, 0, '2018-12-28 16:04:17', '2019-01-13 12:05:01'),
(5, 1, '2', 'sdsdsd777', '55555', '2019-02-22', '2019-02-23', 33333, '', NULL, NULL, 1, '2019-02-03 13:58:28', '2019-02-03 14:26:16'),
(6, 1, '2', 'jaducarr444', '55555', '2019-02-25', '2019-02-27', 33333, '1549277002.jpg', NULL, NULL, 1, '2019-02-04 10:43:22', '2019-02-04 10:43:22'),
(7, 1, '2', 'jaducarr444', '55555', '2019-02-25', '2019-02-27', 33333, '1549277333.jpg', NULL, NULL, 1, '2019-02-04 10:48:53', '2019-02-04 10:48:53'),
(8, 1, '2', 'sdsdsd3333', '55555', '2019-02-24', '2019-02-23', 33333, '', NULL, NULL, 1, '2019-02-04 10:51:42', '2019-02-04 10:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `policies_auto`
--

CREATE TABLE `policies_auto` (
  `id` int(11) NOT NULL,
  `policy_id` int(11) DEFAULT NULL,
  `covered_items` varchar(255) DEFAULT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `comp_deduct` varchar(255) NOT NULL,
  `medical_pip` varchar(255) NOT NULL,
  `liability_limit` varchar(255) NOT NULL,
  `motor_limits` varchar(255) NOT NULL,
  `tow_limits` varchar(255) NOT NULL,
  `full_cost_replace` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 means no 1 means yes',
  `gap_or_lease` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 means no 1 means yes',
  `accident_forgive` tinyint(4) DEFAULT '0' COMMENT '0 means no 1 means yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies_auto`
--

INSERT INTO `policies_auto` (`id`, `policy_id`, `covered_items`, `make`, `model`, `license_plate`, `vin`, `comp_deduct`, `medical_pip`, `liability_limit`, `motor_limits`, `tow_limits`, `full_cost_replace`, `gap_or_lease`, `accident_forgive`) VALUES
(6, 2, 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 0, 0, 0),
(7, 2, 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 0, 0, 0),
(8, 2, 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 'carrier345', 0, 0, 0),
(15, 5, 'cover1', 'make1', 'model1', 'lic33 plater', 'cin', 'compreh', 'medicpip', 'lian', 'unisu22', 'towin', 1, 1, 0),
(16, 5, 'items23', 'mak33', 'model aug', 'liceb55', 'vin2', 'carrier34522', 'medicpip', 'carrier345liability limi22', 'unisu22', 'towin44', 1, 1, 0),
(47, 3, 'jaidev carrier full 2 first', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 'jaidev carrier', 1, 0, 0),
(48, 3, 'cover gap', 'make', 'model', 'liceb', 'vin', 'compreh', 'medicpip', 'lian', 'unisu', 'towin', 0, 1, 0),
(49, 3, 'carrier345', 'make1', 'jaidev carrier', 'lic33 plater', 'carrier345', 'compreh', 'medicpip', 'lian', '99999', '7777', 1, 1, 1),
(50, 3, '', '', '', '', '', '', '', '', '', '', 0, 0, 0),
(51, 6, 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 1, 1, 1),
(52, 6, 'jaducarr444', '', '', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', '', '', '', 0, 0, 1),
(53, 7, 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', 1, 1, 1),
(54, 7, 'jaducarr444', '', '', 'jaducarr444', 'jaducarr444', 'jaducarr444', 'jaducarr444', '', '', '', 0, 0, 1),
(57, 8, 'carrier345', 'jaidev carrier', 'carrier345', 'jaidev carrier', '333dsdsdsdsd', 'jaidev carrier', '333', '', 'unisu2233', '33', 1, 1, 1),
(58, 8, 'carrier345', '', '', 'lice2', '', 'jaducarr444', '', '', 'unisu3332323', '', 0, 0, 1),
(59, 8, '', '', 'model889', '', '', '', '', 'liab77', '', '', 1, 1, 1);

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
  `user_type_code` varchar(50) DEFAULT 'NORMAL',
  `name` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
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
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_code`, `name`, `first_name`, `last_name`, `email`, `account_type`, `address`, `city`, `state`, `zip`, `how_many_homes`, `how_many_cars`, `boat_exists`, `how_many_children`, `small_business_exists`, `business_name`, `married`, `phone`, `password`, `status`, `request_date`, `created`, `modified`) VALUES
(1, 'NORMAL', 'Rishi Kapoor good', 'first name goof', 'boy here gg', 'rishi@test.com', 'user', 'sect4012', 'lko1', 'hary11', '122001', 2, 2, 0, 2, 0, 'japu', 0, '', '$2y$10$PyicJt3776qCuIKjEKY2/OXvaPRkvTH8P8KzioGLnJ/IB5Gq2T/E2', 0, NULL, '0000-00-00 00:00:00', '2019-02-02 15:40:56'),
(2, 'NORMAL', 'Vikash', '', '', 'vikajjjsh@test.com', 'individual', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu', 1, '', '$2y$10$JaVaMUnNRX60rejeVr4K1ON5ZyRhTq5uMBcLcYnkzHkYvdhH7SO8O', 0, NULL, '0000-00-00 00:00:00', '2019-01-01 10:09:16'),
(3, 'AGENT', 'raj kumar', '', '', 'raj@test.com', 'business', 'sect40', 'lko', 'hary', '122001', 2, 2, 1, 2, 1, 'japu new', 0, '', '$2y$10$TxR/S/4XOvTPuSglCaI72enw7ZWBVuhtGW9A3i8mv9cpDKZ6hNpsq', 0, NULL, '0000-00-00 00:00:00', '2019-01-25 12:35:31'),
(5, 'NORMAL', '', '', '', 'rish1i@test.com', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$UU44uaPsc7PG/QwSrfYdJO1uKomgtuNXkRK7BjiwpSsMgzTQiSmwq', 0, NULL, '0000-00-00 00:00:00', '2019-01-06 13:59:07'),
(6, 'NORMAL', '', '', '', 'vikash@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$vnSb7f6Ya59Kn4cYA.tjPOyqR9YlwNzAAXJ1vSS/skV6MYXlvJXHS', 0, NULL, '2019-01-24 11:36:10', '2019-01-24 11:36:10'),
(7, 'AGENT', '', '', '', 'rishi@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$LFQhpXBvJ7FxvB4juISNJuaGdETvwBOmeCCkCiffvw3vckoQ0y7E.', 0, NULL, '2019-01-24 11:40:29', '2019-01-25 12:35:13'),
(10, 'AGENT', 'rohit yadav new', 'agent first rohit ', 'boy good', 'rohit@agent.com', 'individual', 'sect40', 'lko', 'hary', '122001', 3, 3, 0, 3, 0, 'japu', 0, '', '$2y$10$HIyyaZcZNdhl1UC4kuRk1OKCf0pARBAOrWcGZnvyfw8zaf5dTaN9q', 0, NULL, '2019-01-24 11:59:50', '2019-01-31 10:36:51'),
(11, 'AGENT', '', '', '', 'jaidev@agent.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$Wp8vJ6SyB17hzxVKE/DYceozT0yQ8722Fa/cdcbqzc1SC5fjwqTD6', 0, NULL, '2019-01-24 12:01:31', '2019-01-25 12:34:50'),
(13, 'NORMAL', 'rajesh new ', 'rajesh good', 'boy', 'firs22tuser@cust.com', '', 'sect40', 'lko', 'hary', '122001', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$2widfjIsN6X3Why4FeXHFudIxMxajdUL5gdDZ2sIiav50nDczai22', 0, NULL, '2019-01-25 18:56:58', '2019-01-31 10:43:41'),
(14, 'NORMAL', 'rishi new', 'aaacscxccxc', 'ddsasasa', 'rishicustagent@test.com', '', 'sect40', 'lko', 'hary', '122001', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$OAygotrpdlxLweumUmZXq.nYE1f/9LqwGp/ETA8a1Zi3X.XDsxzOO', 0, NULL, '2019-01-26 11:48:16', '2019-01-31 10:48:57'),
(15, 'NORMAL', 'jai', 'sasasas', 'aasasasa', 'jai@test.com', '', 'sect56', 'lko', 'up', '77382828', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$/sxKnWo9aFls/1VkrdR.0.NAcgRJX/vaUM3iaMEKBi6TpmWCb7G3u', 0, NULL, '2019-01-26 12:01:41', '2019-01-31 10:47:05'),
(16, 'NORMAL', 'jai cust new shri agent', 'aaaaa', 'aaaaa', 'polo@yetet.com', '', 'sect56', 'lko', 'up', '77382828', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$Wa/PxW5g35ciRIi4k1yIGONYZSwQ8cUscFdaaOmq2fD/TLQBaUxv2', 0, NULL, '2019-01-26 12:06:11', '2019-01-31 10:47:12'),
(17, 'NORMAL', 'myboy', '', '', 'kakakka@test.com', '', 'sect667', 'gutggag', 'up east', '77737373', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$1gwEuHuE0KOQj3rFWr1KmuMgRwymgDisv7TulOh2Kjlby2eEG.JSK', 0, NULL, '2019-01-26 12:40:12', '2019-01-26 12:40:12'),
(18, 'NORMAL', 'jaipal sen gupta', '', '', 'jaipal@test.com', '', 'sec 67', 'lko', 'harynan', '292020', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$SZEYqg/ZkUbGdxAYYE1mrOhZjdWmfmr/CgJp4key5BK8tAKMac.J2', 0, NULL, '2019-01-26 15:15:21', '2019-01-26 15:15:38'),
(19, 'AGENT', '', '', '', 'jaipal@aganet.com', 'agent', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$x9ckwXCYmBxFKt4nYJJIJ./KsYnfxVnUJmiqWCxTbSp3/bQJTTY9i', 0, NULL, '2019-01-26 15:19:28', '2019-01-26 15:19:28'),
(20, 'NORMAL', '', '', '', 'pk@test.com', 'user', '', '', '', '', 0, 0, 0, 0, 0, '', 0, '', '$2y$10$qbi3PngR14tLaljoDoezGu8kni8.5oM6aeVGVcrFR8TNAuYMwN1nS', 0, NULL, '2019-01-26 15:20:23', '2019-01-26 15:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL,
  `controller_name` varchar(50) DEFAULT NULL,
  `action_name` varchar(50) DEFAULT NULL,
  `user_type_code` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 means dontallow 1 means allow'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `controller_name`, `action_name`, `user_type_code`, `status`) VALUES
(1, 'AgentsController', 'dashboard', 'AGENT', 1),
(2, 'AgentsController', 'viewUser', 'AGENT', 1),
(3, 'AgentsController', 'edit', 'AGENT', 1),
(4, 'AgentsController', 'logout', 'AGENT', 1),
(5, 'AgentsController', 'addUser', 'AGENT', 1),
(6, 'AgentsController', 'editUser', 'AGENT', 1),
(7, 'CommunitiesController', 'add', 'NORMAL', 1),
(8, 'CommunitiesController', 'response', 'NORMAL', 1),
(9, 'CommunitiesController', 'view', 'NORMAL', 1),
(10, 'CommunitiesController', 'yourPost', 'NORMAL', 1),
(11, 'CommunitiesController', 'yourResponses', 'NORMAL', 1),
(12, 'CommunitiesController', 'yourLikes', 'NORMAL', 1),
(13, 'CommunitiesController', 'allresponse', 'NORMAL', 1),
(14, 'CommunitiesController', 'addlike', 'NORMAL', 1),
(15, 'CommunitiesController', 'addresponse', 'NORMAL', 1),
(16, 'UsersController', 'add', 'NORMAL', 1),
(17, 'UsersController', 'dashboard', 'NORMAL', 1),
(18, 'UsersController', 'logout', 'NORMAL', 1),
(19, 'UsersController', 'index', 'NORMAL', 1),
(20, 'UsersController', 'view', 'NORMAL', 1),
(21, 'UsersController', 'delete', 'NORMAL', 1),
(22, 'UsersController', 'edit', 'NORMAL', 1),
(23, 'PoliciesController', 'edit', 'NORMAL', 1),
(24, 'PoliciesController', 'index', 'NORMAL', 1),
(25, 'PoliciesController', 'download', 'NORMAL', 1),
(26, 'PoliciesController', 'view', 'NORMAL', 1),
(27, 'PoliciesController', 'addtest', 'NORMAL', 1),
(31, 'ClaimsController', 'view', 'NORMAL', 1),
(32, 'ClaimsController', 'add', 'NORMAL', 1),
(33, 'ClaimsController', 'edit', 'NORMAL', 1),
(34, 'ClaimsController', 'download', 'NORMAL', 1),
(35, 'UsersController', 'changepwd', 'NORMAL', 1),
(36, 'PoliciesController', 'list', 'NORMAL', 1),
(37, 'PoliciesController', 'add', 'NORMAL', 1),
(38, 'PoliciesController', 'addautovehicles', 'NORMAL', 1);

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
(3, 'System Admin', 'SYSADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents_users`
--
ALTER TABLE `agents_users`
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
-- Indexes for table `policies_auto`
--
ALTER TABLE `policies_auto`
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
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
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
-- AUTO_INCREMENT for table `agents_users`
--
ALTER TABLE `agents_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `communities_likes`
--
ALTER TABLE `communities_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `communities_responses`
--
ALTER TABLE `communities_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `policies_auto`
--
ALTER TABLE `policies_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `policy_types`
--
ALTER TABLE `policy_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
