-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_doctor`
--

CREATE TABLE `add_doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `NMC` varchar(255) NOT NULL,
  `Qualifications` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `name`, `date`, `address`, `pnumber`, `gender`, `file`, `department`, `NMC`, `Qualifications`, `time`, `password`, `category`) VALUES
(1, 'Gita Poudel', '1995-06-22', 'butwal', '9847019877', 'on', 'upload/doc1.jpg', '1', '12345', 'MBBS', '10:00 am - 4:00 pm', '', 'Gynecologist'),
(2, 'Dinesh Sharma', '1995-01-31', 'palpa', '123456789', 'on', 'upload/doc2.jpg', '2', '33334', 'MA,Phd', '10:00 am - 4:00 pm', '1234567', 'Pediatrician'),
(3, 'Goma subedi', '1990-05-30', 'Sunwal', '9840670342', 'on', 'upload/doc5.jpg', '3', '11111', 'MBBS', '10:00 am - 4:00 pm', '', 'Endocrinologist'),
(4, 'Binu Thapa', '1995-11-08', 'palpa', '1111111111', 'on', 'upload/doc8.jpg', '4', '34532', 'MA,Phd', '10:00 am - 4:00 pm', '123456789', 'Oncologists'),
(8, 'Dinesh Sharmaww', '2024-05-08', 'butwal', '1234567891', 'on', 'upload/doc3.jpg', '1', '33334', 'MBBS', '10:00 am - 4:00 pm', '12345678', 'Gynecologist');

-- --------------------------------------------------------

--
-- Table structure for table `add_recp`
--

CREATE TABLE `add_recp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pnumber` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_recp`
--

INSERT INTO `add_recp` (`id`, `name`, `date`, `address`, `pnumber`, `email`, `password`) VALUES
(1, 'Dinesh Sharma', '2024-05-01', 'butwal', '9840670342', 'dineshsharama7799@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `password`) VALUES
('dineshsharama7799@gmail.com ', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `app_booking`
--

CREATE TABLE `app_booking` (
  `id` int(6) UNSIGNED NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Pnumber` varchar(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor_id` int(11) DEFAULT NULL,
  `user_id` int(50) NOT NULL,
  `action` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_booking`
--

INSERT INTO `app_booking` (`id`, `Fname`, `Mname`, `Lname`, `age`, `blood_group`, `address`, `Pnumber`, `category`, `subcategory`, `date`, `time`, `reg_date`, `doctor_id`, `user_id`, `action`) VALUES
(1, 'dinesh', '', 'sharma', 23, '', 'butwal', '9847019877', 'Gynecologist', '1', '2024-05-27', '10:00-10:20', '2024-05-27 10:41:30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Gynecologist'),
(2, 'Pediatrician'),
(3, 'Endocrinologist'),
(4, 'Oncologists'),
(5, 'Neurologists'),
(6, 'Psychiatrists'),
(7, 'Dermatologist'),
(8, 'Podiatrist');

-- --------------------------------------------------------

--
-- Table structure for table `check_up`
--

CREATE TABLE `check_up` (
  `id` int(11) NOT NULL,
  `Disease` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Medicines` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `pnumber`, `password`, `token`, `otp`, `otp_expiry`) VALUES
(1, 'Dinesh Sharmaww', 'dineshsharama7799@gmail.com', '1234567892', '1234567', '283ceaced67b22ec1a156efe95e70d', NULL, NULL),
(3, 'ram poudel', 'dineshsharama77799@gmail.com', '1234567892', '12345678', '7008548670474dfb2d12ce3f2b0ef0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_doctor`
--
ALTER TABLE `add_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_recp`
--
ALTER TABLE `add_recp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_booking`
--
ALTER TABLE `app_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor_id` (`doctor_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_up`
--
ALTER TABLE `check_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_doctor`
--
ALTER TABLE `add_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `add_recp`
--
ALTER TABLE `add_recp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_booking`
--
ALTER TABLE `app_booking`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `check_up`
--
ALTER TABLE `check_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_booking`
--
ALTER TABLE `app_booking`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `add_doctor` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `check_up`
--
ALTER TABLE `check_up`
  ADD CONSTRAINT `check_up_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
