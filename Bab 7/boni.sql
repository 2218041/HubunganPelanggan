-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 03:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boni`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `ID` int NOT NULL,
  `informasi_kontak_pelanggan` text NOT NULL,
  `interaksi_dengan_pelanggan` text NOT NULL,
  `skor_kepuasan_pelanggan` int NOT NULL,
  `skor_customer_effort` int NOT NULL,
  `analisis_trend` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`ID`, `informasi_kontak_pelanggan`, `interaksi_dengan_pelanggan`, `skor_kepuasan_pelanggan`, `skor_customer_effort`, `analisis_trend`) VALUES
(1, 'asdasd', 'sadas', 77, 88, 'good and perfect');

-- --------------------------------------------------------

--
-- Table structure for table `input`
--

CREATE TABLE `input` (
  `ID` int NOT NULL,
  `informasi_kontak_pelanggan` text NOT NULL,
  `interaksi_dengan_pelanggan` text NOT NULL,
  `sumber_prospek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_kontak`
--

CREATE TABLE `manajemen_kontak` (
  `ID` int NOT NULL,
  `informasi_kontak_pelanggan` text NOT NULL,
  `interaksi_dengan_pelanggan` text NOT NULL,
  `sumber_prospek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manajemen_kontak`
--

INSERT INTO `manajemen_kontak` (`ID`, `informasi_kontak_pelanggan`, `interaksi_dengan_pelanggan`, `sumber_prospek`) VALUES
(3, 'test', 'test2', 'test3');

-- --------------------------------------------------------

--
-- Table structure for table `userweb`
--

CREATE TABLE `userweb` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userweb`
--

INSERT INTO `userweb` (`user_id`, `username`, `password_hash`, `email`, `created_at`) VALUES
(1, 'boni', '$2y$10$/R/SWMJX9X64upprsw6beOAOYNXaKrhDyNNlnpZ0p5Kz6xEFTa.PO', 'boni@gmail.com', '2024-06-02 06:35:28'),
(4, 'test44', '$2y$10$taIZwT9iWuuWOKVltDTJLO7KOojH1Pv7rNVTl2NUhSuqICbl7Noi6', 'test@gmail.com', '2024-06-09 10:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manajemen_kontak`
--
ALTER TABLE `manajemen_kontak`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userweb`
--
ALTER TABLE `userweb`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajemen_kontak`
--
ALTER TABLE `manajemen_kontak`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userweb`
--
ALTER TABLE `userweb`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
