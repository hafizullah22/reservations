-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 04:02 PM
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
(8, 1, NULL, '2026-06-29', 'afternoon', '12:00', 12, 10, 'AAAAA', NULL, 'Confirmed', '2026-06-07 14:07:56', '2026-06-10 15:24:28'),
(13, 99, 'RES-623441', '2026-06-28', 'evening', '6:00 PM', 10, 39, 'Guest-704', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(14, 78, 'RES-126261', '2026-06-28', 'afternoon', '2:00 PM', 5, 13, 'Guest-819', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(15, 84, 'RES-843286', '2026-06-28', 'afternoon', '6:00 PM', 10, 17, 'Guest-666', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(16, 72, 'RES-908591', '2026-06-28', 'afternoon', '7:00 PM', 5, 32, 'Guest-683', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(17, 86, 'RES-105293', '2026-06-28', 'evening', '7:00 PM', 9, 47, 'Guest-863', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(18, 64, 'RES-388988', '2026-06-28', 'afternoon', '1:00 PM', 7, 24, 'Guest-256', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(19, 89, 'RES-148235', '2026-06-28', 'evening', '1:00 PM', 9, 8, 'Guest-275', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(20, 59, 'RES-865789', '2026-06-28', 'evening', '6:00 PM', 10, 30, 'Guest-3', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(21, 91, 'RES-401966', '2026-06-28', 'afternoon', '1:00 PM', 7, 20, 'Guest-980', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(22, 71, 'RES-166178', '2026-06-28', 'evening', '12:30 PM', 6, 28, 'Guest-132', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(23, 93, 'RES-751623', '2026-06-28', 'evening', '2:00 PM', 7, 33, 'Guest-283', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(25, 53, 'RES-538625', '2026-06-28', 'evening', '1:00 PM', 7, 37, 'Guest-384', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(26, 100, 'RES-548889', '2026-06-28', 'evening', '12:30 PM', 1, 4, 'Guest-35', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(27, 75, 'RES-682447', '2026-06-28', 'afternoon', '2:00 PM', 10, 30, 'Guest-73', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(28, 60, 'RES-732333', '2026-06-28', 'afternoon', '1:00 PM', 2, 39, 'Guest-300', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(29, 79, 'RES-557742', '2026-06-28', 'afternoon', '1:00 PM', 4, 43, 'Guest-82', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(30, 85, 'RES-136691', '2026-06-28', 'evening', '6:00 PM', 10, 17, 'Guest-807', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(31, 69, 'RES-182334', '2026-06-28', 'evening', '1:00 PM', 4, 3, 'Guest-208', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(32, 94, 'RES-871560', '2026-06-28', 'evening', '6:00 PM', 8, 19, 'Guest-593', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(33, 82, 'RES-942405', '2026-06-28', 'evening', '12:30 PM', 4, 23, 'Guest-194', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(34, 73, 'RES-960619', '2026-06-28', 'evening', '12:30 PM', 2, 36, 'Guest-983', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(35, 67, 'RES-836727', '2026-06-28', 'afternoon', '7:00 PM', 8, 48, 'Guest-341', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(36, 87, 'RES-506760', '2026-06-28', 'afternoon', '6:00 PM', 8, 20, 'Guest-560', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(37, 77, 'RES-298867', '2026-06-28', 'afternoon', '12:30 PM', 8, 43, 'Guest-690', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(38, 76, 'RES-247486', '2026-06-28', 'evening', '2:00 PM', 10, 8, 'Guest-17', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(39, 83, 'RES-894421', '2026-06-28', 'afternoon', '12:30 PM', 2, 26, 'Guest-95', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(40, 88, 'RES-824037', '2026-06-28', 'evening', '1:00 PM', 4, 15, 'Guest-191', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(41, 96, 'RES-456542', '2026-06-28', 'evening', '12:30 PM', 9, 51, 'Guest-324', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(42, 97, 'RES-626912', '2026-06-28', 'evening', '1:00 PM', 7, 30, 'Guest-906', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(43, 58, 'RES-689089', '2026-06-28', 'afternoon', '5:30 PM', 5, 39, 'Guest-274', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(44, 92, 'RES-813852', '2026-06-28', 'evening', '1:00 PM', 1, 32, 'Guest-808', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(45, 63, 'RES-958281', '2026-06-28', 'evening', '6:00 PM', 9, 6, 'Guest-91', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(46, 101, 'RES-953244', '2026-06-28', 'afternoon', '1:00 PM', 3, 7, 'Guest-33', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(47, 57, 'RES-801012', '2026-06-28', 'evening', '5:30 PM', 1, 21, 'Guest-986', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(48, 56, 'RES-819049', '2026-06-28', 'evening', '7:00 PM', 5, 24, 'Guest-27', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(49, 66, 'RES-678416', '2026-06-28', 'evening', '1:00 PM', 10, 37, 'Guest-738', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(50, 62, 'RES-878589', '2026-06-28', 'evening', '6:00 PM', 9, 17, 'Guest-939', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(51, 81, 'RES-107310', '2026-06-28', 'evening', '6:00 PM', 9, 5, 'Guest-971', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(52, 52, 'RES-335754', '2026-06-28', 'evening', '12:30 PM', 5, 38, 'Guest-265', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(53, 98, 'RES-578658', '2026-06-28', 'afternoon', '7:00 PM', 4, 7, 'Guest-479', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(54, 74, 'RES-432772', '2026-06-28', 'afternoon', '1:00 PM', 2, 52, 'Guest-662', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(55, 54, 'RES-948372', '2026-06-28', 'afternoon', '6:00 PM', 2, 26, 'Guest-121', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(56, 70, 'RES-986200', '2026-06-28', 'afternoon', '7:00 PM', 8, 1, 'Guest-979', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(57, 61, 'RES-761559', '2026-06-28', 'evening', '1:00 PM', 8, 45, 'Guest-83', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(58, 95, 'RES-870176', '2026-06-28', 'afternoon', '7:00 PM', 1, 39, 'Guest-382', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(59, 65, 'RES-957904', '2026-06-28', 'evening', '6:00 PM', 3, 36, 'Guest-769', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(60, 90, 'RES-989029', '2026-06-28', 'afternoon', '1:00 PM', 3, 32, 'Guest-136', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(61, 80, 'RES-614976', '2026-06-28', 'evening', '12:30 PM', 8, 13, 'Guest-999', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(62, 55, 'RES-848437', '2026-06-28', 'afternoon', '2:00 PM', 9, 36, 'Guest-968', 'No special request', 'Confirmed', '2026-06-12 05:03:49', '2026-06-12 05:03:49'),
(63, 1, 'RES-20260614-7752', '2026-06-20', 'afternoon', '12:00', 10, 38, 'AAA', NULL, 'Confirmed', '2026-06-14 13:50:02', '2026-06-14 13:50:02');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('Member','Admin') NOT NULL DEFAULT 'Member',
  `customer_type` enum('Non-Resident','Resident') NOT NULL DEFAULT 'Non-Resident'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `role`, `customer_type`) VALUES
(1, 'Hafiz ', 'Ullah', 'hafizullah', '01723411403', 'hafizullah@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'AA', 'BB', 'Dhyaka', 'AA', '102', 'AA', '2026-06-07 07:42:53', '2026-06-12 03:46:31', 'Admin', 'Resident'),
(52, 'Customer1', 'User', 'customer1', '01710000001', 'customer1@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 1', 'Road 1', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(53, 'Customer2', 'User', 'customer2', '01710000002', 'customer2@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 2', 'Road 2', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(54, 'Customer3', 'User', 'customer3', '01710000003', 'customer3@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 3', 'Road 3', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(55, 'Customer4', 'User', 'customer4', '01710000004', 'customer4@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 4', 'Road 4', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(56, 'Customer5', 'User', 'customer5', '01710000005', 'customer5@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 5', 'Road 5', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(57, 'Customer6', 'User', 'customer6', '01710000006', 'customer6@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 6', 'Road 6', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(58, 'Customer7', 'User', 'customer7', '01710000007', 'customer7@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 7', 'Road 7', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(59, 'Customer8', 'User', 'customer8', '01710000008', 'customer8@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 8', 'Road 8', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(60, 'Customer9', 'User', 'customer9', '01710000009', 'customer9@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 9', 'Road 9', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(61, 'Customer10', 'User', 'customer10', '01710000010', 'customer10@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 10', 'Road 10', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(62, 'Customer11', 'User', 'customer11', '01710000011', 'customer11@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 11', 'Road 11', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(63, 'Customer12', 'User', 'customer12', '01710000012', 'customer12@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 12', 'Road 12', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(64, 'Customer13', 'User', 'customer13', '01710000013', 'customer13@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 13', 'Road 13', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(65, 'Customer14', 'User', 'customer14', '01710000014', 'customer14@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 14', 'Road 14', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(66, 'Customer15', 'User', 'customer15', '01710000015', 'customer15@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 15', 'Road 15', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(67, 'Customer16', 'User', 'customer16', '01710000016', 'customer16@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 16', 'Road 16', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(68, 'Customer17', 'User', 'customer17', '01710000017', 'customer17@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 17', 'Road 17', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(69, 'Customer18', 'User', 'customer18', '01710000018', 'customer18@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 18', 'Road 18', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(70, 'Customer19', 'User', 'customer19', '01710000019', 'customer19@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 19', 'Road 19', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(71, 'Customer20', 'User', 'customer20', '01710000020', 'customer20@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 20', 'Road 20', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(72, 'Customer21', 'User', 'customer21', '01710000021', 'customer21@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 21', 'Road 21', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(73, 'Customer22', 'User', 'customer22', '01710000022', 'customer22@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 22', 'Road 22', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(74, 'Customer23', 'User', 'customer23', '01710000023', 'customer23@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 23', 'Road 23', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(75, 'Customer24', 'User', 'customer24', '01710000024', 'customer24@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 24', 'Road 24', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(76, 'Customer25', 'User', 'customer25', '01710000025', 'customer25@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 25', 'Road 25', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(77, 'Customer26', 'User', 'customer26', '01710000026', 'customer26@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 26', 'Road 26', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(78, 'Customer27', 'User', 'customer27', '01710000027', 'customer27@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 27', 'Road 27', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(79, 'Customer28', 'User', 'customer28', '01710000028', 'customer28@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 28', 'Road 28', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(80, 'Customer29', 'User', 'customer29', '01710000029', 'customer29@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 29', 'Road 29', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(81, 'Customer30', 'User', 'customer30', '01710000030', 'customer30@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 30', 'Road 30', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(82, 'Customer31', 'User', 'customer31', '01710000031', 'customer31@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 31', 'Road 31', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(83, 'Customer32', 'User', 'customer32', '01710000032', 'customer32@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 32', 'Road 32', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(84, 'Customer33', 'User', 'customer33', '01710000033', 'customer33@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 33', 'Road 33', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(85, 'Customer34', 'User', 'customer34', '01710000034', 'customer34@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 34', 'Road 34', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(86, 'Customer35', 'User', 'customer35', '01710000035', 'customer35@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 35', 'Road 35', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(87, 'Customer36', 'User', 'customer36', '01710000036', 'customer36@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 36', 'Road 36', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(88, 'Customer37', 'User', 'customer37', '01710000037', 'customer37@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 37', 'Road 37', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(89, 'Customer38', 'User', 'customer38', '01710000038', 'customer38@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 38', 'Road 38', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(90, 'Customer39', 'User', 'customer39', '01710000039', 'customer39@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 39', 'Road 39', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(91, 'Customer40', 'User', 'customer40', '01710000040', 'customer40@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 40', 'Road 40', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(92, 'Customer41', 'User', 'customer41', '01710000041', 'customer41@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 41', 'Road 41', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(93, 'Customer42', 'User', 'customer42', '01710000042', 'customer42@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 42', 'Road 42', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(94, 'Customer43', 'User', 'customer43', '01710000043', 'customer43@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 43', 'Road 43', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(95, 'Customer44', 'User', 'customer44', '01710000044', 'customer44@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 44', 'Road 44', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(96, 'Customer45', 'User', 'customer45', '01710000045', 'customer45@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 45', 'Road 45', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(97, 'Customer46', 'User', 'customer46', '01710000046', 'customer46@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 46', 'Road 46', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(98, 'Customer47', 'User', 'customer47', '01710000047', 'customer47@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 47', 'Road 47', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(99, 'Customer48', 'User', 'customer48', '01710000048', 'customer48@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 48', 'Road 48', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(100, 'Customer49', 'User', 'customer49', '01710000049', 'customer49@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 49', 'Road 49', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident'),
(101, 'Customer50', 'User', 'customer50', '01710000050', 'customer50@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 50', 'Road 50', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident');

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

-- --------------------------------------------------------

--
-- Table structure for table `table_available_dates`
--

CREATE TABLE `table_available_dates` (
  `id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `available_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_available_dates`
--

INSERT INTO `table_available_dates` (`id`, `table_number`, `available_date`, `created_at`) VALUES
(1, 38, '2026-06-20', '2026-06-14 12:44:37'),
(2, 38, '2026-06-21', '2026-06-14 12:44:37'),
(3, 38, '2026-06-22', '2026-06-14 12:44:37'),
(4, 39, '2026-07-01', '2026-06-14 12:44:37'),
(5, 39, '2026-07-02', '2026-06-14 12:44:37');

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
-- Indexes for table `table_available_dates`
--
ALTER TABLE `table_available_dates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_table_date` (`table_number`,`available_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `table_available_dates`
--
ALTER TABLE `table_available_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `table_available_dates`
--
ALTER TABLE `table_available_dates`
  ADD CONSTRAINT `table_available_dates_ibfk_1` FOREIGN KEY (`table_number`) REFERENCES `tables` (`table_number`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
