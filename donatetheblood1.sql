-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 03:19 PM
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
-- Database: `donatetheblood1`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Contact_no` varchar(16) NOT NULL,
  `Save_life_date` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `Name`, `Gender`, `Email`, `City`, `DOB`, `Contact_no`, `Save_life_date`, `Password`, `blood_group`) VALUES
(1, 'SHRUTI', 'Fe-male', 'shrutisrivastava1904@gmail.com', 'Dera Bugti', '1997-07-12', '7007061011', '2020-07-18', 'shruti123', 'A+'),
(3, 'kjnkjc', 'Male', 'abcdefgh190@gmail.com', '   Barkhan   ', '    1971    -    11 ', '7007061033', '2020-07-19', '73d98b481fe4148fea2b01c63b46d188', '    B-    '),
(4, 'aditi', 'Female', 'shrutisrivastava19@gmail.com', 'Jhal Magsi', '1974-05-06', '7007061025', '2020-07-19', '73d98b481fe4148fea2b01c63b46d188', 'AB+'),
(5, 'Shruti Srivastava', 'Female', 'shrutisrivastava1905@gmail.com', 'Barkhan', '1996-05-12', '7007061044', '2020-07-20', '73d98b481fe4148fea2b01c63b46d188', 'A+'),
(6, 'Ram Sharma', 'Male', 'ram1234@gmail.com', 'Noida', '  1992  -  08  -  20', '7007061046', '0', '73d98b481fe4148fea2b01c63b46d188', '  O+  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
