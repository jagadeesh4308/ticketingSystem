-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2022 at 07:38 PM
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
-- Table structure for table `movieBookings`
--

CREATE TABLE `movieBookings` (
  `sno` int(255) NOT NULL,
  `ticketID` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `movieName` varchar(255) NOT NULL,
  `movieParticulars` varchar(255) NOT NULL,
  `seatPattern` varchar(255) NOT NULL,
  `isEntered` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movieBookings`
--

INSERT INTO `movieBookings` (`sno`, `ticketID`, `userName`, `movieName`, `movieParticulars`, `seatPattern`, `isEntered`) VALUES
(1, 'AS001', 'jagadeesh4308@gmail.com', 'Ante Sundaraniki', '05-07-2022_6:00PM', 'G-8, G-9', 0),
(2, 'AS002', 'jagadeesh4308@gmail.com', 'Ante Sundaraniki', '05-07-2022_6:00PM', 'I-19, I-20', 0),
(3, 'RRR001', 'jagadeesh4308@gmail.com', 'RRR', '07-07-2022_5:00PM', 'B-9, B-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movieSeatPattern`
--

CREATE TABLE `movieSeatPattern` (
  `sno` int(255) NOT NULL,
  `movieName` varchar(255) NOT NULL,
  `movieCode` varchar(255) NOT NULL,
  `movieDate` varchar(255) NOT NULL,
  `movieDescription` text NOT NULL,
  `ticketCost` int(255) NOT NULL,
  `moviePoster` varchar(1000) NOT NULL,
  `movieTrailer` varchar(1000) DEFAULT NULL,
  `slot1` text DEFAULT NULL,
  `slot2` text DEFAULT NULL,
  `slot3` text DEFAULT NULL,
  `slot4` text DEFAULT NULL,
  `isRegistrationsOpened` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movieSeatPattern`
--

INSERT INTO `movieSeatPattern` (`sno`, `movieName`, `movieCode`, `movieDate`, `movieDescription`, `ticketCost`, `moviePoster`, `movieTrailer`, `slot1`, `slot2`, `slot3`, `slot4`, `isRegistrationsOpened`) VALUES
(1, 'Ante Sundaraniki', 'AS', '05-07-2022', 'Starring Nani, Nazriya', 100, '1d4b176fe4376658d7e73ca3a68f9b7b.jpeg', 'https://youtu.be/NgBoMJy386M', '11:00AM#11011111000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000', '6:00PM#11011001110001100000_00011011001100011100_00000011101110000000_00000110000000000000_00000000111000000000_11100000000000000000_00000001100000000000_00000000000000000000_00011000000011000011_00000000000000000000_00000000000000000000_00000000111000000000_00000000000000000000_00000000000000000000_00010000000000000000', '', '', 1),
(2, 'RRR', 'RRR', '07-07-2022', 'Starring NTR, Ram charan and Alia Bhatt', 100, 'rrr.jpg', 'https://youtu.be/NgBoMJy386M', '5:00PM#00000000000000000000_00000000110000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000_00000000000000000000', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieBookings`
--
ALTER TABLE `movieBookings`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `movieSeatPattern`
--
ALTER TABLE `movieSeatPattern`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieBookings`
--
ALTER TABLE `movieBookings`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movieSeatPattern`
--
ALTER TABLE `movieSeatPattern`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
