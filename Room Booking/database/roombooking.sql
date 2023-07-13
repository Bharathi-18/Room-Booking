-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 09:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `room1`
--

CREATE TABLE `room1` (
  `id` int(11) NOT NULL,
  `meetname` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `noOfPrsn` int(11) NOT NULL,
  `dat` date NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room1`
--

INSERT INTO `room1` (`id`, `meetname`, `description`, `noOfPrsn`, `dat`, `fromTime`, `toTime`) VALUES
(1, 'Intern Syncup', 'Regular meeting', 4, '2023-07-18', '15:30:00', '16:30:00'),
(2, 'Intern Syncup', 'Regular meeting', 4, '2023-07-25', '15:30:00', '16:30:00'),
(3, 'Intern Syncup', 'Regular meeting', 4, '2023-08-01', '15:30:00', '16:30:00'),
(5, 'Sprint Review Meeting', 'Nil', 4, '2023-07-14', '10:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room2`
--

CREATE TABLE `room2` (
  `id` int(11) NOT NULL,
  `meetname` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `noOfPrsn` int(11) NOT NULL,
  `dat` date NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room2`
--

INSERT INTO `room2` (`id`, `meetname`, `description`, `noOfPrsn`, `dat`, `fromTime`, `toTime`) VALUES
(1, 'Intern Syncup', 'Sprint Discuss meeting', 5, '2023-07-05', '15:30:00', '16:30:00'),
(2, 'Intern Syncup', 'Sprint Discuss meeting', 5, '2023-07-12', '15:30:00', '16:30:00'),
(3, 'Intern Syncup', 'Sprint Discuss meeting', 5, '2023-07-18', '15:30:00', '16:30:00'),
(4, 'Sprint Review Meeting', 'Nil', 2, '2023-07-14', '10:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roomsdetails`
--

CREATE TABLE `roomsdetails` (
  `id` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomsdetails`
--

INSERT INTO `roomsdetails` (`id`, `roomName`) VALUES
(1, 'room1'),
(2, 'room2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room1`
--
ALTER TABLE `room1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room2`
--
ALTER TABLE `room2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomsdetails`
--
ALTER TABLE `roomsdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roomName` (`roomName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room1`
--
ALTER TABLE `room1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room2`
--
ALTER TABLE `room2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roomsdetails`
--
ALTER TABLE `roomsdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
