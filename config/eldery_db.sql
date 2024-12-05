-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 11:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eldery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `a_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`a_id`, `title`, `description`, `questions`, `created_at`, `updated_at`) VALUES
(1, 'หัวข้อหฟกฟหก', 'รายละเอียดฟกฟหก', '{\"q-1\":\"\\u0e2a\\u0e27\\u0e31\\u0e2a\\u0e14\\u0e35 1\",\"q-2\":\"\\u0e2a\\u0e27\\u0e31\\u0e2a\\u0e14\\u0e35 2\",\"q-3\":\"\\u0e2a\\u0e27\\u0e31\\u0e2a\\u0e14\\u0e35 3\"}', '2024-12-04 01:06:09', NULL),
(5, 'ความพึงพอใจต่อการใช้บริการเว็บไซต์ Eldery Travel', 'เกณฑ์ระดับความพึงพอใจ\r\n5 มากที่สุด\r\n4 มาก\r\n3 ปานกลาง\r\n2 น้อย\r\n1 น้อยที่สุด', '{\"q-1\":\"\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e32\\u0e41\\u0e25\\u0e30\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e19\\u0e0a\\u0e4c\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e0a\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\",\"q-2\":\"\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e27\\u0e32\\u0e07\\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e1b\\u0e23\\u0e30\\u0e01\\u0e2d\\u0e1a\\u0e02\\u0e2d\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\",\"q-3\":\"\\u0e23\\u0e39\\u0e1b\\u0e20\\u0e32\\u0e1e \\u0e2a\\u0e35\\u0e2a\\u0e31\\u0e19 \\u0e02\\u0e19\\u0e32\\u0e14\\u0e15\\u0e31\\u0e27\\u0e2d\\u0e31\\u0e01\\u0e29\\u0e23 \\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e19\\u0e48\\u0e32\\u0e2a\\u0e19\\u0e43\\u0e08\"}', '2024-12-05 10:11:43', NULL),
(6, 'ความพึงพอใจต่อการใช้บริการเว็บไซต์ Eldery Travel', 'เกณฑ์ระดับความพึงพอใจ\r\n5 มากที่สุด\r\n4 มาก\r\n3 ปานกลาง\r\n2 น้อย\r\n1 น้อยที่สุด', '{\"q-1\":\"\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e32\\u0e41\\u0e25\\u0e30\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e19\\u0e0a\\u0e4c\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e0a\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\",\"q-2\":\"\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e27\\u0e32\\u0e07\\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e1b\\u0e23\\u0e30\\u0e01\\u0e2d\\u0e1a\\u0e02\\u0e2d\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\",\"q-3\":\"\\u0e23\\u0e39\\u0e1b\\u0e20\\u0e32\\u0e1e \\u0e2a\\u0e35\\u0e2a\\u0e31\\u0e19 \\u0e02\\u0e19\\u0e32\\u0e14\\u0e15\\u0e31\\u0e27\\u0e2d\\u0e31\\u0e01\\u0e29\\u0e23 \\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e19\\u0e48\\u0e32\\u0e2a\\u0e19\\u0e43\\u0e08\",\"q-4\":\"\\u0e01\\u0e32\\u0e23\\u0e16\\u0e32\\u0e21-\\u0e15\\u0e2d\\u0e1a\\u0e01\\u0e23\\u0e30\\u0e14\\u0e32\\u0e19\\u0e2a\\u0e19\\u0e17\\u0e19\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e44\\u0e23\",\"q-5\":\"\\u0e02\\u0e48\\u0e32\\u0e27\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e2a\\u0e31\\u0e21\\u0e1e\\u0e31\\u0e19\\u0e18\\u0e4c\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e19\\u0e48\\u0e32\\u0e2a\\u0e19\\u0e43\\u0e08\"}', '2024-12-05 10:27:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_responses`
--

CREATE TABLE `assessment_responses` (
  `ar_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `responses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_responses`
--

INSERT INTO `assessment_responses` (`ar_id`, `a_id`, `user_id`, `responses`, `created_at`, `updated_at`) VALUES
(12, 6, 10, '{\"q-1\":\"5\",\"q-2\":\"4\",\"q-3\":\"3\",\"q-4\":\"2\",\"q-5\":\"1\"}', '2024-12-05 10:38:52', NULL),
(13, 5, 10, '{\"q-1\":\"5\",\"q-2\":\"4\",\"q-3\":\"2\"}', '2024-12-05 10:40:00', NULL),
(14, 6, 11, '{\"q-1\":\"5\",\"q-2\":\"4\",\"q-3\":\"3\",\"q-4\":\"2\",\"q-5\":\"1\"}', '2024-12-05 10:40:35', NULL),
(15, 5, 11, '{\"q-1\":\"5\",\"q-2\":\"5\",\"q-3\":\"5\"}', '2024-12-05 10:41:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_visitors`
--

CREATE TABLE `assessment_visitors` (
  `av_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_visitors`
--

INSERT INTO `assessment_visitors` (`av_id`, `a_id`, `user_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 1, '2024-12-05 05:01:31', NULL),
(2, 1, 7, 1, '2024-12-05 05:01:46', NULL),
(3, 1, 7, 1, '2024-12-05 05:01:48', NULL),
(4, 1, 0, 1, '2024-12-05 05:04:38', NULL),
(5, 2, 0, 1, '2024-12-05 05:04:45', NULL),
(6, 2, 0, 1, '2024-12-05 05:04:47', NULL),
(7, 2, 0, 1, '2024-12-05 05:04:49', NULL),
(8, 2, 7, 1, '2024-12-05 05:16:59', NULL),
(9, 3, 7, 1, '2024-12-05 05:49:13', NULL),
(10, 3, 7, 1, '2024-12-05 05:49:18', NULL),
(11, 3, 7, 1, '2024-12-05 05:49:24', NULL),
(12, 3, 7, 1, '2024-12-05 05:49:33', NULL),
(13, 3, 7, 1, '2024-12-05 05:49:36', NULL),
(14, 3, 7, 1, '2024-12-05 06:03:13', NULL),
(15, 3, 7, 1, '2024-12-05 06:03:48', NULL),
(16, 4, 7, 1, '2024-12-05 06:04:49', NULL),
(17, 4, 7, 1, '2024-12-05 06:13:53', NULL),
(18, 4, 7, 1, '2024-12-05 06:44:57', NULL),
(19, 1, 10, 1, '2024-12-05 07:43:51', NULL),
(20, 1, 11, 1, '2024-12-05 09:57:04', NULL),
(21, 4, 11, 1, '2024-12-05 09:57:47', NULL),
(22, 4, 7, 1, '2024-12-05 10:07:57', NULL),
(23, 5, 11, 1, '2024-12-05 10:13:35', NULL),
(24, 5, 7, 1, '2024-12-05 10:14:11', NULL),
(25, 5, 10, 1, '2024-12-05 10:14:36', NULL),
(26, 4, 11, 1, '2024-12-05 10:19:44', NULL),
(27, 6, 11, 1, '2024-12-05 10:28:53', NULL),
(28, 6, 7, 1, '2024-12-05 10:29:21', NULL),
(29, 6, 7, 1, '2024-12-05 10:29:44', NULL),
(30, 6, 11, 1, '2024-12-05 10:30:17', NULL),
(31, 6, 11, 1, '2024-12-05 10:30:21', NULL),
(32, 6, 11, 1, '2024-12-05 10:30:34', NULL),
(33, 6, 11, 1, '2024-12-05 10:35:53', NULL),
(34, 6, 10, 1, '2024-12-05 10:38:44', NULL),
(35, 5, 10, 1, '2024-12-05 10:39:14', NULL),
(36, 5, 10, 1, '2024-12-05 10:39:55', NULL),
(37, 6, 11, 1, '2024-12-05 10:40:28', NULL),
(38, 1, 11, 1, '2024-12-05 10:40:54', NULL),
(39, 5, 11, 1, '2024-12-05 10:40:57', NULL),
(40, 5, 11, 1, '2024-12-05 10:41:19', NULL),
(41, 5, 11, 1, '2024-12-05 10:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `c_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(60) NOT NULL DEFAULT 'default-profile.jpg',
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `image`, `role`, `created_at`, `updated_at`) VALUES
(7, 'asd', 'asd', 'asd@gmail.com', '$2y$10$.BLJ37oeS8/ntChkTdvQ.eTd44zHZ/0NaUg2ycyY416sQPsMTiPWK', 'user-67517a4c42627.png', 'user', '2024-12-03 01:12:23', '2024-12-05 10:05:31'),
(8, 'admin', 'admin', 'admin@admin.com', '$2y$10$B3g5kC.c/lreaPC4PnDhdOlDP0ScQxjcMDOl41RAFsNTdA1vbK23q', 'default-profile.jpg', 'admin', '2024-12-03 17:12:56', '2024-12-05 10:05:27'),
(10, '123', '123', '123@gmail.com', '$2y$10$mqWMENm3b.aA9LLtwSryV.S/JqWULOIZ3V0di9eVNEDQ7y3sUiqSO', 'default-profile.jpg', 'user', '2024-12-05 07:43:50', '2024-12-05 10:05:21'),
(11, 'ชลนธี', 'จันทร์อร่าม', 'cho@gmail.com', '$2y$10$CDcmI43MTfhDws3n75WEmu1DpU5vLZXZfFKZLp3O7RWFWLIiSNcQ6', 'user-67517a4fbfb8c.jpg', 'user', '2024-12-05 09:56:59', '2024-12-05 10:02:55'),
(12, 'test', 'test', 'test@gmail.com', '$2y$10$HI.Rxx/tvz0Rf/rKuxcIGOpz33kX8vc8PU5RlV1tZpZ697EaMwqtm', 'default-profile.jpg', 'user', '2024-12-05 10:25:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assessment_responses`
--
ALTER TABLE `assessment_responses`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `assessment_visitors`
--
ALTER TABLE `assessment_visitors`
  ADD PRIMARY KEY (`av_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assessment_responses`
--
ALTER TABLE `assessment_responses`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assessment_visitors`
--
ALTER TABLE `assessment_visitors`
  MODIFY `av_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
