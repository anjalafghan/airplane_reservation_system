-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 08, 2017 at 03:03 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `airplane_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `username`, `first_name`, `last_name`, `flight_id`, `source`, `destination`, `ticket_price`, `day`, `month`, `year`, `time`) VALUES
(8, 'sam', 'sameer', 'gorule', 3, 'India', 'Istanbul', 40203, 1, 1, 2017, '2017-10-29 14:42:04'),
(9, 'sam', 'sameer', 'gorule', 3, 'India', 'Istanbul', 40203, 1, 1, 2017, '2017-10-29 14:42:24'),
(10, 'sam', 'sameer', 'gorule', 3, 'India', 'Istanbul', 40214, 12, 1, 2017, '2017-11-08 08:02:08'),
(12, 'shubham', 'shubham', 'jagusthe', 3, 'India', 'Istanbul', 40214, 12, 1, 2017, '2017-11-08 11:44:33'),
(13, 'shubham', 'shubham', 'jagusthe', 1, 'India', 'United_States', 60255, 31, 12, 2017, '2017-11-08 11:47:24');

--
-- Triggers `bookings`
--
DROP TRIGGER IF EXISTS `add_flight_trigger`;
DELIMITER $$
CREATE TRIGGER `add_flight_trigger` AFTER INSERT ON `bookings` FOR EACH ROW BEGIN INSERT INTO log
SET first_name = new.first_name,
last_name = new.last_name,
flight_id = new.flight_id,
source = new.source,
destination = new.destination,
ticket_price = new.ticket_price,
day = new.day,
month = new.month,
year = new.year,
status = 'succesfully booked flight',
time = new.time;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `cancel_booking_log_trigger`;
DELIMITER $$
CREATE TRIGGER `cancel_booking_log_trigger` AFTER DELETE ON `bookings` FOR EACH ROW BEGIN INSERT INTO log
SET first_name = old.first_name,
last_name = old.last_name,
flight_id = old.flight_id,
source = old.source,
destination = old.destination,
ticket_price = old.ticket_price,
day = old.day,
month = old.month,
year = old.year,
status = 'succesfully cancelled flight',
time = old.time;
END
$$
DELIMITER ;
