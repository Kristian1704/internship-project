-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 07:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_paga`
--

-- --------------------------------------------------------

--
-- Table structure for table `off_days`
--

CREATE TABLE `off_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `off_days`
--

INSERT INTO `off_days` (`id`, `date`) VALUES
(1, '2022-01-01'),
(2, '2022-01-02'),
(3, '2022-01-12'),
(4, '2022-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `total_paga` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `total_paga`, `created_at`) VALUES
(1, 'Eduart Torba', '40000', '2022-01-21 15:00:00'),
(2, 'Ergys Meda', '190000', '2022-01-21 15:00:00'),
(3, 'Test User 3', '60000', '2022-01-21 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hours` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `user_id`, `date`, `hours`) VALUES
(1, 1, '2022-01-11', '9'),
(2, 2, '2022-01-11', '10'),
(3, 3, '2022-01-11', '5'),
(4, 1, '2022-01-12', '9'),
(5, 2, '2022-01-12', '10'),
(6, 3, '2022-01-12', '5'),
(7, 1, '2022-01-09', '4'),
(8, 2, '2022-01-09', '8'),
(9, 3, '2022-01-09', '10'),
(10, 1, '2022-01-08', '10'),
(11, 2, '2022-01-08', '9'),
(12, 3, '2022-01-08', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `off_days`
--
ALTER TABLE `off_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `off_days`
--
ALTER TABLE `off_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
