-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `users_id` int(5) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `name_user` varchar(30) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `gender` int(3) DEFAULT NULL,
  `roles` int(3) DEFAULT NULL,
  `evaluator_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`users_id`, `username`, `password_user`, `name_user`, `job_title`, `address`, `no_telp`, `gender`, `roles`, `evaluator_id`) VALUES
(3, 'alfiziaulhaq', '$2y$10$Jt2cyn7juz2N97AUydRJgeaK6m2TEr9F7J/mcytgeYpbOtPATsrz6', 'ALFI ZIA ULHAQ', 'super admin', 'depok', '12345', 1, 3, NULL),
(4, 'staff1', '$2y$10$vAeTU21hXvmP9qaEWwumwehsdZAa57ImKvK0WNDk9d0e075kLvA/u', 'FULAN SATU', 'finance staff', 'pitara', '1234', 1, 1, 6),
(6, 'manager1', '$2y$10$yYRR89OEC/oHiiEOw2NYiu3SxDp8NvdjvwzX2LZvYgk8q0yUAYy2S', 'MANAGER SATU FULAN', 'finance manager', 'pancoran', '1234', 2, 2, NULL),
(7, 'manager2', '$2y$10$ctIsQM/ChvE06kj7hv16U.LBqmw/q8MV4XsKJSV2KlWEHnVGaTMXK', 'FULAN MANAGER DUA ', 'sales manager', 'pancoran', '1234', 1, 2, NULL),
(9, 'staff4', '$2y$10$u0KyiLlQ/b3SUjdiqvcsIerx2tpAGw1MzEX0AObKa4eJzjrRjxIrW', 'STAFF EMPAT', 'sales staff', 'sukmajaya', '09862', 1, 1, 7),
(10, 'staff2', '$2y$10$rPrKmqFybHuORHtkqKDwqeCBONCpI4e4Lp35z7N8o2bdiemFjz5jS', 'STAFF DUA', 'sales staff', 'depok', '012345', 2, 1, 7),
(12, 'staff5', '$2y$10$UZmv7YAi.5s5C1VyelO2b.dPdkkXEYkurgQUvrviGQ.LP3TBTHHJS', 'SETAF KELIMA', 'finance staff', 'margonda', '06534', 1, 1, 6),
(13, 'newadmin', '$2y$10$tkcjr4ECPkNwxtAOYiNo9u1H92V6kLjiYAyTXgIDre8nBnzE61TZO', 'NEW ADMINS', 'admin assistant', 'pancoran', '1234', 1, 3, NULL),
(14, 'staff6', '$2y$10$qZXGukvOjhYORKUC9ffJAeIenZdYSSDipdNkoaSq4lfUrvAJcil0q', 'JHON LENON', 'finance staff ', 'depok', '012345', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goal_id` int(5) NOT NULL,
  `description_goal` varchar(50) DEFAULT NULL,
  `value_goal` int(3) DEFAULT NULL,
  `actual_acc` int(3) DEFAULT NULL,
  `note_goal` varchar(300) DEFAULT NULL,
  `status_goal` int(2) DEFAULT NULL,
  `users_id` int(5) DEFAULT NULL,
  `periodic_id` int(3) DEFAULT NULL,
  `rating_id` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`goal_id`, `description_goal`, `value_goal`, `actual_acc`, `note_goal`, `status_goal`, `users_id`, `periodic_id`, `rating_id`, `created_at`, `updated_at`) VALUES
(24, 'laporan keuangan balance', 60, 100, 'https://www.google.com/search?q=value+int+radio+button&oq=int+value+rad&aqs=chrome.1.69i57j0i22i30j0i390i650l3.6161j0j7&sourceid=chrome&ie=UTF-8', 3, 4, 11, 13, '2023-06-25 13:59:15', '2023-06-25 14:20:07'),
(25, 'efisiensi pajak ', 30, 85, 'https://www.google.com/', 3, 4, 11, 13, '2023-06-25 14:00:29', '2023-06-25 14:20:07'),
(27, 'lorem ipsum', 30, 121, 'masih di pantau', 3, 4, 11, 13, '2023-06-25 14:02:09', '2023-06-25 14:20:07'),
(28, 'surplus asset 8x YOY', 70, 90, 'https://www.google.com/', 3, 4, 12, 14, '2023-06-25 17:15:46', '2023-06-25 22:39:00'),
(29, 'laporan keuangan balance', 70, 120, 'https://www.google.com/search?q=value+int+radio+button&oq=int+value+rad&aqs=chrome.1.69i57j0i22i30j0i390i650l3.6161j0j7&sourceid=chrome&ie=UTF-8', 3, 4, 12, 14, '2023-06-25 22:35:06', '2023-06-25 22:39:00'),
(31, 'finance goals lorem ipsum', 30, 76, 'masih di pantau', 3, 4, 14, 15, '2023-06-29 21:07:45', '2023-06-30 00:09:48'),
(32, 'tax avoidance lorem ipsum, aug-sept', 40, 90, 'this is example link attachment https://www.google.com/search?q=value+int+radio+button&oq=int+value+rad&aqs=chrome.1.69i57j0i22i30j0i390i650l3.6161j0j7&sourceid=chrome&ie=UTF-8', 3, 4, 14, 15, '2023-06-29 21:10:59', '2023-06-30 00:09:48'),
(33, 'finance goals lorem ipsum', 30, 72, '', 3, 12, 14, 16, '2023-06-29 23:08:54', '2023-06-30 00:09:54'),
(34, 'tax avoidance lorem ipsum, aug-sept', 40, 69, 'masih di pantau', 3, 12, 14, 16, '2023-06-29 23:10:37', '2023-06-30 00:09:54'),
(35, 'finance goals lorem ipsum', 30, 78, 'https://www.google.com/', 3, 14, 14, 17, '2023-06-29 23:22:14', '2023-06-30 00:10:05'),
(36, 'tax avoidance lorem ipsum, aug-sept', 40, 109, 'saccas', 3, 14, 14, 17, '2023-06-29 23:39:56', '2023-06-30 00:10:05'),
(37, 'sale 100 bike a month', 50, 60, '', 3, 9, 14, 18, '2023-06-29 23:43:23', '2023-06-30 00:14:35'),
(38, '1000 store visitor a month ', 50, 70, 'ok', 3, 9, 14, 18, '2023-06-29 23:44:06', '2023-06-30 00:14:35'),
(39, 'sale 100 bike a month', 50, 120, 'fix', 3, 10, 14, 19, '2023-06-29 23:47:58', '2023-06-30 00:14:40'),
(40, '1000 store visitor a month ', 50, 80, 'https://www.google.com/', 3, 10, 14, 19, '2023-06-29 23:48:29', '2023-06-30 00:14:40'),
(42, 'tax avoidance lorem ipsum, aug-sept', 50, 50, '', 3, 4, 15, 20, '2023-07-01 17:21:04', '2023-07-01 17:33:14'),
(43, 'finance goals lorem ipsum', 50, 65, 'https://www.google.com/', 3, 4, 15, 20, '2023-07-01 17:21:21', '2023-07-01 17:33:14'),
(45, 'finance goals lorem ipsum', 50, 130, '', 3, 12, 15, 21, '2023-07-01 17:23:25', '2023-07-01 17:34:01'),
(46, 'tax avoidance lorem ipsum, aug-sept', 50, 48, '', 3, 12, 15, 21, '2023-07-01 17:23:39', '2023-07-01 17:34:01'),
(47, 'tax avoidance lorem ipsum, aug-sept', 50, 37, '', 3, 14, 15, 22, '2023-07-01 17:24:50', '2023-07-01 17:34:38'),
(48, 'finance goals lorem ipsum', 50, 120, '', 3, 14, 15, 22, '2023-07-01 17:25:01', '2023-07-01 17:34:38'),
(49, 'lorem ipsum', 50, 80, 'https://www.google.com/', 3, 4, 15, 20, '2023-07-01 17:25:29', '2023-07-01 17:33:14'),
(50, 'sale 100 bike a month', 100, 102, '', 3, 9, 15, 24, '2023-07-01 17:29:08', '2023-07-01 17:37:12'),
(51, 'sale 100 bike a month', 100, 76, 'https://www.google.com/', 3, 10, 15, 23, '2023-07-01 17:29:25', '2023-07-01 17:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `periodic`
--

CREATE TABLE `periodic` (
  `periodic_id` int(3) NOT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `status_time` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periodic`
--

INSERT INTO `periodic` (`periodic_id`, `start_time`, `end_time`, `status_time`) VALUES
(11, '2023-03-01', '2023-04-01', 2),
(12, '2023-07-01', '2023-08-01', 2),
(14, '2023-08-01', '2023-09-01', 2),
(15, '2023-09-02', '2023-10-01', 2),
(16, '2023-10-02', '2023-11-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(5) NOT NULL,
  `percentage_acc` int(3) DEFAULT NULL,
  `score_rating` int(3) DEFAULT NULL,
  `grade_rating` varchar(3) DEFAULT NULL,
  `users_id` int(5) DEFAULT NULL,
  `periodic_id` int(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `percentage_acc`, `score_rating`, `grade_rating`, `users_id`, `periodic_id`, `created_at`, `updated_at`) VALUES
(13, 102, 122, 'A', 4, 11, '2023-06-25 14:20:07', '2023-06-25 14:20:07'),
(14, 105, 147, 'A', 4, 12, '2023-06-25 22:39:00', '2023-06-25 22:39:00'),
(15, 83, 59, 'B', 4, 14, '2023-06-30 00:09:48', '2023-06-30 00:09:48'),
(16, 71, 49, 'C', 12, 14, '2023-06-30 00:09:54', '2023-06-30 00:09:54'),
(17, 94, 67, 'A', 14, 14, '2023-06-30 00:10:05', '2023-06-30 00:10:05'),
(18, 65, 65, 'D', 9, 14, '2023-06-30 00:14:35', '2023-06-30 00:14:35'),
(19, 100, 100, 'A', 10, 14, '2023-06-30 00:14:40', '2023-06-30 00:14:40'),
(20, 65, 98, 'D', 4, 15, '2023-07-01 17:33:14', '2023-07-01 17:33:14'),
(21, 89, 89, 'B', 12, 15, '2023-07-01 17:34:01', '2023-07-01 17:34:01'),
(22, 79, 79, 'C', 14, 15, '2023-07-01 17:34:38', '2023-07-01 17:34:38'),
(23, 76, 76, 'C', 10, 15, '2023-07-01 17:36:46', '2023-07-01 17:36:46'),
(24, 102, 102, 'A', 9, 15, '2023-07-01 17:37:12', '2023-07-01 17:37:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `periodic`
--
ALTER TABLE `periodic`
  ADD PRIMARY KEY (`periodic_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goal_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `periodic`
--
ALTER TABLE `periodic`
  MODIFY `periodic_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
