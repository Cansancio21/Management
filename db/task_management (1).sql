-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 05:16 PM
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
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(50) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_username` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_type` varchar(200) NOT NULL,
  `u_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_username`, `u_password`, `u_type`, `u_status`) VALUES
(1, 'awawaw', 'awawaw', 'awawawaw@gmail.com', 'awawaw', '$2y$10$kUW18eAfmTx6UvfpOBB8JuLsMqXfjSWDbwWdhnVDqDSMXLK6ZSUni', '', ''),
(2, 'awawawa', 'wawaw', 'awawawaw@gmail.com', 'awaw', '$2y$10$J4B4RpZGTVJmL4DSMGft4u7SvTys0E4lIza940/Tn91bJzMlZPkZW', 'admin', 'active'),
(3, 'ryan', 'cansancio', 'angelmaecansancio@gmail.com', 'ryan', '$2y$10$PUNuuOjW5UKnsSGJNTr2ReMqTiRXk2HKiZhww/0wUR3LmiW9kDbi2', 'Admin', 'Active'),
(4, 'ryan', 'cansancio', 'angelmaecansancio@gmail.com', 'ryan123', '$2y$10$4jEdVKDSMNkoQxB.n9R.H.yYO/CyKqa/QMeIxqHTeFI6r3pRpv7dC', 'Admin', 'Active'),
(5, 'awa', 'awaa', 'angelmaecansancio@gmail.com', 'ryanboi', '$2y$10$AJYEjkT6yf3nBRGpwUneauOJCVKIAGaQu0QcIWRwz6.5Y/1VGcvBu', 'Admin', 'Active'),
(6, 'awwawaw', 'awawawaw', 'angelmaecansancio@gmail.com', 'ryan12345', '$2y$10$Zx9HBppvZzZQ4thkhFVQOOQQSiGPQjH31amIDE59PxWnMotBA7mK2', 'Admin', 'Active'),
(7, 'awwawaw', 'awawawaw', 'angelmaecansancio@gmail.com', 'ryan123456', '$2y$10$rFRhx91w3GYfcqeuTwyM5eex1JGTe9ZwugKovIcOToltARAawCsOO', 'Admin', 'Active'),
(8, 'wilyam', 'cansancio', 'angelmaecansancio@gmail.com', 'wilyam', '$2y$10$5V9o6NQPGwfcYJLhu5irbu1T8.1xuRgjFiRZ0I4qbaBdZl.GLsDFm', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
