-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2020 at 05:25 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `break_chain`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('307a64e11b61df72794c04b2dc6730dda13b63a5', '::1', 1585238044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538353233383034343b);

-- --------------------------------------------------------

--
-- Table structure for table `journey_tbl`
--

CREATE TABLE `journey_tbl` (
  `j_id` int(11) NOT NULL,
  `f_pr_id` int(11) NOT NULL,
  `f_purpose_id` int(11) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `f_vtype_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `place_to` varchar(200) NOT NULL,
  `return_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `purpose_of_journey` varchar(250) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_tbl`
--

CREATE TABLE `permission_tbl` (
  `permission_id` int(11) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `purpose_of_journey` varchar(250) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `police_register_tbl`
--

CREATE TABLE `police_register_tbl` (
  `police_id` int(11) NOT NULL,
  `pen_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public_register_tbl`
--

CREATE TABLE `public_register_tbl` (
  `pr_id` int(11) NOT NULL,
  `mob_no` varchar(12) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purpose_tbl`
--

CREATE TABLE `purpose_tbl` (
  `purpose_id` int(11) NOT NULL,
  `purpose` varchar(40) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype_tbl`
--

CREATE TABLE `vehicletype_tbl` (
  `vtype_id` int(11) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verify_log_tbl`
--

CREATE TABLE `verify_log_tbl` (
  `v_id` int(11) NOT NULL,
  `f_pr_id` int(11) NOT NULL,
  `f_j_id` int(11) NOT NULL,
  `f_permission_id` int(11) NOT NULL,
  `verify_flag` int(5) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  `verified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `journey_tbl`
--
ALTER TABLE `journey_tbl`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `permission_tbl`
--
ALTER TABLE `permission_tbl`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `police_register_tbl`
--
ALTER TABLE `police_register_tbl`
  ADD PRIMARY KEY (`police_id`);

--
-- Indexes for table `public_register_tbl`
--
ALTER TABLE `public_register_tbl`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `purpose_tbl`
--
ALTER TABLE `purpose_tbl`
  ADD PRIMARY KEY (`purpose_id`);

--
-- Indexes for table `vehicletype_tbl`
--
ALTER TABLE `vehicletype_tbl`
  ADD PRIMARY KEY (`vtype_id`);

--
-- Indexes for table `verify_log_tbl`
--
ALTER TABLE `verify_log_tbl`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journey_tbl`
--
ALTER TABLE `journey_tbl`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_tbl`
--
ALTER TABLE `permission_tbl`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_register_tbl`
--
ALTER TABLE `police_register_tbl`
  MODIFY `police_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_register_tbl`
--
ALTER TABLE `public_register_tbl`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purpose_tbl`
--
ALTER TABLE `purpose_tbl`
  MODIFY `purpose_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicletype_tbl`
--
ALTER TABLE `vehicletype_tbl`
  MODIFY `vtype_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verify_log_tbl`
--
ALTER TABLE `verify_log_tbl`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
