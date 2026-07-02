-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2026 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `reservation_no`, `booking_date`, `booking_time`, `arrival_time`, `number_of_guests`, `table_number`, `guest_names`, `special_request`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, '0000-00-00', 'afternoon', '12:00', 12, 10, '', NULL, 'Cancelled', '2026-06-07 14:07:56', '2026-06-30 07:22:37'),
(14, 78, 'RES-126261', '2026-06-28', 'afternoon', '2:00 PM', 5, 13, 'Guest-819', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:07'),
(15, 84, 'RES-843286', '2026-06-28', 'afternoon', '6:00 PM', 10, 17, 'Guest-666', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:11'),
(16, 72, 'RES-908591', '2026-06-28', 'afternoon', '7:00 PM', 5, 32, 'Guest-683', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:17'),
(17, 86, 'RES-105293', '2026-06-28', 'evening', '7:00 PM', 9, 47, 'Guest-863', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-18 03:15:09'),
(19, 89, 'RES-148235', '2026-06-28', 'evening', '1:00 PM', 9, 8, 'Guest-275', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:21'),
(20, 59, 'RES-865789', '2026-06-28', 'evening', '6:00 PM', 10, 30, 'Guest-3', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:26'),
(21, 91, 'RES-401966', '2026-06-28', 'afternoon', '1:00 PM', 7, 20, 'Guest-980', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-18 03:15:15'),
(22, 71, 'RES-166178', '2026-06-28', 'evening', '12:30 PM', 6, 28, 'Guest-132', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:31'),
(27, 75, 'RES-682447', '2026-06-28', 'afternoon', '2:00 PM', 10, 30, 'Guest-73', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:36'),
(29, 79, 'RES-557742', '2026-06-28', 'afternoon', '1:00 PM', 4, 43, 'Guest-82', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:41'),
(30, 85, 'RES-136691', '2026-06-28', 'evening', '6:00 PM', 10, 17, 'Guest-807', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:46'),
(32, 94, 'RES-871560', '2026-06-28', 'evening', '6:00 PM', 8, 19, 'Guest-593', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:52'),
(33, 82, 'RES-942405', '2026-06-28', 'evening', '12:30 PM', 4, 23, 'Guest-194', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:00:58'),
(34, 73, 'RES-960619', '2026-06-28', 'evening', '12:30 PM', 2, 36, 'Guest-983', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:03'),
(35, 67, 'RES-836727', '2026-06-28', 'afternoon', '7:00 PM', 8, 48, 'Guest-341', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:10'),
(36, 87, 'RES-506760', '2026-06-28', 'afternoon', '6:00 PM', 8, 20, 'Guest-560', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:15'),
(37, 77, 'RES-298867', '2026-06-28', 'afternoon', '12:30 PM', 8, 43, 'Guest-690', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:20'),
(38, 76, 'RES-247486', '2026-06-28', 'evening', '2:00 PM', 10, 8, 'Guest-17', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:26'),
(41, 96, 'RES-456542', '2026-06-28', 'evening', '12:30 PM', 9, 51, 'Guest-324', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:31'),
(42, 97, 'RES-626912', '2026-06-28', 'evening', '1:00 PM', 7, 30, 'Guest-906', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:35'),
(43, 58, 'RES-689089', '2026-06-28', 'afternoon', '5:30 PM', 5, 39, 'Guest-274', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:40'),
(44, 92, 'RES-813852', '2026-06-28', 'evening', '1:00 PM', 1, 32, 'Guest-808', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:46'),
(45, 63, 'RES-958281', '2026-06-28', 'evening', '6:00 PM', 9, 6, 'Guest-91', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:50'),
(46, 101, 'RES-953244', '2026-06-28', 'afternoon', '1:00 PM', 3, 7, 'Guest-33', 'No special request', 'Cancelled', '2026-06-12 05:03:49', '2026-06-18 07:59:36'),
(47, 57, 'RES-801012', '2026-06-28', 'evening', '5:30 PM', 1, 21, 'Guest-986', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:01:55'),
(48, 56, 'RES-819049', '2026-06-28', 'evening', '7:00 PM', 5, 24, 'Guest-27', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:00'),
(49, 66, 'RES-678416', '2026-06-28', 'evening', '1:00 PM', 10, 37, 'Guest-738', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:05'),
(50, 62, 'RES-878589', '2026-06-28', 'evening', '6:00 PM', 9, 17, 'Guest-939', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:10'),
(51, 81, 'RES-107310', '2026-06-28', 'evening', '6:00 PM', 9, 5, 'Guest-971', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:15'),
(52, 52, 'RES-335754', '2026-06-28', 'evening', '12:30 PM', 5, 38, 'Guest-265', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:20'),
(54, 74, 'RES-432772', '2026-06-28', 'afternoon', '1:00 PM', 2, 52, 'Guest-662', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:25'),
(55, 54, 'RES-948372', '2026-06-28', 'afternoon', '6:00 PM', 2, 26, 'Guest-121', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:30'),
(56, 70, 'RES-986200', '2026-06-28', 'afternoon', '7:00 PM', 8, 1, 'Guest-979', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:35'),
(57, 61, 'RES-761559', '2026-06-28', 'evening', '1:00 PM', 8, 45, 'Guest-83', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:40'),
(58, 95, 'RES-870176', '2026-06-28', 'afternoon', '7:00 PM', 1, 39, 'Guest-382', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:45'),
(59, 65, 'RES-957904', '2026-06-28', 'evening', '6:00 PM', 3, 36, 'Guest-769', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:50'),
(60, 90, 'RES-989029', '2026-06-28', 'afternoon', '1:00 PM', 3, 32, 'Guest-136', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:55'),
(61, 80, 'RES-614976', '2026-06-28', 'evening', '12:30 PM', 8, 13, 'Guest-999', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:02:59'),
(62, 55, 'RES-848437', '2026-06-28', 'afternoon', '2:00 PM', 9, 36, 'Guest-968', 'No special request', 'Completed', '2026-06-12 05:03:49', '2026-06-28 22:03:04'),
(63, 1, 'RES-20260614-7752', '0000-00-00', 'afternoon', '12:00', 10, 38, '', NULL, 'Cancelled', '2026-06-14 13:50:02', '2026-06-30 07:14:56'),
(64, 53, 'RES-20260615-8986', '2026-06-29', 'afternoon', '12:00', 15, 1, '10', NULL, 'Completed', '2026-06-15 04:24:52', '2026-06-30 04:20:11'),
(65, 63, 'RES-20260617071249-1315', '2026-06-21', 'afternoon', '12:30', 10, 1, 'AAA', NULL, 'Completed', '2026-06-17 05:12:49', '2026-06-25 03:34:11'),
(66, 65, 'RES-20260617071315-6393', '0000-00-00', 'afternoon', '12:00', 15, 1, '', NULL, 'Cancelled', '2026-06-17 05:13:15', '2026-06-30 06:02:53'),
(67, 69, 'RES-20260617072504-9730', '2026-06-25', 'afternoon', '12:00', 15, 2, 'A', NULL, 'Completed', '2026-06-17 05:25:04', '2026-06-28 05:03:12'),
(68, 69, 'RES-20260625092904-9824', '2026-07-09', 'afternoon', '12:00', 10, 3, 'AA', NULL, 'Confirmed', '2026-06-25 07:29:04', '2026-06-25 07:29:04'),
(69, 100, 'RES-20260625101439-6108', '2026-06-26', 'afternoon', '12:00', 10, 1, 'A', NULL, 'Completed', '2026-06-25 08:14:39', '2026-06-28 05:03:17'),
(70, 101, 'RES-20260625101821-1927', '2026-07-03', 'afternoon', '12:00', 10, 2, 'AA', NULL, 'Confirmed', '2026-06-25 08:18:21', '2026-06-25 08:18:21'),
(71, 1, 'RES-20260628-6239', '0000-00-00', 'afternoon', '12:00', 10, 2, '', NULL, 'Cancelled', '2026-06-28 07:10:51', '2026-06-30 07:08:00'),
(72, 93, 'RES-20260628-1129', '2026-07-03', 'afternoon', '12:00', 10, 5, 'AA', NULL, 'Confirmed', '2026-06-28 08:51:45', '2026-06-28 08:51:45'),
(73, 93, 'RES-20260628-9280', '2026-07-04', 'afternoon', '12:00', 10, 13, 'AAA', NULL, 'Confirmed', '2026-06-28 09:02:20', '2026-06-28 09:02:20'),
(75, 92, 'RES-20260628-3053', '0000-00-00', 'afternoon', '12:30', 9, 11, '', NULL, 'Confirmed', '2026-06-28 09:09:37', '2026-06-30 07:14:23');

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
  `customer_type` enum('Non-Resident','Resident') NOT NULL DEFAULT 'Non-Resident',
  `plain_password` varchar(2000) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `role`, `customer_type`, `plain_password`, `reset_token`, `reset_expires`) VALUES
(1, 'Hafiz ', 'Ullah', 'hafizullah', '01723411403', 'hafizullah@ictcell.jnu.ac.bd', '$2y$10$ACMGQZeezWb8RhQ6Xu7RE.cliBXXuWz4mi8Pk0llUODraMAAcObkC', 'AA', 'BB', 'Dhyaka', 'AA', '102', 'AA', '2026-06-07 07:42:53', '2026-06-30 02:20:59', 'Admin', 'Resident', 'admin@2026#', '61284f41c2a68825f39725ca5147c8fa8ac679ee407078c4496fd12e2ea7f905', '2026-06-28 08:36:44'),
(52, 'Customer1', 'User', 'customer1', '01710000001', 'customer1@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 1', 'Road 1', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(53, 'Customer2', 'User2', 'customer2', '01710000002', 'customer2@gmail.com', '$2y$10$tJa5Qk5s7vG70ugyq.xnleBMna8YgR91UXbipmO38mUIvFq01UJn.', 'House 2', 'Road 2', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-24 10:21:37', 'Member', 'Non-Resident', 'admin@2027#', NULL, NULL),
(54, 'Customer3', 'User', 'customer3', '01710000003', 'customer3@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 3', 'Road 3', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(55, 'Customer4', 'User', 'customer4', '01710000004', 'customer4@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 4', 'Road 4', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(56, 'Customer5', 'User', 'customer5', '01710000005', 'customer5@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 5', 'Road 5', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(57, 'Customer6', 'User', 'customer6', '01710000006', 'customer6@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 6', 'Road 6', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(58, 'Customer7', 'User', 'customer7', '01710000007', 'customer7@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 7', 'Road 7', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(59, 'Customer8', 'User', 'customer8', '01710000008', 'customer8@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 8', 'Road 8', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(60, 'Customer9', 'User', 'customer9', '01710000009', 'customer9@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 9', 'Road 9', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(61, 'Customer10', 'User', 'customer10', '01710000010', 'customer10@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 10', 'Road 10', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(62, 'Customer11', 'User', 'customer11', '01710000011', 'customer11@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 11', 'Road 11', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(63, 'Customer12', 'User', 'customer12', '01710000012', 'customer12@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 12', 'Road 12', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-25 01:58:35', 'Member', 'Non-Resident', '', NULL, NULL),
(64, 'Customer13', 'User', 'customer13', '01710000013', 'customer13@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 13', 'Road 13', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(65, 'Customer14', 'User', 'customer14', '01710000014', 'customer14@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 14', 'Road 14', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(66, 'Customer15', 'User', 'customer15', '01710000015', 'customer15@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 15', 'Road 15', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(67, 'Customer16', 'User', 'customer16', '01710000016', 'customer16@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 16', 'Road 16', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(68, 'Customer17', 'User', 'customer17', '01710000017', 'customer17@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 17', 'Road 17', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(69, 'Customer18', 'User', 'customer18', '01710000018', 'customer18@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 18', 'Road 18', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(70, 'Customer19', 'User', 'customer19', '01710000019', 'customer19@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 19', 'Road 19', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(71, 'Customer20', 'User', 'customer20', '01710000020', 'customer20@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 20', 'Road 20', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(72, 'Customer21', 'User', 'customer21', '01710000021', 'customer21@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 21', 'Road 21', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(73, 'Customer22', 'User', 'customer22', '01710000022', 'customer22@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 22', 'Road 22', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(74, 'Customer23', 'User', 'customer23', '01710000023', 'customer23@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 23', 'Road 23', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(75, 'Customer24', 'User', 'customer24', '01710000024', 'customer24@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 24', 'Road 24', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(76, 'Customer25', 'User', 'customer25', '01710000025', 'customer25@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 25', 'Road 25', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(77, 'Customer26', 'User', 'customer26', '01710000026', 'customer26@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 26', 'Road 26', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(78, 'Customer27', 'User', 'customer27', '01710000027', 'customer27@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 27', 'Road 27', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(79, 'Customer28', 'User', 'customer28', '01710000028', 'customer28@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 28', 'Road 28', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(80, 'Customer29', 'User', 'customer29', '01710000029', 'customer29@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 29', 'Road 29', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(81, 'Customer30', 'User', 'customer30', '01710000030', 'customer30@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 30', 'Road 30', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(82, 'Customer31', 'User', 'customer31', '01710000031', 'customer31@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 31', 'Road 31', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(83, 'Customer32', 'User', 'customer32', '01710000032', 'customer32@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 32', 'Road 32', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(84, 'Customer33', 'User', 'customer33', '01710000033', 'customer33@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 33', 'Road 33', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(85, 'Customer34', 'User', 'customer34', '01710000034', 'customer34@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 34', 'Road 34', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(86, 'Customer35', 'User', 'customer35', '01710000035', 'customer35@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 35', 'Road 35', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(87, 'Customer36', 'User', 'customer36', '01710000036', 'customer36@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 36', 'Road 36', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(88, 'Customer37', 'User', 'customer37', '01710000037', 'customer37@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 37', 'Road 37', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(89, 'Customer38', 'User', 'customer38', '01710000038', 'customer38@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 38', 'Road 38', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(90, 'Customer39', 'User', 'customer39', '01710000039', 'customer39@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 39', 'Road 39', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(91, 'Customer40', 'User', 'customer40', '01710000040', 'customer40@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 40', 'Road 40', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(92, 'Customer41', 'User', 'customer41', '01710000041', 'customer41@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 41', 'Road 41', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-30 02:20:23', 'Member', 'Non-Resident', '', NULL, NULL),
(93, 'Customer42', 'User', 'customer42', '01710000042', 'customer42@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 42', 'Road 42', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-28 04:51:23', 'Member', 'Non-Resident', '', NULL, NULL),
(94, 'Customer43', 'User', 'customer43', '01710000043', 'customer43@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 43', 'Road 43', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-28 05:04:30', 'Member', 'Non-Resident', '', NULL, NULL),
(95, 'Customer44', 'User', 'customer44', '01710000044', 'customer44@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 44', 'Road 44', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(96, 'Customer45', 'User', 'customer45', '01710000045', 'customer45@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 45', 'Road 45', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(97, 'Customer46', 'User', 'customer46', '01710000046', 'customer46@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 46', 'Road 46', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(98, 'Customer47', 'User', 'customer47', '01710000047', 'customer47@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 47', 'Road 47', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(99, 'Customer48', 'User', 'customer48', '01710000048', 'customer48@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 48', 'Road 48', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-12 03:31:36', 'Member', 'Non-Resident', '', NULL, NULL),
(100, 'Customer49', 'User', 'customer49', '0171000112', 'customer49@gmail.com', '$2y$10$2bjCW7yUcjurOgTGoi2pAeuvaH2iG1PBF./SlX/1YFTJ/eBN4W8Pu', 'House 49', 'Road 49', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-24 10:21:02', 'Member', 'Non-Resident', 'admin2027#', NULL, NULL),
(101, 'Customer50', 'User50', 'customer50', '01710000050', 'customer50@gmail.com', '$2y$10$TfzI4MwV3P86dWefH/dTLeaUtbKkfozPgYNPlyMJV0ZqTP9qJRi8K', 'House 50', 'Road 50', 'Dhaka', 'Dhaka', '1207', 'Bangladesh', '2026-06-12 03:30:51', '2026-06-24 10:21:15', 'Member', 'Non-Resident', '', NULL, NULL),
(102, 'monir', 'Ahamed', '', '01711123456', 'monir@cse.jnu.ac.bd', '$2y$10$y8tl9v8TTJHAyTVXLgG1suiobJC40NNdLdgfF7mDQpcwirfOHKXeq', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-20 23:05:36', '2026-06-21 03:05:36', 'Member', 'Non-Resident', '12345', NULL, NULL),
(103, 'John', 'Doe', '', '01711111111', 'john@example.com', '$2y$10$p441R3B4gvYcyBoOCiB8E.aiABGFzvP/A7GRLW4FwZVhL7S5q43cO', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-20 23:18:24', '2026-06-21 03:18:24', 'Member', 'Non-Resident', '123456', NULL, NULL),
(104, 'Jane', 'Smith', '', '01822222222', 'jane@example.com', '$2y$10$iQ7IRb6jbzzuYDomAb9xXebG/kr73dhtMqZ2QyBb1ek2oMqm7M./G', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-20 23:18:24', '2026-06-21 03:18:24', 'Admin', 'Non-Resident', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `file_name` varchar(9000) NOT NULL,
  `file_path` varchar(6500) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `year` varchar(4) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `file_name`, `file_path`, `file_type`, `year`, `created_at`) VALUES
(2, 'CPT Annual Year end 2025 with 2026 Budget for Annual Report', '/uploads/2026/05/CPT-Annual-Report-Year-end-2025-with-2026-Budget-for-Annual-Mailing.pdf', 'financial', '', '2026-06-01'),
(3, 'CPT Annual Year end 2024 with 2025 Budget for Annual Report', '/uploads/2025/06/CPT-Annual-Report-Year-end-2024-with-2025-Budget-for-Annual-Mailing.pdf', 'financial', '', '0000-00-00'),
(4, 'CPT Annual Year end 2022 with 2023 Budget for Annual Report', '/uploads/2023/03/CPT-Annual-Report-Year-end-2022-with-2023-Budget-for-Annual-Mailing_correction-1.pdf', 'financial', '', '0000-00-00'),
(5, 'CPT Annual Year end 2019 with 2020 Budget for Annual Report', '/uploads/2020/08/0354_001.pdf', 'financial', '', '0000-00-00'),
(6, 'CPT Annual Year end 2018 with 2019 Budget for Annual Report', '/uploads/2019/07/CPT-Annual-Report-Year-end-2018-with-2019-Budget-for-Annual-MailingV2.pdf', 'financial', '', '0000-00-00'),
(7, 'CPT Annual Year end 2012 with 2013 Budget for Annual Report', '/uploads/2019/07/CPT-Annual-Report-Year-end-2012-with-2013-Budget-for-Annual-MailingV2.pdf', 'financial', '', '0000-00-00'),
(8, '2017 and prior Statement of Assets, Liabilities and Fund Balances', '/uploads/2018/02/CPT-Statement-of-Financial-Position.pdf', 'financial', '', '0000-00-00'),
(9, '2015 and prior Statement of Assets, Liabilities and Fund Balances', '/uploads/2016/06/Clifton-Park-Trust-Balance-Sheet-to-2015-2.pdf', 'financial', '', '0000-00-00'),
(10, '2016 Projects Budget', '/uploads/2014/08/2016-project-options-from-the-2015-retreat.pdf', 'financial', '', '0000-00-00'),
(11, '2015 Budget', '/uploads/2015/04/Clifton-Park-Budget-2015.pdf', 'financial', '', '0000-00-00'),
(12, '2015 Projects Budget', '/uploads/2015/04/Clifton-Park-Projects-2015.pdf', 'financial', '', '0000-00-00'),
(13, '2025 Clifton Park Trustees Tax Return', '/uploads/2026/05/CLIFTON-PARK-TRUSTEES_2025_TAX-RETURN_US-TAX-RETURN-1058.pdf', 'tax_return', '', '2026-06-21'),
(14, '2024 Clifton Park Trustees Tax Return', '/uploads/2025/10/2024-CPT-tax-form.pdf', 'tax_return', '', '2026-06-21'),
(15, '2023 Clifton Park Trustees Tax Return', '/uploads/2024/05/2023-Form-990-and-990T-Clifton-Park-Trustees.pdf', 'tax_return', '', '2026-06-21'),
(16, '2022 Clifton Park Trustees Tax Return', '/uploads/2023/02/Filing-Instructions-990EZPF.pdf', 'tax_return', '', '2026-06-21'),
(17, '2021 Clifton Park Trustees Tax Return', '/uploads/2022/11/CPT-2021-US-Tax-Return.pdf', 'tax_return', '', '2026-06-21'),
(18, '2020 Clifton Park Trustees Tax Return', '/uploads/2021/05/4140E01_US-Tax-Return-2020.pdf', 'tax_return', '', '2026-06-21'),
(19, '2019 Clifton Park Trustees Tax Return', '/uploads/2020/05/2019-990T-CPT.pdf', 'tax_return', '', '2026-06-21'),
(20, '2018 Clifton Park Trustees Tax Return', '/uploads/2019/05/Clifton-Park-Trustees_US-990-2018-Tax-Return.pdf', 'tax_return', '', '2026-06-21'),
(21, '2017 Clifton Park Trustees Tax Return', '/uploads/2018/04/CPT-Tax-Return-2017.pdf', 'tax_return', '', '2026-06-21'),
(22, '2016 Clifton Park Trustees Tax Return', '/uploads/2017/05/CPT-990-2016.pdf', 'tax_return', '', '2026-06-21'),
(23, '2015 Clifton Park Trustees Tax Return', '/uploads/2013/05/Clifton-Park-Trustees_US-Tax-Return-990-2015.pdf', 'tax_return', '', '2026-06-21'),
(24, '2014 Clifton Park Trustees Tax Return', '/uploads/2015/03/Clifton-Park-Trustees-2014-Form-990-P0075119xB06A9.pdf', 'tax_return', '', '2026-06-21'),
(25, '2013 Clifton Park Trustees Tax Return', '/uploads/2013/05/Clifton-Park-Trustees-Form-990-2013.pdf', 'tax_return', '', '2026-06-21'),
(26, '2012 Clifton Park Trustees Tax Return', '/uploads/2013/10/Untitled1.pdf', 'tax_return', '', '2026-06-21'),
(27, '2011 Clifton Park Trustees Tax Return', '/uploads/2013/05/Clifton-Park-Trustees_US-Tax-Return-2011.pdf', 'tax_return', '', '2026-06-21'),
(44, 'December 14, 2103 Annual Retreat Minutes', '/uploads/2014/01/CPT_2013_Retreat_Minutes.pdf', 'meeting', '2013', '2026-06-21'),
(45, 'November 8, 2013 Minutes', '/uploads/2013/12/min-11-8-13.pdf', 'meeting', '2013', '2026-06-21'),
(46, 'October 11, 2013 Minutes', '/uploads/2013/12/minutes-10-11-13.pdf', 'meeting', '2013', '2026-06-21'),
(47, 'September 6, 2013 Minutes', '/uploads/2013/10/min-9-6-13.pdf', 'meeting', '2013', '2026-06-21'),
(48, 'August 2, 2013 Minutes', '/uploads/2013/09/CPT_min_8_2_13.pdf', 'meeting', '2013', '2026-06-21'),
(49, 'July 15, 2013 Minutes', '/uploads/2013/09/CPT_min-7-15-13.pdf', 'meeting', '2013', '2026-06-21'),
(50, 'June 7, 2013 Minutes', '/uploads/2013/07/CPT_min_6_17_13.pdf', 'meeting', '2013', '2026-06-21'),
(51, 'May 3, 2013 Minutes', '/uploads/2013/06/Minutes-May-3-2013.pdf', 'meeting', '2013', '2026-06-21'),
(52, 'April 19, 2013 Minutes', '/uploads/2013/06/CPT_Min_4_19_13.pdf', 'meeting', '2013', '2026-06-21'),
(53, 'November 29, 2014 Annual Retreat Minutes', '/uploads/2015/02/2014-Retreat-Minutes-.pdf', 'meeting', '2014', '2026-06-21'),
(54, 'November 1, 2014 Minutes', '/uploads/2013/05/min-11-1-14.pdf', 'meeting', '2014', '2026-06-21'),
(55, 'September 5, 2014 Minutes', '/uploads/2014/11/min-9-5-14.pdf', 'meeting', '2014', '2026-06-21'),
(56, 'August 8, 2014 Minutes', '/uploads/2014/09/min-8-8-14.pdf', 'meeting', '2014', '2026-06-21'),
(57, 'July 11, 2014 Minutes', '/uploads/2013/05/min7-11-14.docx.pdf', 'meeting', '2014', '2026-06-21'),
(58, 'June 6, 2014 Minutes', '/uploads/2014/07/min-6-6-14.pdf', 'meeting', '2014', '2026-06-21'),
(59, 'May 2, 2014 Minutes', '/uploads/2014/06/min-5-2-14.pdf', 'meeting', '2014', '2026-06-21'),
(60, 'Clifton Park Trustees 2014 Town Hall Meeting', '/uploads/2014/05/Clifton-Beach-Town-Hall-May-21-2014.pdf', 'meeting', '2014', '2026-06-21'),
(61, 'April 11, 2014 Minutes', '/uploads/2013/05/min-4-11-14.pdf', 'meeting', '2014', '2026-06-21'),
(62, 'February 7, 2014 Minutes', '/uploads/2014/04/min-2-7-14.pdf', 'meeting', '2014', '2026-06-21'),
(63, 'January 10, 2014 Minutes', '/uploads/2014/02/min-1-10-14.pdf', 'meeting', '2014', '2026-06-21'),
(64, 'December 12, 2015 Annual Retreat Minutes', '/uploads/2013/05/retreat-minutes-2015-.pdf', 'meeting', '2015', '2026-06-21'),
(65, 'October 18, 2015 Minutes', '/uploads/2013/05/min-10-8-15.pdf', 'meeting', '2015', '2026-06-21'),
(66, 'August 14, 2015 Minutes', '/uploads/2013/05/min-8-14-15.pdf', 'meeting', '2015', '2026-06-21'),
(67, 'July 10, 2015 Minutes', '/uploads/2015/08/min-7-10-15.pdf', 'meeting', '2015', '2026-06-21'),
(68, 'June 5, 2015 Minutes', '/uploads/2015/07/min-6-5-15.pdf', 'meeting', '2015', '2026-06-21'),
(69, 'May 8, 2015 Minutes', '/uploads/2015/06/min-5-8-15.pdf', 'meeting', '2015', '2026-06-21'),
(70, 'April 10, 2015 Minutes', '/uploads/2015/05/min-4-10-15.pdf', 'meeting', '2015', '2026-06-21'),
(71, 'February 6, 2015 Minutes', '/uploads/2015/04/min-2-6-15.pdf', 'meeting', '2015', '2026-06-21'),
(72, 'December 3, 2016 Annual Retreat Minutes', '/uploads/2013/05/retreat-minutes-12-3-16.pdf', 'meeting', '2016', '2026-06-21'),
(73, 'October 13, 2016 Minutes', '/uploads/2013/05/min-10-13-16.pdf', 'meeting', '2016', '2026-06-21'),
(74, 'September 2, 2016 Minutes', '/uploads/2013/05/min-9-2-16.pdf', 'meeting', '2016', '2026-06-21'),
(75, 'August 4, 2016 Minutes', '/uploads/2016/10/min-8-4-16.pdf', 'meeting', '2016', '2026-06-21'),
(76, 'July 7, 2016 Minutes', '/uploads/2013/05/min-7-7-16.pdf', 'meeting', '2016', '2026-06-21'),
(77, 'June 10, 2016 Minutes', '/uploads/2013/05/hmin-6-10-16.pdf', 'meeting', '2016', '2026-06-21'),
(78, 'Town Hall Meeting Presentation 2016', '/uploads/2013/05/Town-Hall-2016.pdf', 'meeting', '2016', '2026-06-21'),
(79, 'April 8, 2016 Minutes', '/uploads/2013/05/min-4-8-16.pdf', 'meeting', '2016', '2026-06-21'),
(80, 'March 4, 2016 Minutes', '/uploads/2013/05/min-3-4-16.pdf', 'meeting', '2016', '2026-06-21'),
(81, 'February 5, 2016 Minutes', '/uploads/2013/05/min-2-5-16.pdf', 'meeting', '2016', '2026-06-21'),
(82, 'January 15, 2016 Minutes', '/uploads/2013/05/min-1-15-16.pdf', 'meeting', '2016', '2026-06-21'),
(83, 'December 9, 2017 Annual Retreat Minutes', '/uploads/2018/01/retreat-minutes-2017.pdf', 'meeting', '2017', '2026-06-21'),
(84, 'October 6, 2017 Minutes', '/uploads/2017/12/min-10-6-17.pdf', 'meeting', '2017', '2026-06-21'),
(85, 'Sept 1, 2017 Minutes', '/uploads/2017/10/min-9-1-17.pdf', 'meeting', '2017', '2026-06-21'),
(86, 'August 11, 2017 Minutes', '/uploads/2017/09/min-8-11-17.pdf', 'meeting', '2017', '2026-06-21'),
(87, 'July 14, 2017 Minutes', '/uploads/2017/08/min-7-14-17.pdf', 'meeting', '2017', '2026-06-21'),
(88, 'June 9, 2017 Minutes', '/uploads/2017/07/min-6-9-17.pdf', 'meeting', '2017', '2026-06-21'),
(89, 'May 5, 2017 Minutes', '/uploads/2017/06/min-5-5-17.pdf', 'meeting', '2017', '2026-06-21'),
(90, 'May 16, 2017 Annual Town Hall Meeting Presentation', '/uploads/2017/05/SPT-Town-Meeting-May-2017.pdf', 'meeting', '2017', '2026-06-21'),
(91, 'April 7, 2017 Minutes', '/uploads/2017/05/min-4-7-17.pdf', 'meeting', '2017', '2026-06-21'),
(92, 'March 3, 2017 Minutes', '/uploads/2017/05/min-3-3-17.pdf', 'meeting', '2017', '2026-06-21'),
(93, 'January 6, 2017 Minutes', '/uploads/2017/03/min-1-6-17.pdf', 'meeting', '2017', '2026-06-21'),
(94, 'December 8, 2018 Annual Retreat Minutes', '/uploads/2019/02/retreat-2018-minutes-for-web-site.pdf', 'meeting', '2018', '2026-06-21'),
(95, 'October 5, 2018 Minutes', '/uploads/2018/12/min-10-5-18.pdf', 'meeting', '2018', '2026-06-21'),
(96, 'September 8, 2018 Minutes', '/uploads/2018/12/min-9-8-18.pdf', 'meeting', '2018', '2026-06-21'),
(97, 'July 27, 2018 Minutes', '/uploads/2018/09/min-7-27-18.pdf', 'meeting', '2018', '2026-06-21'),
(98, 'June 29, 2018 Minutes', '/uploads/2018/07/min-6-29-18.pdf', 'meeting', '2018', '2026-06-21'),
(99, 'June 1, 2018 Minutes', '/uploads/2018/07/min-6-1-18.pdf', 'meeting', '2018', '2026-06-21'),
(100, 'May 11, 2018 Minutes', '/uploads/2018/06/min-5-11-18.pdf', 'meeting', '2018', '2026-06-21'),
(101, 'May 15, 2018 Town Hall Meeting Agenda', '/uploads/2018/05/Clifton-Park-Town-Hall-5-8-2018.pdf', 'meeting', '2018', '2026-06-21'),
(102, 'April 13, 2018 Minutes', '/uploads/2018/04/min-4-13-18.pdf', 'meeting', '2018', '2026-06-21'),
(103, 'March 9, 2018 Minutes', '/uploads/2018/04/min-3-9-18.pdf', 'meeting', '2018', '2026-06-21'),
(104, 'February 9, 2018 Minutes', '/uploads/2018/03/min-2-9-18.pdf', 'meeting', '2018', '2026-06-21'),
(105, 'January 12, 2018 Minutes', '/uploads/2018/02/min-1-12-18.pdf', 'meeting', '2018', '2026-06-21'),
(106, 'December 19, 2019 Annual Retreat Minutes', '/uploads/2020/02/retreat-minutes-for-2019.pdf', 'meeting', '2019', '2026-06-21'),
(107, 'October 4, 2019 Minutes', '/uploads/2020/02/min-10-4-19.pdf', 'meeting', '2019', '2026-06-21'),
(108, 'September 13, 2019 Minutes', '/uploads/2019/10/min-9-13-19.pdf', 'meeting', '2019', '2026-06-21'),
(109, 'August 9, 2019 Minutes', '/uploads/2019/09/min-8-9-19.pdf', 'meeting', '2019', '2026-06-21'),
(110, 'July 12, 2019 Minutes', '/uploads/2019/08/min-7-12-19.pdf', 'meeting', '2019', '2026-06-21'),
(111, 'June 6, 2019 Minutes', '/uploads/2019/07/min-6-6-19.pdf', 'meeting', '2019', '2026-06-21'),
(112, 'May 15, 2019 Town Hall Meeting Presentation', '/uploads/2019/05/CPT-Town-Meeting-May-2019-vFINAL.pdf', 'meeting', '2019', '2026-06-21'),
(113, 'May 3, 2019', '/uploads/2019/06/min-5-3-19.pdf', 'meeting', '2019', '2026-06-21'),
(114, 'April 4, 2019 Minutes', '/uploads/2019/06/min-4-4-19.pdf', 'meeting', '2019', '2026-06-21'),
(115, 'March 8, 2019 Minutes', '/uploads/2019/04/min-3-8-19.pdf', 'meeting', '2019', '2026-06-21'),
(116, 'February 8, 2019 Minutes', '/uploads/2019/03/min-2-8-19.pdf', 'meeting', '2019', '2026-06-21'),
(117, 'Annual Retreat Minutes December 12, 2020', 'uploads/2021/01/retreat-minutes-12-12-20.pdf', 'meeting', '2020', '2026-06-21'),
(118, 'October 30, 2020 Minutes', 'uploads/2020/12/min-10-30-20.pdf', 'meeting', '2020', '2026-06-21'),
(119, 'September 25, 2020 Minutes', 'uploads/2020/12/min-9-25-20-.pdf', 'meeting', '2020', '2026-06-21'),
(120, 'August 28, 2020 Minutes', 'uploads/2020/09/min-8-28-20-JMS-2.pdf', 'meeting', '2020', '2026-06-21'),
(121, 'July 31, 2020 Minutes', 'uploads/2020/08/min-7-31-20.pdf', 'meeting', '2020', '2026-06-21'),
(122, 'June 26, 2020 Minutes', 'uploads/2020/08/min-6-26-20.pdf', 'meeting', '2020', '2026-06-21'),
(123, 'May 29, 2020 Minutes', 'uploads/2020/06/minutes-5-29-20.pdf', 'meeting', '2020', '2026-06-21'),
(124, 'May 1, 2020 Minutes', 'uploads/2020/05/min-5-1-20-JMS-1.pdf', 'meeting', '2020', '2026-06-21'),
(125, 'May 21, 2020 Town Hall Meeting Presentation', 'uploads/2020/05/CPT-Town-Meeting-May-2020-vFINAL.pdf', 'meeting', '2020', '2026-06-21'),
(126, 'March 6, 2020 Minutes', 'uploads/2020/04/min-3-6-20-.pdf', 'meeting', '2020', '2026-06-21'),
(127, 'February 7, 2020 Minutes', 'uploads/2020/03/min-2-7-20.pdf', 'meeting', '2020', '2026-06-21'),
(128, 'December 9, 2021 Annual Retreat Minutes', 'uploads/2022/05/annual-retreat-minutes-12-9-21.pdf', 'meeting', '2021', '2026-06-21'),
(129, 'October 1, 2021 Minutes', 'uploads/2021/12/min-10-1-21.pdf', 'meeting', '2021', '2026-06-21'),
(130, 'August 27, 2021 Minutes', 'uploads/2021/10/min-8-27-21.pdf', 'meeting', '2021', '2026-06-21'),
(131, 'July 22, 2021 Minutes', 'uploads/2021/09/min-7-22-21.pdf', 'meeting', '2021', '2026-06-21'),
(132, 'June 24, 2021 Minutes', 'uploads/2021/08/min-6-24-21.pdf', 'meeting', '2021', '2026-06-21'),
(133, 'May 28, 2021 Minutes', 'uploads/2021/06/min-5-28-21-.pdf', 'meeting', '2021', '2026-06-21'),
(134, 'April 30, 2021 Minutes', 'uploads/2021/06/min-4-30-21-pdf.pdf', 'meeting', '2021', '2026-06-21'),
(135, 'May 19, 2021 Town Hall Presentation', 'uploads/2021/05/CPT-Town-Hall-May-2020-Final-compressed.pdf', 'meeting', '2021', '2026-06-21'),
(136, 'March 30, 2021 Minutes', 'uploads/2021/05/min-3-30-21-.pdf', 'meeting', '2021', '2026-06-21'),
(137, 'February 26, 2021 Minutes', 'uploads/2021/03/min-2-26-21.pdf', 'meeting', '2021', '2026-06-21'),
(138, 'January 29, 2021 Minutes', 'uploads/2021/02/min-1-29-21.pdf', 'meeting', '2021', '2026-06-21'),
(139, 'December 2, 2022 Annual Retret Minutes', 'uploads/2023/04/annual-retreat-minutes-12-2-2022-.pdf', 'meeting', '2022', '2026-06-21'),
(140, 'October 14, 2022 Minutes', 'uploads/2022/12/min-10-14-22.pdf', 'meeting', '2022', '2026-06-21'),
(141, 'September 2, 2022 Minutes', 'uploads/2022/12/minutes-9-2-22.pdf', 'meeting', '2022', '2026-06-21'),
(142, 'July 29, 2022 Minutes', 'uploads/2022/09/min-july-29-22.pdf', 'meeting', '2022', '2026-06-21'),
(143, 'June 24, 2022 Minutes', 'uploads/2022/08/min-6-24-22.pdf', 'meeting', '2022', '2026-06-21'),
(144, 'May 27, 2022 Minutes', 'uploads/2022/07/min-5-27-22.pdf', 'meeting', '2022', '2026-06-21'),
(145, 'May 19, 2022 Town Hall Meeting', 'uploads/2022/05/2022-Clifton-Park-Meeting.pdf', 'meeting', '2022', '2026-06-21'),
(146, 'April 22, 2022 Minutes', 'uploads/2022/05/min-4-22-22-.pdf', 'meeting', '2022', '2026-06-21'),
(147, 'March 25, 2022 Minutes', 'uploads/2022/05/min-3-25-22.pdf', 'meeting', '2022', '2026-06-21'),
(148, 'Minutes Annual Retreat 12-21-23', 'uploads/2024/04/retreat-minutes-12-21-23-approved-JS.pdf', 'meeting', '2023', '2026-06-21'),
(149, 'Minutes 9-29-23', 'uploads/2024/02/min-9-29-23.pdf', 'meeting', '2023', '2026-06-21'),
(150, 'Minutes 8-25-23', 'uploads/2024/03/min-8-25-23.pdf', 'meeting', '2023', '2026-06-21'),
(151, 'Minutes 7-28-23', 'uploads/2023/08/min-7-28-23-.pdf', 'meeting', '2023', '2026-06-21'),
(152, 'Minutes 6-2-23', 'uploads/2023/07/minutes-6-2-23_000215.pdf', 'meeting', '2023', '2026-06-21'),
(153, 'Town Hall Presentation 5-25-23', 'uploads/2023/06/2023-Clifton-Park-Meeting-5-25-23.pdf', 'meeting', '2023', '2026-06-21'),
(154, 'Minutes 4-28-23', 'uploads/2023/06/min-4-28-23.pdf', 'meeting', '2023', '2026-06-21'),
(155, 'Minutes 3-31-23', 'uploads/2023/06/min-3-31-23S.pdf', 'meeting', '2023', '2026-06-21'),
(156, 'Minutes Retreat 12-19-24', 'uploads/2025/04/retreat-minutes-12-19-24.pdf', 'meeting', '2024', '2026-06-21'),
(157, 'Minutes 9-27-24', 'uploads/2024/12/min-9-27-24-final.pdf', 'meeting', '2024', '2026-06-21'),
(158, 'Minutes 8-30-24', 'uploads/2024/12/min-8-30-24-final.pdf', 'meeting', '2024', '2026-06-21'),
(159, 'Minutes 7-26-24', 'uploads/2024/09/min-7-26-24.pdf', 'meeting', '2024', '2026-06-21'),
(160, 'Minutes 6-28-24', 'uploads/2024/07/min-6-28-24-.pdf', 'meeting', '2024', '2026-06-21'),
(161, 'Minutes 5-31-24', 'uploads/2024/07/min-5-31-24-final.pdf', 'meeting', '2024', '2026-06-21'),
(162, 'Annual Town Hall Meeting Presentation', 'uploads/2024/07/CPT-Town-Meeting-May-2024-FINAL.pdf', 'meeting', '2024', '2026-06-21'),
(163, 'Minutes 4-26-24', 'uploads/2024/07/minutes-4-26-24.pdf', 'meeting', '2024', '2026-06-21'),
(164, 'Annual Retreat Minutes 12-18-25', 'uploads/2026/04/retreat-minutes-12-18-25.pdf', 'meeting', '2025', '2026-06-21'),
(165, 'Meeting Minutes 10-31-25', 'uploads/2025/12/min-10-31-25.pdf', 'meeting', '2025', '2026-06-21'),
(166, 'Meeting Minutes 9-25-25', 'uploads/2025/11/min-9-29-25.pdf', 'meeting', '2025', '2026-06-21'),
(167, 'Meeting Minutes 8-29-25', 'uploads/2025/09/minutes-8-29-25.pdf', 'meeting', '2025', '2026-06-21'),
(168, 'Meeting Minutes 7-25-25', 'uploads/2025/09/min-7-25-25-.pdf', 'meeting', '2025', '2026-06-21'),
(169, 'Meeting Minutes 6-27-25', 'uploads/2025/07/min-6-27-25-.pdf', 'meeting', '2025', '2026-06-21'),
(170, 'Meeting Minutes 5-30-25', 'uploads/2026/04/min-5-30-25.pdf', 'meeting', '2025', '2026-06-21'),
(171, 'Annual Town Hall Meeting 5-22-25', 'uploads/2025/05/CPT-Town-Meeting-May-22-2025-v3.pdf', 'meeting', '2025', '2026-06-21'),
(172, 'Meeting Minutes 4-25-25', 'uploads/2025/05/CPT-minutes-4-25-25.pdf', 'meeting', '2025', '2026-06-21'),
(173, 'Meeting Minutes 4-24-26', 'uploads/2026/06/min-4-24-26-.pdf', 'meeting', '2026', '2026-06-21'),
(174, 'Annual Town Hall Meeting 5-14-26', 'uploads/2026/05/CPT-Town-Meeting-May-14-2026-v2-1-1.pdf', 'meeting', '2026', '2026-06-21'),
(175, 'Neighbour Map', 'uploads/2019/07/final-clifton-park-030812.jpg', 'neighbour_map', '2026', '2026-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_number` int(11) NOT NULL,
  `table_name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_available_dates`
--

INSERT INTO `table_available_dates` (`id`, `table_number`, `available_date`, `created_at`) VALUES
(24, 38, '2026-06-21', '2026-06-15 05:49:18'),
(25, 39, '2026-06-21', '2026-06-15 05:49:18'),
(26, 40, '2026-06-21', '2026-06-15 05:49:18'),
(27, 41, '2026-06-21', '2026-06-15 05:49:18'),
(28, 42, '2026-06-21', '2026-06-15 05:49:18'),
(34, 38, '2026-06-25', '2026-06-15 05:55:30'),
(35, 39, '2026-06-25', '2026-06-15 05:55:30'),
(36, 40, '2026-06-25', '2026-06-15 05:55:30'),
(37, 41, '2026-06-25', '2026-06-15 05:55:30'),
(38, 42, '2026-06-25', '2026-06-15 05:55:30');

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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `table_available_dates`
--
ALTER TABLE `table_available_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
