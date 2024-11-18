-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 05:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incident_report_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1362401483, 702568592, 'aaa'),
(2, 702568592, 1362401483, 'mam'),
(3, 1362401483, 702568592, 'aaa'),
(4, 1064384437, 702568592, 'aaa'),
(5, 1064384437, 702568592, 'aaaa'),
(6, 702568592, 1499059328, 'aaa'),
(7, 422877227, 1499059328, 'aaaa'),
(8, 805808436, 702568592, 'bb mo'),
(9, 1309257541, 1541232237, 'oyy'),
(10, 1309257541, 1541232237, 'fesjusdf'),
(11, 410173855, 1541232237, 'hoyy'),
(12, 343863848, 1541232237, 'hoyy'),
(13, 1309257541, 1541232237, 'tanga'),
(14, 1541232237, 1309257541, 'bb'),
(15, 1541232237, 1309257541, 'tanga'),
(16, 1309257541, 198831435, 'dsa'),
(17, 1541232237, 822346927, 'hoy'),
(18, 1541232237, 822346927, 'tangina mo ba?'),
(19, 1541232237, 822346927, 'HAHAHAHAHA'),
(20, 198831435, 822346927, 'pabili longganisa'),
(21, 822346927, 198831435, 'wew'),
(22, 1541232237, 198831435, 'wew'),
(23, 1541232237, 198831435, 'fdsda'),
(24, 822346927, 198831435, 'wew'),
(25, 1541232237, 822346927, 'dw'),
(26, 1309257541, 822346927, 'dw'),
(27, 1309257541, 822346927, 'dw'),
(28, 198831435, 822346927, 'w'),
(29, 1541232237, 822346927, 'fssdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Offline now',
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `username`, `password`, `img`, `status`, `usertype`) VALUES
(17, 1309257541, 'Viron', 'Navarro', 'qwe', '$2y$10$9JvOmQ9kj/qA7tKG3ERBwe5e.510XaeZqHYk7OhW6qY6x.X0/m3YW', '1309257541-20220124151641.jpeg', 'Offline now', 'Admin'),
(18, 1541232237, 'Jashmer', 'parinas', 'qweqwe', '$2y$10$7CmyZUvDGPHB2N1DXkObBuaUGVHpxTS933KVQeoPFZqTEbRIMebxK', '1541232237-20220123042327.jpeg', 'Active now', 'Seller'),
(25, 822346927, 'Jhonas', 'Ramirez', 'admin', '$2y$10$GO3X5sHkm8hS.2IHarXNoeUmRvlQwZQseBKSTcrmCItUGR1LmsSMG', '1644477620duck.jpg', 'Active now', 'Admin'),
(26, 198831435, 'Seller', '1', 'seller', '$2y$10$gSZHBZXRFPwiFck0lkSEAOB2GpDuXS8FCED3g.IO9SUlUlwUkilFu', '198831435-20220715041347.png', 'Offline now', 'Seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
