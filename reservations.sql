-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2026 at 04:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_no` varchar(50) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `booking_time` varchar(200) NOT NULL,
  `arrival_time` varchar(200) NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `guest_names` text NOT NULL,
  `special_request` text DEFAULT NULL,
  `status` enum('Pending','Confirmed','Cancelled','Completed') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `reservation_no`, `booking_date`, `booking_time`, `arrival_time`, `number_of_guests`, `table_number`, `guest_names`, `special_request`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, NULL, '2026-06-28', 'afternoon', '12:00', 5, 11, 'AAAAAAAAAAAAA', NULL, 'Pending', '2026-06-07 14:03:25', '2026-06-07 14:03:25'),
(8, 1, NULL, '2026-06-29', 'afternoon', '12:00', 12, 10, 'AAAAA', NULL, 'Pending', '2026-06-07 14:07:56', '2026-06-07 14:07:56'),
(9, 1, NULL, '2026-06-28', 'evening', '17:30', 5, 11, 'AAA', NULL, 'Pending', '2026-06-07 14:22:22', '2026-06-07 14:22:22'),
(10, 1, NULL, '2026-06-29', 'evening', '17:00', 13, 10, 'AAAAAA', NULL, 'Confirmed', '2026-06-07 14:23:44', '2026-06-07 14:23:44'),
(11, 1, NULL, '2026-06-30', 'afternoon', '12:00', 6, 11, 'AAAAAA', NULL, 'Confirmed', '2026-06-07 14:37:44', '2026-06-07 14:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(2000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Hafiz ', 'Ullah', 'hafizullah', '01723411403', 'hafiz322@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'AA', 'BB', 'Dhyaka', 'AA', '102', 'AA', '2026-06-07 07:42:53', '2026-06-07 08:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_number` int(11) NOT NULL,
  `table_name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_number`, `table_name`) VALUES
(1, 'Table 01'),
(2, 'Table 02'),
(3, 'Table 03'),
(4, 'Table 04'),
(5, 'Table 05'),
(6, 'Table 06'),
(7, 'Table 07'),
(8, 'Table 08'),
(9, 'Table 09'),
(10, 'Table 10'),
(11, 'Table 11'),
(12, 'Table 12'),
(13, 'Table 13'),
(14, 'Table 14'),
(15, 'Table 15'),
(16, 'Table 16'),
(17, 'Table 17'),
(18, 'Table 18'),
(19, 'Table 19'),
(20, 'Table 20'),
(21, 'Table 21'),
(22, 'Table 22'),
(23, 'Table 23'),
(24, 'Table 24'),
(25, 'Table 25'),
(26, 'Table 26'),
(27, 'Table 27'),
(28, 'Table 28'),
(29, 'Table 29'),
(30, 'Table 30'),
(31, 'Table 31'),
(32, 'Table 32'),
(33, 'Table 33'),
(34, 'Table 34'),
(35, 'Table 35'),
(36, 'Table 36'),
(37, 'Table 37'),
(38, 'Table 38'),
(39, 'Table 39'),
(40, 'Table 40'),
(41, 'Table 41'),
(42, 'Table 42'),
(43, 'Table 43'),
(44, 'Table 44'),
(45, 'Table 45'),
(46, 'Table 46'),
(47, 'Table 47'),
(48, 'Table 48'),
(49, 'Table 49'),
(50, 'Table 50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `reservation_no` (`reservation_no`),
  ADD KEY `fk_booking_customer` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
