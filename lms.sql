-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2024 at 01:25 PM
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
  `BirthDate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admins_Tbl`
--

INSERT INTO `Admins_Tbl` (`AdminID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `EmployeeNum`, `Department`, `Username`, `Password`, `Email`, `BirthDate`, `created_at`, `updated_at`) VALUES
(1, 'Super', '', 'Admin', '', '24-0001', 'ALL_AROUND', 'superadmin', '$2y$10$1hooNhCmsFyjuMMdLjdmk.qZiEmyEByVBz1JZCOLAGhOVR6Tt9fbO', 'admin@email.com', '2003-05-03', '2024-05-04 03:47:18', '2024-05-04 03:47:18');

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

--
-- Dumping data for table `Instructors_Tbl`
--

INSERT INTO `Instructors_Tbl` (`InstructorID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `EmployeeNum`, `Department`, `Username`, `Password`, `Email`, `BirthDate`, `created_at`, `updated_at`) VALUES
(1, 'TRY', 'THIS', 'ONE', '', '24-0002', 'CCS', '20030327240002', '$2y$10$yUozCgOEJuDrQRuA6TI.sOZLiaUFdWE93r4523cCMbvjyFezmh3nG', 'email@email.com', '2003-03-27', '2024-05-04 03:57:16', '2024-05-04 03:57:16');

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
(1, 'superadmin', 'Administrator', 'Account Registration', '20030327222806', '2024-04-25 02:30:19'),
(2, 'superadmin', 'Administrator', 'Account Registration', '20030717222808', '2024-04-25 10:25:18'),
(3, 'superadmin', 'Administrator', 'Account Registration', '20020415222799', '2024-04-25 14:38:30'),
(4, 'superadmin', 'Administrator', 'Account Registration', '20030327343434', '2024-04-25 14:43:30'),
(5, 'superadmin', 'Administrator', 'Account Registration', '20030327345345', '2024-04-25 14:45:41'),
(6, 'superadmin', 'Administrator', 'Account Registration', '20030327343434', '2024-04-25 14:50:35'),
(7, 'superadmin', 'Administrator', 'Account Registration', '20030412453454', '2024-04-25 14:58:26'),
(8, 'superadmin', 'Administrator', 'Student Account Deactivation', 'superadmin', '2024-04-25 15:28:15'),
(9, 'superadmin', 'Administrator', 'Student Account Activation', 'superadmin', '2024-04-25 15:28:25'),
(10, 'superadmin', 'Administrator', 'Student Account Deactivation', '20030327343434', '2024-04-25 15:28:51'),
(11, 'superadmin', 'Administrator', '', '20030327343434', '2024-04-25 15:43:49'),
(12, 'superadmin', 'Administrator', '', '20030412453454', '2024-04-25 15:43:55'),
(13, 'superadmin', 'Administrator', '', '20020415222799', '2024-04-25 15:44:05'),
(14, 'superadmin', 'Administrator', '', '20030327343434', '2024-04-25 15:45:10'),
(15, 'superadmin', 'Administrator', 'Instructor Account Activation', '20030327343434', '2024-04-25 15:46:58'),
(16, 'superadmin', 'Administrator', 'Account Archiving', '20020415222799', '2024-04-25 16:59:28'),
(17, 'superadmin', 'Administrator', 'Student Account Registration', '20030327222456', '2024-04-25 17:58:48'),
(18, 'superadmin', 'Administrator', 'Student Account Deactivation', '20030327222456', '2024-04-25 17:59:08'),
(19, 'superadmin', 'Administrator', 'Account Archiving', '20030327222456', '2024-04-25 18:00:19'),
(20, 'superadmin', 'Administrator', 'Student Account Registration', '20031020222899', '2024-04-25 18:03:33'),
(21, 'superadmin', 'Administrator', 'Student Account Deactivation', 'torres', '2024-04-25 18:03:56'),
(22, 'superadmin', 'Administrator', 'Student Account Activation', 'torres', '2024-04-25 18:04:13'),
(23, 'superadmin', 'Administrator', 'Student Account Deactivation', '20031020222899', '2024-04-25 18:04:19'),
(24, 'superadmin', 'Administrator', 'Account Archiving', '20031020222899', '2024-04-25 18:13:02'),
(25, 'superadmin', 'Administrator', 'Student Account Registration', '20030327345345', '2024-04-25 18:14:15'),
(26, 'superadmin', 'Administrator', 'Student Account Registration', '20030327556123', '2024-04-25 18:14:46'),
(27, 'superadmin', 'Administrator', 'Student Account Deactivation', '20030327556123', '2024-04-25 18:14:53'),
(28, 'superadmin', 'Administrator', 'Account Archiving', '20030327556123', '2024-04-25 18:15:03'),
(29, 'superadmin', 'Administrator', 'Student Account Registration', '19951204212184', '2024-04-25 18:18:08'),
(30, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-04-25 18:19:44'),
(31, 'superadmin', 'Administrator', 'Instructor Account Registration', '20030327299999', '2024-04-26 02:40:07'),
(32, 'superadmin', 'Administrator', 'Admin Account Deactivation', 'superadmin', '2024-04-28 02:23:43'),
(33, 'superadmin', 'Administrator', 'Admin Account Activation', 'superadmin', '2024-04-28 02:23:48'),
(34, 'superadmin', 'Administrator', 'Instructor Account Activation', '20030327345345', '2024-04-28 03:13:34'),
(35, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:16:51'),
(36, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:18:47'),
(37, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:18:57'),
(38, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:22:26'),
(39, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:23:50'),
(40, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:24:27'),
(41, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:25:42'),
(42, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:26:40'),
(43, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 03:27:33'),
(44, 'superadmin', 'Administrator', 'Student Account Update', 'torres', '2024-04-28 05:53:01'),
(45, 'superadmin', 'Administrator', 'Student Account Update', '20030327345345', '2024-04-28 05:54:32'),
(46, 'superadmin', 'Administrator', 'Student Account Update', '20030327345345', '2024-04-28 05:58:31'),
(47, 'superadmin', 'Administrator', 'Student Account Update', '20030327345345', '2024-04-28 06:00:22'),
(48, 'superadmin', 'Administrator', 'Student Account Update', '20030327345345', '2024-04-28 06:09:13'),
(49, 'superadmin', 'Administrator', 'Admin Account Deactivation', 'superadmin', '2024-04-28 07:08:22'),
(50, 'superadmin', 'Administrator', 'Admin Account Activation', 'superadmin', '2024-04-28 07:08:27'),
(51, 'superadmin', 'Administrator', 'Instructor Account Activation', '20030412453454', '2024-04-28 07:18:06'),
(52, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327299999', '2024-04-28 07:18:15'),
(53, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030412453454', '2024-04-28 07:22:35'),
(54, 'superadmin', 'Administrator', 'Instructor Account Archiving', '20030412453454', '2024-04-28 07:27:45'),
(55, 'superadmin', 'Administrator', 'Instructor Account Update', '20030327343434', '2024-04-28 07:46:05'),
(56, 'superadmin', 'Administrator', 'Student Account Registration', '', '2024-04-28 07:51:42'),
(57, 'superadmin', 'Administrator', 'Instructor Account Registration', '20030327232900', '2024-04-28 08:24:39'),
(58, 'superadmin', 'Administrator', 'Instructor Account Registration', '20030327199999', '2024-04-28 08:25:24'),
(59, 'superadmin', 'Administrator', 'Instructor Account Update', '20030327199999', '2024-04-28 08:25:34'),
(60, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327199999', '2024-04-28 08:30:24'),
(61, 'superadmin', 'Administrator', 'Instructor Account Activation', '20030327199999', '2024-04-28 08:30:29'),
(62, 'superadmin', 'Administrator', 'Admin Account Registration', '20030327229980', '2024-04-29 01:54:55'),
(63, 'superadmin', 'Administrator', 'Admin Account Update', '20030327229980', '2024-04-29 01:56:38'),
(64, 'superadmin', 'Administrator', 'Program Implementation', 'BSIT', '2024-04-29 06:13:10'),
(65, 'superadmin', 'Administrator', 'Program Implementation', 'BSCS', '2024-04-29 06:25:06'),
(66, 'superadmin', 'Administrator', 'Admin Account Update', '20030327229980', '2024-04-29 07:07:37'),
(67, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-04-30 15:42:51'),
(68, 'superadmin', 'Administrator', 'Instructor Account Reactivation', '20030327345345', '2024-04-30 15:42:58'),
(69, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-04-30 15:43:09'),
(70, 'superadmin', 'Administrator', 'Instructor Account Reactivation', '20030327345345', '2024-04-30 15:43:14'),
(71, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-04-30 15:43:25'),
(72, 'superadmin', 'Administrator', 'Instructor Account Reactivation', '20030327345345', '2024-04-30 15:43:30'),
(73, 'superadmin', 'Administrator', 'Student Account Deactivation', '', '2024-05-02 00:37:38'),
(74, 'superadmin', 'Administrator', 'Student Account Archiving', '', '2024-05-02 00:38:08'),
(75, 'superadmin', 'Administrator', 'Instructor Account Registration', '20030327232320', '2024-05-02 01:00:37'),
(76, 'superadmin', 'Administrator', 'Program Implementation', 'BSIE', '2024-05-02 12:00:30'),
(77, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327232320', '2024-05-04 03:32:35'),
(78, 'superadmin', 'Administrator', 'Instructor Account Archiving', '20030327232320', '2024-05-04 03:32:51'),
(79, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-05-04 03:35:58'),
(80, 'superadmin', 'Administrator', 'Instructor Account Reactivation', '20030327345345', '2024-05-04 03:36:08'),
(81, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327345345', '2024-05-04 03:36:14'),
(82, 'superadmin', 'Administrator', 'Instructor Account Archiving', '20030327345345', '2024-05-04 03:36:30'),
(83, 'superadmin', 'Administrator', 'Instructor Account Archiving', '20030327345345', '2024-05-04 03:38:22'),
(84, 'superadmin', 'Administrator', 'Student Account Registration', '20030327222806', '2024-05-04 03:55:48'),
(85, 'superadmin', 'Administrator', 'Instructor Account Registration', '20030327240002', '2024-05-04 03:57:16'),
(86, 'superadmin', 'Administrator', 'Student Account Registration', '20030327220001', '2024-05-04 03:58:16'),
(87, 'superadmin', 'Administrator', 'Student Account Deactivation', '20030327220001', '2024-05-04 03:59:11'),
(88, 'superadmin', 'Administrator', 'Student Account Archiving', '20030327220001', '2024-05-04 03:59:20'),
(89, 'superadmin', 'Administrator', '', 'BSCS', '2024-05-05 13:01:13'),
(90, 'superadmin', 'Administrator', '', 'BSCS', '2024-05-05 13:07:50'),
(91, 'superadmin', 'Administrator', '', 'BSCS', '2024-05-05 13:11:09'),
(92, 'superadmin', 'Administrator', 'Student Account Deactivation', '20030327222806', '2024-05-05 13:21:48'),
(93, 'superadmin', 'Administrator', 'Instructor Account Deactivation', '20030327240002', '2024-05-05 13:22:48'),
(94, 'superadmin', 'Administrator', '', 'BSCS', '2024-05-05 13:47:17'),
(95, 'superadmin', 'Administrator', '', 'BSCS', '2024-05-05 13:47:34'),
(96, 'superadmin', 'Administrator', 'Program Archiving', 'BSCS', '2024-05-05 14:10:53'),
(97, 'superadmin', 'Administrator', 'Program Archiving', 'BSCS', '2024-05-05 14:23:17'),
(98, 'superadmin', 'Administrator', 'Program Implementation', 'BSCS', '2024-05-07 03:30:50'),
(99, 'superadmin', 'Administrator', 'Student Account Reactivation', '20030327222806', '2024-05-07 03:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `ProgramArchives_Tbl`
--

CREATE TABLE `ProgramArchives_Tbl` (
  `ArchiveID` int(11) NOT NULL,
  `ProgramID` int(11) NOT NULL,
  `ProgramCode` varchar(10) NOT NULL,
  `ProgramTitle` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archived_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ProgramArchives_Tbl`
--

INSERT INTO `ProgramArchives_Tbl` (`ArchiveID`, `ProgramID`, `ProgramCode`, `ProgramTitle`, `created_at`, `archived_at`) VALUES
(1, 2, 'BSCS', 'SDF', '2024-05-05 14:22:29', '2024-05-05 14:22:29'),
(2, 2, 'BSCS', 'SDF', '2024-05-05 14:23:17', '2024-05-05 14:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `Programs_Tbl`
--

CREATE TABLE `Programs_Tbl` (
  `ProgramID` int(11) NOT NULL,
  `ProgramCode` varchar(10) NOT NULL,
  `ProgramTitle` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Programs_Tbl`
--

INSERT INTO `Programs_Tbl` (`ProgramID`, `ProgramCode`, `ProgramTitle`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '2024-04-29 06:13:10', '0000-00-00 00:00:00'),
(3, 'BSIE', 'BACHELOR OF SCIENCE IN INDUSTRIAL ENGINEERING', '2024-05-02 12:00:30', '0000-00-00 00:00:00'),
(4, 'BSCS', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', '2024-05-07 03:30:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Sections_Tbl`
--

CREATE TABLE `Sections_Tbl` (
  `SectionID` int(11) NOT NULL,
  `ProgramCode` varchar(255) DEFAULT NULL,
  `SectionName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Sections_Tbl`
--

INSERT INTO `Sections_Tbl` (`SectionID`, `ProgramCode`, `SectionName`) VALUES
(3, 'BSIT', 'BSIT-1A'),
(4, 'BSIE', 'BSIE-1A'),
(5, 'BSIE', 'BSIE-2A'),
(6, 'BSIE', 'BSIE-3A'),
(7, 'BSIE', 'BSIE-4A'),
(8, 'BSIE', 'BSIE-1B'),
(9, 'BSIE', 'BSIE-2B'),
(10, 'BSIE', 'BSIE-3B'),
(11, 'BSIE', 'BSIE-4B'),
(12, 'BSIE', 'BSIE-1C'),
(13, 'BSIE', 'BSIE-2C'),
(14, 'BSIE', 'BSIE-3C'),
(15, 'BSIE', 'BSIE-4C'),
(16, 'BSCS', 'BSCS-1A'),
(17, 'BSCS', 'BSCS-2A'),
(18, 'BSCS', 'BSCS-3A'),
(19, 'BSCS', 'BSCS-4A'),
(20, 'BSCS', 'BSCS-1B'),
(21, 'BSCS', 'BSCS-2B'),
(22, 'BSCS', 'BSCS-3B'),
(23, 'BSCS', 'BSCS-4B'),
(24, 'BSIT', 'BSIT-1A'),
(25, 'BSIT', 'BSIT-2A'),
(26, 'BSIT', 'BSIT-3A'),
(27, 'BSIT', 'BSIT-4A'),
(28, 'BSIT', 'BSIT-1B'),
(29, 'BSIT', 'BSIT-2B'),
(30, 'BSIT', 'BSIT-3B'),
(31, 'BSIT', 'BSIT-4B');

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
(1, 'LIAN', 'VILLANUEVA', 'TORRES', '', '22-2806', '2003-03-27', 'BSIT', 'IRREGULAR', 'IRREGULAR', '2ND YEAR', '20030327222806', '$2y$10$.R8azcaPxzT3Q/bFPMWSfe8cQ6B/eZttulqEMOx.Fvj9rmk0IhWE.', 'torres@email.com', '2024-05-04 03:55:48', '2024-05-04 03:55:48');

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

--
-- Dumping data for table `UserArchives_Tbl`
--

INSERT INTO `UserArchives_Tbl` (`ArchiveID`, `AdminID`, `InstructorID`, `StudentID`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `StudentNum`, `EmployeeNum`, `BirthDate`, `Program`, `Department`, `Class`, `Section`, `YrLvl`, `Username`, `Password`, `Email`, `created_at`, `UserType`, `archived_at`) VALUES
(1, NULL, NULL, 2, 'HELLO', 'WORLD', 'START', '', '22-0001', NULL, '2003-03-27', 'BSMA', NULL, 'IRREGULAR', 'IRREGULAR', '3RD YEAR', '20030327220001', '$2y$10$ikFP/oUq.dZ/HRXMPbze2u2n3YMdd09ObD/dKwY/J/KbzoCgnBkrW', 'wefwf@email.com', '2024-05-04 11:58:16', 'Student', '2024-05-04 03:59:20');

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
(1, 'superadmin', '$2y$10$1hooNhCmsFyjuMMdLjdmk.qZiEmyEByVBz1JZCOLAGhOVR6Tt9fbO', 'admin@email.com', 'Admin', 0, 'ACTIVE', '2024-05-04 03:48:47', '2024-05-04 03:48:47'),
(2, '20030327222806', '$2y$10$.R8azcaPxzT3Q/bFPMWSfe8cQ6B/eZttulqEMOx.Fvj9rmk0IhWE.', 'torres@email.com', 'Student', 1, 'ACTIVE', '2024-05-04 03:55:48', '2024-05-07 03:52:34'),
(3, '20030327240002', '$2y$10$yUozCgOEJuDrQRuA6TI.sOZLiaUFdWE93r4523cCMbvjyFezmh3nG', 'email@email.com', 'Instructor', 1, 'INACTIVE', '2024-05-04 03:57:16', '2024-05-05 13:22:48'),
(4, '20030327220001', '$2y$10$ikFP/oUq.dZ/HRXMPbze2u2n3YMdd09ObD/dKwY/J/KbzoCgnBkrW', 'wefwf@email.com', 'Student', 1, 'INACTIVE', '2024-05-04 03:58:16', '2024-05-04 03:59:11');

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
-- Indexes for table `ProgramArchives_Tbl`
--
ALTER TABLE `ProgramArchives_Tbl`
  ADD PRIMARY KEY (`ArchiveID`);

--
-- Indexes for table `Programs_Tbl`
--
ALTER TABLE `Programs_Tbl`
  ADD PRIMARY KEY (`ProgramID`),
  ADD UNIQUE KEY `ProgramCode` (`ProgramCode`);

--
-- Indexes for table `Sections_Tbl`
--
ALTER TABLE `Sections_Tbl`
  ADD PRIMARY KEY (`SectionID`),
  ADD KEY `ProgramCode` (`ProgramCode`);

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
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Logs_Tbl`
--
ALTER TABLE `Logs_Tbl`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `ProgramArchives_Tbl`
--
ALTER TABLE `ProgramArchives_Tbl`
  MODIFY `ArchiveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Programs_Tbl`
--
ALTER TABLE `Programs_Tbl`
  MODIFY `ProgramID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Sections_Tbl`
--
ALTER TABLE `Sections_Tbl`
  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Students_Tbl`
--
ALTER TABLE `Students_Tbl`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `UserArchives_Tbl`
--
ALTER TABLE `UserArchives_Tbl`
  MODIFY `ArchiveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users_Tbl`
--
ALTER TABLE `Users_Tbl`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Sections_Tbl`
--
ALTER TABLE `Sections_Tbl`
  ADD CONSTRAINT `sections_tbl_ibfk_1` FOREIGN KEY (`ProgramCode`) REFERENCES `Programs_Tbl` (`ProgramCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
