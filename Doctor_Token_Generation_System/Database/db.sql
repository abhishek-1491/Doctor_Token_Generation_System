-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 09:40 AM
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
-- Database: `booking_appointment`
--
CREATE DATABASE IF NOT EXISTS `booking_appointment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `booking_appointment`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `token` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `first_name`, `last_name`, `mobile`, `email`, `address`, `reason`, `token`, `created_at`) VALUES
(27, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'test', 1, '2025-04-01 06:26:33'),
(28, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'aaaa', 2, '2025-04-01 07:11:19'),
(29, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'ret', 3, '2025-04-01 07:22:06'),
(30, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'test', 4, '2025-04-01 09:24:12'),
(31, 'Ravindra', 'Hingmire', '09922201754', 'hingmireabhishek250@gmail.com', 'Shiv automobiles old bus stand', 'demo', 5, '2025-04-01 09:24:40'),
(32, 'Ravindra', 'Hingmire', '09922201754', 'hingmireabhishek250@gmail.com', 'Shiv automobiles old bus stand', 'ththst', 6, '2025-04-01 11:09:24'),
(33, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'kljhl', 7, '2025-04-01 11:09:38'),
(34, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'rrtt', 8, '2025-04-01 11:09:54'),
(35, 'Abhishek', 'Hingmire', '09309529795', 'bsilent2502@gmail.com', 'Nanded', 'kufuf', 1, '2025-04-04 11:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `name`, `email`, `contact`, `username`, `password`) VALUES
(3, 'doctor_8332', 'Abhishek Hingmire', 'bsilent2502@gmail.com', '09309529795', 'doctor3', '$2y$10$G1QY02yZ0fhHFViSCLA5Au3R2pKE3daR5VGbMQ9hXarB2eiLD5KFy'),
(4, 'doctor_9302', 'Abhishek Hingmire', 'bsilent2502@gmail.com', '09309529795', 'doctor1', '$2y$10$BO4F9NWCpSR3wpzHiKx/Be0UNb9tOiZLQnJmPkQBWhtnt4PTcCSDG'),
(5, 'doctor_1516', 'Pratik Bhoyar', 'bsilent2502@gmail.com', '08329162194', 'doctor5', '$2y$10$MGnuM8c5uwuMksgtezOCrOCNogUqDSFJpfW1f6ZeFkLOOm08rjug.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
