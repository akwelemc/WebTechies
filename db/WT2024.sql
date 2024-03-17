-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2024 at 03:12 PM
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
DROP DATABASE IF EXISTS WT2024;
CREATE DATABASE WT2024;
USE WT2024;
-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `pid` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `date_booked` date NOT NULL,
  `time_slotID` int(11) NOT NULL,
  `bookingStatus` int(11) NOT NULL,
  `busStopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bookings`
--

INSERT INTO `Bookings` (`pid`, `bookingId`, `bid`, `date_booked`, `time_slotID`, `bookingStatus`, `busStopID`) VALUES
(16, 1, 9, '2024-03-20', 3, 3, 5),
(15, 2, 9, '2024-03-21', 5, 1, 3),
(16, 3, 9, '2024-03-18', 2, 3, 4),
(16, 4, 7, '2024-03-20', 5, 3, 8),
(16, 5, 7, '2024-03-19', 4, 1, 8),
(16, 6, 7, '2024-03-19', 3, 1, 6),
(16, 7, 9, '2024-03-20', 1, 1, 12),
(16, 8, 7, '2024-03-20', 6, 3, 8),
(16, 9, 9, '2024-03-20', 2, 1, 5),
(16, 10, 7, '2024-03-21', 5, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `BookingStatus`
--

CREATE TABLE `BookingStatus` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BookingStatus`
--

INSERT INTO `BookingStatus` (`status_id`, `status_name`) VALUES
(1, 'Booked'),
(2, 'Completed'),
(3, 'deleted');

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
(7, 'Jakpa Express', 50, 'Gr1234', 2),
(8, 'Jakpa express 2', 25, 'Gr1234-2', 2),
(9, 'Alinko', 100, 'Gr1234-3', 1),
(10, 'Coach', 50, 'Gr1456', 2);

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
(9, 2),
(7, 5),
(7, 6),
(9, 7),
(9, 9);

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
(6, '', 'Spanner', 1),
(7, '', 'Christ the King', 3),
(8, '', 'Kitase', 2),
(9, '', 'Oyarifa', 2),
(10, '', 'Adenta', 2),
(11, '', 'Madina', 2),
(12, 'Along the way', 'pimpinee', 1),
(15, 'South Kantamanso', 'Kwadaso', 2);

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
-- Table structure for table `CancelledBookings`
--

CREATE TABLE `CancelledBookings` (
  `bookingID` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CancelledBookings`
--

INSERT INTO `CancelledBookings` (`bookingID`, `cid`) VALUES
(1, 1),
(3, 3),
(4, 4),
(8, 2),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Driver`
--

CREATE TABLE `Driver` (
  `pid` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `licenseNumber` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Driver`
--

INSERT INTO `Driver` (`pid`, `bid`, `licenseNumber`) VALUES
(17, 9, '472'),
(19, 9, '354');

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
(8, 1, 'Chelsea ', 'Owusu', '1988-06-05', 'chelsea.owusu@ashesi.edu.gh', '+521407243878', 1, '$2y$10$jZJrXJt1C2Y1sxVnj8j3XuioPcp8rTuyKDTCo5HfmmsOGh8Ry3Xle', 'I love my life'),
(10, 2, '', 'lamar', '2000-07-10', 'abcdef@mailinator.com', '+471866280948', 0, '$2y$10$bGcUw8cC32GWqsLKj2tCEeQpW32C0ahiczW0xUllS.cNRSdSlhAce', 'I drive for life'),
(11, 1, 'Jerry', 'Sandoval', '2011-05-03', 'gynu@mailinator.com', '+442373586877', 0, '$2y$10$kuYGZux2Eez.pfR3DCapieNhzKIvlhia2XRHCXirY4WRPtYJgLwhO', NULL),
(12, 1, 'Aurora', 'Barlow', '1981-07-07', 'vapupuxepy@mailinator.com', '+478842617533', 1, '$2y$10$b0DvcbEj.Tjgneqz/ME9nOe07yP8JYKvIbdmpaaX32OMow7YUb/Nu', NULL),
(13, 1, 'Ima', 'Maldonado', '1991-06-26', 'fumyk@mailinator.com', '+176138502742', 0, '$2y$10$15zWKFRC3pnf.bYdyFJDpuKxmR4O/fcqY7nCT3UTUAcfKe6d9FMRS', NULL),
(14, 2, 'Leonard', 'Welch', '2010-02-10', 'zulefe@mailinator.com', '+894826949912', 1, '$2y$10$VndNBgfKMYteIBZTwOLRIeEZWD65EAQ5xPxNaEuX9TMX92Hr8/2Bi', NULL),
(15, 1, 'Chelsea', 'Banks', '2001-03-26', 'meqyqykufa@mailinator.com', '+989492293964', 1, '$2y$10$gNvorO2eesf3Jym2cBnd5ervAHZMRgMesVD1COKaSLnGpfEnH3966', NULL),
(16, 3, 'Chelsea', 'Grant', '2001-08-21', 'abcd@mailinator.com', '+614308524532', 0, '$2y$10$wW7zvfsmdqui2DhWbaECxuI0dD9bIynF9JCF2gIAllfhvGUORNT.u', 'I love Web Tech'),
(17, 2, 'Rafael', 'Jacobson', '1987-07-11', 'aaaa@mailinator.com', '+228621147330', 0, '$2y$10$rGEAl5FOBzzL15q6pbb48eh90zc7qulsxl82hsxkUnPB/qu7QiNfG', NULL),
(18, 3, 'Avram', 'Moon', '1982-02-10', 'buke@mailinator.com', '+863122611483', 0, '$2y$10$8kI5wJJhTZXVB7UOqQXBr.79MexCm95kauIiFP9HcB9hB7mZQidn.', NULL),
(19, 2, 'Mufutau', 'Olsen', '1972-11-19', 'gufivitiwu@mailinator.com', '+632325235415', 0, '$2y$10$ZhLJ7Z6cOMyMCasJqgy5M.PlDvFaj1JlKMPLP6YN/tffL0LapxZmS', NULL);

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
  ADD KEY `busStopID` (`busStopID`),
  ADD KEY `bookingStatus` (`bookingStatus`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `BookingStatus`
--
ALTER TABLE `BookingStatus`
  ADD PRIMARY KEY (`status_id`);

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
-- Indexes for table `BusStopRoutes`
--
ALTER TABLE `BusStopRoutes`
  ADD PRIMARY KEY (`bs_routeID`),
  ADD KEY `bsid` (`bsid`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `CancelledBookings`
--
ALTER TABLE `CancelledBookings`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `Driver`
--
ALTER TABLE `Driver`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `pid` (`pid`);

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
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Bus`
--
ALTER TABLE `Bus`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `BusStop`
--
ALTER TABLE `BusStop`
  MODIFY `bsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `CancelledBookings`
--
ALTER TABLE `CancelledBookings`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Tracking`
--
ALTER TABLE `Tracking`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`bookingStatus`) REFERENCES `bookingstatus` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Bus`
--
ALTER TABLE `Bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `Routes` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BusBooking`
--
ALTER TABLE `BusBooking`
  ADD CONSTRAINT `busbooking_ibfk_3` FOREIGN KEY (`bookingId`) REFERENCES `Bookings` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BusStop`
--
ALTER TABLE `BusStop`
  ADD CONSTRAINT `busstop_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `Routes` (`route_id`);

--
-- Constraints for table `CancelledBookings`
--
ALTER TABLE `CancelledBookings`
  ADD CONSTRAINT `cancelledbookings_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `Bookings` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Driver`
--
ALTER TABLE `Driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `Bus` (`bid`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Tracking`
--
ALTER TABLE `Tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`driver_pid`) REFERENCES `Driver` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
