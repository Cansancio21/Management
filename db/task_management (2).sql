-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2025 at 09:46 AM
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
-- Table structure for table `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `tbl_id` int(50) NOT NULL,
  `tbl_aname` varchar(200) NOT NULL,
  `tbl_type` varchar(200) NOT NULL,
  `tbl_status` varchar(200) NOT NULL,
  `tbl_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`tbl_id`, `tbl_aname`, `tbl_type`, `tbl_status`, `tbl_date`) VALUES
(1, 'ryan', 'Critical', 'Open', '2025-03-16'),
(2, 'william', 'Critical', 'Closed', '2025-03-14');

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
(8, 'awwawaw', 'awawawawa', 'wawawawawa@gmail.com', 'ryanryanryan', '123123', 'admin', 'active'),
(9, 'awawawawawaw', 'wa', 'w@gmail.com', 'ryan', '$2y$10$hm9DOXTuzSpEBJy5oQhwVunMb.JuLdsEMKZCkflrrJROe6jgopt6m', 'admin', 'active'),
(11, 'awawawawawawaw', 'wawawawawaw', 'awawawaw@gmail.com', 'cansancio', '$2y$10$.L5hEdLJHRUllsaoqzv.G.uSPbOw.gNCpfNIZaLD82CSKxWgZ1tGq', 'admin', 'active'),
(12, 'wawawawawawaw', 'waawawawawaw', 'awaawaw@gmail.com', 'nayr', '$2y$10$hP9yRN7oS6o7W8RDx/qcvuFFzyRIEWIsH6fD8UC3p51eDA05W5xNu', 'admin', 'active'),
(13, 'awawawaw', 'wawaww', 'wyjo@mailinator.com', 'ryancansancio', '$2y$10$pbUNtctmODBosfdkM1Q3ZOM03TR3RJw.AS5wHzKXmE7UL/6.nC7ka', 'admin', 'pending'),
(14, 'awawawaw', 'wawawwa', 'wawawaw@gmail.com', 'luc', '$2y$10$FbypbH9449wm1uxcQ0vCaexy90GzFzl8p6OqCLTfud93XDGSLBbh2', 'admin', 'Pending'),
(15, 'awawawaw', 'awawawawaw', 'wawawa@gmail.com', 'ryyyyy', '$2y$10$PLAEdxuAxjgAZm4p/tPBfuYsqc27S5CG6xcYkr1HGWNlA3geKbk3y', 'admin', 'Pending'),
(16, 'aawawawaw', 'wqwawaw', 'awawaw@gmail.com', 'lalab', '$2y$10$pqvU0bsOdmNo66xWlEiJ/.0Cns90CPNCokgEgP4pPuh0zlZUdEqFu', 'admin', 'active'),
(17, 'awawaw', 'awwaw', 'w@gmail.com', 'w', '$2y$10$QUpiEX/7VIEBBvGsjB0zBOM/KT6lr/6Bp3j2jknjgLrgV0Lu/lKGi', 'admin', 'active'),
(18, 'awaww', 'awawaww', 'awawawaw@gmail.com', 'awaww', '$2y$10$VZfUgXQXmn3DciKmJZE9fedmtdjIGrPFH2jshVv9PqhEIVrYy3Req', 'admin', 'active'),
(19, 'awawwaw', 'awawawaw', 'awwawaw@gmail.com', 'awawawawaw', '$2y$10$rHQcdMrPBDmbb3uubSnl7eQsPJh9LqfCpdrsjIjpNUv58UFOQW7r2', 'admin', 'active'),
(20, 'awawawaw', 'wawaawawawa', 'wawawaw@gmail.com', 'awawawaw', '$2y$10$rnlZGq7QheUwlMNNruz2KuKKsSeUyA.YYLdGPQRxO0cAOOMkHgWsy', 'admin', 'active'),
(21, 'awawaww', 'awawawaw', 'wawawawaw@gmail.com', 'wawaw', '$2y$10$Dp1d9QOn9tVK51GKzSRQBefau7XcOjx2m7Ya0wwI743nvZw8HPFc2', 'admin', 'active'),
(22, 'awawawa', 'waawawa', 'wawawaw@gmail.com', 'awawawa', '$2y$10$Xi.Q.YOikQrHZ6odkUJcoOJELZZVSWWSQ2y.ExjLtXDMT1wCQzigS', 'admin', 'active'),
(23, 'awawawa', 'waawawa', 'wawawaw@gmail.com', 'awawawa', '$2y$10$yA9fxOdnoZq3HKIpBADoUO9gMSN/CYvk3v5anYWzlDmRfB7MNbLpy', 'admin', 'active'),
(24, 'aawawawawaw', 'awawawawaw', 'wawawawawaw@gmail.com', 'wawawawaw', '$2y$10$U5dtEzzFFyNT7DsOa6k6YuJ9ANbWDpEaNKPqUvQTh.c/QeJZfXnca', 'admin', 'active'),
(25, 'awawaw', 'awawawaw', 'awawawawaw@gmail.com', 'awawawawaw', '$2y$10$GE2ADN/qGAjOUnl9dkpfYu.6ibrUW0hP1ayI7qZw9509jocZvvsau', 'admin', 'active'),
(26, 'awawawawaw', 'awawawaw', 'awawawaw@gmail.com', 'awwawawawaw', '$2y$10$esyl1q//bi.mGj8wQdiVS.pDZCGKBl4xttFgu/EDiNqW9Ym4pX48e', 'staff', 'active'),
(27, 'awawwaw', 'awawawaww', 'awawawawawaw@gmail.com', 'awawawawawaw', '$2y$10$QPY4u1r6bJDxoeNsRAG9YOonI8RMsRs3tbCNNlc21yygHPmdEwd42', 'staff', 'active'),
(28, 'awawwaw', 'awawawaww', 'awawawawawaw@gmail.com', 'awawawawawaw', '$2y$10$Azgdumo5T9bYznLcQzLn6.e9YV7mUDKzyUOkNEqlciWanagGxRH3a', 'staff', 'active'),
(29, 'awawwaw', 'awawawaww', 'awawawawawaw@gmail.com', 'awawawawawaw', '$2y$10$7rjcT7ufGd/pzRZd5lHYCed0kmlXYFNCbRGdCwG4Fcej8vPQ/RHjO', 'staff', 'active'),
(30, 'awawwaw', 'awawawaww', 'awawawawawaw@gmail.com', 'awawawawawaw', '$2y$10$kRvYgB3buiWf8Hutk/Srd.182GwlZ6vUVjZTYHUTWahgqLQOmi6I6', 'staff', 'active'),
(31, 'awawwaw', 'awawawaww', 'awawawawawaw@gmail.com', 'awawawawawaw', '$2y$10$debKcA9WhJPKG4bhCLBEVu679nnSn2fdOZxnhsDTUcWJlkVIhCrhi', 'staff', 'active'),
(32, 'rondey', 'cansancio', 'ryan21@gmail.com', 'lucky', '$2y$10$rv7oFLOKueuwRcNw9o6LgO6KqFG35fkjjsLPXRVO1dlatLOu0nwEa', 'admin', 'active'),
(33, 'waawawaww', 'wawwwaw', 'wawawaw@gmail.com', 'ryan', '$2y$10$QxIAnQnDmXD5VVevBGOvwOQmQC46Csl6JzgJkztco1/lHjtinFpEq', 'admin', 'Active'),
(34, 'awawawaw', 'awawawwa', 'awawawaw@gmail.com', 'wawaw', '$2y$10$YtGEq8.cTQzAGVJNIyRZaOyBo2K0akMghF7UY3eAs/wa.DtWDlySm', 'admin', 'pending'),
(35, 'awawawaw', 'awawawwa', 'awawawaw@gmail.com', 'wawaw', '$2y$10$O5x94wfkUFAmLEq/LZ6bOud86LnSkmdaYV0obxOQZD3u3H1pgbG9q', 'admin', 'Active'),
(36, 'awawa', 'awawawa', 'wawawaw@gmail.com', 'hasol', '$2y$10$GZofc8ugBcsuHNBLowAC7.P.D0C62SkXPYzzfd3C4I0t8yPnUWVA.', 'admin', 'Active'),
(37, 'awaww', 'awawaw', 'wwawawaw@gmail.com', 'hasol', '$2y$10$82yTAZ7x1uSGNQweP1qfZOVbB/OeNPm1O/95IMj6m5a6ROuJ/s0qa', 'admin', 'Active'),
(38, 'awawawaw', 'awawawaw', 'angelmaecansancio@gmail.com', '090563369', '$2y$10$S9OLrnm17XAJmLeq/uaYtuFnlzaAWfhwRswoCfTI6EJzlyB/jtFXW', 'admin', 'active'),
(39, 'awawaww', 'awawawaw', 'wawawaw@gmail.com', '0905633699', '$2y$10$G0bdDtvXFvik6IbCNYe8K.ts15vRb9R7in6SCF8gl1BKrZ2jzX1dm', 'admin', 'pending'),
(40, 'awawaw', 'awawawa', 'wawawaw@gmail.com', 'iloveyou', '$2y$10$Q2NSYchGt0TiOS8eH1ep/OWZf7VPAqWoZvMCdEHcypK/VhW6Rci1m', 'admin', 'pending'),
(41, 'awawaw', 'awawawa', 'wawawaw@gmail.com', 'william', '$2y$10$tFH.5E8xiPMJWgKD26MXxentN2oyMRIST.SnB1dkVp9P.k3xkFZ0a', 'admin', 'Pending'),
(42, 'awawaw', 'wa', 'wwawawaw@gmail.com', 'williams', '$2y$10$iJxokC2SFB0PKvtOhDWFB.MlTckJvPY1tNJZ.NRyZORJjfaXbWmT6', 'admin', 'pending'),
(43, 'awawaw', 'awawawaw', 'awawawaw@gmail.com', 'rondey', '$2y$10$RAv75KNBmhy0fJTPMpfcZeDGJvJpeR8KPwPxrOyGJwd1HQRT9de06', 'admin', 'pending'),
(44, 'awawaw', 'awawaw', 'wwawawaw@gmail.com', 'sama', '$2y$10$RbD7jiN5V5CbFhuPKuISEe2KshIL4K4Lpguzk29ke3ciKyoP.DJBC', 'admin', 'pending'),
(45, 'awawawaw', 'awawawaw', 'awawawaw@gmail.com', 'wilyamsama', '$2y$10$3cW4rxOYWAV5YMIo.cFDnun9nwHEwd99VlC0ZwkriuGc1OiPCyl7i', 'admin', 'active'),
(46, 'wawaw', 'awawaw', 'wawawaw@gmail.com', 'ryyyyyy', '$2y$10$fj0il6g2waKGntR/0/kTiuUY5oeKpZtVSAosEJtsGk2bkuunUNbEm', 'staff', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `tbl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
