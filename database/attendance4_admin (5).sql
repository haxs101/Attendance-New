-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 01:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance4_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `No` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`No`, `password`, `username`) VALUES
(3, '$2y$10$yuOzabT.EhjCsoDOnw8ZZugEnRgL6hCvkq89t2vcFgJR5wqnSeddm', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `newstudent`
--

CREATE TABLE `newstudent` (
  `id` int(232) NOT NULL,
  `idNumber` int(222) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Contact` bigint(151) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `password` varchar(222) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `subject2` varchar(222) NOT NULL,
  `subject3` varchar(222) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newstudent`
--

INSERT INTO `newstudent` (`id`, `idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `subject`, `subject2`, `subject3`, `date`, `teacher`) VALUES
(26, 122112, 'maeldoto', 1121212, 'Purok 1, Abad santos', 'asd2e@gmail.com', '$2y$10$f6GVdCQwNrgidtP1Hlp0cuQKCK0OYO2H3lqgwAfttBGEgL4.qDDkm', 'test email', '', '', '2021-05-27 13:45:44', 'Lorena');

-- --------------------------------------------------------

--
-- Table structure for table `newteacher`
--

CREATE TABLE `newteacher` (
  `id` int(11) NOT NULL,
  `idNumber` int(8) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Contact` varchar(256) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `subjects` varchar(256) NOT NULL,
  `attendance` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newteacher`
--

INSERT INTO `newteacher` (`id`, `idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `type`, `subjects`, `attendance`) VALUES
(46, 12222, 'Lorena', '09261822638', 'Purok 1, Abad santos', 'mrbaslote@gmail.com', '$2y$10$6pjZIF2L.ZHXfI1ixoOF3ujRkjAucxjG3p4DU24WhpJC5QFRTnohu', 'Teacher', '', '2021-05-25 10:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_record`
--

CREATE TABLE `student_attendance_record` (
  `id` int(232) NOT NULL,
  `idNumber` int(123) NOT NULL,
  `attendance` datetime NOT NULL,
  `Name` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance_record`
--

CREATE TABLE `teacher_attendance_record` (
  `idNumber` int(252) NOT NULL,
  `Name` varchar(245) NOT NULL,
  `attendance` datetime NOT NULL DEFAULT current_timestamp(),
  `Email` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_attendance_record`
--

INSERT INTO `teacher_attendance_record` (`idNumber`, `Name`, `attendance`, `Email`) VALUES
(12222, 'Lorena', '2021-05-25 18:14:50', 'mrbaslot1e@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `id` int(225) NOT NULL,
  `idNumber` int(222) NOT NULL,
  `Name` varchar(222) NOT NULL,
  `subject` varchar(222) NOT NULL,
  `subject2` varchar(222) NOT NULL,
  `subject3` varchar(222) NOT NULL,
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`id`, `idNumber`, `Name`, `subject`, `subject2`, `subject3`, `teacher`) VALUES
(26, 122112, 'maeldoto', 'test email', '', '', 'Lorena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newstudent`
--
ALTER TABLE `newstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newteacher`
--
ALTER TABLE `newteacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newstudent`
--
ALTER TABLE `newstudent`
  MODIFY `id` int(232) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newteacher`
--
ALTER TABLE `newteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
