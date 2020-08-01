-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 02:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`) VALUES
(1, 'Bus 1'),
(2, 'Bus 2'),
(3, 'Bus 3'),
(4, 'Bus 4'),
(5, 'Bus 5');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `no_of_tickets` int(10) UNSIGNED NOT NULL,
  `purchase_total` decimal(6,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `start` varchar(250) NOT NULL,
  `destination` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `start`, `destination`, `date`, `price`, `bus_id`) VALUES
(1, 'Bus Terminal Sungai Nibong, Penang', 'INTI College, Penang', '2020-08-07 07:25:00', '10.00', 1),
(2, 'Balik Pulau', 'Batu Lanchang', '2020-08-05 19:30:00', '9.50', 2),
(3, 'Penang International Airport', 'Sungai Nibung', '2020-08-06 08:30:00', '18.00', 2),
(4, 'Jeti, Penang', 'Penang International Airport', '2020-08-07 12:40:00', '13.00', 3),
(5, 'Jeti, Penang', 'Batu Lanchang, Penang', '2020-08-05 15:25:00', '11.00', 3),
(6, 'Gurney Plaza, Penang', 'Penang Hill', '2020-08-04 08:00:00', '13.00', 4),
(7, 'Penang Hill', 'Gurney Plaza, Penang', '2020-08-04 13:30:00', '12.00', 4),
(8, 'Gurney Plaza, Penang', 'Penang International Airport', '2020-08-05 10:15:00', '18.00', 4),
(9, 'Relau, Penang', 'The Top, Penang', '2020-08-03 09:45:00', '8.00', 5),
(10, 'Relau, Penang', 'Komtar, Penang', '2020-08-03 12:00:00', '10.50', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `password`) VALUES
(1, 'me@gmail.com', 'Me', '123456'),
(5, 'asd@gmail.com', 'Sim HK625', 'PotatoSim123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
