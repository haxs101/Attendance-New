-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2021 at 07:19 AM
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
-- Table structure for table `CS 121`
--

CREATE TABLE `CS 121` (
  `id` int(6) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `type1` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `attendance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CS 121L`
--

CREATE TABLE `CS 121L` (
  `id` int(6) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `type1` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `attendance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `subjects` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newteacher`
--

INSERT INTO `newteacher` (`id`, `idNumber`, `Name`, `Contact`, `Address`, `Email`, `password`, `subjects`) VALUES
(18, 1212, 'Mael Baslote', '2323', 'QADASD', 'geb467@gmail.com', '$2y$10$UmVfm7BM24sXvkLEIAeaSe45HP9TOcBgUGdU9UOEcnUoQaWtQCXY6', ''),
(28, 111111, 'Mael Baslote', '0926182263', 'Purok 1, Abad santos', 'mrbaslote@gmail.com', '$2y$10$IprANDd0v8Fz3Z0wP4WhBO8Txi0JlhnlQGqkw6LOMj36c2g6DS1E6', 'CS123,CS123L,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CS 121`
--
ALTER TABLE `CS 121`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CS 121L`
--
ALTER TABLE `CS 121L`
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
-- AUTO_INCREMENT for table `CS 121`
--
ALTER TABLE `CS 121`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CS 121L`
--
ALTER TABLE `CS 121L`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newteacher`
--
ALTER TABLE `newteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
