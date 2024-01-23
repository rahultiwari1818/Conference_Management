-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2024 at 02:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ad_id` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ad_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('admin1', 'Rahul Tiwari', 'rahul@gmail.com', '$2y$10$4tPbYRrBQzcV9TcqUUtgwO.NHcWriefkZY3nDGgKxJktYIlwTta9K');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendents`
--

CREATE TABLE `tbl_attendents` (
  `reg_id` varchar(100) NOT NULL,
  `attendent_type` varchar(20) NOT NULL,
  `track` varchar(50) DEFAULT NULL,
  `paper_title` varchar(100) DEFAULT NULL,
  `paper_abstract` varchar(100) DEFAULT NULL,
  `paper` varchar(100) DEFAULT NULL,
  `first_author_email` varchar(50) NOT NULL,
  `first_author_salutation` varchar(10) NOT NULL,
  `first_author_name` varchar(100) NOT NULL,
  `first_author_institute_name` varchar(100) NOT NULL,
  `first_author_register_as` varchar(40) NOT NULL,
  `first_author_designation` varchar(50) NOT NULL,
  `first_author_gender` varchar(20) NOT NULL,
  `first_author_mobile` varchar(12) NOT NULL,
  `first_author_address` varchar(200) NOT NULL,
  `first_author_photo` varchar(100) NOT NULL,
  `second_author_email` varchar(50) DEFAULT NULL,
  `second_author_salutation` varchar(10) DEFAULT NULL,
  `second_author_name` varchar(100) DEFAULT NULL,
  `second_author_institute_name` varchar(100) DEFAULT NULL,
  `second_author_register_as` varchar(40) DEFAULT NULL,
  `second_author_designation` varchar(50) DEFAULT NULL,
  `second_author_gender` varchar(20) DEFAULT NULL,
  `second_author_mobile` varchar(12) DEFAULT NULL,
  `second_author_address` varchar(200) DEFAULT NULL,
  `second_author_photo` varchar(100) DEFAULT NULL,
  `third_author_email` varchar(50) DEFAULT NULL,
  `third_author_salutation` varchar(10) DEFAULT NULL,
  `third_author_name` varchar(100) DEFAULT NULL,
  `third_author_institute_name` varchar(100) DEFAULT NULL,
  `third_author_register_as` varchar(40) DEFAULT NULL,
  `third_author_designation` varchar(40) DEFAULT NULL,
  `third_author_gender` varchar(20) DEFAULT NULL,
  `third_author_mobile` varchar(12) DEFAULT NULL,
  `third_author_address` varchar(200) DEFAULT NULL,
  `third_author_photo` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendents`
--

INSERT INTO `tbl_attendents` (`reg_id`, `attendent_type`, `track`, `paper_title`, `paper_abstract`, `paper`, `first_author_email`, `first_author_salutation`, `first_author_name`, `first_author_institute_name`, `first_author_register_as`, `first_author_designation`, `first_author_gender`, `first_author_mobile`, `first_author_address`, `first_author_photo`, `second_author_email`, `second_author_salutation`, `second_author_name`, `second_author_institute_name`, `second_author_register_as`, `second_author_designation`, `second_author_gender`, `second_author_mobile`, `second_author_address`, `second_author_photo`, `third_author_email`, `third_author_salutation`, `third_author_name`, `third_author_institute_name`, `third_author_register_as`, `third_author_designation`, `third_author_gender`, `third_author_mobile`, `third_author_address`, `third_author_photo`, `payment_id`) VALUES
('atd1', 'Participant', NULL, NULL, NULL, NULL, 'rahul@gmail.com', 'Dr.', 'Rahul Tiwari', 'NIT Trichy', 'industrialist', 'HOD', 'male', '1234567890', '7 lok kalyan marg,delhi', './uploads/photos/atd1_1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_NS3ZzAo4BPpCzt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_attendents`
--
ALTER TABLE `tbl_attendents`
  ADD PRIMARY KEY (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
