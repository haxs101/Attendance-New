-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2021 at 10:58 PM
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
  `subject1` varchar(245) NOT NULL,
  `subject2` varchar(245) NOT NULL,
  `subject3` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newteacher`
--

INSERT INTO `newteacher` (`id`, `idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `subject1`, `subject2`, `subject3`) VALUES
(18, 1212, 'Mael Baslote', '2323', 'QADASD', 'geb467@gmail.com', '$2y$10$UmVfm7BM24sXvkLEIAeaSe45HP9TOcBgUGdU9UOEcnUoQaWtQCXY6', 'eng 3', 'ADD', 'DAS'),
(20, 23232131, 'testt', '22311', 'test2', 'wfrerasd@yopmail.com', '$2y$10$Wsi.FdyxRccduEkcqri0juKZXjuHgNQIdAbEHfk4Lsxks8PyffrVG', 'test2', 'tesst', 'tessa'),
(22, 121212, 'Mael Baslote', '0926182263', 'Abad Santos', 'mrbaslote@gmail.com', '$2y$10$Qy8b/gIbe6kZHr/ap2CT.O40kS7oE6PXzvLs/HZlZs5QFcBIQTpkC', 'test', 'test2', 'test1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
