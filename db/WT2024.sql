-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 12:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WT2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--
DROP DATABASE IF EXISTS WT2024;
CREATE DATABASE WT2024;
USE  WT2024;
CREATE TABLE `Bookings` (
  `pid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `date` date NOT NULL,
  `departureTime` time NOT NULL,
  `bookingStatus` int(11) NOT NULL,
  `destination` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Bus`
--

CREATE TABLE `Bus` (
  `bid` int(11) NOT NULL,
  `busName` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL,
  `registrationNumber` varchar(25) NOT NULL,
  `destination` varchar(25) NOT NULL,
  `operationalHours` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `BusBooking`
--

CREATE TABLE `BusBooking` (
  `bid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `BusStop`
--

CREATE TABLE `BusStop` (
  `bsid` int(11) NOT NULL,
  `routeDescription` varchar(25) NOT NULL,
  `stopName` varchar(25) NOT NULL,
  `startPoint` varchar(25) NOT NULL,
  `endPoint` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `BusStopBus`
--

CREATE TABLE `BusStopBus` (
  `bsid` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Driver`
--

CREATE TABLE `Driver` (
  `pid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `licenseNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PassengerBookings`
--

CREATE TABLE `PassengerBookings` (
  `pid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE `People` (
  `pid` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telnumber` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `passwrd` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `People`
--

INSERT INTO `People` (`pid`, `role_id`, `fname`, `lname`, `dob`, `email`, `telnumber`, `gender`, `passwrd`, `bio`) VALUES
(2, 2, 'Abra', 'Salinas', '1977-12-10', 'cygyby@mailinator.com', '+104454139569', 1, '$2y$10$0i0BlD6aDEC83fWhoxTbcutm.OFj.xvUCc.B9DAle..a40a8hYB32', ''),
(3, 2, 'Lewis', 'Mcclure', '1992-08-21', 'jajufuxi@mailinator.com', '+664138110203', 0, '$2y$10$zMIQS4fqyOok9DNmETr5gOSXO6ofTdV13hrOGWVgj4Df4M4O80kV2', ''),
(4, 2, 'Randall', 'Mckinney', '2004-09-04', 'gisu@mailinator.com', '+988238942536', 0, '$2y$10$hZaWxgn.GxbHTrFxMGPmSeIQJEyxbm/XzSHgpS.hM2i37sW0en4hm', NULL),
(5, 3, 'Harding', 'Bell', '1975-11-16', 'kyjuguj@mailinator.com', '+367533953986', 0, '$2y$10$rCQKhodpnFqWhvzDFgMDiukmDZm/fu2KYDjwSGJ9HH7/W/K6N3pHO', NULL),
(6, 3, 'Kane', 'Potts', '2013-03-23', 'abc@mailinator.com', '+139729546822', 0, '$2y$10$Z0NAGvQ6mJvitWaS4AiGvelDFREtma2g8fYr8By9jEWvkm/cWZUna', NULL),
(7, 3, 'Aretha', 'Stokes', '2002-03-06', 'mityvyzyp@mailinator.com', '+769832942530', 1, '$2y$10$RSNQrmFjCScvI0c990piyulYDhV/qmF4gWmNtiZryllBHye0FHUMG', NULL),
(8, 3, 'Troy', 'Hood', '1988-06-05', 'abcd@mailinator.com', '+521407243878', 1, '$2y$10$2GyVr1PsBzjFH/FUVEPj9.XHT2QTAtbyZb8TzObfRW.W2XZ1npTl2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `rid` int(11) NOT NULL,
  `rolename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`rid`, `rolename`) VALUES
(1, 'superadmin'),
(2, 'driver'),
(3, 'passenger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `Bus`
--
ALTER TABLE `Bus`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `BusBooking`
--
ALTER TABLE `BusBooking`
  ADD KEY `busId` (`bid`),
  ADD KEY `bookingID` (`bookingId`);

--
-- Indexes for table `BusStop`
--
ALTER TABLE `BusStop`
  ADD PRIMARY KEY (`bsid`);

--
-- Indexes for table `BusStopBus`
--
ALTER TABLE `BusStopBus`
  ADD KEY `busId` (`bid`) USING BTREE,
  ADD KEY `bsid` (`bsid`);

--
-- Indexes for table `Driver`
--
ALTER TABLE `Driver`
  ADD KEY `bid` (`bid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `PassengerBookings`
--
ALTER TABLE `PassengerBookings`
  ADD KEY `pid` (`pid`),
  ADD KEY `bookingId` (`bookingId`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Bus`
--
ALTER TABLE `Bus`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BusBooking`
--
ALTER TABLE `BusBooking`
  ADD CONSTRAINT `busbooking_ibfk_3` FOREIGN KEY (`bookingId`) REFERENCES `Bookings` (`bookingId`),
  ADD CONSTRAINT `busbooking_ibfk_4` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `BusStopBus`
--
ALTER TABLE `BusStopBus`
  ADD CONSTRAINT `busstopbus_ibfk_1` FOREIGN KEY (`bsid`) REFERENCES `BusStop` (`bsid`),
  ADD CONSTRAINT `busstopbus_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `Driver`
--
ALTER TABLE `Driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `People` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `PassengerBookings`
--
ALTER TABLE `PassengerBookings`
  ADD CONSTRAINT `passengerbookings_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `Bookings` (`bookingId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
