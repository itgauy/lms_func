-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2024 at 06:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins_Tbl`
--

CREATE TABLE `Admins_Tbl` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) NOT NULL,
  `EmployeeNum` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admins_Tbl`
--

INSERT INTO `Admins_Tbl` (`AdminID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `EmployeeNum`, `Department`, `Username`, `Password`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', '', '', '22-0001', 'ALL_AROUND', 'superadmin', '$2y$10$1hooNhCmsFyjuMMdLjdmk.qZiEmyEByVBz1JZCOLAGhOVR6Tt9fbO', 'admin@email.com', '2024-04-23 04:45:38', '2024-04-23 04:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `Instructors_Tbl`
--

CREATE TABLE `Instructors_Tbl` (
  `InstructorID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) NOT NULL,
  `EmployeeNum` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BirthDate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Logs_Tbl`
--

CREATE TABLE `Logs_Tbl` (
  `LogID` int(11) NOT NULL,
  `Actor` varchar(50) NOT NULL,
  `Privilege` varchar(20) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Target` varchar(50) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Logs_Tbl`
--

INSERT INTO `Logs_Tbl` (`LogID`, `Actor`, `Privilege`, `Action`, `Target`, `Timestamp`) VALUES
(1, 'superadmin', 'Administrator', 'Account Registration', '20030327222806', '2024-04-25 02:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `Students_Tbl`
--

CREATE TABLE `Students_Tbl` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(10) NOT NULL,
  `StudentNum` varchar(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `Program` varchar(10) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `YrLvl` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Students_Tbl`
--

INSERT INTO `Students_Tbl` (`StudentID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `StudentNum`, `BirthDate`, `Program`, `Class`, `Section`, `YrLvl`, `Username`, `Password`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'LIAN', 'VILLANUEVA', 'TORRES', '', '22-2806', '2003-03-27', 'BSIT', 'IRREGULAR', 'IRREGULAR', '2ND YEAR', 'torres', '$2y$10$smOYmqCXLROA79CDxKyhBu8VfmV04KggsZmhgDC.TMYwpg32VpddG', 'torres@email.com', '2024-04-25 02:30:19', '2024-04-25 03:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `UserArchives_Tbl`
--

CREATE TABLE `UserArchives_Tbl` (
  `ArchiveID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Suffix` varchar(10) DEFAULT NULL,
  `StudentNum` varchar(10) DEFAULT NULL,
  `EmployeeNum` varchar(10) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Program` varchar(10) DEFAULT NULL,
  `Department` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL,
  `YrLvl` varchar(10) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `UserType` varchar(20) DEFAULT NULL,
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users_Tbl`
--

CREATE TABLE `Users_Tbl` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `NewAcc` tinyint(1) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users_Tbl`
--

INSERT INTO `Users_Tbl` (`UserID`, `Username`, `Password`, `Email`, `UserType`, `NewAcc`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '$2y$10$1hooNhCmsFyjuMMdLjdmk.qZiEmyEByVBz1JZCOLAGhOVR6Tt9fbO', 'admin@email.com', 'Admin', 0, 'ACTIVE', '2024-04-25 02:25:07', '2024-04-25 03:08:19'),
(2, 'torres', '$2y$10$smOYmqCXLROA79CDxKyhBu8VfmV04KggsZmhgDC.TMYwpg32VpddG', 'torres@email.com', 'Student', 0, 'ACTIVE', '2024-04-25 02:30:19', '2024-04-25 03:37:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins_Tbl`
--
ALTER TABLE `Admins_Tbl`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `Instructors_Tbl`
--
ALTER TABLE `Instructors_Tbl`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `Logs_Tbl`
--
ALTER TABLE `Logs_Tbl`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `Students_Tbl`
--
ALTER TABLE `Students_Tbl`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `UserArchives_Tbl`
--
ALTER TABLE `UserArchives_Tbl`
  ADD PRIMARY KEY (`ArchiveID`);

--
-- Indexes for table `Users_Tbl`
--
ALTER TABLE `Users_Tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins_Tbl`
--
ALTER TABLE `Admins_Tbl`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Instructors_Tbl`
--
ALTER TABLE `Instructors_Tbl`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Logs_Tbl`
--
ALTER TABLE `Logs_Tbl`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Students_Tbl`
--
ALTER TABLE `Students_Tbl`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `UserArchives_Tbl`
--
ALTER TABLE `UserArchives_Tbl`
  MODIFY `ArchiveID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users_Tbl`
--
ALTER TABLE `Users_Tbl`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
