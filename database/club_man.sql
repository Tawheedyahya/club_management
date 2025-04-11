-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 07:38 AM
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
-- Database: `club_man`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(20) DEFAULT NULL,
  `a_pass` varchar(20) DEFAULT NULL,
  `a_email` varchar(200) DEFAULT NULL,
  `club` varchar(201) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`, `a_email`, `club`) VALUES
(1, 'ezhil', '07', 'e@gmail.com', 'ncc'),
(2, 'yahi', '12345678', 'tawheedyahya0@gmail.com', 'nss'),
(3, 'abinav', '12345678', 'adabinav@gmail.com', 'wings');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_group`
-- (See below for the actual view)
--
CREATE TABLE `admin_group` (
`a_id` int(11)
,`s_id` int(11)
,`s_name` varchar(50)
,`s_regno` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `ament`
--

CREATE TABLE `ament` (
  `a_id` int(11) DEFAULT NULL,
  `ament_id` int(11) NOT NULL,
  `ament_img` varchar(270) DEFAULT NULL,
  `ament_des` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ament`
--

INSERT INTO `ament` (`a_id`, `ament_id`, `ament_img`, `ament_des`) VALUES
(2, 1, 'WhatsApp Image 2025-04-07 at 13.50.09_7596f92e.jpg', ''),
(2, 2, 'WhatsApp Image 2025-04-07 at 13.58.45_3ed9f62a.jpg', ''),
(2, 3, 'WhatsApp Image 2025-04-07 at 13.58.46_e437fff5.jpg', 'Tree plantation Camp to be conducted on 07/04/2025');

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `a_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `att_status` enum('present','absent') NOT NULL,
  `att_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`a_id`, `s_id`, `att_status`, `att_time`) VALUES
(2, 2, 'absent', '2025-03-07 08:34:25'),
(2, 4, 'absent', '2025-03-07 08:34:25'),
(2, 3, 'absent', '2025-03-07 08:34:25'),
(2, 5, 'absent', '2025-03-07 08:34:25'),
(2, 1, 'absent', '2025-03-07 08:34:25'),
(2, 6, 'present', '2025-03-07 08:34:25'),
(2, 2, 'present', '2025-03-07 09:17:54'),
(2, 4, 'absent', '2025-03-07 09:17:54'),
(2, 3, 'absent', '2025-03-07 09:17:54'),
(2, 5, 'absent', '2025-03-07 09:17:54'),
(2, 7, 'absent', '2025-03-07 09:17:54'),
(2, 1, 'absent', '2025-03-07 09:17:54'),
(2, 6, 'absent', '2025-03-07 09:17:54'),
(2, 2, 'present', '2025-04-07 08:27:45'),
(2, 4, 'absent', '2025-04-07 08:27:45'),
(2, 3, 'absent', '2025-04-07 08:27:45'),
(2, 5, 'absent', '2025-04-07 08:27:45'),
(2, 7, 'absent', '2025-04-07 08:27:45'),
(2, 1, 'absent', '2025-04-07 08:27:45'),
(2, 6, 'absent', '2025-04-07 08:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `a_id` int(11) DEFAULT NULL,
  `sr_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_regno` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `s_place` varchar(50) NOT NULL,
  `s_dept` varchar(30) NOT NULL,
  `s_phoneno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`a_id`, `sr_id`, `s_name`, `s_regno`, `dob`, `s_place`, `s_dept`, `s_phoneno`) VALUES
(1, 1, 'yahi', '33', '2004-10-03', 'ngb', 'cs', ''),
(1, 2, 'yahi', '22BCS133', '2025-03-08', 'ngb', 'cs', '9394'),
(1, 7, 'a_id', 'A', '2025-03-14', 'ngb', 'cs', 'aa'),
(1, 13, 'dkskd', 'DFSFDF', '2025-03-15', 'fds', 'fds', 'dsf'),
(2, 29, 'abi', '566GH', '2025-03-13', 'tuty', 'cs', '664565678'),
(1, 31, 'yahi', '2222', '2025-04-04', 'ngb', 'cs', '222');

-- --------------------------------------------------------

--
-- Stand-in structure for view `grp`
-- (See below for the actual view)
--
CREATE TABLE `grp` (
`s_regno` varchar(30)
,`s_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `a_id` int(11) DEFAULT NULL,
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `s_regno` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `s_place` varchar(30) DEFAULT NULL,
  `s_phoneno` varchar(13) DEFAULT NULL,
  `s_dept` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`a_id`, `s_id`, `s_name`, `s_regno`, `dob`, `s_place`, `s_phoneno`, `s_dept`) VALUES
(2, 1, 'yahi', '22BCS133', '2025-03-01', 'ngb', '9994780436', 'cs'),
(2, 2, 'abinav', '22BCS113', '2025-03-14', 'kuniyamputhur', '7385346873', 'cs'),
(2, 3, 'sure', '22BCS118', '2025-03-15', 'kallai', '7637437467', 'cs'),
(2, 4, 'pulsar balu', '22BCS117', '2025-03-12', 'kallai', '72763737', 'cs'),
(2, 5, 'maddy', '22bcs125', '2025-03-11', 'sattur', '7756456456', 'cs'),
(2, 6, 'vikki', '22bcs134', '2025-03-18', 'kallai', '65676576', 'cs'),
(2, 7, 'sure', '22BCS132', '2025-03-08', 'kallai', '783436429', 'cs');

-- --------------------------------------------------------

--
-- Structure for view `admin_group`
--
DROP TABLE IF EXISTS `admin_group`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_group`  AS SELECT `student`.`a_id` AS `a_id`, `student`.`s_id` AS `s_id`, `student`.`s_name` AS `s_name`, `student`.`s_regno` AS `s_regno` FROM `student` WHERE `student`.`a_id` = 4 ;

-- --------------------------------------------------------

--
-- Structure for view `grp`
--
DROP TABLE IF EXISTS `grp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grp`  AS SELECT `student`.`s_regno` AS `s_regno`, `student`.`s_name` AS `s_name` FROM `student` WHERE `student`.`a_id` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_email` (`a_email`);

--
-- Indexes for table `ament`
--
ALTER TABLE `ament`
  ADD PRIMARY KEY (`ament_id`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`sr_id`),
  ADD UNIQUE KEY `ar` (`a_id`,`s_regno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_regno` (`s_regno`,`a_id`),
  ADD KEY `a_id` (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ament`
--
ALTER TABLE `ament`
  MODIFY `ament_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
