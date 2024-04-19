-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 09:06 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `performance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `remedial_id` int NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `attendance_1` date NOT NULL,
  `status` varchar(1) NOT NULL,
  KEY `remedial_id` (`remedial_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`remedial_id`, `student_id`, `attendance_1`, `status`) VALUES
(101, '101', '2023-12-11', 'p'),
(101, '101', '2023-12-12', 'p'),
(101, '101', '2023-12-12', 'p'),
(101, '101', '2023-12-13', 'a'),
(110, '110', '2023-12-13', 'a'),
(1, '1', '2023-12-12', 'p'),
(1, '1', '2023-12-13', 'a'),
(2, '2', '2023-12-14', 'a'),
(2, '2', '2023-12-15', 'p'),
(7, '7', '2023-12-13', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `student_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `test_id` varchar(10) NOT NULL,
  `sub_1` int NOT NULL,
  `sub_2` int NOT NULL,
  `sub_3` int NOT NULL,
  `sub_4` int NOT NULL,
  `sub_5` int NOT NULL,
  KEY `student_id` (`student_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`student_id`, `test_id`, `sub_1`, `sub_2`, `sub_3`, `sub_4`, `sub_5`) VALUES
('', '1011', 5, 7, 5, 56, 5),
('', '1011', 5, 7, 5, 56, 5),
('101', '1011', 5, 75, 84, 75, 75);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `student_id` varchar(10) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `test_id` varchar(10) NOT NULL,
  `mark_1` int NOT NULL,
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`student_id`, `subject_id`, `test_id`, `mark_1`) VALUES
('101', '101', '101CAT1', 56),
('101', '102', '102CAT1', 68),
('101', '103', '103CAT1', 54),
('101', '104', '104CAT1', 86),
('101', '102', '102CAT2', 58),
('110', '101', '101CAT1', 58),
('110', '101', '101CAT1', 58),
('101', '101', '101CAT1', 30),
('101', '101', '101CAT1', 30),
('110', '102', '102CAT1', 14),
('110', '102', '102CAT1', 14),
('110', '102', '102CAT1', 56),
('110', '102', '102CAT1', 20),
('101', '102', '102CAT1', 21),
('110', '102', '102CAT1', 20),
('101', '102', '102CAT1', 21),
('101', '101', '101CAT1', 0),
('101', '101', '101CAT2', 85),
('110', '102', '101CAT2', 99),
('110', '102', '104CAT1', 28),
('1', '101', '101CAT1', 26),
('2', '101', '101CAT1', 56),
('3', '101', '101CAT1', 86),
('4', '102', '102CAT1', 75),
('5', '102', '101CAT1', 86),
('8', '103', '101CAT1', 63),
('4', '103', '101CAT1', 75);

-- --------------------------------------------------------

--
-- Table structure for table `remedial`
--

DROP TABLE IF EXISTS `remedial`;
CREATE TABLE IF NOT EXISTS `remedial` (
  `remedial_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `subject_id` int NOT NULL,
  `test_id` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `start_time` time(4) NOT NULL,
  `end_time` time(4) NOT NULL,
  PRIMARY KEY (`remedial_id`),
  KEY `test_id` (`test_id`),
  KEY `subject_id` (`subject_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `remedial`
--

INSERT INTO `remedial` (`remedial_id`, `student_id`, `subject_id`, `test_id`, `from_date`, `to_date`, `start_time`, `end_time`) VALUES
('CAT1101', '101', 102, '101CAT2', '2023-12-13', '2023-12-14', '09:14:00.0000', '10:13:00.0000'),
('1', '1', 102, '101CAT1', '2023-12-12', '2023-12-13', '18:14:00.0000', '19:14:00.0000'),
('2', '2', 103, '103CAT1', '2023-12-14', '2023-12-15', '22:09:00.0000', '23:10:00.0000'),
('3', '3', 104, '101CAT1', '2023-12-15', '2023-12-16', '21:50:00.0000', '22:51:00.0000'),
('4', '7', 103, '101CAT1', '2023-12-14', '2023-12-15', '12:29:00.0000', '13:29:00.0000');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(20) NOT NULL,
  `class` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `class`) VALUES
('1', 'Elamathy', 'MCA'),
('10', 'Kavin', 'MCA'),
('3', 'Keerthi vasan', 'MCA'),
('4', 'Arun Selvan', 'MCA'),
('5', 'Ajay', 'MCA'),
('6', 'Sowndhar', 'MCA'),
('7', 'Vikash', 'MCA'),
('8', 'Logesh', 'MCA'),
('9', 'Karthik', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(10) NOT NULL,
  `semester_no` int NOT NULL,
  PRIMARY KEY (`subject_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_name`, `semester_no`) VALUES
('101', 'Maths', 1),
('102', 'Python', 1),
('103', 'DBMS', 1),
('104', 'DS', 1),
('105', 'SEM', 1),
('111', 'Java', 2),
('112', 'ML', 2),
('113', 'DN', 2),
('114', 'C++', 2),
('115', 'OS', 2),
('201', 'CC', 3),
('202', 'C#', 3),
('203', 'DS', 3),
('204', 'Elective-1', 3),
('205', 'Elective-2', 3),
('206', 'Elective-3', 3),
('210', 'Project', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(101, 'MATHS'),
(102, 'PYTHON'),
(103, 'DATA STRUCTURE'),
(104, 'DATABASE');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` varchar(10) NOT NULL,
  `test_name` varchar(8) NOT NULL,
  `test_date` date NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `subject_code` (`subject_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `test_date`, `subject_code`) VALUES
('1011', 'CAT 1', '2023-09-14', '101'),
('1012', 'CAT 2', '2023-10-14', '101'),
('1013', 'CAT 3', '2023-11-14', '101'),
('1014', 'SEMESTER', '2023-12-14', '101'),
('1021', 'CAT 1', '2023-09-14', '102'),
('1022', 'CAT 2', '2023-10-14', '102'),
('1023', 'CAT 3', '2023-11-14', '102'),
('1024', 'SEMESTER', '2023-12-14', '102'),
('1031', 'CAT 1', '2023-09-15', '103'),
('1032', 'CAT 2', '2023-10-16', '103'),
('1033', 'CAT 3', '2023-11-15', '103'),
('1034', 'SEMESTER', '2023-12-15', '103'),
('1041', 'CAT 1', '2023-09-15', '104'),
('1042', 'CAT 2', '2023-10-16', '104'),
('1043', 'CAT 3', '2023-11-15', '104'),
('1044', 'SEMESTER', '2023-12-15', '104'),
('1051', 'CAT 1', '2023-09-16', '105'),
('1052', 'CAT 2', '2023-10-17', '105'),
('1053', 'CAT 3', '2023-11-16', '105'),
('1054', 'SEMESTER', '2023-12-16', '105'),
('1111', 'CAT 1', '2024-02-15', '111'),
('1112', 'CAT 2', '2024-03-15', '111'),
('1113', 'CAT 3', '2024-04-15', '111'),
('1114', 'SEMESTER', '2024-05-15', '111'),
('1121', 'CAT 1', '2024-02-15', '112'),
('1122', 'CAT 2', '2024-03-15', '112'),
('1123', 'CAT 3', '2024-04-15', '112'),
('1124', 'SEMESTER', '2024-05-15', '112'),
('1131', 'CAT 1', '2024-02-16', '113'),
('1132', 'CAT 2', '2024-03-16', '113'),
('1133', 'CAT 3', '2024-04-16', '113'),
('1134', 'SEMESTER', '2024-05-16', '113'),
('1141', 'CAT 1', '2024-02-16', '114'),
('1142', 'CAT 2', '2024-03-16', '114'),
('1143', 'CAT 3', '2024-04-15', '114'),
('1144', 'SEMESTER', '2024-05-15', '114'),
('1151', 'CAT 1', '2024-02-17', '115'),
('1152', 'CAT 2', '2024-03-17', '115'),
('1153', 'CAT 3', '2024-04-16', '115'),
('1154', 'SEMESTER', '2024-05-16', '115'),
('2011', 'CAT 2', '2024-09-14', '201'),
('2012', 'CAT 2', '2024-10-14', '201'),
('2013', 'CAT 3', '2024-11-14', '201'),
('2014', 'SEMESTER', '2024-12-14', '201'),
('2021', 'CAT 1', '2024-09-14', '202'),
('2022', 'CAT 2', '2024-10-14', '202'),
('2023', 'CAT 3', '2024-11-14', '202'),
('2024', 'SEMESTER', '2024-12-14', '202'),
('2031', 'CAT 1', '2024-09-15', '203'),
('2032', 'CAT 2', '2024-10-16', '203'),
('2033', 'CAT 3', '2024-11-15', '203'),
('2034', 'SEMESTER', '2024-12-15', '203'),
('2041', 'CAT 1C', '2024-09-15', '204'),
('2042', 'CAT 2', '2024-10-16', '204'),
('2043', 'CAT 3S', '2024-11-15', '204'),
('2044', 'SEMESTER', '2024-12-15', '204'),
('2051', 'CAT 1', '2024-09-16', '205'),
('2052', 'CAT 2', '2024-10-16', '205'),
('2053', 'CAT 3', '2024-11-16', '205'),
('2054', 'SEMESTER', '2024-12-16', '205'),
('2061', 'CAT 1', '2024-09-16', '206'),
('2062', 'CAT 2', '2024-10-17', '206'),
('2063', 'CAT 3', '2024-11-16', '206'),
('2064', 'SEMESTER', '2024-12-16', '206'),
('2111', 'VIVA', '2025-03-12', '211');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `test_id` varchar(10) NOT NULL,
  `test_name` varchar(15) NOT NULL,
  `test_date` date NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`, `test_date`) VALUES
('101CAT1', 'CAT 1', '2023-09-14'),
('102CAT1', 'CAT 2', '2023-04-18'),
('103CAT1', 'CAT 3', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `password`, `email`, `phone`) VALUES
('1', 'admin', 'admin', 'admin@gmail.com', 1234567890),
('2', 'user', 'user', 'user@gmail.com', 1234567897);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
