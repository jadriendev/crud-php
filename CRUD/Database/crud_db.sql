-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 07:36 AM
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
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcrud`
--

CREATE TABLE `tblcrud` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcrud`
--

INSERT INTO `tblcrud` (`id`, `name`, `email`, `role`) VALUES
(5, 'Jadrien Roi', 'jadrien.dev@gmail.com', ''),
(6, 'Sample Name', 'jadrien@gmail.com', ''),
(7, 'Sample2', 'sample@gmail.com', ''),
(15, 'Jadrien', 'sample@gmail.com', ''),
(19, 'Jadrien', 'jadrien.dev@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`id`, `email`, `password`, `role`) VALUES
(1, 'jadrien.dev@gmail.com', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcrud`
--
ALTER TABLE `tblcrud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcrud`
--
ALTER TABLE `tblcrud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
