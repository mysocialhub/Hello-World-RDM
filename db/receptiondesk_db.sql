-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 09:34 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptiondesk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`) VALUES
(1, 'sholaobadina', 'myideashub@gmail.com', 'Qwerty'),
(3, 'test', 'testme1n@gmail.com', 'oiuhgf');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `ID` int(10) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `TypeName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Service` int(10) NOT NULL,
  `QueuedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Seen` int(1) DEFAULT '0',
  `SeenBy` varchar(255) DEFAULT NULL,
  `SeenAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`ID`, `Type`, `TypeName`, `Name`, `Service`, `QueuedAt`, `Seen`, `SeenBy`, `SeenAt`) VALUES
(36, 'Anonymous', '', ' ', 3, '2017-05-17 07:35:21', 0, NULL, NULL),
(35, 'Organisation', 'Virgin', 'Richard Branson', 4, '2017-05-17 07:35:10', 0, '', '2017-05-17 09:28:45'),
(34, 'Citizen', '', 'Alan Sugar', 1, '2017-05-17 07:34:45', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID` int(10) NOT NULL,
  `Service` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID`, `Service`) VALUES
(1, 'Housing'),
(2, 'Benefits'),
(3, 'Council Tax'),
(4, 'Fly-tipping'),
(5, 'Missed Bin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
