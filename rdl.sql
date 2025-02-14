-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 11:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(200) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminName`, `Password`) VALUES
(1, 'belie', '123'),
(2, 'Irumva', '123'),
(3, 'Lionel', '1234'),
(4, 'NDAYISABA KAMARIZA Belie', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateNationalId` varchar(20) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Gender` varchar(12) NOT NULL,
  `DOB` date NOT NULL,
  `ExamDate` date NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateNationalId`, `FirstName`, `LastName`, `Gender`, `DOB`, `ExamDate`, `PhoneNumber`) VALUES
('1200320010987654', 'IRADUKUNDA', 'Ellyse', 'Male', '2003-02-06', '2023-06-30', '078885283'),
('1200420010987650', 'NDAYISABA KAMARIZA', 'Belie', 'Female', '1997-11-21', '2023-06-07', '0785980550'),
('1200420010987654', 'NDAYISABA KAMARIZA', 'Belie ', 'Female', '2004-04-04', '2023-07-01', '0785980556'),
('1200420010987657', 'INGABIRE ANNE', 'Sonia', 'Female', '2004-05-13', '2023-06-23', '0782232701');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `CandidateNationalId` varchar(20) NOT NULL,
  `LicenseExamCategory` varchar(30) NOT NULL,
  `ObtainedMarks` int(11) NOT NULL,
  `Decision` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`CandidateNationalId`, `LicenseExamCategory`, `ObtainedMarks`, `Decision`) VALUES
('1200420010987654', 'Provisional', 16, 'Pass'),
('1200420010987654', 'A Category', 18, 'Pass'),
('1200420010987654', 'B Category', 20, 'Pass'),
('1200420010987654', 'D Category', 10, 'Fail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`),
  ADD UNIQUE KEY `AdminName` (`AdminName`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateNationalId`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD KEY `CandidateNationalId` (`CandidateNationalId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`CandidateNationalId`) REFERENCES `candidate` (`CandidateNationalId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
