-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 09:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_signup`
--

CREATE TABLE `admin_signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`id`, `username`, `email`, `password`) VALUES
(1, 'moiz', 'moiz@gmail.com', '$2y$10$a1EtMJWIUY1b9dkbWCkvkecI98IxWMjGGecN8u4RfxR8d4DtL20Bi'),
(2, 'ali', 'ali@gmail.com', '$2y$10$ZA6bCXc0Plp1sAtrpe3os.X2kVBNmHgU9fhGT1QBdrHZPpsH7lu1.'),
(3, 'ebad', 'ebad@gmail.com', '$2y$10$mxv3gE8T.2XAWAuBOGpKQeZ1ylx51QOcNvICW0Pi0verfcSUSj4YK'),
(4, 'haris', 'haris@gmail.com', '$2y$10$py9KAo09/hKeW.Hxjc3OXut3Ff8VaBK8vlskQcCEFafm7tIslp4Q6'),
(5, 'ahsan', 'ahsan@gmail.com', '$2y$10$CwcqF/..EqYW5CbYbpCBF.u9cUusRQ97ZFvUZbOsVvK7vgXo4rUTy'),
(6, 'basit', 'basit@gmail.com', '$2y$10$gYqqEUAnYQF3qAeZ5i25nuZD6QGYJBWa3BH8.I86Qv0FwxjsvO3L.'),
(7, 'owais', 'owais@gmail.com', '$2y$10$SPNnFwR/IbI/nsV0R59pQu7XXOCm.ljw1v.YFbhxozjMvn7etN.4m'),
(8, 'usman', 'usman', '$2y$10$vjgEoPPhgxrkrmZ/D48hxOV83VDsWrGKZnVL9P7QVzLwX/bypiv2q'),
(9, 'usman', 'usman@gmail.com', '$2y$10$5/S2VGUCEMM4huqe1Ms1AenqhHVf6gmnQ0T/QHMmDHBWQKe648/P6');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `cartqty` tinyint(20) NOT NULL,
  `cartsize` varchar(255) NOT NULL,
  `cartstatus` tinyint(1) NOT NULL DEFAULT 1,
  `cartdate` datetime NOT NULL DEFAULT current_timestamp(),
  `carttime` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `proid`, `cartqty`, `cartsize`, `cartstatus`, `cartdate`, `carttime`) VALUES
(1, 7, 2, 2, 'Medium', 1, '0000-00-00 00:00:00', '00:00:00'),
(2, 7, 1, 2, 'Medium', 1, '0000-00-00 00:00:00', '00:00:00'),
(3, 7, 6, 3, 'Medium', 1, '2023-10-22 23:35:21', '23:35:21'),
(4, 9, 2, 9, 'Medium', 1, '2023-10-23 00:02:07', '00:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `parent_cat`
--

CREATE TABLE `parent_cat` (
  `cid` int(11) NOT NULL,
  `pcat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_cat`
--

INSERT INTO `parent_cat` (`cid`, `pcat_name`) VALUES
(1, 'Tea'),
(2, 'Drinks'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `title`, `description`, `price`, `image`, `status`) VALUES
(1, 1, 'strong tea', 'A very strong tea with dry fruits', '300 ', 'drink-7.jpg', 1),
(2, 2, 'Lemon Juice', 'A Fresh Lemon Juice with chilled ice', '2.00$', 'drink-1.jpg', 1),
(3, 2, 'pineapple juice', 'A fresh pineapple juice', '12$', 'drink-3.jpg', 1),
(4, 2, 'lassi', 'A sweet lassi', '300 ', 'drink-4.jpg', 1),
(5, 1, 'sweet tea', 'A very strong tea with dry fruits', '300 ', 'drink-5.jpg', 1),
(6, 3, 'foods', 'A Fresh Lemon Juice with chilled ice', '300 ', 'drink-6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pcat_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_signup`
--
ALTER TABLE `admin_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `user_fk` (`userid`),
  ADD KEY `pro_fk` (`proid`);

--
-- Indexes for table `parent_cat`
--
ALTER TABLE `parent_cat`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk` (`category`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_fk` (`pcat_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_signup`
--
ALTER TABLE `admin_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_cat`
--
ALTER TABLE `parent_cat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `pro_fk` FOREIGN KEY (`proid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userid`) REFERENCES `admin_signup` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category`) REFERENCES `parent_cat` (`cid`);

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`pcat_name`) REFERENCES `parent_cat` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
