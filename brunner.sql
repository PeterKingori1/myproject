-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 11:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brunner`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(30) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `type` varchar(20) NOT NULL,
  `guest_number` int(45) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `first_name`, `last_name`, `email`, `phone_number`, `type`, `guest_number`, `check_in_date`, `check_out_date`, `extra`) VALUES
('bk-id60853e9cd0232', 'denis ', 'nduhiu', 'xnduhiux@gmail.com', '0796425701', 'single', 1, '2021-04-14', '2021-04-18', 'THIS IS THE END OF THE WORLD'),
('bk-id60853ef418396', 'denis ', 'nduhiu', 'xnduhiux@gmail.com', '0796425701', 'single', 1, '2021-04-14', '2021-04-18', 'THIS IS THE END OF THE WORLD'),
('bk-id60853f0220371', 'denis ', 'nduhiu', 'xnduhiux@gmail.com', '0796425701', 'single', 1, '2021-04-14', '2021-04-18', 'THIS IS THE END OF THE WORLD'),
('bk-id60853f08c2ab7', 'denis ', 'nduhiu', 'xnduhiux@gmail.com', '0796425701', 'single', 1, '2021-04-14', '2021-04-18', 'THIS IS THE END OF THE WORLD'),
('bk-id60883e4373701', 'denis ', 'ruce', 'dennis', '0796425701', 'double', 1, '2021-04-22', '2021-05-06', ''),
('bk-id60883e522bce0', 'denis ', 'ruce', 'dennis', '0796425701', 'double', 1, '2021-04-22', '2021-05-06', ''),
('bk-id609268ff0baf3', 'qswdgf', 'nduhiu', 'dennis@gmail.com', '0736738673', 'double', 2, '2021-05-06', '2021-05-14', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(55) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vacancy` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `type`, `vacancy`) VALUES
(1, 'single', 1),
(2, 'single', 1),
(3, 'double', 0),
(4, 'single', 1),
(5, 'double', 1),
(7, 'double', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` int(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `type`) VALUES
(1, 'peter ', 'kingori', 'xnduhiux@gmail.com', 34555, '123', 'admin'),
(3, 'king', 'kerian', 'blaze@gmail.com', 736738673, '123', 'admin'),
(5, 'denis ', 'ruce', 'demo1@demo.com', 736738673, 'admin', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
