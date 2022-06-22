-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2022 at 08:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `girlRows`
--

CREATE TABLE `girlRows` (
  `sno` int(255) NOT NULL,
  `rowName` varchar(255) NOT NULL,
  `nOfSeats` int(255) NOT NULL,
  `patternFill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `girlRows`
--

INSERT INTO `girlRows` (`sno`, `rowName`, `nOfSeats`, `patternFill`) VALUES
(1, 'a', 10, '0_1_1_0_0_1'),
(2, 'b', 7, '0_1_1_1_0_0_0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `girlRows`
--
ALTER TABLE `girlRows`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `girlRows`
--
ALTER TABLE `girlRows`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
