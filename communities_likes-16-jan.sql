-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 02:37 PM
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
-- Table structure for table `communities_likes`
--

CREATE TABLE `communities_likes` (
  `id` int(11) NOT NULL,
  `community_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-unlike 1 liked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communities_likes`
--

INSERT INTO `communities_likes` (`id`, `community_id`, `user_id`, `status`) VALUES
(1, 11, 2, 0),
(2, 11, 1, 0),
(3, 11, 1, 0),
(4, 11, 1, 0),
(5, 8, 1, 0),
(6, 4, 1, 0),
(7, 1, 1, 0),
(8, 2, 1, 0),
(9, 1, 1, 0),
(10, 12, 1, 0),
(11, 5, 1, 1),
(12, 5, 1, 1),
(13, 5, 1, 1),
(14, 3, 1, 1),
(15, 6, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communities_likes`
--
ALTER TABLE `communities_likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communities_likes`
--
ALTER TABLE `communities_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
