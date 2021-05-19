-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 06:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_wewCONNECTION */;
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
(1, '$2y$10$TETb0QY3aOoTc8TjP.z71OvbVs1A3Q2Fnt2itqL7HhjufMibO.IsS', 'mael'),
(2, '$2y$10$sF/wC9r/CO62fDpo.9Fake.QtjQei2Qf5xGb5i70.LveGSgXvekbe', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `newstudent`
--

CREATE TABLE `newstudent` (
  `idNumber` int(222) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Contact` int(15) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newstudent`
--

INSERT INTO `newstudent` (`idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `subject`, `date`, `teacher`) VALUES
(21212, 'Lorena Ugay', 2147483647, 'Purok 1, Abad santos', 'mrbaslote@gmail.com', '$2y$10$cFqvFpNN7eaSJATPvpuUruIg36QsBBnSyVVVcjzkIEMxC8BbE5XHG', 'test subject', '2021-05-19 12:42:21', 'mael baslote');

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
(38, 111221, 'mael baslote', '09261822638', 'Purok 1, Abad santos', 'mrbaslote@gmail.com', '$2y$10$9BCV2tisegZLH/Us3XuWYuaAgoIIqS5Qjebf8YggfKNYLcGhcN3ae', 'Teacher', '', '2021-05-19 04:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_record`
--

CREATE TABLE `student_attendance_record` (
  `idNumber` int(123) NOT NULL,
  `attendance` datetime NOT NULL,
  `Name` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance_record`
--

INSERT INTO `student_attendance_record` (`idNumber`, `attendance`, `Name`, `subject`, `teacher`) VALUES
(21212, '2021-05-19 12:39:08', 'Lorena Ugay', 'test subject', 'mael baslote'),
(21212, '2021-05-19 12:42:21', 'Lorena Ugay', 'test subject', 'mael baslote');

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
(111221, 'mael baslote', '2021-05-19 09:55:52', 'mrbaslote@gmail.com'),
(111221, 'mael baslote', '2021-05-19 12:42:56', 'mrbaslote@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `idNumber` int(222) NOT NULL,
  `Name` varchar(222) NOT NULL,
  `subject` varchar(222) NOT NULL,
  `teacher` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`idNumber`, `Name`, `subject`, `teacher`) VALUES
(21212, 'Lorena Ugay', 'test subject', 'mael baslote');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newteacher`
--
ALTER TABLE `newteacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newteacher`
--
ALTER TABLE `newteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
