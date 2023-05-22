-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 11:20 AM
-- Server version: 8.0.33
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omrevaluator`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int NOT NULL,
  `question_no` int NOT NULL,
  `answer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_no`, `answer`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0),
(12, 12, 0),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 0),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 0),
(32, 32, 0),
(33, 33, 0),
(34, 34, 0),
(35, 35, 0),
(36, 36, 0),
(37, 37, 0),
(38, 38, 0),
(39, 39, 0),
(40, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `merit_list`
--

CREATE TABLE `merit_list` (
  `ids` int NOT NULL,
  `roll` bigint NOT NULL,
  `secI` varchar(500) NOT NULL,
  `secII` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `merit_list`
--

INSERT INTO `merit_list` (`ids`, `roll`, `secI`, `secII`) VALUES
(1, 147, '2/1/1/0/3/3/2/1/2/0/2/1/3/1/3/0/3/2/0/1', '1/3/2/0/2/1/0/3/1/2/1/3/1/3/1/2/0/1/3/0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`) VALUES
(1, 'Ankit', 149),
(2, 'Rupesh', 147),
(3, 'Aakash', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merit_list`
--
ALTER TABLE `merit_list`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `merit_list`
--
ALTER TABLE `merit_list`
  MODIFY `ids` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
