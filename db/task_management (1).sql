-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 09:47 AM
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
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `c_id` int(50) NOT NULL,
  `c_fname` varchar(200) NOT NULL,
  `c_lname` varchar(200) NOT NULL,
  `c_area` varchar(200) NOT NULL,
  `c_contact` int(50) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_date` date NOT NULL,
  `c_onu` varchar(200) NOT NULL,
  `c_caller` int(50) NOT NULL,
  `c_address` varchar(200) NOT NULL,
  `c_rem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`c_id`, `c_fname`, `c_lname`, `c_area`, `c_contact`, `c_email`, `c_date`, `c_onu`, `c_caller`, `c_address`, `c_rem`) VALUES
(1, 'awawawa', 'wawawawaw', 'awawawawaw', 12121212, 'awaw@gmail.com', '2000-02-21', 'awaaw', 12, 'awawaw', 'awawaw'),
(2, 'awawawa', 'wawaw', 'awawaw', 1212121212, 'awaw@gmail.com', '2000-02-21', 'awaw', 12, 'awawaw', 'awawawawa'),
(3, 'awawaw', 'wawaa', 'awawaw', 2147483647, 'ryan@gmail.com', '2000-02-21', 'awawawaw', 12, 'awawaw', 'awawaw'),
(4, 'awawa', 'wawa', 'wawaw', 121212112, 'awaw@gmail.com', '2000-02-21', 'awawawa', 121, 'awaw', 'awawaw'),
(5, 'awawa', 'wawawaw', 'awawawa', 0, 'awawawawaw@gmail.com', '2000-02-21', 'awawaw', 12, 'awaw', 'awawaw'),
(6, 'awawa', 'wawawa', 'awaww', 0, 'wawa', '2000-02-21', 'awaw', 0, 'aww', 'awaw'),
(7, 'awawa', 'wawa', 'wawaw', 0, 'waw', '2000-02-21', 'awaw', 0, 'waw', 'awaw'),
(8, 'awawaw', 'awawa', 'wawa', 0, 'awa', '2000-02-21', 'awaw', 0, 'waw', 'awaw'),
(9, 'Latifah', 'Sims', 'Perspiciatis ea dol', 0, 'zehid@mailinator.com', '1970-01-21', 'In sequi eum maxime', 0, 'Nulla magna porro al', 'Aute eum maxime aper'),
(10, 'Mohammad', 'Mcdaniel', 'Vel ut a et deserunt', 939990939, 'lidyb@mailinator.com', '2024-08-31', 'Laborum voluptatem t', 0, 'Mollit quo deserunt', 'Sapiente suscipit no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `t_id` int(50) NOT NULL,
  `t_aname` varchar(200) NOT NULL,
  `t_type` varchar(200) NOT NULL,
  `t_status` varchar(200) NOT NULL,
  `t_date` date NOT NULL,
  `t_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`t_id`, `t_aname`, `t_type`, `t_status`, `t_date`, `t_details`) VALUES
(1, 'Sydnee Kramer', 'Minor', 'Closed', '2025-03-10', ''),
(2, 'Portia Whitfield', 'Critical', 'Closed', '2025-03-09', ''),
(3, 'Samantha Hooper', 'Critical', 'Open', '2025-03-10', ''),
(4, 'Shaeleigh Baker', 'Critical', 'Open', '2025-03-08', ''),
(5, 'Wilyam Sama', 'Minor', 'Open', '2025-03-16', 'nahutdan kog pang bayad sa amoa wifi, pwedi pa utang'),
(6, 'Ryan', 'Critical', 'Closed', '2025-03-16', 'naboang naman ko oy'),
(7, 'awawaaw', 'Critical', 'Open', '2000-02-21', 'adwadadaaeasdasd'),
(8, 'awawawaw', 'Critical', 'Open', '2000-02-21', 'awawawaw');

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
(16, 'Huh', 'Yunjin', 'huhjennifer@gmail.com', 'Rizee', '$2y$10$Og60E6rElNb8jpKCV51OOeNb6Hx2iilWoYCxFH3NV42TjsPEQs2Ea', 'admin', 'active'),
(17, 'John William', 'Mayormita', 'jonwilyammayormita@gmail.com', 'Astark', '$2y$10$TIr2Iy4HbODOaqgZ0akJbeibY.n8TCmEP5sbHGAfpbE1uYl2Mco1u', 'admin', 'pending'),
(18, 'Scarlett', 'Williams', 'bukeke@mailinator.com', 'kogicosa', 'Pa$$w0rd!', 'admin', 'pending'),
(19, 'Rose', 'Donovan', 'lywawusype@mailinator.com', 'fuqum', '$2y$10$IVgruo96Y8NbSfhn/CYqKOn6Ma..swAN1NphEeL/DAOb0tqkYhnPe', 'Admin', 'Pending'),
(20, 'Rize', 'Chan', 'Rize@gmail.com', 'Rizee', '$2y$10$.Pr5z4b2D4EWEq5SbYozlepjWFxEAhGeBpThqWi4O793b0rkGp80m', 'admin', 'Active'),
(21, 'Astark', 'Mayormita', 'larraverallo@gmail.com', 'Astark', '$2y$10$tacqlNHSmJWBh3M4dgWJNe3PJmYfkIeUllONrdTARDaYg8NSadOZS', 'admin', 'Active'),
(22, 'John', 'Wilyam', 'jonwilyammayormita@gmail.com', 'Stark', '$2y$10$z.cDRaq6kxiXAB6CAXHM4OUch5jFsrGbRYlwdQ6SONixDKcSrb6C6', 'admin', 'active'),
(23, 'Ryan', 'Cansancio', 'jhonsepayla@yahoo.com', 'Ryan', '$2y$10$PxP0Kuq6wRU4J0QXLxuwFerGro3.cQoL6nc9shd0KIlUSKeix0if6', 'admin', 'Active'),
(24, 'Senpai', 'Kun', 'senpai@gmail.com', 'Senpai', '$2y$10$Lb.0nPGWVo1bDT6BBiEE9.r1EDmi/QiCFwy4GOi87O85ZHt7zwLzm', 'user', 'Active'),
(25, 'John Wilyam', 'Wilyam', 'xugecev@mailinator.com', 'WilyamSama', '$2y$10$izLTdpzNFvJ7mfjs014Jj.7IzygMHQ6wCABcpbDFIn3PaP5/Ihs1O', 'admin', 'pending'),
(26, 'Xyla', 'Salinas', 'qiko@mailinator.com', 'qovalony', '$2y$10$1w/hBAF/J5QdrUtj4mtMhuBXuoPDIri6WAm4lYW.MXclYSDsOrit6', 'admin', 'pending'),
(27, 'Fiona', 'Rogers', 'fiona@gmail.com', 'Fiona Chan', '$2y$10$mJbipq.7nSIizFJAXf04POmIqSQdEQcDGat7lBXb9rbFdm35aHoTu', 'staff', 'active'),
(28, 'Illana', 'Alston', 'sijirugy@mailinator.com', 'meminubof', '$2y$10$RRcEmlzVVhhi6Uk.4Hh24OLfN0KkdCiJ4q5bnIcUKav7z4n8E85dq', 'admin', 'pending'),
(29, 'Brianna', 'Macias', 'dixypof@mailinator.com', 'Test', '$2y$10$b6e7YnYWZmwukVMoYV7X.eNkszNxKp3dHnr7dV4MYZ7kf57BClCli', 'staff', 'active'),
(30, 'Ursula', 'Walls', 'qofowoxoto@mailinator.com', 'Meowa', '$2y$10$VH3kXpwA6guV8aV4wg30Ne.grXF14qCOK9jImO7BjQzFhER3wGQye', 'admin', 'active'),
(31, 'Meredith', 'Dunlap', 'wojyx@mailinator.com', 'gypewa', '$2y$10$E2is5g3ncyrtNHdWXU8pH.aIig1PaeCxUCNozYLHvcYDPvG0iZxzG', 'admin', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `t_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
