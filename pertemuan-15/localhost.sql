-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 03:47 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ondemande`
--

CREATE TABLE `tbl_ondemande` (
  `cNIM` int NOT NULL,
  `cnamalengkap` varchar(100) DEFAULT NULL,
  `ctempatlahir` varchar(100) DEFAULT NULL,
  `ctanggallahir` varchar(100) DEFAULT NULL,
  `cHobi` varchar(100) DEFAULT NULL,
  `cpasangan` varchar(100) DEFAULT NULL,
  `cpekerjaan` varchar(100) DEFAULT NULL,
  `cnamaorangtua` varchar(100) DEFAULT NULL,
  `cnamakakak` varchar(100) DEFAULT NULL,
  `cnamaadik` varchar(100) DEFAULT NULL,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_ondemande`
--

INSERT INTO `tbl_ondemande` (`cNIM`, `cnamalengkap`, `ctangallahir`, `cHobi`, `cpasangan` , `cpekerjaan` , `cnamaorangtua` , `cnamakakak` , `cnamaadik` `dcreated_at`) VALUES
(20, 'Nur Faddddd', 'a@gmail.com', 'sadadas faedfasd', '2025-12-24 12:21:52'),
(21, 'nicolas lim', 'sada@i.com', 'kskakds a da', '2025-12-24 12:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ondemande`
--
ALTER TABLE `tbl_ondemande`
  ADD PRIMARY KEY (`cNIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ondemande`
--
ALTER TABLE `tbl_ondemande`
  MODIFY `cNIM` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
