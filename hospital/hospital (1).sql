-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 07:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `apt_details`
--

CREATE TABLE `apt_details` (
  `pid` int(5) NOT NULL,
  `pno` int(5) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `doctor` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apt_details`
--

INSERT INTO `apt_details` (`pid`, `pno`, `dept`, `doctor`, `date`, `time`, `status`) VALUES
(1, 1, 'eye', 'kaushik', '2019-04-19', '21:00:00', 0),
(1, 2, 'eye', 'kaushik', '2019-04-18', '12:00:00', 0),
(5, 3, 'skin', 'sushma', '2019-04-22', '19:00:00', 0),
(6, 8, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 9, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 10, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 11, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 12, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 13, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(6, 14, 'eye', 'kaushik', '2019-04-18', '17:24:04', 0),
(1, 15, 'skin', 'sushma', '2019-04-22', '19:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_name` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_name`, `password`, `doc_id`, `dept`, `degree`, `experience`) VALUES
('kaushik', '123', 1, 'eye', '1983-1988 - M.B.B.S, (MAMC), New Delhi\r\n1992-1995 ', 'Director & Head of the Department - Ophthalmology at Fortis Memorial Research Institute, Gurgaon\r\nMedical Director – Vasan Eye Care, New Delhi\r\nHOD (Ophthalmology) – Max Eye Care(a unit of MHIL), New Delhi'),
('sushma', '123', 2, 'skin', ' MBBS – 1979 (Bachelor of Medicine) Lady Harding M', 'Senior Consultant – Clinical Allergy / Max Hospitals Jan 2000 - Till Date\r\nChairperson - HSSC Advisory Committee on NOS, Accreditation & Certification'),
('sanjay', '123', 3, 'skin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doc_time`
--

CREATE TABLE `doc_time` (
  `docNo` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_time`
--

INSERT INTO `doc_time` (`docNo`, `date`, `time`, `status`) VALUES
(1, '2019-04-18', '17:24:04', 1),
(1, '2019-04-18', '17:24:04', 1),
(1, '2019-04-11', '12:00:00', 1),
(2, '2019-04-22', '19:00:00', 1),
(2, '2019-04-22', '19:00:00', 1),
(3, '2019-04-19', '19:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(5) NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `name`, `pass`) VALUES
(1, 'kiran', '123'),
(2, 'parul', '123'),
(3, 'rushali', '123'),
(4, 'naveen', '123'),
(5, 'hitesh', '123'),
(6, 'shivam', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apt_details`
--
ALTER TABLE `apt_details`
  ADD PRIMARY KEY (`pno`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doc_time`
--
ALTER TABLE `doc_time`
  ADD KEY `docNo` (`docNo`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apt_details`
--
ALTER TABLE `apt_details`
  MODIFY `pno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apt_details`
--
ALTER TABLE `apt_details`
  ADD CONSTRAINT `apt_details_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`p_id`);

--
-- Constraints for table `doc_time`
--
ALTER TABLE `doc_time`
  ADD CONSTRAINT `doc_time_ibfk_1` FOREIGN KEY (`docNo`) REFERENCES `doctor` (`doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
