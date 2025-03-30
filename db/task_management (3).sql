-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 09:42 PM
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
-- Table structure for table `tbl_borrowed`
--

CREATE TABLE `tbl_borrowed` (
  `b_id` int(50) NOT NULL,
  `b_assets_name` varchar(100) NOT NULL,
  `b_quantity` int(50) NOT NULL,
  `b_technician_name` varchar(100) NOT NULL,
  `b_date` date NOT NULL,
  `b_technician_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_borrowed`
--

INSERT INTO `tbl_borrowed` (`b_id`, `b_assets_name`, `b_quantity`, `b_technician_name`, `b_date`, `b_technician_id`) VALUES
(7, 'Example', 0, 'Tatyana Hayden', '2025-03-31', 37),
(8, 'Router', 0, 'Tatyana Hayden', '2025-03-31', 37),
(9, 'Modems', 0, 'Tatyana Hayden', '2025-03-31', 37),
(10, 'Bukog', 0, 'Tatyana Hayden', '2025-03-31', 37),
(11, 'Fiber Optic Cable', 0, 'Tatyana Hayden', '2025-03-31', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrow_assets`
--

CREATE TABLE `tbl_borrow_assets` (
  `a_id` int(50) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_status` varchar(200) NOT NULL,
  `a_date` date NOT NULL,
  `a_quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_borrow_assets`
--

INSERT INTO `tbl_borrow_assets` (`a_id`, `a_name`, `a_status`, `a_date`, `a_quantity`) VALUES
(1, 'Router', 'Borrowing', '2025-03-21', 0),
(2, 'Bukog', 'Borrowing', '2025-02-26', 2),
(3, 'Modems', 'Borrowing', '2025-03-25', 0),
(4, 'Example', 'Borrowing', '2025-03-25', 0),
(5, 'Fiber Optic Cable', 'Borrowing', '2025-03-31', 50);

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
(4, 'awawa', 'wawa', 'wawaw', 121212112, 'awaw@gmail.com', '2000-02-21', 'awawawa', 121, 'awaw', 'awawaw'),
(5, 'awawa', 'wawawaw', 'awawawa', 0, 'awawawawaw@gmail.com', '2000-02-21', 'awawaw', 12, 'awaw', 'awawaw'),
(6, 'awawa', 'wawawa', 'awaww', 0, 'wawa', '2000-02-21', 'awaw', 0, 'aww', 'awaw'),
(7, 'awawa', 'wawa', 'wawaw', 0, 'waw', '2000-02-21', 'awaw', 0, 'waw', 'awaw'),
(8, 'awawaw', 'awawa', 'wawa', 0, 'awa', '2000-02-21', 'awaw', 0, 'waw', 'awaw'),
(9, 'Latifah', 'Sims', 'Perspiciatis ea dol', 0, 'zehid@mailinator.com', '1970-01-21', 'In sequi eum maxime', 0, 'Nulla magna porro al', 'Aute eum maxime aper'),
(10, 'Mohammad', 'Mcdaniel', 'Vel ut a et deserunt', 939990939, 'lidyb@mailinator.com', '2024-08-31', 'Laborum voluptatem t', 0, 'Mollit quo deserunt', 'Sapiente suscipit no'),
(11, 'Lunea', 'Mendez', 'Dolores accusamus mo', 93442324, 'jupev@mailinator.com', '2025-03-20', 'Est et molestiae qui', 2147483647, 'Ad eos nesciunt ir', 'Ut dolorem quia est');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deployment_assets`
--

CREATE TABLE `tbl_deployment_assets` (
  `a_id` int(50) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_status` varchar(200) NOT NULL,
  `a_date` date NOT NULL,
  `a_quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_deployment_assets`
--

INSERT INTO `tbl_deployment_assets` (`a_id`, `a_name`, `a_status`, `a_date`, `a_quantity`) VALUES
(1, 'Wire', 'Deployment', '2025-03-20', 0),
(2, 'Wire', 'Deployment', '2025-03-20', 0),
(3, 'Modem', 'Deployment', '2025-03-25', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returned`
--

CREATE TABLE `tbl_returned` (
  `r_id` int(50) NOT NULL,
  `r_assets_name` varchar(200) NOT NULL,
  `r_quantity` int(50) NOT NULL,
  `r_technician_name` varchar(200) NOT NULL,
  `r_technician_id` int(50) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_returned`
--

INSERT INTO `tbl_returned` (`r_id`, `r_assets_name`, `r_quantity`, `r_technician_name`, `r_technician_id`, `r_date`) VALUES
(1, 'Modems', 5, 'Tatyana Hayden', 37, '2025-03-31'),
(2, 'Example', 5, 'Tatyana Hayden', 37, '2025-03-31'),
(3, 'Modems', 5, 'Tatyana Hayden', 37, '2025-03-31'),
(4, 'Example', 3, 'Tatyana Hayden', 37, '2025-03-31'),
(5, 'Modems', 5, 'Tatyana Hayden', 37, '2025-03-31'),
(6, 'Modems', 8, 'Tatyana Hayden', 37, '2025-03-31'),
(7, 'Modems', 2, 'Tatyana Hayden', 37, '2025-03-31'),
(17, 'Modems', 4, 'Tatyana Hayden', 37, '2025-03-31'),
(18, 'Bukog', 1, 'Tatyana Hayden', 37, '2025-03-31'),
(19, 'Fiber Optic Cable', 15, 'Tatyana Hayden', 37, '2025-03-31'),
(20, 'Fiber Optic Cable', 15, 'Tatyana Hayden', 37, '2025-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supp_tickets`
--

CREATE TABLE `tbl_supp_tickets` (
  `id` int(50) NOT NULL,
  `c_id` int(50) NOT NULL,
  `c_lname` varchar(200) NOT NULL,
  `c_fname` varchar(200) NOT NULL,
  `s_subject` varchar(200) NOT NULL,
  `s_message` varchar(200) NOT NULL,
  `s_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supp_tickets`
--

INSERT INTO `tbl_supp_tickets` (`id`, `c_id`, `c_lname`, `c_fname`, `s_subject`, `s_message`, `s_status`) VALUES
(1, 0, 'awawawa', 'ref#-23-03-2025-211213', 'aqaqaqaqaq', '0', ''),
(4, 0, 'awawa', 'ref#-23-03-2025-558320', 'awaw', '1', ''),
(5, 0, 'awawa', 'ref#-23-03-2025-590610', 'awawawawaw', '0', ''),
(9, 0, '', 'ref#-23-03-2025-155334', 'awaw', '1', ''),
(10, 0, '', 'ref#-23-03-2025-702429', 'aw', '1', ''),
(11, 0, '', 'ref#-23-03-2025-707144', 'awaw', '1', ''),
(12, 8, 'awawa', 'awawaw', 'ref#-23-03-2025-610925', 'awaw', '1'),
(13, 8, 'awawa', 'awawaw', 'ref#-23-03-2025-469749', 'awawaw', '1'),
(14, 8, 'awawa', 'awawaw', 'ref#-23-03-2025-859139', 'awawaw', '1'),
(15, 10, 'Mcdaniel', 'Mohammad', 'ref#-23-03-2025-786879', 'awawawaw', '1');

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
(1, 'Sydnee Kramer', 'Minor', 'Closed', '2025-03-10', 'its over now najud hahays'),
(2, 'Portia Whitfield', 'Critical', 'Closed', '2025-03-09', 'hahays sige nalang, naa ra lage para sa atoa unya'),
(3, 'Samantha Hooper', 'Critical', 'Open', '2025-03-10', 'Ako e fight ang ako karapatan sa iyaha love'),
(4, 'Shaeleigh Baker', 'Critical', 'Open', '2025-03-08', 'Balik kana plsssssssssss'),
(5, 'Wilyam Sama', 'Minor', 'Open', '2025-03-16', 'nahutdan kog pang bayad sa amoa wifi, pwedi pa utang'),
(6, 'Ryan', 'Critical', 'Closed', '2025-03-16', 'naboang naman ko oy'),
(7, 'awawaaw', 'Critical', 'Open', '2000-02-21', 'Kung tayo ? tayo'),
(8, 'awawawaw', 'Critical', 'Open', '2000-02-21', 'relapse time'),
(9, 'Gwapo', 'Critical', 'Open', '2025-03-20', 'dinajud mada ang gibati'),
(10, 'Finn Melton', 'Minor', 'Closed', '2013-08-12', 'Adipisicing molestia'),
(11, 'Hedy Rogers', 'Minor', 'Closed', '1987-07-25', 'Ullam magni culpa fu'),
(12, 'Cyrus Steele', 'Critical', 'Closed', '2016-07-03', 'Aut qui quo earum se');

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
(31, 'Meredith', 'Dunlap', 'wojyx@mailinator.com', 'gypewa', '$2y$10$E2is5g3ncyrtNHdWXU8pH.aIig1PaeCxUCNozYLHvcYDPvG0iZxzG', 'admin', 'pending'),
(32, 'awawawa', 'wawawawawa', 'waw@gmail.com', 'oicnasnac', '$2y$10$EUZJMcTTpel2tHpMjIgT6.kDty.VTXcPU2rWbBWuARUFCdZCMao/W', 'admin', 'active'),
(33, 'awawawawa', 'wawawawaawaa', 'waw@gmail.com', 'oicnasnac12', '$2y$10$lNctiWTaf5CP1FYhlhgl3ehntsiEOMfsBnjnbjlq2BKHb9WOAYPa.', 'staff', 'active'),
(34, 'awawawawa', 'wawawawaawaa', 'waw@gmail.com', 'oicnasnac1234', '$2y$10$xVlsAy4RAGbUNwPIxTy6BuO2kCO3eoZ8aDJWw10h64CQ.RuPh6maC', 'staff', 'active'),
(35, 'awawawa', 'wawawawawa', 'waw@gmail.com', 'oicnasnac123', '$2y$10$HrYeqM5sk0e8gTZaRnJDau0JSPQp1NAe6UC4r4NllomMSaFbPvFJG', 'admin', 'active'),
(36, 'Nattyy De Coco', 'Tillman', 'rage@mailinator.com', 'Natty', '$2y$10$JJd2ZIQG6nEBu8dZ7SRULufGWNQb9fl/OSeXzFi63/T6UguImRE/G', 'staff', 'active'),
(37, 'Tatyana', 'Hayden', 'jimeruveby@mailinator.com', 'Test ni ha', '$2y$10$GiKnS6yTtPo6qudbPLqITeo4fFbcBUjN2PucdtFhfPJnjYrQbyJP6', 'technician', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_borrow_assets`
--
ALTER TABLE `tbl_borrow_assets`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_deployment_assets`
--
ALTER TABLE `tbl_deployment_assets`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_returned`
--
ALTER TABLE `tbl_returned`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_supp_tickets`
--
ALTER TABLE `tbl_supp_tickets`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  MODIFY `b_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_borrow_assets`
--
ALTER TABLE `tbl_borrow_assets`
  MODIFY `a_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_deployment_assets`
--
ALTER TABLE `tbl_deployment_assets`
  MODIFY `a_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_returned`
--
ALTER TABLE `tbl_returned`
  MODIFY `r_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_supp_tickets`
--
ALTER TABLE `tbl_supp_tickets`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `t_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
