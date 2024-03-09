-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 02:56 PM
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

DROP DATABASE IF EXISTS WT2024;
CREATE DATABASE WT2024;
USE WT2024;

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `pid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `date_booked` date NOT NULL,
  `time_slotID` int(11) NOT NULL,
  `bookingStatus` varchar(25) NOT NULL,
  `busStopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bookings`
--

INSERT INTO `Bookings` (`pid`, `bookingId`, `bid`, `date_booked`, `time_slotID`, `bookingStatus`, `busStopID`) VALUES
(8, 1, 1, '2023-02-12', 70000, 'booked', 1),
(8, 2, 1, '2023-02-12', 70000, 'booked', 1),
(8, 3, 1, '2025-04-13', 73000, 'booked', 5),
(8, 4, 1, '2025-04-13', 73000, 'booked', 5),
(8, 5, 1, '2025-04-13', 73000, 'booked', 5),
(8, 6, 1, '2023-02-14', 70000, 'booked', 4),
(8, 7, 1, '2023-02-14', 2, 'booked', 4),
(8, 8, 1, '2023-02-14', 3, 'booked', 4),
(8, 10, 2, '2023-02-14', 4, 'booked', 9),
(8, 11, 2, '2024-03-31', 1, 'booked', 10),
(8, 12, 3, '2024-04-30', 3, 'booked', 7),
(8, 13, 1, '2024-05-31', 1, 'booked', 1),
(8, 14, 3, '2024-08-31', 1, 'booked', 7),
(8, 15, 1, '2024-03-19', 5, 'booked', 2),
(8, 16, 1, '2024-03-12', 1, 'booked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Bus`
--

CREATE TABLE `Bus` (
  `bid` int(11) NOT NULL,
  `busName` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL,
  `registrationNumber` varchar(25) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bus`
--

INSERT INTO `Bus` (`bid`, `busName`, `capacity`, `registrationNumber`, `route_id`) VALUES
(1, 'Coach', 50, 'GR23-2023', 1),
(2, 'Coach', 50, 'GR24-2023', 2),
(3, 'Coach', 50, 'GR26-2023', 3);

-- --------------------------------------------------------

--
-- Table structure for table `BusBooking`
--

CREATE TABLE `BusBooking` (
  `bid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BusBooking`
--

INSERT INTO `BusBooking` (`bid`, `bookingId`) VALUES
(3, 12),
(1, 13),
(3, 14),
(1, 15),
(1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `BusRoutes`
--

CREATE TABLE `BusRoutes` (
  `bus_routeID` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BusRoutes`
--

INSERT INTO `BusRoutes` (`bus_routeID`, `bid`, `route_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `BusStop`
--

CREATE TABLE `BusStop` (
  `bsid` int(11) NOT NULL,
  `routeDescription` varchar(25) NOT NULL,
  `stopName` varchar(25) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BusStop`
--

INSERT INTO `BusStop` (`bsid`, `routeDescription`, `stopName`, `route_id`) VALUES
(1, '', 'Berekuso', 1),
(2, '', 'Ashomang', 1),
(3, '', 'Atomic', 1),
(4, '', 'Achimota', 1),
(5, '', 'Kwabenya', 1),
(6, '', 'Spanner', 3),
(7, '', 'Christ the King', 3),
(8, '', 'Kitase', 2),
(9, '', 'Oyarifa', 2),
(10, '', 'Adenta', 2),
(11, '', 'Madina', 2);

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
-- Table structure for table `BusStopRoutes`
--

CREATE TABLE `BusStopRoutes` (
  `bsid` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bs_routeID` int(11) NOT NULL
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
-- Table structure for table `DriverTracking`
--

CREATE TABLE `DriverTracking` (
  `track_id` int(11) NOT NULL,
  `driver_pid` int(11) NOT NULL,
  `driver_bid` int(11) NOT NULL,
  `dTid` int(11) NOT NULL
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
(8, 3, 'Troy', 'Hood', '1988-06-05', 'abcd@mailinator.com', '+521407243878', 1, '$2y$10$2GyVr1PsBzjFH/FUVEPj9.XHT2QTAtbyZb8TzObfRW.W2XZ1npTl2', NULL),
(10, 2, 'Keelie', 'Joyner', '2000-07-10', 'abcdef@mailinator.com', '+471866280948', 0, '$2y$10$9MKUOUMsjZdTgu4/dP7r..9tDevMleDtE1NA9Mx66UQH75mrOeqkS', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `Routes`
--

CREATE TABLE `Routes` (
  `route_id` int(11) NOT NULL,
  `route` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Routes`
--

INSERT INTO `Routes` (`route_id`, `route`) VALUES
(1, 'Ashesi-Berekuso'),
(2, 'Ashesi-Kitase'),
(3, 'Either');

-- --------------------------------------------------------

--
-- Table structure for table `TimeSlots`
--

CREATE TABLE `TimeSlots` (
  `slotID` int(11) NOT NULL,
  `time` time NOT NULL,
  `tripType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `TimeSlots`
--

INSERT INTO `TimeSlots` (`slotID`, `time`, `tripType`) VALUES
(1, '07:00:00', 'pick-up'),
(2, '07:30:00', 'pick-up'),
(3, '08:00:00', 'pick-up'),
(4, '15:00:00', 'departure'),
(5, '17:00:00', 'departure'),
(6, '18:30:00', 'departure'),
(7, '20:00:00', 'departure');

-- --------------------------------------------------------

--
-- Table structure for table `Tracking`
--

CREATE TABLE `Tracking` (
  `track_id` int(11) NOT NULL,
  `driver_pid` int(11) NOT NULL,
  `driver_bid` int(11) NOT NULL,
  `track_time` datetime NOT NULL DEFAULT current_timestamp(),
  `track_lng` decimal(11,7) NOT NULL,
  `track_lat` decimal(11,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `pid` (`pid`),
  ADD KEY `busStopID` (`busStopID`);

--
-- Indexes for table `Bus`
--
ALTER TABLE `Bus`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `BusBooking`
--
ALTER TABLE `BusBooking`
  ADD KEY `busId` (`bid`),
  ADD KEY `bookingID` (`bookingId`);

--
-- Indexes for table `BusRoutes`
--
ALTER TABLE `BusRoutes`
  ADD PRIMARY KEY (`bus_routeID`),
  ADD KEY `bid` (`bid`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `BusStop`
--
ALTER TABLE `BusStop`
  ADD PRIMARY KEY (`bsid`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `BusStopBus`
--
ALTER TABLE `BusStopBus`
  ADD KEY `busId` (`bid`) USING BTREE,
  ADD KEY `bsid` (`bsid`);

--
-- Indexes for table `BusStopRoutes`
--
ALTER TABLE `BusStopRoutes`
  ADD PRIMARY KEY (`bs_routeID`),
  ADD KEY `bsid` (`bsid`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `Driver`
--
ALTER TABLE `Driver`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `DriverTracking`
--
ALTER TABLE `DriverTracking`
  ADD PRIMARY KEY (`dTid`),
  ADD KEY `driver_pid` (`driver_pid`),
  ADD KEY `track_id` (`track_id`);

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
-- Indexes for table `Routes`
--
ALTER TABLE `Routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `TimeSlots`
--
ALTER TABLE `TimeSlots`
  ADD PRIMARY KEY (`slotID`);

--
-- Indexes for table `Tracking`
--
ALTER TABLE `Tracking`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `driver_pid` (`driver_pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `DriverTracking`
--
ALTER TABLE `DriverTracking`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Tracking`
--
ALTER TABLE `Tracking`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bus`
--
ALTER TABLE `Bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `Routes` (`route_id`);

--
-- Constraints for table `BusBooking`
--
ALTER TABLE `BusBooking`
  ADD CONSTRAINT `busbooking_ibfk_3` FOREIGN KEY (`bookingId`) REFERENCES `Bookings` (`bookingId`),
  ADD CONSTRAINT `busbooking_ibfk_4` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `BusRoutes`
--
ALTER TABLE `BusRoutes`
  ADD CONSTRAINT `busroutes_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `BusStop`
--
ALTER TABLE `BusStop`
  ADD CONSTRAINT `busstop_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `Routes` (`route_id`);

--
-- Constraints for table `BusStopBus`
--
ALTER TABLE `BusStopBus`
  ADD CONSTRAINT `busstopbus_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `Driver`
--
ALTER TABLE `Driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`);

--
-- Constraints for table `DriverTracking`
--
ALTER TABLE `DriverTracking`
  ADD CONSTRAINT `drivertracking_ibfk_1` FOREIGN KEY (`driver_pid`) REFERENCES `Driver` (`pid`),
  ADD CONSTRAINT `drivertracking_ibfk_2` FOREIGN KEY (`track_id`) REFERENCES `Tracking` (`track_id`);

--
-- Constraints for table `PassengerBookings`
--
ALTER TABLE `PassengerBookings`
  ADD CONSTRAINT `passengerbookings_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `Bookings` (`bookingId`);

--
-- Constraints for table `Tracking`
--
ALTER TABLE `Tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`driver_pid`) REFERENCES `Driver` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
