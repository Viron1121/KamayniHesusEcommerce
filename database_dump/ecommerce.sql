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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `canceledorders`
--

CREATE TABLE `canceledorders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `cancelreason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canceledorders`
--

INSERT INTO `canceledorders` (`id`, `fullname`, `address`, `number`, `price`, `product`, `quantity`, `cancelreason`) VALUES
(242, 'Jhonas Ramirez', 'Lucban', '09102256494', '30php', 'Rosarie 3pcs', '4', 'may mas mura e'),
(243, 'Viron Navarro', 'Aplaya', '09102256494', '300php', 'Carve Hesus', '', ' ala i ampogi ko talaga'),
(244, 'Jhonas Ramirez', 'Lucban', '09093866217', '100php', 'Jesus Cross plastic', '2', ' ampangit');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product`, `price`, `quantity`, `fullname`) VALUES
(37, 'Carve Hesus', '300php', NULL, 'Viron Navarro');

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`id`, `product`, `quantity`, `fullname`, `number`, `address`, `price`, `date`) VALUES
(2340, 'Mary on hand', '', 'Jhonas Ramirez', '09102256494', 'Lucban', '400php', '2022-02-11 01:28:42'),
(2341, 'Santo nino', '', 'Jhonas Ramirez', '09102256494', 'Lucban', '400php', '2022-02-12 05:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `miamore`
--

CREATE TABLE `miamore` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miamore`
--

INSERT INTO `miamore` (`id`, `description`, `price`, `product`, `img`) VALUES
(1, 'ew', 'qwe', 'qw', '61f6a15d733294.95080704.png');

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `id` int(11) NOT NULL,
  `payment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_of_payment`
--

INSERT INTO `mode_of_payment` (`id`, `payment`) VALUES
(1, 'cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `packed`
--

CREATE TABLE `packed` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packed`
--

INSERT INTO `packed` (`id`, `address`, `fullname`, `number`, `product`, `price`, `quantity`, `payment`) VALUES
(27, 'Lucban', 'Jhonas Ramirez', '09102256494', 'Mary on hand', '400php', '2', '1'),
(28, 'Lucban', 'Jhonas Ramirez', '09102256494', 'Mary on hand', '400php', '3', '1'),
(29, 'Aplaya', 'Viron Navarro', '09102256494', 'Mary on hand', '400php', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `price`, `img`, `description`) VALUES
(34, 'Carve Hesus', '300php', '61ffcfec8752c8.01071370.jpg', 'This product is made of narra wood'),
(35, 'Mary on hand', '400php', '61ffd03a82ab08.01607778.jpg', 'Nakabalot sa pastik'),
(37, 'Santo nino', '400php', '61ffd10f6c1498.57325298.jpg', 'Santo nino nakabalot sa plastik'),
(41, 'Jesus Cross plastic', '100php', '6208fdf81f9f34.23407000.jpg', '6 inch'),
(47, 'Jhonas', '10k$', '62d1113befd9a6.46691823.jpg', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `recuerdos`
--

CREATE TABLE `recuerdos` (
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recuerdos`
--

INSERT INTO `recuerdos` (`product`, `price`, `quantity`, `number`, `address`, `fullname`, `id`, `payment`, `unique_id`) VALUES
('Carve Hesus', '300php', '1', '09093866217', 'Lucban', 'Jhonas Ramirez', 620, '1', '62d1106813423'),
('Carve Hesus', '300php', '3', '09093866217', 'Lucban', 'Jhonas Ramirez', 624, '1', '62d6c98e522cc'),
('Carve Hesus', '300php', '3', '09093866217', 'Lucban', 'Jhonas Ramirez', 625, '1', '62d6c9cb12769');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `usercomment` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `productname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `fullname`, `usercomment`, `date`, `productname`) VALUES
(164, 'Jhonas Ramirez', 'Gaano po ito kalaki?', '2022-04-06 05:39:15', 'Carve Hesus'),
(165, 'Viron Navarro', 'ampangit', '2022-07-15 01:49:24', 'Carve Hesus'),
(166, 'Jhonas Ramirez', 'anung plastik yan', '2022-07-15 07:04:03', 'Santo nino');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Offline now',
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `number`, `password`, `address`, `unique_id`, `fname`, `lname`, `status`, `user_type`) VALUES
(51, 'Jashmer Parinas', '09556641757', '$2y$10$.ETfJ6HZ3yp82E4Hv.J7h.9KqPZlW0qeMbnzRdgyJvB1k5/.gB/xK', 'Pinagbayanan', '62ceb28716eba', 'Jashmer', 'Parinas', 'Offline now', 1),
(52, 'Jhonas Ramirez', '09093866217', '$2y$10$gtw3/nzKymcH.uwpyPsGk.pYxJA/3hw9DZfBBHV2pAgkzif55kBCu', 'Lucban', '62d1103b53df8', 'Jhonas', 'Ramirez', 'Offline now', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'client'),
(2, 'admin'),
(3, 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canceledorders`
--
ALTER TABLE `canceledorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miamore`
--
ALTER TABLE `miamore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packed`
--
ALTER TABLE `packed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recuerdos`
--
ALTER TABLE `recuerdos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `canceledorders`
--
ALTER TABLE `canceledorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2344;

--
-- AUTO_INCREMENT for table `miamore`
--
ALTER TABLE `miamore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packed`
--
ALTER TABLE `packed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `recuerdos`
--
ALTER TABLE `recuerdos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
