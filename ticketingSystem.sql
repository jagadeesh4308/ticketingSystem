-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2022 at 12:43 PM
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
-- Table structure for table `movieSeatPattern`
--

CREATE TABLE `movieSeatPattern` (
  `sno` int(255) NOT NULL,
  `movieName` varchar(255) NOT NULL,
  `movieDate` varchar(255) NOT NULL,
  `movieDescription` text NOT NULL,
  `ticketCost` int(255) NOT NULL,
  `slot1` varchar(1000) DEFAULT NULL,
  `slot2` varchar(1000) DEFAULT NULL,
  `slot3` varchar(1000) DEFAULT NULL,
  `slot4` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movieSeatPattern`
--

INSERT INTO `movieSeatPattern` (`sno`, `movieName`, `movieDate`, `movieDescription`, `ticketCost`, `slot1`, `slot2`, `slot3`, `slot4`) VALUES
(1, 'SVP', '25-06-2022', 'Hello, all directed by Parasuram', 150, '3:00PM#00000@00000_00000@00000_00000@00000_00000@00000', '11:00PM#00000@00000_00000@00000_00000@00000_00000@00000', '9:00PM#00000@00000_00000@00000_00000@00000_00000@00000', NULL),
(2, 'Ante Sundaraniki', '26-06-2022', 'Directed by Vivek Atreya', 100, '3:00PM#00000@00000_00000@00000_00000@00000_00000@00000', '8:00PM#00000@00000_00000@00000_00000@00000_00000@00000', NULL, NULL),
(3, 'SVP', '31-06-2022', 'Starred by Mahesh Babu', 100, '3:00PM#00000@00000_00000@00000_00000@00000_00000@00000', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieSeatPattern`
--
ALTER TABLE `movieSeatPattern`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieSeatPattern`
--
ALTER TABLE `movieSeatPattern`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
