-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2021 at 11:37 AM
-- Server version: 10.4.18-MariaDB
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
(1, '$2y$10$TETb0QY3aOoTc8TjP.z71OvbVs1A3Q2Fnt2itqL7HhjufMibO.IsS', 'mael'),
(2, '$2y$10$sF/wC9r/CO62fDpo.9Fake.QtjQei2Qf5xGb5i70.LveGSgXvekbe', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `CS233`
--

CREATE TABLE `CS233` (
  `Name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CS233`
--

INSERT INTO `CS233` (`Name`, `email`, `password`) VALUES
('Lorena Ugay', 'mrbaslote@gmail.com', '$2y$10$eZ0HU4f3LaG5hKYL1k6QOOIK1da.Ady0hwuXibjPphuvvFsQ7QSAG'),
('Loren Mae', 'ayso@gmail.com', '$2y$10$lF/kAy1oPsRSfNUkA6nQYuMlLkrRrHSDNL.Tn3E0D5LsAfm6vvzlm'),
('test test', 'mrbaslotea@gmail.com', '$2y$10$VSE2D9Qogwr.92W5KA0oCuv6WmHo6W7bnuFX0YSgHNBrc8jzIMv06');

-- --------------------------------------------------------

--
-- Table structure for table `CS2233`
--

CREATE TABLE `CS2233` (
  `Name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CS2233`
--

INSERT INTO `CS2233` (`Name`, `email`, `password`) VALUES
('Lorena Ugay', 'mrbaslote@gmail.com', '$2y$10$eZ0HU4f3LaG5hKYL1k6QOOIK1da.Ady0hwuXibjPphuvvFsQ7QSAG'),
('Loren Mae', 'ayso@gmail.com', '$2y$10$lF/kAy1oPsRSfNUkA6nQYuMlLkrRrHSDNL.Tn3E0D5LsAfm6vvzlm'),
('test test', 'mrbaslotea@gmail.com', '$2y$10$VSE2D9Qogwr.92W5KA0oCuv6WmHo6W7bnuFX0YSgHNBrc8jzIMv06'),
('maeldoto', 'test@gmail.com', '$2y$10$jqjkVTK5vq3fD1p4g.EsuuvDiPjsJPGWkhVnhFM2rstGBg3yotcm2');

-- --------------------------------------------------------

--
-- Table structure for table `CS22222`
--

CREATE TABLE `CS22222` (
  `Name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CS22222`
--

INSERT INTO `CS22222` (`Name`, `email`, `password`) VALUES
('Lorena Ugay', 'mrbaslote@gmail.com', '$2y$10$eZ0HU4f3LaG5hKYL1k6QOOIK1da.Ady0hwuXibjPphuvvFsQ7QSAG'),
('Loren Mae', 'ayso@gmail.com', '$2y$10$lF/kAy1oPsRSfNUkA6nQYuMlLkrRrHSDNL.Tn3E0D5LsAfm6vvzlm'),
('test test', 'mrbaslotea@gmail.com', '$2y$10$VSE2D9Qogwr.92W5KA0oCuv6WmHo6W7bnuFX0YSgHNBrc8jzIMv06'),
('maeldoto', 'test@gmail.com', '$2y$10$jqjkVTK5vq3fD1p4g.EsuuvDiPjsJPGWkhVnhFM2rstGBg3yotcm2'),
('maeldoto test', 'testt@ad.com', '$2y$10$QuX2lc3IVdTbLlSzs3L/vuB.ZF7UBUTafUef1FPxs1bY5ZlSidt0G');

-- --------------------------------------------------------

--
-- Table structure for table `math3`
--

CREATE TABLE `math3` (
  `id` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `math3`
--

INSERT INTO `math3` (`id`, `Name`, `email`, `password`) VALUES
(0, 'Lorena Ugay', 'mrbaslote@gmail.com', '$2y$10$eZ0HU4f3LaG5hKYL1k6QOOIK1da.Ady0hwuXibjPphuvvFsQ7QSAG');

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
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newstudent`
--

INSERT INTO `newstudent` (`idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `subject`, `date`) VALUES
(12222, 'Lorena Ugay', 2147483647, 'Abad Santos', 'mrbaslote@gmail.com', '$2y$10$eZ0HU4f3LaG5hKYL1k6QOOIK1da.Ady0hwuXibjPphuvvFsQ7QSAG', 'Math3', '2021-05-16 19:50:10'),
(90901, 'Loren Mae', 2147483647, 'test', 'ayso@gmail.com', '$2y$10$lF/kAy1oPsRSfNUkA6nQYuMlLkrRrHSDNL.Tn3E0D5LsAfm6vvzlm', 'math3', '2021-05-18 16:08:04'),
(12345, 'test test', 926182263, 'Purok 1, Abad santos', 'mrbaslotea@gmail.com', '$2y$10$VSE2D9Qogwr.92W5KA0oCuv6WmHo6W7bnuFX0YSgHNBrc8jzIMv06', 'CS233', '2021-05-18 16:56:18'),
(123456, 'maeldoto', 223223, 'MAbini', 'test@gmail.com', '$2y$10$jqjkVTK5vq3fD1p4g.EsuuvDiPjsJPGWkhVnhFM2rstGBg3yotcm2', 'CS2233', '2021-05-18 17:00:38'),
(22222, 'maeldoto test', 2321212, 'amsd', 'testt@ad.com', '$2y$10$QuX2lc3IVdTbLlSzs3L/vuB.ZF7UBUTafUef1FPxs1bY5ZlSidt0G', 'CS22222', '2021-05-18 17:31:17');

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
  `attendance` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newteacher`
--

INSERT INTO `newteacher` (`id`, `idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `type`, `subjects`, `attendance`) VALUES
(34, 1212, 'mael baslote', '09261822638', 'Purok 1, Abad santos', 'mrbaslote@gmail.com', '$2y$10$FWFkG0YasGgYZ73dc3P3Q.AHWJ6eK9fw01o2IYDBaBHmiX7/AFcra', 'Teacher', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_record`
--

CREATE TABLE `student_attendance_record` (
  `idNumber` int(123) NOT NULL,
  `attendance` datetime NOT NULL,
  `Name` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance_record`
--

INSERT INTO `student_attendance_record` (`idNumber`, `attendance`, `Name`, `subject`) VALUES
(90901, '2021-05-18 15:51:53', 'Loren Mae', ''),
(90901, '2021-05-18 16:00:13', 'Loren Mae', 'math3'),
(90901, '2021-05-18 16:07:30', 'Loren Mae', 'math3'),
(90901, '2021-05-18 16:08:04', 'Loren Mae', 'math3'),
(12345, '2021-05-18 16:56:18', 'test test', 'CS233'),
(123456, '2021-05-18 17:00:38', 'maeldoto', 'CS2233'),
(22222, '2021-05-18 17:31:17', 'maeldoto test', 'CS22222');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
