-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 01:04 PM
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
-- Database: `qr_attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `tbl_attendance_id` int(11) NOT NULL,
  `tbl_student_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`tbl_attendance_id`, `tbl_student_id`, `time_in`) VALUES
(4, 12345678, '2024-05-07 06:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `tbl_student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `course_section` varchar(255) NOT NULL,
  `generated_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`tbl_student_id`, `student_name`, `course_section`, `generated_code`) VALUES
(11, 'jhgjghj', 'ghjghj', 'PBfsCtzGGk'),
(12, 'gfhgf', 'hfhfgh', 'zWAF8NpyH0'),
(13, 'sadsa', 'dsadsa', 'yBV7jEcnJh'),
(14, 'asdsad', 'sadsad', 'OCiJw8sN6Z'),
(15, 'asdsa', 'dsadsa', 'jGAO32HR8A'),
(16, 'fdgfd', 'gf', 'hQOt8qlokS'),
(17, 'dfgfdg', 'dfgdfg', 'fdlp7BMDG8'),
(18, 'fghfgh', 'fghf', 'P0FUGXvqH1'),
(19, 'fdgdf', 'gfdgfd', 'ETUeFl2mEb'),
(20, 'dfgfd', 'gdfgfd', 'vy4YNVBbg8'),
(22, 'sdfsd', 'fsd', 'XfU6yLdsPm'),
(23, 'sdfsdf', 'sdfsdsd', 'XGtXmACwyB'),
(24, 'ghjghjghj', 'ghjghjgh', 'ptQx05t9Ps'),
(25, 'cgsgsfcgwergser', 'gsfdgsergww', 'Y5ZXbw1N5Y'),
(26, 'Erwin Sapa', 'General Santos City KCC branch', ''),
(27, 'Erwin Sapa ', 'General Santos City Branch', 'bLCTMO5bwH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`tbl_attendance_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`tbl_student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `tbl_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `tbl_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
